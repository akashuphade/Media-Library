@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 class="text-info">Upload Image</h2></div>
                <div class="card-body">
                    <form method="post" action="/images" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" placeholder="Enter name">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Select Image</label>
                            <div class="col-md-6">
                                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" aria-describedby="fileHelp">
                                <small id="fileHelp" class="float-left form-text text-muted">Only Jpeg, PNG, jpg files types are supported.</small>
                                <br>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row offset-y-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary float-left w-50">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
