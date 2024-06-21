<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard || Foreign Nurse</title>
    <link rel="shortcut icon" href="<?=URLROOT;?>/assets/fav.svg" type="image/x-icon" />
    <?= $styles;?>
    <link rel="stylesheet" href="<?=URLROOT;?>/css/google/material-icons.css" />
    <link rel="stylesheet" href="<?=URLROOT;?>/css/google/symbols-outlined.css" />
  </head>
  <body>
    <header class="wrapper">
      <a href="<?=URLROOT;?>/admin" class="logo">
        <img src="<?=URLROOT;?>/assets/logo.svg" alt="" />
        <span>NCLEX (June/July)</span>
      </a>
      <div class="dropdown">
        <label for="u">
          John Doe
          <img src="<?=URLROOT;?>/assets/user.svg" alt="" />
        </label>
        <input type="checkbox" name="u" id="u" />
        <div class="items">
          <a href="<?=URLROOT;?>/admin/profile" class="active">
            <span class="material-symbols-outlined">circle</span>
            Profile
          </a>
          <a href="<?=URLROOT;?>/admin/upload">File Upload</a>
          <a href="<?=URLROOT;?>/admin/test_maker">Test maker</a>
          <a href="<?=URLROOT;?>/logout">logout</a>
        </div>
      </div>
    </header>