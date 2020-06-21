<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use App\Models\Media;
use App\Repositories\Media\MediaRepository;
use App\Services\StorageService;

class MediaController extends Controller
{

    private $media;

    public function __construct(MediaRepository $media)
    {
        $this->middleware('auth');
        $this->media = $media;
    }

    public function getUploadView()
    {
        return view('upload');
    }

    public function uploadMedia(MediaRequest $request)
    {
        //store media in storage and get the required information back
        $mediaInformation = StorageService::storeFileAndGetMetaData($request, 'media');
        $this->media->saveMedia($request, $mediaInformation);
        return redirect('home')->with('status', 'Media added successfully');
    }

    public function getImages()
    {
        $images = $this->media->getImages();
        return view('images.view')->with('images', $images);
    }

    public function getImagebyId($id)
    {
        $image = $this->media->getImagebyId($id);
        return view('images.show')->with('image', $image);
    }

    public function editImage($id)
    {
        $image = $this->media->getImagebyId($id);
        return view('images.edit')->with('image', $image);
    }

    public function updateImage(MediaRequest $request, $id)
    {
        $this->media->updateMedia($request, $id);
        return redirect('/media/images')->with('status', 'Image updated successfully');
    }

    public function deleteImage($id)
    {
        StorageService::removeMediaFromStorage($id);
        $this->media->deleteMedia($id);
        return redirect('/media/images')->with('status', 'Image deleted successfully');
    }

    public function getDocuments()
    {
        $documents = $this->media->getDocuments();
        return view('documents.view')->with('documents', $documents);
    }

    public function getDocumentById($id)
    {
        $document = $this->media->getDocumentById($id);
        return view('documents.show')->with('document', $document);
    }

    public function editDocument($id)
    {
        $image = $this->media->getDocumentbyId($id);
        return view('documents.edit')->with('document', $image);
    }

    public function updateDocument(MediaRequest $request, $id)
    {
        $this->media->updateMedia($request, $id);
        return redirect('/media/documents')->with('status', 'Document updated successfully');
    }

    public function deleteDocument($id)
    {
        StorageService::removeMediaFromStorage($id);
        $this->media->deleteMedia($id);
        return redirect('/media/documents')->with('status', 'Document deleted successfully');
    }

    public function downloadMedia($id)
    {
        return StorageService::downloadMedia($id);
    }
}
