@extends('layouts.app')
{{--@include('layouts.app')--}}
<style>

    .circle-tile {
        margin-bottom: 15px;
        text-align: center;
    }
    .circle-tile-heading {
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 100%;
        color: #FFFFFF;
        height: 80px;
        margin: 0 auto -40px;
        position: relative;
        transition: all 0.3s ease-in-out 0s;
        width: 80px;
    }
    .circle-tile-heading .fa {
        line-height: 80px;
    }
    .circle-tile-content {
        padding-top: 50px;
    }
    .circle-tile-number {
        font-size: 26px;
        font-weight: 700;
        line-height: 1;
        padding: 5px 0 15px;
    }
    .circle-tile-description {
        text-transform: uppercase;
    }
    .circle-tile-footer {
        background-color: rgba(0, 0, 0, 0.1);
        color: rgba(255, 255, 255, 0.5);
        display: block;
        padding: 5px;
        transition: all 0.3s ease-in-out 0s;
    }
    .circle-tile-footer:hover {
        background-color: rgba(0, 0, 0, 0.2);
        color: rgba(255, 255, 255, 0.5);
        text-decoration: none;
    }
    .circle-tile-heading.dark-blue:hover {
        background-color: #2E4154;
    }
    .circle-tile-heading.green:hover {
        background-color: #138F77;
    }
    .circle-tile-heading.orange:hover {
        background-color: #DA8C10;
    }
    .circle-tile-heading.blue:hover {
        background-color: #2473A6;
    }
    .circle-tile-heading.red:hover {
        background-color: #CF4435;
    }
    .circle-tile-heading.purple:hover {
        background-color: #7F3D9B;
    }

    .dark-blue {
        background-color: #34495E;
    }
    .orange {
        background-color: #DA8C10;
    }
    .green {
        background-color: #16A085;
    }
    .red {
        background-color: #E74C3C;
    }
    .text-faded {
        color: rgba(255, 255, 255, 0.7);
    }

</style>

@section('content')
    <div class="container mt-5 bootstrap snippet">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel Assessment</h2>
                </div>
                {{--<div class="pull-right mb-2">
                    <a class="fa fa-plus btn btn-success" href="{{ route('shortenedurl.create') }}"> Add URL</a>
                    <a class="fa fa-link btn btn-secondary" href="{{ route('url-list') }}"> URL List</a>
                    <a class="fa fa-user btn btn-primary" href="{{ route('user-list') }}"> User List</a>
                    <a class="fa fa-sign-out btn btn-danger" href="{{ route('logout') }}"> Logout</a>
                </div>--}}
                @include('layouts.menu')
            </div>
        </div>
        <hr>
        <div class="row justify-content-center" >
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile ">
                    <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
                    <div class="circle-tile-content dark-blue">
                        <div class="circle-tile-description text-faded"> Users</div>
                        <div class="circle-tile-number text-faded ">{{ $total_users }}</div>
                        <a class="circle-tile-footer" href="{{ route('user-list') }}">User List <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="#"><div class="circle-tile-heading red"><i class="fa fa-link fa-fw fa-3x"></i></div></a>
                    <div class="circle-tile-content orange">
                        <div class="circle-tile-description text-faded"> URL </div>
                        <div class="circle-tile-number text-faded ">{{ $total_urls }}</div>
                        <a class="circle-tile-footer" href="{{ route('url-list') }}">URL List <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
