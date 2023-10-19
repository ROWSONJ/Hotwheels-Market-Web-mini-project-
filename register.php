<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container">
    <div class="forms">
        <div class="form signup">
            <span class="title">Registration</span>
            <form action="register">
                <div class="input-field">
                    <input type="text" placeholder="Enter your name" required>
                    <i class="uil uil-user"></i>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Enter your email" required>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="password" placeholder="Create a password" required>
                    <i class="uil uil-lock icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="password" placeholder="Confirm a password" required>
                    <i class="uil uil-lock icon"></i>
                </div>
                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="sigCheck">
                        <label for="sigCheck" class="text">Remember me</label>
                    </div>
                </div>
                <div class="input-field button">
                    <input type="button" value="Login Now">
                </div>
            </form>
            <div class="login-signup">
            <span class="text">Not a member?<a href="#" class="text login-link">Signup now</a></span>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>