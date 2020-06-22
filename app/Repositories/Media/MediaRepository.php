<?php

namespace App\Repositories\Media;

use App\Http\Requests\MediaRequest;

interface MediaRepository
{
    public function saveMedia(MediaRequest $request, array $mediaInformation);

    public function saveEmbeddedMedia(MediaRequest $request);

    public function updateMedia(MediaRequest $request, $id);

    public function deleteMedia($id);

    public function getMediaById($id);

    public function getImages();

    public function getDocuments();

    public function getAudios();

    public function getVideos();

    public function getEmbeddedVideos();

}
