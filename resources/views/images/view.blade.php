@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/images/create" class="btn btn-primary float-left">Add Images</a>
                    <h2>Images</h2>
                </div>

                <div class="card-body">

                    @if(count($images) > 0)

                        @foreach ($images as $image)

                            <div class="card">

                                <img src="" alt="" height="150px" width="300px">
                                <div class="card-footer">
                                    <label>Name:</label>
                                    <span> {{$image->name}}
                                    <label>Size:</label>
                                    <span> {{$image->size}}
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class="card">
                            <div class="card-header">
                                No Images
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
