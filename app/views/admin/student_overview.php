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
      <form method="post" action="<?= URLROOT; ?>/admin/student_overview?id=<?= Auth::safe_data($_GET['id']); ?>" style="padding: 1rem 2rem; ">
        <h3 class="_" style="font-weight: 600; text-transform:capitalize;"><?= $fullname; ?></h3>
        <div class="input-group">
          <div class="input">
            <label for="">Email</label>
            <input type="text" value="<?= $email; ?>" readonly>
          </div>
          <div class="input">
            <label for="">Whatsapp</label>
            <input type="text" readonly value="<?= $whatsapp; ?>">
          </div>
        </div>
        <input type="hidden" name="email" value="<?= $email; ?>">
        <div class="input-group">
          <div class="input">
            <label for="">Gender</label>
            <input type="text" readonly value="<?= $gender; ?>">
          </div>
          <div class="input">
            <label for="">Class</label>
            <select name="class" id="">
              <option selected disabled>Select class to enroll</option>
              <?php foreach (CLASSESS as $key => $class) { ?>
                <option <?= $current_class == $key ? "selected" : ""; ?> value="<?= $key; ?>"><?= $class; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">Enrollment Status</label>
            <select name="enrollment" id="">
              <option value="1" <?= $enrollment_status == 1 ? "selected" : ""; ?>>Enrolled</option>
              <option value="0" <?= $enrollment_status == 0 ? "selected" : ""; ?>>Unregistered</option>
            </select>
          </div>
          <div class="input">
            <label for="">Enrollment Date</label>
            <input type="date" name="enrollment_date" value="<?= (new DateTime($enrollment_date))->format('Y-m-d'); ?>">
          </div>
        </div>
        <div class="btn-group">
          <input type="submit" onclick="this.value='loading...'" name="q1" value="Update" class="btn green" style="width: fit-content;">
          <input type="submit" onclick="this.value='loading...'" name="q2" value="Unregister" class="btn red" style="width: fit-content;">
        </div>
      </form>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content5" class="head">
      Reports
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content5" checked />
    <div class="content ">
      <form>
        <div class="input-group">
          <div class="input">
            <label for="">Total Class Tests</label>
            <input type="text" value="<?= $total_test; ?>" readonly>
          </div>
          <div class="input">
            <label for="">Attempted Tests</label>
            <input type="text" readonly value="<?= $attempted; ?>">
          </div>
        </div>
        <div class="input-group">
          <div class="input">
            <label for="">Average Total Score</label>
            <input type="text" value="<?= $average; ?>" readonly>
          </div>
          <div class="input">
            <label for="">Pass Mark</label>
            <input type="text" readonly value="<?= PASS_MARK; ?>">
          </div>
        </div>
        <h3 style="margin-top: 2rem;">REMARK</h3>
        <!-- <p style="margin-bottom: 1rem;">
          The Academy requires you to be diligent in taking your daily test in class and also attending class Lectures.
        </p> -->
        <!-- Automatic Remark -->
        <p style="margin-bottom: 1rem;">
          <?= $remark; ?>
        </p>

        <!-- <p style="margin-bottom: 1rem;">
          Registration is ongoing.
          This has proved so far to help improve our student Q bank and we are recommending this for you.
        </p>
        <p style="margin-bottom: 1rem;">
        If you have any concerns, feel free to reach any of the instructor
        </p>
        <p style="margin-bottom: 1rem;">
        For next Batch Registration kindly checkout the student portal.
        </p> -->
      </form>
      <div class="btn-group" style="padding: .8rem 1;justify-content: center;width:100%;background-color: #f8f9fc;border-top:1px solid #e3e6f0;">
        <a href="<?= URLROOT; ?>/admin/send_report_email?id=<?= Auth::safe_data($_GET['id']); ?>" class="btn primary">Send Report Email</a>
      </div>

    </div>
  </section>
</main>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>