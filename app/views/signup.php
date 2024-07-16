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
    <?= isset($_SESSION[APP]->flashMessage) ? Helpers::flashMessage($_SESSION[APP]->flashMessage) : ""; ?>
    <div class="container">
        <img src="<?= URLROOT; ?>/assets/doctr.jpg" alt="">
        <form action="<?= URLROOT; ?>/signup/register" method="post">
            <a href="<?= URLROOT; ?>">
                <img src="<?= URLROOT; ?>/assets/logo.svg" alt="">
            </a>
            <h2>Registration Portal</h2>
            <div class="input">
                <input type="text" required name="fullname" placeholder="Full Name">
            </div>
            <div class="input">
                <input type="email" required name="email" placeholder="Enter your email address">
            </div>
            <div class="input">
                <input type="number" required name="whatsapp" placeholder="Enter your whatsapp number">
            </div>
            <div class="input">
                <input type="password" required name="password" placeholder="Enter your password">
            </div>
            <div class="input">
                <input type="submit" onclick="this.value='loading...'" value="REGISTER">
            </div>
            <p><a href="<?= URLROOT; ?>/forgot">Forgot Password?</a></p>
            <p><a href="<?= URLROOT; ?>/login">Already Signed Up? </a></p>
        </form>
    </div>
</body>

</html>