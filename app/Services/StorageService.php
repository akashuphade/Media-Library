<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StorageService
{

    public static function storeFileAndGetMetaData(Request $request, $fileElement, $folderName)
    {
        //Get the original file name
        $filenameWithExtension = $request->file($fileElement)->getClientOriginalName();

        //Extract only file name
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //Extract the extension
        $extension = pathinfo($filenameWithExtension, PATHINFO_EXTENSION);

        $fileNameToStore = $filename . '_' . time() . "." .$extension;
        //Save the image
        $request->file($fileElement)->storeAs("public/" . Auth::user()->id . "/" .$folderName, $fileNameToStore);

        $fileSize = $request->file($fileElement)->getSize();

        //Get meta data of the image
        $mime = $request->file($fileElement)->getClientMimeType();

        return [
            "filename" => $fileNameToStore,
            "file_size" => $fileSize,
            "mime" => $mime
        ];
    }

}
