<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="container wrapper">
    <label for="content4" class="head">
      Test Maker
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content ">
      <div style="padding: 2rem; width: 100%;">
        <div class="table" style="padding: 0;">
          <table id="test_maker">
            <thead>
              <tr>
                <th>Name</th>
                <th>Questions</th>
                <th>Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="btn-group">
          <a href="<?=URLROOT;?>/admin/test_name" class="btn primary">New test</a>
        </div>
      </div>

    </div>
  </section>
</main>
<script src="<?=URLROOT;?>/js/table.js?<?=mt_rand();?>"></script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>