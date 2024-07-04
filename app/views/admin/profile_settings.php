<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css">
';
require_once APPROOT . "/views/admin/inc/header.php";
?>

<main>
  <section class="container wrapper">
    <label for="content4" class="head">
      My Profile
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content">
      <form action="<?= URLROOT; ?>/admin/profile" method="post" style="padding: 1rem 2rem">
        <div class="input-group">
          <div class="input">
            <label for="">Full Name</label>
            <input type="text" value="<?= $fullname; ?>" name="fullname" placeholder="John Doe" />
          </div>
          <div class="input">
            <label for="">Email</label>
            <input type="text" value="<?= $email; ?>" placeholder="johndoe@example.com" readonly />
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">Whatsapp</label>
            <input type="text" value="<?= $whatsapp; ?>" name="whatsapp" placeholder="+234893274823" />
          </div>
          <div class="input">
            <label for="">Gender</label>
            <select name="gender" id="">
              <option selected disabled>Select your gender</option>
              <option <?= $gender == "female" ? "selected" : ""; ?> value="female">Female</option>
              <option <?= $gender == "male" ? "selected" : ""; ?> value="male">Male</option>
              <option <?= $gender == "other" ? "selected" : ""; ?> value="other">other</option>
              <option <?= $gender == "none" ? "selected" : ""; ?> value="none">Prefer not to say</option>
            </select>
          </div>
        </div>
        <div class="btn-group">
        <input type="submit" onclick="this.value='loading...'" name="q" style="width: fit-content;" class="btn green" value="Update">
        </div>
      </form>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content5" class="head">
      Change Password
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content5" checked />
    <div class="content">
      <form action="<?=URLROOT;?>/admin/profile" method="post" style="padding: 1rem 2rem; width:100%;">
        <div class="input-group">
          <div class="input">
            <label for="">Current Password</label>
            <input type="password" name="current" required placeholder="********" />
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">New Password</label>
            <input type="password" name="new" required placeholder="********" />
          </div>
          <div class="input">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm" required placeholder="********" />
          </div>
        </div>
        <div class="btn-group">
          <input type="submit" onclick="this.value='loading...'" name="q1" value="Update" class="btn green" style="width: fit-content;">
        </div>
      </form>
    </div>
  </section>
</main>
</body>

</html>