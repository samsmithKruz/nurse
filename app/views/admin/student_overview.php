<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css//student_overview.css">
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="container wrapper">
    <label for="content4" class="head">
      View Student
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content ">
      <div style="padding: 1rem 2rem; ">
        <h3 class="_" style="font-weight: 600; text-transform:capitalize;"><?=$fullname;?></h3>
        <div class="input-group">
          <div class="input">
            <label for="">Email</label>
            <input type="text" value="<?=$email;?>" readonly>
          </div>
          <div class="input">
            <label for="">Whatsapp</label>
            <input type="text" value="<?=$whatsapp;?>" readonly>
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">Gender</label>
            <select name="" id="">
              <option selected disabled>Select your gender</option>
              <option value="female" <?=$gender == "female"?"selected":"";?>>Female</option>
              <option value="male" <?=$gender == "male"?"selected":"";?>>Male</option>
              <option value="other" <?=$gender == "other"?"selected":"";?>>other</option>
              <option value="none" <?=$gender == "none"?"selected":"";?>>Prefer not to say</option>
            </select>
          </div>
          <div class="input">
            <label for="">Class</label>
            <input type="text" value="<?=$current_class;?>" readonly>
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">Enrollment Status</label>
            <input type="text" value="<?=$enrollment_status==1?"Enrolled":"Unregistered";?>" readonly>
          </div>
          <div class="input">
            <label for="">Enrollment Date</label>
            <input type="text" value="<?=(new DateTime($enrollment_date))->format('d/m/Y');?>"  readonly>
          </div>
        </div>
        <div class="btn-group">
          <a href="#" class="btn green">Update</a>
          <a href="#" class="btn primary">Enroll</a>
          <a href="#" class="btn red">Unregister</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>