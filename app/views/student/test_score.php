<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css">
';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
  <section class="wrapper" style="
          margin-top: 3rem;
          display: flex;
          flex-direction: column;
          align-items: center;
        ">
    <h2>Test Details</h2>
    <p>Name: <i>Test on <?=$name;?> </i></p>
    <p>Time: <i><?=$time;?>minutes </i></p>
    <p style="
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
          ">
      Score: <i style="font-size: 3rem; line-height: 1"><?=$score;?>% </i>
      <!-- <small style="
              background-color: var(--green);
              color: #fff;
              padding: 0.2rem 0.7rem;
              margin-left: 0.5rem;
            ">Pass</small> -->
    </p>
    <br />
    <div class="btn-group">
      <a href="<?=URLROOT;?>/student/" class="btn primary">Continue</a>
    </div>
  </section>
</main>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>