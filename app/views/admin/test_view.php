<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="container wrapper">
    <input type="hidden" name="t" value="<?= Auth::safe_data($_GET['class']); ?>">
    <label for="content4" class="head">
      Results
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content ">
      <div class="table" style="padding: 2rem;">
        <table id="test_scores">
          <thead>
            <tr>
              <th>Name</th>
              <th>Score</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="btn-group" style="padding: 2rem;">
        <a href="<?= URLROOT . "/admin/re_mark?class=" . Auth::safe_data($_GET['class']) . "&test_id=". Auth::safe_data($_GET['id']); ?>" class="btn green">Remark</a>
        <a href="javascript:history.back()" class="btn primary">Continue</a>
      </div>
    </div>
  </section>
</main>
<script src="<?= URLROOT; ?>/js/table.js?<?= mt_rand(); ?>"></script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>