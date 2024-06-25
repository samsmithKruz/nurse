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
        <table id="fileUpload">
          <thead>
            <tr>
              <th>Filename</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td class="text-truncate">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!
              </td>
              <td>10.04.2024</td>
              <td>
                <a href="#" class="blue">View</a>
                <a href="#" class="red">Delete</a>
              </td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <form action="<?=URLROOT;?>/admin/upload" method="post" enctype="multipart/form-data">
        <label for="">Upload File</label>
        <div class="input-group">
          <div class="input">
            <input type="text" required name="filename" placeholder="Enter file name" />
          </div>
          <div class="input">
            <input type="file" required name="file1" id="file1" placeholder="https://" />
          </div>
          <div class="input">
            <input type="submit" name="q" value="Upload" />
          </div>
        </div>
      </form>
    </div>
  </section>
</main>
<script src="<?=URLROOT;?>/js/table.js"></script>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>