<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="login">
    <div class="container">
        <div class="container-left">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="login-control google-img">
                    <button class="input "><img src="../picture/google.png">Login in with Google</button>
                </div>
                <div> <small>Or</small></div>
                <div class="login-control">
                    <label for="">Email</label>
                    <input class="input" type="text" name="email" id="" placeholder="Enter your Email">
                </div>
                <div class="login-control">
                    <label for="">PassWord</label>
                    <input class="input" type="text" name="password" id="" placeholder="Password">
                </div>


                <div class="login-control">
                    <input id="checkbox" type="checkbox" name="" id="">
                    <label for="">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <div><input class="input input-submit" type="submit" value="Login"></div>
                <div class="login-control">
                    <label>Don't have an account? </label>
                    <a href="#">Sign up</a>
                </div>

        </div>
        <div class="container-right">
            <div class="container-right-1">
                <div class="container-right-1l"><i class="fas fa-gift"></i></div>
                <div class="container-right-1r">
                    <h3>Development</h3>
                    <p>A modern and clean design system for developing fast and powerful web interfaces.</p>
                </div>
            </div>
            <div class="container-right-1">
                <div  class="container-right-1l"><i class="fas fa-gift"></i></div>
                <div  class="container-right-1r">
                    <h3>Features</h3>
                    <p>A modern and clean design system for developing fast and powerful web interfaces.</p>
                </div>
            </div>
            <div class="container-right-1">
                <div  class="container-right-1l"><i class="fas fa-gift"></i></div>
                <div  class="container-right-1r">
                    <h3>Updates</h3>
                    <p>A modern and clean design system for developing fast and powerful web interfaces.</p>
                </div>
            </div>
        </div>
    </div>

    </form>
    <script src="https://kit.fontawesome.com/607b7b9d04.js" crossorigin="anonymous"></script>

</body>

</html>