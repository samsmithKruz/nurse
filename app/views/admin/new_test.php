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
    <div class="input-group">
      <div class="input">
        <label for="">Name</label>
        <input type="text" placeholder="Enter Test name">
      </div>
      <div class="input">
        <label for="">Time (min)</label>
        <input type="number" placeholder="Allocated Time">
      </div>
    </div>
    <h2 style="font-weight: 600;">Questions</h2>
    <div class="questions">
    </div>
    <div class="btn-group">
      <a href="#" class="btn primary" onclick="loadView('prev')">Prev</a>
      <a href="#" class="btn green ">Save</a>
      <a href="#" class="btn primary" onclick="loadView('next')">Next</a>
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