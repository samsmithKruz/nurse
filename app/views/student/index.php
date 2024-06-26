<?php
$styles = '<link rel="stylesheet" href="' . URLROOT . '/css/index-student.css">';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
    <section class="cardio">
        <div>
            <h1>Hello, <?= explode(' ', $_SESSION[APP]->fullname)[0]; ?></h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero?
            </p>
        </div>
        <div class="side">
            <p>Average Score</p>
            <h1><?= $average_score ?? '0'; ?>%</h1>
        </div>
    </section>
    <section class="container wrapper">
        <label for="content1" class="head">
            Student Counsellor
            <span class="material-symbols-outlined">
                arrow_right
            </span>
        </label>
        <input checked type="checkbox" id="content1">
        <div class="content">
            <div class="b-l">
                <h1><?= STUDENT_COUNSELLOR_NAME; ?></h1>
                <p><b>Email:</b> <?= STUDENT_COUNSELLOR_EMAIL; ?></p>
                <p><b>Whatsapp:</b> <?= STUDENT_COUNSELLOR_WHATSAPP; ?></p>
            </div>
        </div>
    </section>
    <section class="container wrapper">
        <label for="content2" class="head">
            Classes
            <span class="material-symbols-outlined">
                arrow_right
            </span>
        </label>
        <input checked type="checkbox" id="content2">
        <div class="content classes">
            <div class="cards">
                <?php foreach (CLASSESS as $key => $class) { ?>
                    <a href="<?= URLROOT; ?>/student/class?t=<?= $key; ?>" class="card <?= $current_class == $key ? "current" : ""; ?>">
                        <?= $current_class == $key ? '<span class="badge">Current Class</span>' : ""; ?>
                        <h3><?= $class; ?></h3>
                    </a>
                <?php } ?>

            </div>
        </div>
    </section>
    <section class="container wrapper">
        <label for="content6" class="head">
            General Library
            <span class="material-symbols-outlined">
                arrow_right
            </span>
        </label>
        <input checked type="checkbox" id="content6">
        <div class="content classes">
            <div class="table">
                <table id="student_general_library">
                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th>Date</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A class taken on NCLEX categories for noms and cons</td>
                            <td>15.04.2024</td>
                            <td>
                                <a href="#">Download</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="container wrapper">
        <label for="content7" class="head">
            General Notice
            <span class="material-symbols-outlined">
                arrow_right
            </span>
        </label>
        <input checked type="checkbox" id="content7">
        <div class="content nom">
            <?php foreach ($notices as $key => $notice) { ?>
                <p>
                    <?= $notice->notice_text; ?>
                </p>
            <?php } ?>
        </div>
    </section>
</main>
<script src="<?= URLROOT; ?>/js/table.js"></script>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>