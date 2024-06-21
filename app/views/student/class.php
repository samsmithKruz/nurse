<?php
$styles = '<link rel="stylesheet" href="' . URLROOT . '/css/index-student.css">';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
    <section>
        <h3 class="_" style="text-align: center;text-transform: capitalize;">
            Class <?= $type; ?>
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
                <table>
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Score</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>NCLEX TEST 1</td>
                            <td>Not-Submitted</td>
                            <td>0%</td>
                            <td>
                                <a href="<?= URLROOT; ?>/student/test?id=8234">Start Test</a>
                            </td>
                        </tr>
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
            <img src="<?= URLROOT; ?>/assets/timetable.png" alt="">
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
                <table>
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
                        <tr>
                            <td>A class taken on NCLEX categories for noms and cons</td>
                            <td>15.04.2024</td>
                            <td>
                                <a href="#">Download</a>
                            </td>
                        </tr>
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
        <label for="content6" class="head">
            Library
            <span class="material-symbols-outlined">
                arrow_right
            </span>
        </label>
        <input checked type="checkbox" id="content6">
        <div class="content classes">
            <div class="table">
                <table>
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
                        <tr>
                            <td>A class taken on NCLEX categories for noms and cons</td>
                            <td>15.04.2024</td>
                            <td>
                                <a href="#">Download</a>
                            </td>
                        </tr>
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
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>