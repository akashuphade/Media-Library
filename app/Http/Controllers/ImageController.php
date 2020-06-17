<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        //Get the original file name
        $filenameWithExtension = $request->file('image')->getClientOriginalName();

        $fileSize = $request->file('image')->getSize();

        //Extract only file name
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //Extract the extension
        $extension = pathinfo($filenameWithExtension, PATHINFO_EXTENSION);

        $fileNameToStore = $filename . '_' . time() . "." .$extension;

        //Get meta data of the image
        $data = getimagesize($request->file('image'));
        $width = $data[0];
        $height = $data[1];
        $mime = $data["mime"];

        //Save the image
        $request->file('image')->storeAs("public/" . Auth::user()->id . "/images", $fileNameToStore);

        $image = new Image();
        $image->description = $request->input('description');
        $image->name = $fileNameToStore;
        $image->user_id = Auth::id();
        $image->filesize = $fileSize;
        $image->height = $height;
        $image->width = $width;
        $image->mimeType = $mime;

        $image->save();

        return redirect('/images')->with('status', 'Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);

        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $image = Image::find($id);
        $image->description = $request->input('description');
        $image->save();

        return redirect('/images')->with('status', 'Image description updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect('/images')->with('status', 'Image deleted');
    }
}
