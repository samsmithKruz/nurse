<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found</title>
</head>
<body>
    <?= isset($_SESSION[APP]->flashMessage)?Helpers::flashMessage($_SESSION[APP]->flashMessage):"";?>
    <h1>404!</h1>
    <p>Page not found</p>
</body>
</html>