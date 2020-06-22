@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ url()->previous() }}" class="btn btn-primary float-left">Back</a>
        <h3>Video Details</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <label class="col-md-3 text-md-right font-weight-bold">Name:</label>
            <label class="col-md-3 text-md-left">{{$video->name}}</label>
            <label class="col-md-3 text-md-right font-weight-bold">Description:</label>
            <label class="col-md-3 text-md-left">{{$video->description}}</label>
        </div>
        <div class="row">
            <label class="col-md-3 text-md-right font-weight-bold">Size:</label>
            <label class="col-md-3 text-md-left">{{$video->file_size}} bytes</label>
            <label class="col-md-3 text-md-right font-weight-bold">Mime-type:</label>
            <label class="col-md-3 text-md-left">{{$video->mime_type}}</label>
        </div>
    </div>
</div>
    <iframe style="width: 100%; height:450px" src="/storage/{{Auth::user()->id}}/Videos/{{$video->name}}" frameborder="0"></iframe>
</div>
@endsection
