<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Facebook | Ecommerce Website</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
<div class="bg-img">
    <div class="content">
        <header>Login Form</header>
        <form action="/login" method="post">
            @csrf
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" name="email" placeholder="Enter email" value="{{ old('email') }}">
            </div>
            <p style="color: red;">@error('email'){{$message}}@enderror</p>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input type="password" id="" name="password" placeholder="Enter password">
            </div>
            <p style="color: red;">@error('password'){{$message}}@enderror</p>
            <div class="pass">
                <a href="">Forgot password</a>
            </div>
            <div class="field space">
                <input type="submit" value="Singin">
            </div>
            <div class="singup">Don't have account?
                <a href="/register">Register Now</a>
            </div>

            <a href="/login/facebook" class="my-btn">Facebook</a>

        </form>
    </div>
</div>
</body>
</html>
