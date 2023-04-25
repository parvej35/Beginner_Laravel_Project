@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>App User List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="fa fa-home btn btn-info" href="/"> Home</a>
                    <a class="fa fa-plus btn btn-success" href="{{ route('shortenedurl.create') }}"> Add URL</a>
                    <a class="fa fa-link btn btn-success" href="{{ route('url-list') }}"> URL List</a>
                    <a class="fa fa-user btn btn-primary" href="{{ route('user-list') }}"> User List</a>
                    <a class="fa fa-sign-out btn btn-danger" href="{{ route('logout') }}"> Logout</a>
                </div>
            </div>
        </div>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registered On</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td scope="row">{{ $user->name }}</td>
                    <td scope="row">{{ $user->email }}</td>
                    <td scope="row">{{ $user->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
        {!! $users->links() !!}
        </div>
    </div>
@endsection
