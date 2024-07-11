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
    <h2 style="font-weight: 600;">Test Maker</h2>
    <form action="<?=URLROOT;?>/admin/new_test" method="post" style="padding: .5rem 0;">
      <div class="input-group">
        <div class="input">
          <label for="">Name</label>
          <input type="text" name="question_name" placeholder="Enter Test name">
        </div>
        <div class="input">
          <label for="">Time (min)</label>
          <input type="number" step="0.01" name="question_time" placeholder="Allocated Time">
        </div>
      </div>
      <h2 style="font-weight: 600;">Questions</h2>
      <div class="questions">
      </div>
      <div class="btn-group">
        <a href="#" class="btn primary" onclick="loadView('prev')">Prev</a>
        <input type="submit" onclick="this.value='loading...'" style="width: fit-content;" class="btn green" value="Save & Done">
        <a href="#" class="btn primary" onclick="loadView('next')">Next</a>
    </form>
    </div>
    <div class="paginations">
      <a href="#">1</a>
      <a href="#">10</a>
    </div>
  </section>
</main>
<script src="<?=URLROOT;?>/js/questions.js"></script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>