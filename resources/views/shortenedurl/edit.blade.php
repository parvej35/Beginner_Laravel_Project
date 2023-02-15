@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit URL</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="fa fa-home btn btn-info" href="/"> Home</a>
                    <a class="fa fa-plus btn btn-success" href="{{ route('shortenedurl.create') }}"> Add URL</a>
                    <a class="fa fa-link btn btn-success" href="{{ route('url-list') }}"> URL List</a>
                    <a class="fa fa-user btn btn-primary" href="{{ route('user-list') }}"> User List</a>
                    <a class="fa fa-sign-out btn btn-warning" href="{{ route('logout') }}"> Logout</a>
                </div>
            </div>
        </div>
        <hr>
        <form action="{{ route('shortenedurl.update',$shortenedurl->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Original URL:</strong>
                        <input type="hidden" name="id" value="{{ $shortenedurl->id }}">
                        <input type="text" name="original_url" value="{{ $shortenedurl->original_url }}" class="form-control"
                               placeholder="Original URL">
                        @error('original_url')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3"> Submit </button> &nbsp;
                <a class="btn btn-danger" href="{{ route('shortenedurl.index') }}"> Cancel </a>
            </div>
        </form>
    </div>
@endsection
