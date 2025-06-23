<?php

use App\Models\CustomAddon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Nwidart\Modules\Facades\Module;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_addons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug');
            $table->boolean('is_default')->default(false);
            $table->text('description')->nullable();
            $table->json('author')->nullable();
            $table->json('options')->nullable();
            $table->string('icon')->nullable();
            $table->string('license')->nullable();
            $table->string('url')->nullable();
            $table->string('version')->nullable();
            $table->string('minimum_version')->nullable();
            $table->date('last_update')->nullable();
            $table->boolean('status')->default(false)->index('idx_custom_addons_status');
            $table->timestamps();
        });


        try {
            foreach (Module::toCollection() as $module) {
                if ($module = Module::find($module)) {
                    $getJsonFileLocation = $module->getPath() . '/wsus.json';

                    if (file_exists($getJsonFileLocation)) {
                        $wsusJsonData = json_decode(file_get_contents($getJsonFileLocation), true);

                        if (is_array($wsusJsonData) && count($wsusJsonData) > 0) {
                            $addon = new CustomAddon();
                            $addon->slug = $module;
                            foreach ($wsusJsonData as $key => $value) {
                                if ($key == 'last_update') {
                                    $addon->$key = date('Y-m-d', strtotime($value));
                                } else {
                                    $addon->$key = is_array($value) ? json_encode($value) : $value;
                                }
                            }
                            $addon->status = true;
                            $addon->save();
                        }
                    }
                }
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_addons');
    }
};
