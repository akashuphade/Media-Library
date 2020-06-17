@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card card-align w-100">
                <div class="card-header">
                    <a href="/images" class="btn btn-sm btn-primary float-left">Go back</a>
                    <h2 class="text-info">View Details</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-3 text-md-right font-weight-bold">Name:</label>
                        <label class="col-md-3 text-md-left">{{$image->name}}</label>
                        <label class="col-md-3 text-md-right font-weight-bold">Description:</label>
                        <label class="col-md-3 text-md-left">{{$image->description}}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 text-md-right font-weight-bold">Size:</label>
                        <label class="col-md-3 text-md-left">{{$image->fileSize}} bytes</label>
                        <label class="col-md-3 text-md-right font-weight-bold">Height:</label>
                        <label class="col-md-3 text-md-left">{{$image->height}} px</label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 text-md-right font-weight-bold">Width:</label>
                        <label class="col-md-3 text-md-left">{{$image->width}} px</label>
                        <label class="col-md-3 text-md-right font-weight-bold">Mime-type:</label>
                        <label class="col-md-3 text-md-left">{{$image->mimeType}}</label>
                    </div>
                </div>
            </div>
            <img src="/storage/{{Auth::user()->id}}/images/{{$image->name}}" alt="{{$image->name}}" width="100%">
        </div>

    </div>
@endsection