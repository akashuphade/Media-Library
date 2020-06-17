<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Services\StorageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all the images
        $images = Image::orderBy('created_at', 'desc')->paginate(6);
        return view('images.view')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $imageData =  StorageService::storeFileAndGetMetaData($request, "image", "images");
        $image = new Image();
        $image->description = $request->input('description');
        $image->name = $imageData["filename"];
        $image->user_id = Auth::id();
        $image->file_size = $imageData["file_size"];
        $image->mime_type = $imageData["mime"];

        $image->save();

        return redirect('/images')->with('status', 'Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, Image $image)
    {
        $image->update($request->only(['description']));
        return redirect('/images')->with('status', 'Image description updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        if(Storage::delete('public/' . Auth::user()->id . '/images/' . $image->name)){
            $image->delete();
            return redirect('/images')->with('status', 'Image deleted');
        } else {
            return redirect('/images')->with('status', 'Error while deleting image.');
        }
    }
}
