@extends('base.site_index')

@section('content')
    <div class="auth-box container col-md-3">
        <div class="text-center" style="padding: 5px;">
            <h3 class="put-black"><a href="/">AISCA</a></h3>

            @if ($message = Session::get('success'))
                <p class="alert alert-success">{{ $message }}</p>
            @endif
            @if ($message = Session::get('error'))
                <p class="alert alert-danger">{{ $message }}</p>
            @endif
            <p class="login-box-msg">Enter email to start password reset</p>

            <form action="{{ route('user.forgot_submit') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Enter your email">
                    @if ($errors->has('email'))
                        <div class="text-danger form-text">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="col-xs-12 mt-2" style="margin-bottom: 10px;">
                    <button type="submit" class="btn put-gold black btn-block form-control text-uppercase">Request Password Reset</button>
                </div>
            </form>

        </div>
    </div>

@endsection
