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
        <form action="<?= URLROOT; ?>/forgot/reset_new" method="post">
            <img src="<?= URLROOT; ?>/assets/logo.svg" alt="">
            <h2>Reset Password</h2>
            <div class="input">
              <input type="hidden" name="token" value="<?=$token;?>">
                <input type="password" required name="new" placeholder="Enter your a new password">
            </div>
            <div class="input">
                <input type="password" required name="confirm" placeholder="Confirm your password">
            </div>
            <div class="input">
                <input type="submit" onclick="this.value='loading...'" value="Reset Password">
            </div>
        </form>
    </div>
</body>
</html>