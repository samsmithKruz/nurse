<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="container wrapper">
    <label for="content4" class="head">
      File Upload
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content4" checked />
    <div class="content">
      <div class="table">
        <table>
          <thead>
            <tr>
              <th>Filename</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-truncate">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!
              </td>
              <td>10.04.2024</td>
              <td>
                <a href="#" class="blue">View</a>
                <a href="#" class="red">Delete</a>
              </td>
            </tr>
            <tr>
              <td class="text-truncate">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!
              </td>
              <td>10.04.2024</td>
              <td>
                <a href="#" class="blue">View</a>
                <a href="#" class="red">Delete</a>
              </td>
            </tr>
            <tr>
              <td class="text-truncate">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!
              </td>
              <td>10.04.2024</td>
              <td>
                <a href="#" class="blue">View</a>
                <a href="#" class="red">Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <form action="#">
        <label for="">Upload File</label>
        <div class="input-group">
          <div class="input">
            <input type="text" placeholder="Enter file name" />
          </div>
          <div class="input">
            <input type="file" name="file1" id="file1" placeholder="https://" />
          </div>
          <div class="input">
            <input type="submit" value="Upload" />
          </div>
        </div>
      </form>
    </div>
  </section>
</main>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>