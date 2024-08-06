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
    <p>Name: <i><?=$test_details->name;?> </i></p>
    <p>Time: <i><?=$test_details->time;?> minutes </i></p>
    <br>
    <h2>Instructions</h2>
    <p>
        Welcome to the Foreign Nurse Global Test Page. Please follow the instructions below carefully to complete your test successfully.
    </p>
    <h3 style="padding-top:1rem;">General Instructions</h3>
<ol style="padding-left:1rem;">
    <li><b>Browser Compatibility:</b> Ensure you are using an up-to-date browser such as Chrome, Firefox, Safari, or Edge.</li>
    <li><b>Stable Internet Connection: </b>Make sure you have a stable internet connection throughout the test.</li>
    <li><b>Quiet Environment: </b>Choose a quiet location to minimize distractions.</li>
</ol>
<h3 style="padding-top:1rem;">Submitting the Test</h3>
<ol style="padding-left:1rem; margin-bottom:1rem;">
    <li><b>Review Answers: </b>Before submitting, review your answers, especially the ones marked for review.</li>
    <li><b>Submit: </b>Click the ‘Submit Test’ button once you have completed all the questions. Ensure you only click this button once.</li>
    <li><b>Confirmation: </b>After submission, a confirmation message will appear. If you do not see this message, refresh the page and check your submission status.</li>
</ol>

<p>
    <b>Technical Issues</b>
    If you encounter any technical issues during the test, please contact our technical support team immediately.
    </p>

    <div class="btn-group">
      <a href="<?=URLROOT;?>/student/start_test?id=<?=$id;?>" onclick="this.textContent='loading...'" class="btn green">Start Test</a>
    </div>
  </section>
</main>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>