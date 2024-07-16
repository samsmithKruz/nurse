<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css/question_take.css">
<link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css">

<link rel="stylesheet" href="' . URLROOT . '/css/style.css" />
    <link rel="stylesheet" href="' . URLROOT . '/css/test_view.css" />


';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
  <section class="wrapper test">
    <h2 class="test-head" style="font-weight: 600">
      <?= $test_name; ?> <small><?= $timer; ?>mins</small>
    </h2>
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
              <?php if (in_array($option->option_id, $test_submit->{$question->question_id})) : ?>
                <?php $status = ($option->is_correct == 1) ? "correct" : "fail"; ?>
              <?php else : ?>
                <?php $status = ($option->is_correct == 1) ? "correct" : ""; ?>
              <?php endif ?>
              <div class="input">
                <input type="checkbox" disabled class="<?= $status; ?>" value="<?= $option->option_id; ?>" class="ck" />
                <label>
                  <div class="material-symbols-outlined">circle</div>
                  <?= $option->option_text; ?>
                </label>
              </div>
            <?php endforeach ?>
          </div>
          <?php $reason = [];
          foreach ($question->options as $i => $i_) :
            $i_->is_correct == 1 ? array_push($reason, $i_->rationale) : "";
          endforeach ?>
          <p class="reasons">
            <?= implode("<br>", $reason); ?>
          </p>
        </div>
      <?php } ?>
    </div>
    <div class="btn-group">
      <a href="<?= $_SERVER['HTTP_REFERER']??URLROOT."/student"; ?>" class="btn primary">Continue</a>
    </div>
  </section>
</main>


<script type="text/javascript">
  let options = document.querySelectorAll(".options");
  options.forEach(opt => {
    let checkboxes = opt.querySelectorAll("input[type=checkbox]");
    let hasFail = false;
    checkboxes.forEach(checkbox => {
      if (checkbox.classList.contains('fail')) {
        hasFail = true;
      }
    });
    opt.parentElement.querySelector('.reasons').classList.add(hasFail ? 'fail' : 'correct');
  })
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