<?php

namespace App\components;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class storageImages
{
    function StorageImageUpdate($request, $fieldName, $folderName)
    {

        if ($request->HasFile($fieldName)) {
            $file =  $request->$fieldName;
            $fileNameOriginal = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . Auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOriginal,
                'file_path' => Storage::url($filePath)
            ];

            return $dataUploadTrait;
        }
        return null;
    }

    function StorageImageUpdateMultiple($file, $folderName)
    {


        $random = Str::random(20);

        $fileNameOriginal = $file->getClientOriginalName();
        $fileNameHash = $random . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/' . $folderName . '/' . Auth()->id(), $fileNameHash);
        $dataUploadTrait = [
            'file_name' => $fileNameOriginal,
            'file_path' => Storage::url($filePath)
        ];

        return $dataUploadTrait;
    }
}
