<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-student.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css">
';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
  <section class="wrapper">
    <h2>Test Details</h2>
    <p>Name: <i>Test on <?=$test_details->name;?> </i></p>
    <p>Time: <i><?=$test_details->time;?> minutes </i></p>
    <br>
    <h2>Instructions</h2>
    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima, est, quasi explicabo fuga tenetur possimus a dolorum consectetur nulla numquam temporibus omnis voluptatum libero excepturi. Id alias nulla maxime aliquid ipsam aliquam, pariatur similique qui possimus optio, magnam saepe soluta.
    </p>
    <div class="btn-group">
      <a href="<?=URLROOT;?>/student/start_test?id=<?=$id;?>" class="btn green">Start Test</a>
    </div>
  </section>
</main>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>