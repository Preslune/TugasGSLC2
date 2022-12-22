<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Test</title>
</head>
<body>
    <div class="register">
        <form action="{{route('register-account')}}" method="post">
        @csrf
            <input type="text" placeholder="Name" name="name"> <br>
            <input type="text" placeholder="Email" name="email"> <br>
            <input type="password" placeholder="Password" name="password"> <br>
            <input type="password" placeholder="Confirm Password" name="confirm_password"> <br>
            <input type="submit">
        </form>
        Already have an account? <a href="{{route('login-page')}}">Login</a>
    </div>
</body>
</html>