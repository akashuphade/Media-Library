@extends('layouts.app')

@section('content')

<div>
    <div>
        <a href="/documents" class="btn btn-primary mb-2">Go back</a>
    </div>
    <iframe style="width: 100%; height:450px" src="/storage/{{Auth::user()->id}}/documents/{{$document->name}}" frameborder="0"></iframe>
</div>
@endsection
