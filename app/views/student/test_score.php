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
    <p style="
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
          ">
      Score: <i style="font-size: 3rem; line-height: 1"><?= $score; ?>% </i>
      <!-- <small style="
              background-color: var(--green);
              color: #fff;
              padding: 0.2rem 0.7rem;
              margin-left: 0.5rem;
            ">Pass</small> -->
    </p>
    <br />
    <div class="btn-group">
      <a href="<?= URLROOT; ?>/student/watch_test?id=<?= Auth::safe_data($_GET['id']); ?>" onclick="this.textContent='loading...'" class="btn green small ">View Test</a>
      <a href="<?= URLROOT; ?>/student/" onclick="this.textContent='loading...'" class="btn primary small">Continue</a>
    </div>
  </section>
</main>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>