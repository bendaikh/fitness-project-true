<?php

namespace Modules\GlobalSetting\app\Http\Controllers;

use Exception;
use ZipArchive;
use App\Models\CustomAddon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Nwidart\Modules\Facades\Module;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Permission;
use Modules\GlobalSetting\app\Models\Setting;
use Modules\GlobalSetting\app\Traits\ArchiveHelperTrait;
use Modules\Installer\app\Enums\InstallerInfo;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class ManageAddonController extends Controller
{
    use ArchiveHelperTrait;

    public function index()
    {
        $addons = CustomAddon::latest()->get();
        return view('globalsetting::addons.manage_addon', ['addons' => $addons]);
    }

    public function installAddon()
    {

        $files = glob(public_path('addons_files') . '/*');


        $addonFiles = [];
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'zip' && $this->isFirstDirAddons($file)) {
                $fileName                                     = pathinfo($file, PATHINFO_FILENAME);
                $fileExtension                                = pathinfo($file, PATHINFO_EXTENSION);
                $addonFiles[$fileName . '.' . $fileExtension] = $this->checkAndReadJsonFile($file);
            }
        }

        $upload_max_filesize = $this->convertPHPSizeToBytes(ini_get('upload_max_filesize'));
        $post_max_size = $this->convertPHPSizeToBytes(ini_get('post_max_size'));
        $max_upload_size = min($upload_max_filesize, $post_max_size);

        return view('globalsetting::addons.install_addon', ['addonFiles' => $addonFiles, 'max_upload_size' => $max_upload_size]);
    }

    /**
     * @param Request $request
     */
    public function installStore(Request $request)
    {
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        $save = $receiver->receive();
        if ($save->isFinished()) {
            $file = $save->getFile();

            $mime = $file->getClientOriginalExtension();
            if ($mime == 'zip') {
                $filePath = public_path('addons_files/addon.zip');
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                $file->move(public_path('addons_files'), 'addon.zip');
            }

            return response()->json(['status' => true], 200);
        }
        $handler = $save->handler();
        return response()->json([
            "done"   => $handler->getPercentageDone(),
            'status' => true,
        ]);
    }

    public function installProcessStart()
    {
        Cache::forget('dynamic_translatable_models');

        $zipFilePath = public_path('addons_files/addon.zip');


        if (!File::exists($zipFilePath)) {
            $notification = __('No Addon File Found');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return redirect()->back()->with($notification);
        }

        if (!$this->isFirstDirAddons($zipFilePath)) {
            $notification = __('Invalid Addon File Structure');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return redirect()->back()->with($notification);
        }

        $file = $zipFilePath;

        if (pathinfo($file, PATHINFO_EXTENSION) === 'zip' && $this->isFirstDirAddons($file)) {
            $addonFile     = $this->checkAndReadJsonFile($file);

            //application version check
            $setting = Cache::get('setting');
            $version = $setting->version ?? Setting::where('key', 'version')->value('value');

            if (!version_compare($version, $addonFile?->minimum_version, '>=')) {
                return redirect()->back()->with([
                    'message' => __('Addon requires application version') . ' >= ' . $addonFile?->minimum_version . '. ' . __('Current version') . ': ' . $version,
                    'alert-type' => 'error',
                ]);
            }


            $addonFileJson = json_decode(json_encode($addonFile), true);

            // check if addon is for the current application
            if (isset($addonFileJson['item'])) {
                $item = $addonFileJson['item'];
                if (!(isset($item['alias']) && $item['alias'] == 'gym' && isset($item['product_id']) && $item['product_id'] == InstallerInfo::ITEM_ID->value)) {
                    return redirect()->back()->with([
                        'message' => __('Addon is not for suitable for this application'),
                        'alert-type' => 'error',
                    ]);
                }

                $itemId = $item['item_id'];
                if (!$itemId) {
                    return redirect()->back()->with([
                        'message' => __('Addon is not for suitable for this application'),
                        'alert-type' => 'error',
                    ]);
                }
                $getContent = file_get_contents(InstallerInfo::getLicenseFilePath());
                $json = json_decode(
                    $getContent,
                    true
                );

                if (!isset($json["addon_$itemId"])) {
                    return redirect()->back()->with([
                        'message' => __('Addon is not verified'),
                        'alert-type' => 'error',
                    ]);
                }
            } else {
                return redirect()->back()->with([
                    'message' => __('Addon is not for suitable for this application'),
                    'alert-type' => 'error',
                ]);
            }


            $addonExist = CustomAddon::where('name', $addonFile->name)->first();


            if ($addonExist && count($addonFileJson) > 0 && ($addonFile?->version == $addonExist?->version)) {
                $notification = __('Addon Already Installed');
                $notification = ['message' => $notification, 'alert-type' => 'error'];

                return redirect()->back()->with($notification);
            }

            try {
                $zip = new ZipArchive;

                if ($zip->open($zipFilePath) === true) {
                    $zip->extractTo(base_path());
                    $zip->close();
                } else {
                    $notification = __('Corrupted Zip File');
                    $notification = ['message' => $notification, 'alert-type' => 'error'];

                    return redirect()->back()->with($notification);
                }
            } catch (Exception $e) {
                Log::error($e->getMessage());
                $notification = __('Corrupted Zip File');
                $notification = ['message' => $notification, 'alert-type' => 'error'];

                return redirect()->back()->with($notification);
            }

            $moduleSlug = null;

            try {
                $getModuleJson = $this->checkAndReadJsonFile($file, 'module.json');


                $moduleSlug = $getModuleJson->name;

                DB::beginTransaction();

                $customAddon       = new CustomAddon();
                $customAddon->slug = $getModuleJson->name;
                foreach ($addonFileJson as $key => $value) {
                    if ($key === 'minimum_version' || $key === 'item') {
                        continue;
                    }
                    $customAddon->$key = is_array($value) ? json_encode($value) : $value;
                }
                $customAddon->status = 0;
                $customAddon->save();

                Module::register($customAddon->slug);

                $wsusJson = $this->checkAndReadJsonFile($file);

                $this->insertRoleAndPermissions($moduleSlug, $wsusJson);

                $this->moveAssetFiles($wsusJson, $moduleSlug);

                DB::commit();

                unlink($zipFilePath);

                $notification = __('Installed Successfully');
                $notification = ['message' => $notification, 'alert-type' => 'success'];
            } catch (Exception $e) {
                DB::rollBack();
                Module::find($moduleSlug)?->delete();
                logger()->error($e->getMessage());

                $notification = __('Something went wrong');
                $notification = ['message' => $notification, 'alert-type' => 'error'];
            }
        }

        return to_route('admin.addons.view')->with($notification);
    }

    /**
     * @param $permissions
     */
    private function insertRoleAndPermissions($slug, $wsusJson)
    {
        try {
            if (Module::find($slug) && isset($wsusJson->options->role_permission)) {
                $rolePermission = $wsusJson->options->role_permission;

                // Ensure permissions exist and are an array
                if (isset($rolePermission->permissions) && is_array($rolePermission->permissions) && count($rolePermission->permissions) > 0) {
                    $permissions     = $rolePermission->permissions;
                    $permissionGroup = $rolePermission->group_name ?? 'default';

                    // Loop through each permission and insert/update in database
                    foreach ($permissions as $permissionName) {
                        $permission = Permission::updateOrCreate([
                            'name'       => $permissionName,
                            'group_name' => $permissionGroup,
                            'guard_name' => 'admin',
                        ]);

                        // Assign the permission to the "Super Admin" role
                        Role::where(['name' => 'Super Admin', 'guard_name' => 'admin'])
                            ->first()?->givePermissionTo($permission);
                    }
                }
            }
        } catch (Exception $e) {
            logger()->error($e->getMessage());
        }
    }
    /**
     * @param string $slug
     */
    private function removeRoleAndPermissions(string $slug)
    {
        try {
            // Correct the JSON path for the addon
            $jsonPath = base_path("Modules/{$slug}/wsus.json");

            // Check if the module and JSON file exist
            if (Module::find($slug) && file_exists($jsonPath)) {
                // Decode the JSON file
                $wsusJson = json_decode(file_get_contents($jsonPath));

                if (isset($wsusJson->options->role_permission)) {
                    $rolePermission = $wsusJson->options->role_permission;

                    // Ensure permissions exist and are an array
                    if (isset($rolePermission->permissions) && is_array($rolePermission->permissions) && count($rolePermission->permissions) > 0) {
                        $permissions = $rolePermission->permissions;
                        $permissionGroup = $rolePermission->group_name ?? 'default';

                        // Loop through each permission and remove it from the database
                        foreach ($permissions as $permissionName) {
                            $permission = Permission::where([
                                'name'       => $permissionName,
                                'group_name' => $permissionGroup,
                                'guard_name' => 'admin',
                            ])->first();

                            if ($permission) {
                                // Detach permission from roles and delete
                                $permission->roles()->detach();
                                $permission->delete();
                            }
                        }
                    }
                }
            }
        } catch (Exception $e) {
            logger()->error($e->getMessage());
        }
    }

    /**
     * @param $wsusJson
     * @param $moduleName
     */
    public function moveAssetFiles($wsusJson, $moduleName)
    {
        if (isset($wsusJson->options->assets)) {
            $assets = $wsusJson->options->assets;

            // Process CSS assets
            if (isset($assets->css) && is_array($assets->css)) {
                foreach ($assets->css as $cssFile) {
                    $this->moveFileToPublicPath($cssFile, $moduleName);
                }
            }

            // Process JS assets
            if (isset($assets->js) && is_array($assets->js)) {
                foreach ($assets->js as $jsFile) {
                    $this->moveFileToPublicPath($jsFile, $moduleName);
                }
            }
        }
    }

    /**
     * @param $fileData
     * @param $moduleName
     */
    private function moveFileToPublicPath($fileData, $moduleName)
    {
        $sourcePath      = base_path('Modules' . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . ltrim(str_replace('/', DIRECTORY_SEPARATOR, $fileData->path), DIRECTORY_SEPARATOR));
        $destinationPath = public_path(str_replace('/', DIRECTORY_SEPARATOR, $fileData->pasteTo));

        // Ensure the destination directory exists or create it
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Check if the source file exists before moving
        if (File::exists($sourcePath)) {
            $destinationFullPath = $destinationPath . DIRECTORY_SEPARATOR . basename($sourcePath);

            // Copy the file and log the operation
            File::copy($sourcePath, $destinationFullPath);
            logger()->info("Moved {$sourcePath} to {$destinationFullPath}");
        } else {
            logger()->error("Source file not found: {$sourcePath}");
        }
    }

    /**
     * @param $slug
     */
    public function updateStatus($slug)
    {
        $addon = CustomAddon::whereSlug($slug)->firstOrFail();

        $status = $addon->status == 1 ? 0 : 1;

        Module::scan();

        if (!Module::has($addon->slug)) {
            $notification = __('Addon Not Found');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return back()->with($notification);
        }

        if ($status) {
            Module::enable($addon->slug);
            $module = Module::find($addon->slug);
            if ($module->isEnabled()) {
                $addon->status = $status;
                // write code to inject the code into the sidebarfile
                $sidebarFilePath    = base_path('resources/views/admin/addons.blade.php');
                $sidebarFileContent = File::get($sidebarFilePath);
                $injectedCode       = "\n@includeIf('" . $module->getLowerName() . "::sidebar')";
                if (strpos($sidebarFileContent, $injectedCode) === false) {
                    // Add the injected code
                    $updatedSidebarFileContent = str_replace('<!-- Addon:Sidebar -->', '<!-- Addon:Sidebar -->' . $injectedCode, $sidebarFileContent);

                    // Write the updated content to the file
                    File::put($sidebarFilePath, $updatedSidebarFileContent);
                }

                // write code to migrate the module
                $name = $module->getName();

                if (!$this->moduleMigration($name)) {
                    $module->disable();
                }
            }
        } else {
            $module = Module::find($addon->slug);
            $module->disable();

            if ($module->isDisabled()) {
                $addon->status = $status;
            }
        }

        $addon->save();

        $notification = __('Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return response()->json($notification);
    }

    /**
     * @param $module
     */
    public function moduleMigration($module)
    {
        try {
            Artisan::call('module:migrate', [
                'module'  => $module,
                '--force' => true,
            ]);

            $seederClass = "Modules\\$module\\Database\\Seeders\\{$module}DatabaseSeeder";

            // Check if the seeder class exists
            if (class_exists($seederClass)) {
                Artisan::call('db:seed', [
                    '--class' => $seederClass,
                    '--force' => true,
                ]);
            } else {
                Log::warning("Seeder class not found: $seederClass");
            }

            return true;
        } catch (Exception $e) {
            Log::info($e);

            return false;
        }
    }
    /**
     * @param $module
     */
    public function moduleMigrationRollback($module)
    {
        try {
            Artisan::call('module:migrate-rollback', [
                'module'  => $module,
                '--force' => true,
            ]);
            return true;
        } catch (Exception $e) {
            Log::info($e);

            return false;
        }
    }

    public function ModuleRefresh()
    {
        try {

            exec('php composer.phar dump-autoload');

            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('config:clear');
        } catch (Exception $e) {
            logger()->error($e->getMessage());
        }
    }

    /**
     * @param $slug
     */
    public function uninstallAddon($slug)
    {

        $addon = CustomAddon::whereSlug($slug)->firstOrFail();

        Module::scan();
        $module = Module::find($addon->slug);

        if (!Module::has($addon->slug)) {
            $notification = __('Addon Not Found');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return back()->with($notification);
        }
        try {
            $this->removeVerifyKey($slug);
            $this->moduleMigrationRollback($slug);
            $this->removeRoleAndPermissions($slug);
        } catch (Exception $e) {
            info($e);
        }

        if ($module->delete()) {
            $addon->delete();
            // write code to remove the code from the sidebar file
            $sidebarFilePath    = base_path('resources/views/admin/addons.blade.php');
            $sidebarFileContent = File::get($sidebarFilePath);
            $injectedCode       = "\n@includeIf('" . $module->getLowerName() . "::sidebar')";
            if (strpos($sidebarFileContent, $injectedCode)) {
                $updatedSidebarFileContent = str_replace($injectedCode, '', $sidebarFileContent);
                File::put($sidebarFilePath, $updatedSidebarFileContent);
            }
        }

        $notification = __('Deleted Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return back()->with($notification);
    }

    public function deleteAddon()
    {
        $this->deleteFolderAndFiles(public_path('addons_files'));

        $notification = __('Deleted Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return back()->with($notification);
    }

    public function removeVerifyKey($slug)
    {
        // Correct the JSON path for the addon
        $jsonPath = base_path("Modules/{$slug}/wsus.json");

        // Check if the module and JSON file exist
        if (Module::find($slug) && file_exists($jsonPath)) {
            // Decode the JSON file
            $wsusJson = json_decode(file_get_contents($jsonPath));


            $itemID = $wsusJson->item->item_id;

            // remove hashed
            $getContent = file_get_contents(InstallerInfo::getLicenseFilePath());
            $json = json_decode(
                $getContent,
                true
            );
            unset($json["addon_$itemID"]);
            $json = json_encode($json);
            file_put_contents(InstallerInfo::getLicenseFilePath(), $json);
        }
    }

    public function verifyAddon(Request $request)
    {
        $request->validate([
            'key' => 'required',
        ]);

        $zipFilePath = public_path('addons_files/addon.zip');
        if (!File::exists($zipFilePath)) {
            return response()->json(['message' => 'Addon Not Found', 'alert-type' => 'error']);
        }

        if (!$this->isFirstDirAddons($zipFilePath)) {
            return response()->json(['message' => 'Invalid Addon File Structure', 'alert-type' => 'error']);
        }
        $file = $zipFilePath;
        if (pathinfo($file, PATHINFO_EXTENSION) === 'zip' && $this->isFirstDirAddons($file)) {
            $addonFile     = $this->checkAndReadJsonFile($file);

            $addonFileJson = json_decode(json_encode($addonFile), true);
            $itemID = $addonFileJson['item']['item_id'];
            if (empty($itemID)) {
                return response()->json(['message' => 'Invalid Addon File Structure', 'alert-type' => 'error']);
            } else {
                if ($itemID == InstallerInfo::ITEM_ID->value) {
                    return response()->json(['message' => 'Invalid Addon File Structure', 'alert-type' => 'error']);
                }
            }
            try {
                $response = Http::post(InstallerInfo::VERIFICATION_URL->value, [
                    'purchase_code' => $request->key,
                    'item_id' => $itemID,
                    'incoming_url' => InstallerInfo::getHost(),
                    'incoming_ip' => InstallerInfo::getRemoteAddr(),
                ])->json();

                if ($response['success']) {
                    $getContent = file_get_contents(InstallerInfo::getLicenseFilePath());
                    if ($getContent) {
                        $json = json_decode($getContent, true);
                        $json['addon_' . $itemID] = $response['verification_hashed'];
                        file_put_contents(InstallerInfo::getLicenseFilePath(), json_encode($json, JSON_PRETTY_PRINT));
                    } else {
                        file_put_contents(InstallerInfo::getLicenseFilePath(), json_encode(["addon_$itemID" => $response['verification_hashed']], JSON_PRETTY_PRINT));
                    }

                    return response()->json(['message' => 'Verified Successfully', 'success' => 'true']);
                } else {
                    return response()->json(['message' => 'Invalid Key', 'alert-type' => 'error']);
                }
            } catch (Exception $e) {
                return response()->json(['message' => $e->getMessage(), 'alert-type' => 'error']);
            }
        }
    }

    private function convertPHPSizeToBytes($size)
    {
        $suffix = strtoupper(substr($size, -1));
        $value = (int) substr($size, 0, -1);
        switch ($suffix) {
            case 'G':
                $value *= 1024 * 1024 * 1024;
                break;
            case 'M':
                $value *= 1024 * 1024;
                break;
            case 'K':
                $value *= 1024;
                break;
        }
        return $value;
    }
    private function formatBytes($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = floor(log($size, 1024));
        $formattedSize = $size / pow(1024, $index);
        return round($formattedSize, $precision) . ' ' . $units[$index];
    }
}
