<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login_admin.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="loginBox">
        <div class="glass">
            <img src="{{asset('assets/image/logo2.png')}}" class="image user">
            <h3>Login Here</h3>

            <form method="POST" action="{{ route('admin.login.submit') }}">
                {{ csrf_field() }}

                <div class="inputBox">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" id="email" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required autofocus>
                        
                        <span>
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>


                <div class="inputBox">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" id="password" name="password" placeholder="Password" required> 
                    <span>
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                </div>

                <input type="submit" name="button" value="Login" class="form-control">

                {{-- Validation email and password --}}
                @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                <a href="#">Forgot Password</a>
            </form>
</body>

</html>