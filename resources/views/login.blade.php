<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Test</title>
</head>
<body>
    <div class="login">
        <form action="{{route('login-account')}}" method="post">
        @csrf
            <input type="text" placeholder="Email" name="email"> <br>
            <input type="password" placeholder="Password" name="password"> <br>
            <input type="submit" value="Log In">
        </form>
        
        <a href="{{route('facebook-login')}}">
            Login with Facebook
         </a>
         <br>
         <a href="{{route('google-login')}}">
            Login with Google
         </a>
         <br>
        Dont have an account? <a href="{{route('register-page')}}">Register</a>
    </div>
</body>
</html> 