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
<?= isset($_SESSION[APP]->flashMessage)?Helpers::flashMessage($_SESSION[APP]->flashMessage):"";?>
    <div class="container">
        <img src="<?= URLROOT; ?>/assets/doctr.jpg" alt="">
        <form action="<?= URLROOT; ?>/login/validate" method="post">
            <img src="<?= URLROOT; ?>/assets/logo.svg" alt="">
            <h2>Student Portal</h2>
            <div class="input">
                <input type="email" required name="email" placeholder="Enter your email address">
            </div>
            <div class="input">
                <input type="password" required name="password" placeholder="Enter your password">
            </div>
            <div class="input">
                <input type="checkbox" id="rem">
                <label for="rem">Remember Me</label>
            </div>
            <div class="input">
                <input type="submit" value="Login">
            </div>
            <p><a href="<?= URLROOT; ?>/forgot">Forgot Password?</a></p>
            <p><a href="<?= URLROOT; ?>/signup">Create an Account</a></p>
        </form>
    </div>
</body>

</html>