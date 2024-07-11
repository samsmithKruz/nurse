<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css/question.css" />
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="wrapper">
  <h2 class="test-head" style="font-weight: 600">Test Maker</h2>
  <form action="<?=URLROOT;?>/admin/test_name" method="post">
    <input type="hidden" name="test_id" value="<?=@$test_id ?? "";?>">
    <div class="input-group">
      <div class="input">
        <label for="">Name</label>
        <input
          type="text"
          required
          value="<?=@$test_name ?? "";?>"
          name="question_name"
          placeholder="Enter Test name"
        />
      </div>
      <div class="input">
        <label for="">Time (min)</label>
        <input
          type="number"
          required
          value="<?=@$test_time ?? "";?>"
          step="0.01"
          name="question_time"
          placeholder="Allocated Time"
        />
      </div>
    </div>
    <div class="btn-group">
      <!-- <a href="javascript:history.back()" class="btn primary green">Save & Exit</a> -->
      <!-- <a href="questions.html" class="btn primary">Save & Continue</a> -->
      <input type="submit" value="Save & Continue" style="width: fit-content;" class="btn primary">
    </div>
  </form>
  </section>
</main>
<!-- <script src="<?=URLROOT;?>/js/questions.js"></script> -->
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>