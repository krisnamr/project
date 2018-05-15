<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login_user.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="loginBox">
        <div class="glass">
            <img src="{{asset('assets/image/logo2.png')}}" class="image user">
            <h3>Login Here</h3>
            <form>
                <div class="inputBox">
                    <input type="text" name="" placeholder="Username">
                    <span>
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="inputBox">
                    <input type="password" name="" placeholder="Password">
                    <span>
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <input type="submit" name="" value="Login">
            </form>
            <a href="#">Forgot Password</a>
        </div>
    </div>
</body>

</html>