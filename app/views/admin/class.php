<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="container wrapper">
    <label for="content4" class="head" style="text-transform:capitalize;">
      Class <?= $type; ?>
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
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="text-truncate">John Doe</span></td>
              <td>+234989231438</td>
              <td>
                <div class="btns">
                  <a href="<?= URLROOT; ?>/admin/student_overview?id=1" class="blue">View</a>
                  <a href="#" class="red">Delete</a>
                </div>
              </td>
            </tr>
            <tr>
              <td><span class="text-truncate">John Doe</span></td>
              <td>+234989231438</td>
              <td>
                <div class="btns">
                  <a href="<?= URLROOT; ?>/admin/student_overview?id=1" class="blue">View</a>
                  <a href="#" class="red">Delete</a>
                </div>
              </td>
            </tr>
            <tr>
              <td><span class="text-truncate">John Doe</span></td>
              <td>+234989231438</td>
              <td>
                <div class="btns">
                  <a href="<?= URLROOT; ?>/admin/student_overview?id=1" class="blue">View</a>
                  <a href="#" class="red">Delete</a>
                </div>
              </td>
            </tr>
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
        <table>
          <thead>
            <tr>
              <th>Filename</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!</td>
              <td>
                <a href="<?= URLROOT; ?>/admin/file_view?id=1" class="blue">View</a>
                <a href="#" class="red">Remove</a>
              </td>
            </tr>
            <tr>
              <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!</td>
              <td>
                <a href="<?= URLROOT; ?>/admin/file_view?id=1" class="blue">View</a>
                <a href="#" class="red">Remove</a>
              </td>
            </tr>
            <tr>
              <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!</td>
              <td>
                <a href="<?= URLROOT; ?>/admin/file_view?id=1" class="blue">View</a>
                <a href="#" class="red">Remove</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="input-group flex">
        <form action="#">
          <label for="">Select Uploaded File</label>
          <div class="input-group">
            <div class="input">
              <select name="#" id="#">
                <option disabled selected>Add File</option>
                <option value="">Lecture Note</option>
              </select>
            </div>
            <div class="input">
              <input type="submit" value="Add">
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
        <table>
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
        <form action="#">
          <label for="">Upload Timetable</label>
          <div class="input-group">
            <div class="input">
              <select name="#" id="#">
                <option disabled selected>Add File</option>
                <option value="">Lecture Note</option>
              </select>
            </div>
            <div class="input">
              <input type="submit" value="Add">
            </div>
          </div>
        </form>
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
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Status</th>
              <th>Results</th>
              <th>Acttion</th>
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
        <form action="#">
          <label for="">Add Test to Class</label>
          <div class="input-group">
            <div class="input">
              <select name="#" id="#">
                <option disabled selected>Select test</option>
                <option value="">Lecture Note</option>
              </select>
            </div>
            <div class="input">
              <input type="submit" value="Add">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>