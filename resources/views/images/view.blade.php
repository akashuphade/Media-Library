@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/images/create" class="btn btn-primary float-left w-25">Add Image</a>
                    <h2 class="text-info float-center">Images</h2>
                </div>

                <div class="card-body">

                    @if(count($images) > 0)

                        @foreach ($images as $image)

                            <div class="card mr-3 mb-2 card-align">

                                <div class="card-header">
                                    <a href="/images/{{$image->id}}/edit" class="btn btn-sm btn-primary float-left">Edit</a>
                                    <a href="/images/{{$image->id}}" class="btn btn-sm btn-primary float-left ml-2">View</a>
                                    <form method="POST" action="/images/{{$image->id}}" >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger float-right">Delete</button>
                                    </form>
                                </div>

                                <img src="/storage/{{Auth::user()->id}}/images/{{$image->name}}" alt="{{$image->name}}" height="150px" width="300px">

                                <div class="card-footer">
                                    <label class="text-success">Description:</label>
                                    <span> <a href="/images/{{$image->id}}">{{$image->description}}</a>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class="card w-100">
                            <div class="card-header">
                                No Images
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-footer row justify-content-center">
                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
