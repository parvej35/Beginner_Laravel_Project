@extends('layouts.auth')


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif
    }

    body {
        height: 100vh;
        background: linear-gradient(to top, #c9c9ff 50%, #9090fa 90%) no-repeat
    }

    .container {
        margin: 50px auto
    }

    .panel-heading {
        text-align: center;
        margin-bottom: 10px
    }

    #forgot {
        min-width: 100px;
        margin-left: auto;
        text-decoration: none
    }

    a:hover {
        text-decoration: none
    }

    .form-inline label {
        padding-left: 10px;
        margin: 0;
        cursor: pointer
    }

    .btn.btn-primary {
        margin-top: 20px;
        border-radius: 15px
    }

    .panel {
        min-height: 380px;
        box-shadow: 20px 20px 80px rgb(218, 218, 218);
        border-radius: 12px
    }

    .input-field {
        border-radius: 5px;
        padding: 5px;
        display: flex;
        align-items: center;
        cursor: pointer;
        border: 1px solid #ddd;
        color: #4343ff
    }

    input[type='text'],
    input[type='password'] {
        border: none;
        outline: none;
        box-shadow: none;
        width: 100%
    }

    a[target='_blank'] {
        position: relative;
        transition: all 0.1s ease-in-out
    }


</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-3 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Login</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" id="email_address" name="email" placeholder="Email" value="user1@mail.com" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" id="password" name="password" placeholder="Enter your Password" value="123456" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-inline"> <input type="checkbox" name="remember" id="remember">
                                <label for="remember" class="text-muted">Remember me</label>
                                <a href="#" id="forgot" class="font-weight-bold">Forgot password?</a>
                            </div>
                            @if ($errors->has('error'))
                                <br><span class="text-danger">{{ $errors->first('error') }}</span>
                            @endif
                            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                            <div class="text-center pt-4 text-muted">Don't have an account? <a href="{{ route('register') }}">Sign up</a> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
