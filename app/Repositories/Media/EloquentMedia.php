<?php

namespace App\Repositories\Media;

use App\Http\Requests\MediaRequest;
use App\Models\Media;
use App\Repositories\Media\MediaRepository;

class EloquentMedia implements MediaRepository
{
    private $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }
    public function saveMedia(MediaRequest $request, array $mediaInformation)
    {
        //Store the media information
        $this->media->description = $request->input('description');
        $this->media->name = $mediaInformation['file_name'];
        $this->media->file_size = $mediaInformation['file_size'];
        $this->media->mime_type = $mediaInformation['mime_type'];
        $this->media->media_type = $mediaInformation['media_type'];
        $this->media->save();
    }

    public function updateMedia(MediaRequest $request, $id)
    {
        $media = $this->media::find($id);
        $media->description = $request->input('description');
        $media->save();
    }

    public function deleteMedia($id)
    {
        $media = $this->media::find($id);
        $media->delete();
    }


    public function getImages()
    {
        return $this->media::where('media_type', 'image')->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getImageById($id)
    {
        return $this->media::find($id);
    }

    public function getDocuments()
    {
        return $this->media::where('media_type', 'document')->orderBy('created_at', 'desc')->paginate(15);
    }

    public function getDocumentById($id)
    {
        return $this->media::find($id);
    }

    public function getAudios()
    {

    }

    public function getVideos()
    {

    }

}
