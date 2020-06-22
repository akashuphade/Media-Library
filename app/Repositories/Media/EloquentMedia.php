<?php

namespace App\Repositories\Media;

use App\Http\Requests\MediaRequest;
use App\Models\Media;
use App\Repositories\Media\MediaRepository;
use Illuminate\Support\Facades\Auth;

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
        $this->media->user_id = Auth::user()->id;
        $this->media->file_size = $mediaInformation['file_size'];
        $this->media->mime_type = $mediaInformation['mime_type'];
        $this->media->media_type = $mediaInformation['media_type'];
        $this->media->save();
    }

    public function saveEmbeddedMedia(MediaRequest $request)
    {
        $this->media->description = $request->input("description");
        $this->media->name = $request->input('link');
        $this->media->user_id = Auth::user()->id;
        $this->media->mime_type = "video";
        $this->media->file_size = 0;
        $this->media->media_type = "embedded";
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

    public function getMediaById($id)
    {
        return $this->media::find($id);
    }

    public function getImages()
    {
        return $this->media::where(['media_type' => 'image', 'user_id' => Auth::user()->id])->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getDocuments()
    {
        return $this->media::where(['media_type' => 'document', 'user_id' => Auth::user()->id])->orderBy('created_at', 'desc')->paginate(15);
    }

    public function getAudios()
    {
        return $this->media::where(['media_type' => 'audio', 'user_id' => Auth::user()->id])->orderBy('created_at', 'desc')->paginate(15);
    }

    public function getVideos()
    {
        return $this->media::where(['media_type' => 'video', 'user_id' => Auth::user()->id])->orderBy('created_at', 'desc')->paginate(15);
    }

    public function getEmbeddedVideos()
    {
        return $this->media::where(['media_type' => 'embedded', 'user_id' => Auth::user()->id])->orderBy('created_at', 'desc')->paginate(15);
    }
}
