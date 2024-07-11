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
              <tr>
                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, vel laudantium! Ullam.</td>
                <td>15</td>
                <td>30mins</td>
                <td>
                  <div class="btns">
                    <a href="#" class="blue">Edit</a>
                    <a href="#" class="red">Delete</a>
                  </div>
                </td>
              </tr>
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
<script src="<?=URLROOT;?>/js/table.js"></script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>