@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ url()->previous() }}" class="btn btn-primary float-left">Back</a>
        <h3>Video Details</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <label class="col-md-3 text-md-right font-weight-bold">Description:</label>
            <label class="col-md-3 text-md-left">{{$video->description}}</label>
            <label class="col-md-3 text-md-right font-weight-bold">Mime-type:</label>
            <label class="col-md-3 text-md-left">{{$video->mime_type}}</label>
        </div>

    </div>
</div>
<div class="row justify-content-center">
    {!! $video->name !!}
</div>


@endsection
