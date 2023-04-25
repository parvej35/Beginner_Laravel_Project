@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>URL List</h2>
                </div>
                @include('layouts.menu')
            </div>
        </div>
        <hr>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Original URL</th>
                    <th scope="col">Tiny URL</th>
                    <th scope="col" width="220px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shortenedUrl as $url)
                <tr>
                    <td scope="row">{{ $url->id }}</td>
                    <td><a href="{{ $url->short_url }}" target="_blank">{{ $url->original_url }}</a></td>
                    <td><a href="{{ $url->short_url }}" target="_blank">{{ $url->short_url }}</a></td>
                    {{--<td>
                        <form action="{{ route('shortenedurl.destroy',$url->id) }}" method="POST">
                            <a class="fa fa-edit btn btn-info" href="{{ route('shortenedurl.edit',$url->id) }}"> Edit </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fa fa-remove btn btn-danger"> Delete</button>
                        </form>
                    </td>--}}

                    <td>
                        <a class="fa fa-edit btn btn-info" href="{{ route('shortenedurl.edit',$url->id) }}"> Edit </a>
                        <a class="fa fa-remove btn btn-danger" href="{{ route('shortenedurl.index') }}"
                           onclick="if (!confirm('Are you sure to delete this record?')){return false;}else{event.preventDefault();
                               document.getElementById('delete-form-{{$url->id}}').submit();}"> Delete
                        </a>
                        <form id="delete-form-{{$url->id}}" action="{{route('shortenedurl.destroy', $url->id)}}" method="post">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
        {!! $shortenedUrl->links() !!}
        </div>
    </div>
@endsection
