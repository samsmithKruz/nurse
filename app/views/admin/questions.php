<?php
$r = mt_rand();
$styles = '
  <link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css?'.$r.'">
  <link rel="stylesheet" href="' . URLROOT . '/css/style.css?'.$r.'">
  <link rel="stylesheet" href="' . URLROOT . '/css/styles.css?'.$r.'" />
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main class="wrapper">
  <section>
    <h2 class="test-head" style="font-weight: 600"><?= $test_name; ?> | <small>(<?= $test_time; ?>mins)</small></h2>

    <div class="btn-group">
      <a href="<?= URLROOT; ?>/admin/add_question?id=<?= Auth::safe_data($_GET['id']); ?>" class="btn primary secondary small">Add</a>
      <a href="<?= URLROOT; ?>/admin/delete_question?id=<?= Auth::safe_data($_GET['id']); ?><?= isset($_GET['q_id']) && !empty(@$_GET['q_id']) ? "&q_id=" . @$_GET['q_id'] : ""; ?>" class="btn red small">Delete</a>
    </div>
    <form enctype="multipart/form-data" action="<?= URLROOT; ?>/admin/add_question?id=<?= Auth::safe_data($_GET['id']); ?>" method="post" style="padding: 0;">
      <div class="question">
        <input type="hidden" name="q_id" value="<?= Auth::safe_data(@$_GET['q_id']) ?? ""; ?>">
        <div class="input">
          <label for="quest_">Test questions</label>
          <textarea name="quest_" rows="8" placeholder="Enter test questions here" id="quest_" required><?= @$question_text ?? ""; ?></textarea>
        </div>
        <div class="input">
          <label for="images">Select Images to be uploaded</label>
          <input type="file" name="images[]" multiple id="images">
        </div>
        <div class="options">
          <?php
          for ($i = 1; $i <= 4; $i++) { ?>
            <div class="input">
              <label for="" class="correct_">
                <input type="checkbox" <?= @($options[$i - 1]->is_correct == 1 ? "checked" : "") ?? ""; ?> name="opt<?= $i; ?>_correct" />
                Is correct?
              </label>
              <input type="text" name="opt<?= $i; ?>" value="<?= @($options[$i - 1]->option_text) ?? ""; ?>" required placeholder="something" />
              <div class="reason">
                <label for=""> Rationale </label>
                <textarea name="opt<?= $i; ?>_reason" rows="4" placeholder="Enter rationale"><?= @($options[$i - 1]->rationale) ?? ""; ?></textarea>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="btn-group">
        <input type="submit" value="Save" style="width: fit-content;" class="btn primary green">
        <a href="<?= URLROOT; ?>/admin/test_maker" class="btn primary ">Done</a>
      </div>
      <?php if (count(@$question_ids) > 0) { ?>
        <div class="paginations">
          <?php foreach ($question_ids as $key => $pagination) { ?>
            <a href="<?= URLROOT; ?>/admin/add_question?id=<?= Auth::safe_data($_GET['id']); ?>&q_id=<?= $pagination->question_id; ?>" class="<?= isset($_GET['q_id']) && @$_GET['q_id'] == $pagination->question_id ? "active" : ""; ?>"><?= ++$key; ?></a>
          <?php } ?>
        </div>
      <?php } ?>
    </form>
  </section>
</main>
</body>

</html>