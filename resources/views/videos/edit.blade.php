@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-8">
            <div class="card-header">
                <a href="/media/videos" class="btn btn-primary float-left">Back</a>
                <h3>Update Video</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="/media/video/{{$video->id}}">
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                        <label for="description" class="col-form-label col-md-4 text-md-right">Description</label>
                        <div class="col-md-6">
                            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description') ? old('description') : $video->description}}">

                            @error('description')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
