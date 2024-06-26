<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Foreign Nurse</title>
    <link rel="shortcut icon" href="./assets/fav.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<?= isset($_SESSION[APP]->flashMessage)?Helpers::flashMessage($_SESSION[APP]->flashMessage):"";?>
    <div class="container">
        <img src="./assets/doctr.jpg" alt="">
        <form action="<?=URLROOT;?>/forgot/reset">
            <img src="./assets/logo.svg" alt="">
            <h2>Student Portal</h2>
            <div class="input">
                <input type="email" name="email" placeholder="Enter your email address">
            </div>
            <div class="input">
                <input type="submit" value="Reset Password">
            </div>
            <p><a href="<?= URLROOT; ?>/login">Already Signed Up? </a></p>
            <p><a href="<?= URLROOT; ?>/signup">Create an Account</a></p>
        </form>
    </div>
</body>
</html>