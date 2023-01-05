@extends('base.site_index')

@section('content')

    <div class="auth-box col-md-3 container-fluid">
        <!-- /.login-logo -->
        <div class="">

            <h3 class="put-black text-center"><a href="/" class="h3">Tips Api Portal</a></h3>

            @if ($message = Session::get('success'))
                <p class="alert alert-success">{{ $message }}</p>
            @endif
            @if ($message = Session::get('error'))
                <p class="alert alert-danger">{{ $message }}</p>
            @endif
            <h5 class="login-box-msg text-center">Sign in to start your session</h5>

            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Email Address/Username">
                    @if ($errors->has('username'))
                        <div class="text-danger form-text"><small>{{ $errors->first('username') }}</small></div>
                    @endif
                </div>
                <div class=" mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <div class="text-danger form-text"><small>{{ $errors->first('password') }}</small></div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember_me" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="">
                        <button type="submit" class="mt-2 mb-2 btn btn-secondary form-control text-uppercase">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="text-center" style="margin-bottom: 30px;">
                <a href="{{ route('admin.show.register') }}" class="text-center">I don't have a membership</a><br><br>
{{--                <a href="{{ route('admin.show.forgot_pass_form') }}" class="text-center">Forgot password?</a>--}}
            </div>

        </div>
        <!-- /.card -->
    </div>
@endsection
