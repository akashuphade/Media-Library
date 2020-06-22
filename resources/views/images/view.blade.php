@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(!Request::is('media/favourites/image'))
                        <a href="/home" class="btn btn-primary float-left">Back</a>
                    @endif
                    <h2 class="text-info float-center">Images</h2>
                </div>

                <div class="card-body">

                    @if(count($images) > 0)

                        @foreach ($images as $image)

                            <div class="card mr-3 mb-2 card-align">

                                <div class="card-header">
                                    <a href="/media/image/{{$image->id}}/edit" class="btn btn-sm btn-primary float-left">Edit</a>
                                    <a href="/media/image/{{$image->id}}" class="btn btn-sm btn-primary float-left ml-2">View</a>
                                    <a href="/media/download/{{$image->id}}" class="btn btn-sm btn-primary float-left ml-2">Download</a>
                                    <form method="POST" action="/media/image/{{$image->id}}" >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger float-right">Delete</button>
                                    </form>
                                </div>

                                <img src="/storage/{{Auth::user()->id}}/Images/{{$image->name}}" alt="{{$image->name}}" height="150px" width="330px">

                                <div class="card-footer">
                                    <form method="POST" action="/media/favourite/{{$image->id}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm float-right"> {{$image->favourite == 0 ? "Add to favourite" : "Remove from favourite" }} </button>
                                    </form>
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
                @if(count($images) === 6)
                <div class="card-footer row justify-content-center">
                    {{ $images->links() }}
                </div>
                @endif

            </div>
        </div>
    </div>
@endsection
