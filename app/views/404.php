<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found</title>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/main.css">
    <style>
        body {
            background-color: var(--blue);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: 100vw;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
    </style>
</head>

<body>
    <?= isset($_SESSION[APP]->flashMessage) ? Helpers::flashMessage($_SESSION[APP]->flashMessage) : ""; ?>
    <h1>404!</h1>
    <p>Page not found</p>
</body>

</html>