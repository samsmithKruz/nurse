<?php
$styles = '<link rel="stylesheet" href="'.URLROOT.'/css/index-admin.css">';
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
          <h1>76</h1>
          <p>
            <b>Enrolled</b>
            <a href="<?=URLROOT;?>/admin/student?t=enrolled">View</a>
          </p>
        </div>
        <div>
          <h1>76</h1>
          <p>
            <b>Unregistered</b>
            <a href="<?=URLROOT;?>/admin/student?t=unregistered">View</a>
          </p>
        </div>
        <div>
          <h1>76</h1>
          <p>
            <b>All Students</b>
            <a href="<?=URLROOT;?>/admin/student?t=all">View</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="container wrapper">
    <label for="content2" class="head">
      Classes
      <span class="material-symbols-outlined"> arrow_right </span>
    </label>
    <input type="checkbox" id="content2" checked />
    <div class="content classes">
      <div class="cards">
        <a href="<?=URLROOT;?>/admin/class?t=a" class="card nom">
          <span class="badge">Ended</span>
          <h3>Google UX Design</h3>
          <p>google</p>
        </a>
        <a href="<?=URLROOT;?>/admin/class?t=b" class="card nom">
          <span class="badge">Current Class</span>
          <h3>Google UX Design</h3>
          <p>google</p>
        </a>
        <a href="<?=URLROOT;?>/admin/class?t=c" class="card nom">
          <span class="badge">Current Class</span>
          <h3>Google UX Design</h3>
          <p>google</p>
        </a>
        <a href="<?=URLROOT;?>/admin/class?t=d" class="card nom">
          <span class="badge">Current Class</span>
          <h3>Google UX Design</h3>
          <p>google</p>
        </a>
        <a href="<?=URLROOT;?>/admin/class?t=e" class="card nom">
          <span class="badge">Current Class</span>
          <h3>Google UX Design</h3>
          <p>google</p>
        </a>
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
        <div class="notice">
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Recusandae minus atque minima laboriosam quibusdam repellat quo,
            distinctio hic quam nostrum omnis culpa dolorem numquam beatae,
            explicabo est, incidunt illum debitis.
          </p>
          <a href="#" class="delete">Delete</a>
        </div>
        <div class="notice">
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Recusandae minus atque minima laboriosam quibusdam repellat quo,
            distinctio hic quam nostrum omnis culpa dolorem numquam beatae,
            explicabo est, incidunt illum debitis.
          </p>
          <a href="#" class="delete">Delete</a>
        </div>
      </div>
      <form action="#">
        <div class="input">
          <textarea name="notice" rows="5" id="notice" placeholder="Make a general notice to all classes"></textarea>
        </div>
        <div class="input">
          <input type="submit" value="Add" />
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
              <a href="#" class="blue">View</a>
                <a href="#" class="red">Remove</a>
              </td>
            </tr>
            <tr>
              <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!</td>
              <td>
              <a href="#" class="blue">View</a>
                <a href="#" class="red">Remove</a>
              </td>
            </tr>
            <tr>
              <td class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex!</td>
              <td>
              <a href="#" class="blue">View</a>
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
        <form action="#">
          <label for="">Upload Link</label>
          <div class="input-group">
            <div class="input">
              <input type="text" placeholder="https://">
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