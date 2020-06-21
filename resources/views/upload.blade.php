@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-10">

            <div class="card-header">
                <a href="/home" class="btn btn-primary btn-sm float-left">Back</a>
                <h3>Upload Media</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="/media/upload" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="description" class="col-form-label col-md-4 text-md-right">Description</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter description" value="{{old('description')}}">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{$message}} </strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="media" class="col-form-label col-md-4 text-md-right">Upload Media</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control @error('media') is-invalid @enderror" name="media" id="media" aria-describedby="mediaHelp">
                            <small id="mediaHelp" class="form-text text-muted">file types supported: JPEG, JPG, PNG, PDF, MP3, MP4</small>

                            @error('media')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
