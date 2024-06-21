<?php
$styles = '<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="container wrapper">
    <label for="content4" class="head">
      <?=$type;?> Students
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content">
      <div class="table">
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Whatsapp</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="text-truncate">John Doe</span></td>
              <td>+234989231438</td>
              <td>12.04.2024</td>
              <td>
                <div class="btns">
                  <a href="#">View</a>
                  <a href="#" class="red">Remove</a>
                </div>
              </td>
            </tr>
            <tr>
              <td><span class="text-truncate">John Doe</span></td>
              <td>+234989231438</td>
              <td>12.04.2024</td>
              <td>
                <div class="btns">
                  <a href="#">View</a>
                  <a href="#" class="red">Remove</a>
                </div>
              </td>
            </tr>
            <tr>
              <td><span class="text-truncate">John Doe</span></td>
              <td>+234989231438</td>
              <td>12.04.2024</td>
              <td>
                <div class="btns">
                  <a href="#">View</a>
                  <a href="#" class="red">Remove</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>