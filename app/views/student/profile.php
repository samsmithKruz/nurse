<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css">
';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
  <section class="container wrapper">
    <label for="content4" class="head">
      My Profile
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content">
      <div style="padding: 1rem 2rem">
        <div class="input-group">
          <div class="input">
            <label for="">Full Name</label>
            <input type="text" placeholder="John Doe" />
          </div>
          <div class="input">
            <label for="">Email</label>
            <input type="text" placeholder="johndoe@example.com" readonly />
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">Whatsapp</label>
            <input type="text" placeholder="+234893274823" />
          </div>
          <div class="input">
            <label for="">Class</label>
            <input type="text" placeholder="Class A" readonly />
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">Gender</label>
            <select name="" id="">
              <option selected disabled>Select your gender</option>
              <option value="female">Female</option>
              <option value="male">Male</option>
              <option value="other">other</option>
              <option value="none">Prefer not to say</option>
            </select>
          </div>
          <div class="input">
            <label for="">Enrollment Status</label>
            <input type="text" placeholder="Enrolled" readonly />
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">Enrollment Date</label>
            <input type="text" placeholder="10.04.2024" readonly />
          </div>
        </div>
        <div class="btn-group">
          <a href="#" class="btn green">Save</a>
        </div>
      </div>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content5" class="head">
      Change Password
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content5" checked />
    <div class="content">
      <div style="padding: 1rem 2rem">
        <div class="input-group">
          <div class="input">
            <label for="">Current Password</label>
            <input type="password" placeholder="********" />
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">New Password</label>
            <input type="password" placeholder="********" />
          </div>
          <div class="input">
            <label for="">Confirm Password</label>
            <input type="password" placeholder="********" />
          </div>
        </div>
        <div class="btn-group">
          <a href="#" class="btn green">Save</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>