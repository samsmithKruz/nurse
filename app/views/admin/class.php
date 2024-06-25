<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <input type="hidden" name="t" value="<?= $t; ?>">
  <section class="container wrapper">
    <label for="content4" class="head" style="text-transform:capitalize;">
      Class <?= $type; ?>
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content">
      <div class="table">
        <table id="class">
          <thead>
            <tr>
              <th>Name</th>
              <th>Whatsapp</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content4_" class="head">
      Class Notes
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4_" checked />
    <div class="content">
      <div class="table">
        <table id="classNotes">
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
        <form action="<?= URLROOT; ?>/admin/class?t=<?= $t; ?>" method="post">
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
              <input type="submit" name="q" value="Add">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content5" class="head">
      Timetable
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content5" checked />
    <div class="content">
      <div class="table">
        <table id="timetable">
          <thead>
            <tr>
              <th>Filename</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-truncate">IMG_9832423874.jpg</td>
              <td>
                <a href="#" class="blue">view</a>
                <a href="#" class="red">delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="input-group flex">
        <form action="<?= URLROOT; ?>/admin/class?t=<?= $t; ?>" method="post">
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
              <input type="submit" name="q1" value="Add">
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content6" class="head">
      Test & Assessment
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content6" checked />
    <div class="content">
      <div class="table">
        <table id="test">
          <thead>
            <tr>
              <th>Name</th>
              <th>Status</th>
              <th>Results</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia.</td>
              <td>Running</td>
              <td>
                <a href="<?= URLROOT; ?>/admin/test_view?class=<?= $type; ?>" class="blue">view</a>
              </td>
              <td>
                <a href="#">Start</a>
                <a href="#">End</a>
                <a href="#" class="red">Remove</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="input-group flex">
      <form action="<?= URLROOT; ?>/admin/class?t=<?= $t; ?>" method="post">
          <label for="">Select Uploaded File</label>
          <div class="input-group">
            <div class="input">
              <select name="file" required id="#">
                <option disabled selected>Add Test</option>
                <?php foreach ($tests as $test) { ?>
                  <option value="<?= $test->id; ?>"><?= $test->name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="input">
              <input type="submit" name="q2" value="Add">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>

<script src="<?= URLROOT; ?>/js/table.js"></script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>