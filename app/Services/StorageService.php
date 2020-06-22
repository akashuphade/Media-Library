<?php

namespace App\Services;

use App\Http\Requests\MediaRequest;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StorageService
{

    public static function storeFileAndGetMetaData(MediaRequest $request, $fileElement)
    {
        $mediaTypeFolders = [
            "image" => "Images",
            "document" => "Documents",
            "audio" => "Audios",
            "video" => "Videos"
        ];

        //Get the original file name
        $filenameWithExtension = $request->file($fileElement)->getClientOriginalName();

        //Extract only file name
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //Extract the extension
        $extension = pathinfo($filenameWithExtension, PATHINFO_EXTENSION);

        $fileNameToStore = $filename . '_' . time() . "." .$extension;

        $fileSize = $request->file($fileElement)->getSize();
        //Get meta data of the image
        $mime = $request->file($fileElement)->getClientMimeType();

        //check the media type
        if (stripos($mime, 'image') !== false) {
            $mediaType = 'image';
        } elseif (stripos($mime, 'pdf') !== false) {
            $mediaType = 'document';
        } elseif (stripos($mime, 'mp3') !== false || stripos($mime, 'audio') !== false) {
            $mediaType = 'audio';
        } elseif (stripos($mime, 'mp4') !== false || stripos($mime, 'video') !== false) {
            $mediaType = 'video';
        }

        //Save the image
        $request->file($fileElement)->storeAs("public/" . Auth::user()->id . "/" .$mediaTypeFolders[$mediaType], $fileNameToStore);

        return [
            "file_name" => $fileNameToStore,
            "file_size" => $fileSize,
            "mime_type" => $mime,
            "media_type" => $mediaType
        ];
    }

    public static function removeMediaFromStorage($id)
    {
        $media = Media::find($id);
        Storage::delete('public/' . Auth::user()->id . '/' . ucfirst($media->media_type) . 's/' . $media->name);
    }

    public static function downloadMedia($id)
    {
        $media = Media::find($id);
        return response()->download('storage/' . Auth::user()->id . "/". ucfirst($media->media_type) . "s/" . $media->name);
    }
}
