<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait UpdateGenericClass
{
    public static function updateData(Request $request, $id)
    {
        return self::where('id', $id)->update($request->except('_token'));
    }

}
