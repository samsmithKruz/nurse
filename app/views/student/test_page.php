<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css/question_take.css">
<link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css">


';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
  <section class="wrapper test">
    <div class="test-head">
      <h3>Test on Bladder</h3>
      <div class="time">
        <span class="icon">
          <img src="<?= URLROOT; ?>/assets/timer.svg" alt="">
        </span>
        <span class="time">00:00:00</span>
      </div>
    </div>
    <form action="<?= URLROOT; ?>/student/test_submit" method="post" style="padding: 0;">
      <input type="hidden" name="id" value="<?= $id; ?>">
      <div class="questions">
        <?php foreach ($tests as $key => $test) { ?>
          <div class="question">
            <h4>Question <span><?= $key + 1; ?> of <?= count($tests); ?></span></h4>
            <p class="q">
              <?= $test->question; ?>
            </p>
            <div class="options">
              <div class="input">
                <input type="radio" id="q<?= $key; ?>_opt1" name="<?= $test->question_id; ?>" value="<?= $test->op1; ?>">
                <label for="q<?= $key; ?>_opt1">
                  <div class="material-symbols-outlined">circle</div>
                  <?= $test->op1; ?>
                </label>
              </div>
              <div class="input">
                <input required type="radio" id="q<?= $key; ?>_opt2" name="<?= $test->question_id; ?>" value="<?= $test->op2; ?>">
                <label for="q<?= $key; ?>_opt2">
                  <div class="material-symbols-outlined">circle</div>
                  <?= $test->op2; ?>
                </label>
              </div>
              <div class="input">
                <input type="radio" id="q<?= $key; ?>_opt3" name="<?= $test->question_id; ?>" value="<?= $test->op3; ?>">
                <label for="q<?= $key; ?>_opt3">
                  <div class="material-symbols-outlined">circle</div>
                  <?= $test->op3; ?>
                </label>
              </div>
              <div class="input">
                <input type="radio" id="q<?= $key; ?>_opt4" name="<?= $test->question_id; ?>" value="<?= $test->op4; ?>">
                <label for="q<?= $key; ?>_opt4">
                  <div class="material-symbols-outlined">circle</div>
                  <?= $test->op4; ?>
                </label>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="btn-group">
        <input type="submit" onclick="this.value='loading...'" style="width: fit-content;" value="Submit" class="btn primary">
      </div>
    </form>
  </section>
</main>
<?php if (!isset($_SESSION[APP]->flashMessage)) { ?>
  <script src="<?=URLROOT;?>/js/toastify-js.js"></script>
  <link rel="stylesheet" href="<?=URLROOT;?>/css/toastify.min.css">
  </script>
<?php } ?>
<script>
  let time_ = document.querySelector(".time span.time")
  let startTimer = () => {
    let duration = <?= $timer; ?> * 60;
    let timer = duration,
      hours, minutes, seconds;
    let countdown = setInterval(() => {
      hours = parseInt(timer / 3600, 10);
      minutes = parseInt((timer % 3600) / 60, 10);
      seconds = parseInt((timer % 60), 10);

      hours = hours < 10 ? "0" + hours : hours;
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      time_.textContent = `${hours}:${minutes}:${seconds}`;
      if (--timer < 0) {
        clearInterval(countdown);
        document.querySelector("input[type=submit]").click();
      }
    }, 1000);
  }
  startTimer()

  let form = document.querySelector("form");
  form.addEventListener("submit", event => {
    const form_ = event.target;

    if (!form.reportValidity()) {
      event.preventDefault();
      console.log('error');
    } else {
      console.log('no error')
    }
  })
  form.addEventListener("invalid", event => {
    event.preventDefault();
    Toastify({
          text: "Answer all questions.",
          duration: 3000,
          close: true,
          gravity: "top", 
          position: "center", 
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: 'var(--danger)',
          }
        }).showToast();
    console.log(event)
  }, true)
</script>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>