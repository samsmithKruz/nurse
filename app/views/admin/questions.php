<?php
$styles = '
  <link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
  <link rel="stylesheet" href="' . URLROOT . '/css/style.css">
  <link rel="stylesheet" href="' . URLROOT . '/css/styles.css" />
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main class="wrapper">
  <section>
    <h2 class="test-head" style="font-weight: 600"><?=$test_name;?> | <small>(<?=$test_time;?>mins)</small></h2>

    <div class="btn-group">
      <a href="<?=URLROOT;?>/admin/add_question?id=<?=Auth::safe_data($_GET['id']);?>" class="btn primary secondary small">Add</a>
      <a href="<?=URLROOT;?>/admin/add_question?id=<?=Auth::safe_data($_GET['id']);?>&action=delete" class="btn red small">Delete</a>
    </div>
    <form enctype="multipart/form-data" action="<?=URLROOT;?>/admin/add_question?id=<?=Auth::safe_data($_GET['id']);?>" method="post" style="padding: 0;">
      <div class="question">
        <input type="hidden" name="q_id" value="">
        <div class="input">
          <label for="quest_">Test questions</label>
          <textarea name="quest_" placeholder="Enter test questions here" id="quest_" required></textarea>
        </div>
        <div class="input">
          <label for="images">Select Images to be uploaded</label>
          <input type="file" name="files[]" multiple id="images">
        </div>
        <div class="options">
          <div class="input">
            <label for="" class="correct_">
              <input type="checkbox" name="opt1_correct" />
              Is correct?
            </label>
            <input type="text" name="opt1" required placeholder="something" />
            <div class="reason">
              <label for=""> Rationale </label>
              <input type="text" name="opt1_reason" placeholder="something" />
            </div>
          </div>
          <div class="input">
            <label for="" class="correct_">
              <input type="checkbox" name="opt2_correct" />
              Is correct?
            </label>
            <input type="text" required name="opt2" placeholder="something" />
            <div class="reason">
              <label for=""> Rationale </label>
              <input type="text" name="opt2_reason" placeholder="something" />
            </div>
          </div>
          <div class="input">
            <label for="" class="correct_">
              <input type="checkbox" name="opt3_correct" />
              Is correct?
            </label>
            <input type="text" required name="opt3" placeholder="something" />
            <div class="reason">
              <label for=""> Rationale </label>
              <input type="text" name="opt3_reason" placeholder="something" />
            </div>
          </div>
          <div class="input">
            <label for="" class="correct_">
              <input type="checkbox"  name="opt4_correct" />
              Is correct?
            </label>
            <input type="text" required name="opt4" placeholder="something" />
            <div class="reason">
              <label for=""> Rationale </label>
              <input type="text" name="opt4_reason" placeholder="something" />
            </div>
          </div>
        </div>
      </div>
      <div class="paginations">
        <a href="<?=URLROOT;?>/admin/add_question?id=<?=Auth::safe_data($_GET['id']);?>&page=1" class="active">1</a>
        <a href="#">2</a>
      </div>
      <div class="btn-group">
        <input type="submit" value="Save" style="width: fit-content;" class="btn primary green">
        <a href="<?=URLROOT;?>/admin/test_maker" class="btn primary ">Done</a>
      </div>
    </form>
  </section>
</main>
</body>

</html>