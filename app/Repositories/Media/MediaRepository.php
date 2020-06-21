<?php

namespace App\Repositories\Media;

use App\Http\Requests\MediaRequest;

interface MediaRepository
{
    public function saveMedia(MediaRequest $request, array $mediaInformation);

    public function updateMedia(MediaRequest $request, $id);

    public function deleteMedia($id);

    public function getImages();

    public function getImageById($id);

    public function getDocuments();

    public function getDocumentById($id);

    public function getAudios();

    public function getVideos();

}
