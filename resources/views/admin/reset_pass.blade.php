@extends('base.site_index')

@section('content')
    <div class="auth-box container col-md-3">
        <div style="padding: 5px;">
            <h3 class="put-black text-center"><a href="/" class="h3">AISCA</a></h3>

        <h5 class="text-center">Reset your password</h5>

        @if ($message = Session::get('error'))
            <p class="alert alert-danger">{{ $message }}</p>
        @endif
        <form action="{{ route('user.reset_pass') }}" method="post">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email" />
                @if ($errors->has('email'))
                    <div class="text-danger form-text">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" />
                @if ($errors->has('password'))
                    <div class="text-danger form-text">{{ $errors->first('password') }}</div>
                @endif
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirm" class="form-control" placeholder="Password Confirm" />
                @if ($errors->has('password_confirm'))
                    <div class="text-danger form-text">{{ $errors->first('password_confirm') }}</div>
                @endif
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="col-xs-12 mt-2" style="margin-bottom: 10px;">
                <button type="submit" class="btn black put-gold btn-block btn-flat form-control">Reset My Password</button>
            </div>
        </form>

        </div>
    </div>
@endsection
