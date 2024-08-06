<?php
$styles = '<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="container wrapper">
    <label for="content1" class="head">
      Student's Stats
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content1" checked />
    <div class="content">
      <div class="students">
        <div>
          <h1><?= $enrolled; ?></h1>
          <p>
            <b>Enrolled</b>
            <a href="<?= URLROOT; ?>/admin/student?t=enrolled">View</a>
          </p>
        </div>
        <div>
          <h1><?= $unregistered; ?></h1>
          <p>
            <b>Unregistered</b>
            <a href="<?= URLROOT; ?>/admin/student?t=unregistered">View</a>
          </p>
        </div>
        <div>
          <h1><?= $unregistered + $enrolled; ?></h1>
          <p>
            <b>All Students</b>
            <a href="<?= URLROOT; ?>/admin/student?t=all">View</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php if (Auth::viewAccess(ADMIN)) { ?>
    <section class="container wrapper">
      <label for="content21" class="head">
        Staff's Stats
        <span class="material-symbols-outlined"> arrow_right </span>
      </label>
      <input type="checkbox" id="content21" checked />
      <div class="content">
        <div class="students">
          <div>
            <h1><?= $staffs; ?></h1>
            <p>
              <b>Staff(s)</b>
              <a href="<?= URLROOT; ?>/admin/staffs">View</a>
            </p>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
  <section class="container wrapper">
    <label for="content2" class="head">
      Classes
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content2" checked />
    <div class="content classes">
      <div class="cards">
        <?php foreach (CLASSESS as $key => $class) { ?>
          <a href="<?= URLROOT; ?>/admin/class?t=<?= $key; ?>" class="card nom">
            <h3><?= $class; ?></h3>
          </a>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content3" class="head">
      General Notice
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content3" checked />
    <div class="content">
      <div class="notices">
        <?php foreach ($notices as $key => $notice) { ?>
          <div class="notice">
            <p>
              <?= $notice->notice_text; ?>
            </p>
            <a href="<?= URLROOT . "/admin/delete_notice?id=" . $notice->id; ?>" onclick="confirmDelete(event)" class="delete">Delete</a>
          </div>
        <?php } ?>
      </div>
      <form action="<?= URLROOT; ?>/admin/" method="post">
        <div class="input">
          <textarea required name="file" rows="7" id="notice" placeholder="Make a general notice to all classes"></textarea>
        </div>
        <div class="input">
          <input type="submit" onclick="this.value='loading...'" name="q3" value="Add" />
        </div>
      </form>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content4" class="head">
      General Library
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content">
      <div class="table">
        <table id="general_library">
          <thead>
            <tr>
              <th>File</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="input-group flex">
        <form action="<?= URLROOT; ?>/admin/" method="post">
          <label for="">Select Uploaded File</label>
          <div class="input-group">
            <div class="input">
              <select name="file" required id="#">
                <option disabled selected>Add File</option>
                <?php foreach ($files as $file) { ?>
                  <option value="<?= $file->id; ?>"><?= $file->filename; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="input">
              <input type="submit" onclick="this.value='loading...'" name="q1" value="Add">
            </div>
          </div>
        </form>
        <form action="<?= URLROOT; ?>/admin/" method="post">
          <label for="">Upload Link</label>
          <div class="input-group">
            <div class="input">
              <input type="text" required name="link" placeholder="https://">
            </div>
            <div class="input">
              <input type="submit" onclick="this.value='loading...'" name="q2" value="Add">
            </div>
          </div>
        </form>

      </div>
    </div>
  </section>
</main>
<script src="<?= URLROOT; ?>/js/table.js?<?=mt_rand();?>"></script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>