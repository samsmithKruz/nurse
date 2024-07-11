<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin || Foreign Nurse</title>

<!-- Meta Description -->
<meta name="description" content="Foreign Nurse Global (FNG) supports internationally trained nurses to achieve their dream of becoming US Registered Nurses. Explore our services and start your journey today!">

<!-- Meta Keywords -->
<meta name="keywords" content="Foreign Nurse Global, FNG, international nurses, USRN, NCLEX preparation, nursing credentialing, nursing licensure, healthcare careers, visa support for nurses">

<!-- Author -->
<meta name="author" content="Foreign Nurse Global">

<!-- Viewport for Responsive Design -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Open Graph Tags for Social Media Sharing -->
<meta property="og:title" content="Foreign Nurse Global | Helping International Nurses Achieve USRN Dreams">
<meta property="og:description" content="Foreign Nurse Global (FNG) supports internationally trained nurses to achieve their dream of becoming US Registered Nurses. Explore our services and start your journey today!">
<meta property="og:image" content="<?=URLROOT;?>/assets/fav.svg">
<meta property="og:url" content="https://www.foreignnurseglobal.com">
<meta property="og:type" content="website">

<!-- Twitter Card Tags for Twitter Sharing -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Foreign Nurse Global | Helping International Nurses Achieve USRN Dreams">
<meta name="twitter:description" content="Foreign Nurse Global (FNG) supports internationally trained nurses to achieve their dream of becoming US Registered Nurses. Explore our services and start your journey today!">
<meta name="twitter:image" content="<?=URLROOT;?>/assets/fav.svg">
  
  
  <link rel="shortcut icon" href="<?= URLROOT; ?>/assets/fav.svg" type="image/x-icon" />
  <script src="<?= URLROOT; ?>/js/jquery-3.7.1.min.js"></script>
  <script src="<?= URLROOT; ?>/js/dataTables.js"></script>
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/dataTables.css" />
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/google/material-icons.css" />
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/google/symbols-outlined.css" />
  <?= $styles; ?>
</head>

<body>
  <input type="hidden" name="baseurl" value="<?= URLROOT; ?>">
  <?= isset($_SESSION[APP]->flashMessage) ? Helpers::flashMessage($_SESSION[APP]->flashMessage) : ""; ?>
  <header class="wrapper">
    <a href="<?= URLROOT; ?>/admin" class="logo">
      <img src="<?= URLROOT; ?>/assets/logo.svg" alt="" />
      <!-- <span>NCLEX (June/July)</span> -->
    </a>
    <div class="dropdown">
      <label for="u">
        <?= $_SESSION[APP]->fullname; ?>
        <span class="material-symbols-outlined">account_circle</span>
      </label>
      <input type="checkbox" name="u" id="u" />
      <div class="items">
        <a href="<?= URLROOT; ?>/admin/profile">
          <span class="material-symbols-outlined">account_circle</span>
          Profile
        </a>
        <a href="<?= URLROOT; ?>/admin/upload">
          <span class="material-symbols-outlined">backup</span>
          File Upload</a>
        <a href="<?= URLROOT; ?>/admin/test_maker">
          <span class="material-symbols-outlined">edit_calendar</span>

          Test maker</a>
        <a href="<?= URLROOT; ?>/logout">
          <span class="material-symbols-outlined">logout</span>

          logout
        </a>
      </div>
    </div>
  </header>