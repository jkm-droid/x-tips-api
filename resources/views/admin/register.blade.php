@extends('base.site_index')

@section('content')
    <div class="auth-box container col-md-3">
        <div class="">

            <h3 class="put-black text-center"><a href="/" class="h3">Tips Api Portal</a></h3>

            <h5 class="login-box-msg text-center">Sign up to start your session</h5>
            @if ($message = Session::get('error'))
                <p class="alert alert-danger">
                    @foreach($message as $msg)
                        {{ $msg[0] }}<br>
                    @endforeach
                </p>
            @endif
            <form action="{{ route('admin.register') }}" method="post">
                @csrf

                <div class="mb-3">
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
                    @if ($errors->has('username'))
                        <div class="text-danger form-text"><small>{{ $errors->first('username') }}</small></div>
                    @endif
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    @if ($errors->has('email'))
                        <div class="text-danger form-text"><small>{{ $errors->first('email') }}</small></div>
                    @endif
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <div class="text-danger form-text"><small>{{ $errors->first('password') }}</small></div>
                    @endif
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password">
                    @if ($errors->has('password_confirm'))
                        <div class="text-danger form-text"><small>{{ $errors->first('password_confirm') }}</small></div>
                    @endif
                </div>

                <!-- /.col -->

                <div class="mt-3 text-center col-md-12">
                    <button type="submit" class="btn btn-secondary form-control black text-uppercase">Register</button>
                </div>
            </form>

            <div class="text-center"  style="margin-top: 30px;margin-bottom: 30px;">
                <a href="{{ route('admin.show.login') }}" >I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->

    </div>
@endsection
