<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || Foreign Nurse</title>
    <script src="<?= URLROOT; ?>/js/jquery-3.7.1.min.js"></script>
    <script src="<?= URLROOT; ?>/js/dataTables.js"></script>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/dataTables.css" />
    <link rel="shortcut icon" href="<?= URLROOT; ?>/assets/fav.svg" type="image/x-icon" />
    <?= $styles; ?>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/google/material-icons.css">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/google/symbols-outlined.css">

</head>

<body>
    <input type="hidden" name="baseurl" value="<?= URLROOT; ?>">
    <?= isset($_SESSION[APP]->flashMessage) ? Helpers::flashMessage($_SESSION[APP]->flashMessage) : ""; ?>
    <header class="wrapper">
        <a href="<?= URLROOT; ?>/student" class="logo">
            <img src="<?= URLROOT; ?>/assets/logo.svg" alt="">
            <!-- <span>NCLEX (June/July)</span> -->
        </a>
        <div class="dropdown">
            <label for="u">
                <?= $_SESSION[APP]->fullname; ?>
                <span class="material-symbols-outlined">account_circle</span>
            </label>
            <input type="checkbox" name="u" id="u">
            <div class="items">
                <a href="<?= URLROOT; ?>/student/">
                    <span class="material-symbols-outlined">grid_view</span>
                    Dashboard
                </a>
                <a href="<?= URLROOT; ?>/student/profile">
                    <span class="material-symbols-outlined">account_circle</span>
                    Profile
                </a>
                <a href="<?= URLROOT; ?>/logout">
                    <span class="material-symbols-outlined">logout</span>

                    logout
                </a>
            </div>
        </div>
    </header>