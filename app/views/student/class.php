<?php
$styles = '<link rel="stylesheet" href="' . URLROOT . '/css/index-student.css">';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
<input type="hidden" name="t" value="<?= $t; ?>">
    <section>
        <h3 class="_" style="text-align: center;text-transform: capitalize;">
            <?= $type; ?>
        </h3>
    </section>
    <section class="container wrapper">
        <label for="content3" class="head">
            Test & Assignments
            <span class="material-symbols-outlined">
                arrow_right
            </span>
        </label>
        <input checked type="checkbox" id="content3">
        <div class="content classes">
            <div class="table">
                <table id="test_t">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Score(%)</th>
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
        <label for="content4" class="head">
            Timetable
            <span class="material-symbols-outlined">
                arrow_right
            </span>
        </label>
        <input checked type="checkbox" id="content4">
        <div class="content timetable">
            <img src="<?= URLROOT; ?>/uploads/<?=$timetable;?>" alt="Timetable">
        </div>
    </section>
    <section class="container wrapper">
        <label for="content5" class="head">
            Class Notes
            <span class="material-symbols-outlined">
                arrow_right
            </span>
        </label>
        <input checked type="checkbox" id="content5">
        <div class="content classes">
            <div class="table">
                <table id="classNotes_">
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
</main>
<script src="<?=URLROOT;?>/js/table.js"></script>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>