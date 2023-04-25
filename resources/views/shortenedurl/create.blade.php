@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add URL</h2>
                </div>
                @include('layouts.menu')
            </div>
        </div>
        <hr>
        <form action="{{ route('shortenedurl.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="original_url" class="form-control" placeholder="Original URL">
                        @error('original_url')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3"> Save </button> &nbsp;
                <a class="btn btn-danger" href="{{ route('shortenedurl.index') }}"> Cancel </a>
            </div>
        </form>
    </div>
@endsection
