<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    public function handleFileUpload(Request $request, string $fieldName, ?string $oldPath = null, string $dir = 'uploads'): ?string
    {
        // check fieldName
        if (!$request->hasFile($fieldName)) return null;

        // check for old path
        if ($oldPath && File::exists(public_path($oldPath))) {
            File::delete(public_path($oldPath));
        }

        // get file
        $file = $request->file($fieldName);
        $extension = $file->getClientOriginalExtension();

        // update name
        $updatedFileName = \Str::random(30) . '.' . $extension;

        // move to uploads
        $file->move(public_path($dir), $updatedFileName);

        return $dir . '/' . $updatedFileName;
    }
}
