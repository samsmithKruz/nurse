<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
    <link rel="stylesheet" href="' . URLROOT . '/css/question_take.css" />
    <link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css" />
';
// print_r($tests);
// exit();
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="wrapper test">
    <div class="test-head">
      <h3 style="text-transform: capitalize;">Test on <?= $test_name; ?></h3>
      <div class="time">
        <span class="icon">
          <img src="../assets/timer.svg" alt="">
        </span>
        <span class="time">00:00:00</span>
        <span>minutes</span>
      </div>
    </div>
    <div class="questions">
      <?php foreach ($tests as $key => $test) { ?>
        <div class="question">
          <h4>Question <span><?= $key + 1; ?> of <?= count($tests); ?></span></h4>
          <p class="q">
            <?=$test->question;?>
          </p>
          <div class="options">
            <div class="input">
              <input type="radio" id="q<?=$key;?>_opt1" name="<?=$test->question_id;?>" value="<?=$test->op1;?>">
              <label for="q<?=$key;?>_opt1">
                <div class="material-symbols-outlined">circle</div>
                <?=$test->op1;?>
              </label>
            </div>
            <div class="input">
              <input type="radio" id="q<?=$key;?>_opt2" name="<?=$test->question_id;?>" value="<?=$test->op2;?>">
              <label for="q<?=$key;?>_opt2">
                <div class="material-symbols-outlined">circle</div>
                <?=$test->op2;?>
              </label>
            </div>
            <div class="input">
              <input type="radio" id="q<?=$key;?>_opt3" name="<?=$test->question_id;?>" value="<?=$test->op3;?>">
              <label for="q<?=$key;?>_opt3">
                <div class="material-symbols-outlined">circle</div>
                <?=$test->op3;?>
              </label>
            </div>
            <div class="input">
              <input type="radio" id="q<?=$key;?>_opt4" name="<?=$test->question_id;?>" value="<?=$test->op4;?>">
              <label for="q<?=$key;?>_opt4">
                <div class="material-symbols-outlined">circle</div>
                <?=$test->op4;?>
              </label>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="btn-group">
      <a href="javascript:history.back()" class="btn primary">Continue</a>
    </div>
  </section>
</main>
<script>
  let time_ = document.querySelector(".time span.time")
  let startTimer = () => {
    let duration = <?= $test_time; ?> * 60;
    let timer = duration,
      hours, minutes, seconds;
    hours = parseInt(timer / 3600, 10);
    minutes = parseInt((timer % 3600) / 60, 10);
    seconds = parseInt((timer % 60), 10);

    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    time_.textContent = `${hours}:${minutes}:${seconds}`;
  }
  startTimer()
</script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>