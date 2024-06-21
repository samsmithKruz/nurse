<?php
$styles = '<link rel="stylesheet" href="'.URLROOT.'/css/index-student.css">';
require_once APPROOT . "/views/student/inc/header.php";
?>
    <main>
        <section class="cardio">
            <div >
                <h1>Hello, John</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero?
                </p>
            </div>
            <div class="side">
                <p>Average Score</p>
                <h1>78%</h1>
            </div>
        </section>
        <section class="container wrapper">
            <label for="content1" class="head">
                Student Counsellor
                <span class="material-symbols-outlined">
                    arrow_right
                </span>
            </label>
            <input checked type="checkbox" id="content1" >
            <div class="content">
                <div class="b-l">
                    <h1>James Amos</h1>
                    <p><b>Email:</b> jamesamos@example.com</p>
                    <p><b>Whatsapp:</b> +234981932483</p>
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
                    <a href="<?=URLROOT;?>/student/class?t=a" class="card done">
                        <span class="badge">Ended</span>
                        <h3>Google UX Design</h3>
                        <p>google</p>
                    </a>
                    <a href="<?=URLROOT;?>/student/class?t=b" class="card current">
                        <span class="badge">Current Class</span>
                        <h3>Google UX Design</h3>
                        <p>google</p>
                    </a>
                    <a href="<?=URLROOT;?>/student/class?t=c" class="card">
                        <span class="badge">Current Class</span>
                        <h3>Google UX Design</h3>
                        <p>google</p>
                    </a>
                    <a href="<?=URLROOT;?>/student/class?t=c" class="card">
                        <span class="badge">Current Class</span>
                        <h3>Google UX Design</h3>
                        <p>google</p>
                    </a>
                    <a href="<?=URLROOT;?>/student/class?t=c" class="card">
                        <span class="badge">Current Class</span>
                        <h3>Google UX Design</h3>
                        <p>google</p>
                    </a>
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
            <label for="content7" class="head">
                General Notice
                <span class="material-symbols-outlined">
                    arrow_right
                </span>
            </label>
            <input checked type="checkbox" id="content7">
            <div class="content nom">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, harum ipsum itaque alias voluptate porro consequatur minima quae corporis sit magni quam ducimus rerum mollitia?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, harum ipsum itaque alias voluptate porro consequatur minima quae corporis sit magni quam ducimus rerum mollitia?
                </p>
            </div>
        </section>
    </main>
    <?php require_once APPROOT . "/views/student/inc/footer.php";?>