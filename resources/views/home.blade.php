@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong class="text-info">Media Library</strong></div>

                <div class="row card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card col-md-3 m-auto">
                        <div class="card-body">
                            <a href="/images">Images</a>
                        </div>
                    </div>

                    <div class="card col-md-3 m-auto">
                        <div class="card-body">
                            <a href="">Documents</a>
                        </div>
                    </div>

                    <div class="card col-md-3 m-auto">
                        <div class="card-body">
                            <a href="">videos</a>
                        </div>
                    </div>

                    <div class="card col-md-3 m-auto">
                        <div class="card-body">
                            <a href="">Audios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
