<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use App\Services\StorageService;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
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
        $documents = Document::orderBy('created_at', 'desc')->paginate(15);
        return view('documents.view')->with('documents', $documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $documentData =  StorageService::storeFileAndGetMetaData($request, "document", "documents");
        $document = new Document();
        $document->description = $request->input('description');
        $document->name = $documentData["filename"];
        $document->user_id = Auth::id();
        $document->file_size = $documentData["file_size"];
        $document->mime_type = $documentData["mime"];

        $document->save();

        return redirect('/documents')->with('status', 'Document uploaded successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('documents.edit')->with('document', $document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, Document $document)
    {
        $document->update($request->only(['description']));
        return redirect('/documents')->with('status', 'Document Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if(Storage::delete('public/' . Auth::user()->id . '/documents/' . $document->name)){
            $document->delete();
            return redirect('/documents')->with('status', 'Document deleted');
        } else {
            return redirect('/documents')->with('status', 'Error while deleting document.');
        }
    }
}
