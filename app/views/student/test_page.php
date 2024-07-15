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
      <h3 style="text-transform: capitalize;"><?= $test_name; ?></h3>
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
        <?php foreach ($tests as $key => $question) { ?>
          <div class="question">
            <h4>Question <span><?= $key + 1; ?></span></h4>
            <div class="q_content">
              <p class="q"><?= $question->question; ?></p>
              <?php if (isset($question->rationale) && count(@$question->rationale) > 0) { ?>
                <button type="button" class="rationale-toggle btn small primary">Show Rationale</button>
                <div class="rationales">
                  <?php foreach ($question->rationale as $e => $rationale) : ?>
                    <img src="<?= URLROOT; ?>/test_rationale/<?= $rationale->path; ?>" alt="">
                  <?php endforeach ?>
                </div>
              <?php } ?>
            </div>
            <div class="options">
              <?php foreach ($question->options as $i => $option) : ?>
                <div class="input">
                  <input type="checkbox" class="" id="q<?= $key; ?>_opt<?= $i + 1; ?>" value="<?= $option->option_id; ?>" name="<?= $option->question_id; ?>[]" class="ck" />
                  <label for="q<?= $key; ?>_opt<?= $i + 1; ?>">
                    <div class="material-symbols-outlined">circle</div>
                    <?= $option->option_text; ?>
                  </label>
                </div>
              <?php endforeach ?>
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
  <script src="<?= URLROOT; ?>/js/toastify-js.js"></script>
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/toastify.min.css">
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
    setTimeout(() => {
      document.querySelector("input[type=submit]").value = "Submit"
    }, 1000);
  }, true)

  let rationaleToggle = e => {
    let rationales = e.target.parentElement.querySelector('.rationales');
    rationales.classList.toggle("active");
    e.target.textContent = rationales.classList.contains("active") ? "Hide Rationale" : "Show Rationale";
  }
  document.querySelectorAll(".q_content .rationale-toggle").forEach(i => {
    i.addEventListener("click", rationaleToggle)
  })
</script>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>