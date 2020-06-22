@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-10">

            <div class="card-header">
                <a href="/home" class="btn btn-primary btn-sm float-left">Back</a>
                <h3>Embed Media</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="/media/embed">
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
                        <label for="link" class="col-form-label col-md-4 text-md-right">Embed Link</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="Enter link" aria-describedby="mediaHelp">
                            <small id="mediaHelp" class="form-text text-muted">Links from youtube and vimeo are supported only</small>

                            @error('link')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Embed</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
