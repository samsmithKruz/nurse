<?php
$styles = '<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <input type="hidden" name="t" value="<?=$type;?>">
  <input type="hidden" name="t_" value="<?=$_SESSION[APP]->is_admin;?>">
  <section class="container wrapper">
    <label for="content4" style="text-transform: capitalize;" class="head">
      <?=$type;?> Students
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content">
      <div class="table">
        <table id="students">
          <thead>
            <tr>
              <th>Name</th>
              <th>Whatsapp</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
<script src="<?=URLROOT;?>/js/table.js"></script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>