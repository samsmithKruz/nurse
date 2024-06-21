<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Foreign Nurse</title>
    <link rel="shortcut icon" href="<?= URLROOT; ?>/assets/fav.svg" type="image/x-icon" />
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/login.css">
</head>
<body>
    <div class="container">
        <img src="<?= URLROOT; ?>/assets/doctr.jpg" alt="">
        <form action="#">
            <img src="<?= URLROOT; ?>/assets/logo.svg" alt="">
            <h2>Registration Portal</h2>
            <div class="input">
                <input type="text" placeholder="Full Name">
            </div>
            <div class="input">
                <input type="email" placeholder="Enter your email address">
            </div>
            <div class="input">
                <input type="number" placeholder="Enter your whatsapp number">
            </div>
            <div class="input">
                <input type="password" placeholder="Enter your password">
            </div>
            <div class="input">
                <input type="submit" value="REGISTER">
            </div>
            <p><a href="<?= URLROOT; ?>/forgot">Forgot Password?</a></p>
            <p><a href="<?= URLROOT; ?>/login">Already Signed Up? </a></p>
        </form>
    </div>
</body>
</html>