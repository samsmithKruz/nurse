<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
    <link rel="stylesheet" href="' . URLROOT . '/css/question_take.css" />
    <link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css" />
';
require_once APPROOT . "/views/admin/inc/header.php";
?>
<main>
  <section class="wrapper test">
    <div class="test-head">
      <h3>Test on Bladder</h3>
      <div class="time">
        <span class="icon">
          <img src="../assets/timer.svg" alt="">
        </span>
        <span class="time">00:00:00</span>
        <span>minutes</span>
      </div>
    </div>
    <div class="questions">
      <div class="question">
        <h4>Question <span>1 of 5</span></h4>
        <p class="q">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores ipsam, reprehenderit, minima voluptatem iste fugit placeat magni doloremque dolore consequatur sint corrupti ullam enim praesentium odit voluptates quisquam. Laudantium eveniet numquam, delectus exercitationem magnam maxime id quasi obcaecati repellendus eos accusantium. Libero repellendus perspiciatis nesciunt explicabo omnis minima aliquid doloremque.?
        </p>
        <div class="options">
          <div class="input">
            <input type="radio" id="q1_opt1" name="q1" value="1" id="">
            <label for="q1_opt1">
              <div class="material-symbols-outlined">circle</div>
              Option 1
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt2" name="q1" value="1" id="">
            <label for="q1_opt2">
              <div class="material-symbols-outlined">circle</div>
              Option 2
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt3" name="q1" value="1" id="">
            <label for="q1_opt3">
              <div class="material-symbols-outlined">circle</div>
              Option 3
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt4" name="q1" value="1" id="">
            <label for="q1_opt4">
              <div class="material-symbols-outlined">circle</div>
              Option 4
            </label>
          </div>
        </div>
      </div>
      <div class="question">
        <h4>Question <span>2 of 5</span></h4>
        <p class="q">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores ipsam, reprehenderit, minima voluptatem iste fugit placeat magni doloremque dolore consequatur sint corrupti ullam enim praesentium odit voluptates quisquam. Laudantium eveniet numquam, delectus exercitationem magnam maxime id quasi obcaecati repellendus eos accusantium. Libero repellendus perspiciatis nesciunt explicabo omnis minima aliquid doloremque.?
        </p>
        <div class="options">
          <div class="input">
            <input type="radio" id="q2_opt1" name="q2" value="1" id="">
            <label for="q2_opt1">
              <div class="material-symbols-outlined">circle</div>
              Option 1
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q2_opt2" name="q2" value="1" id="">
            <label for="q2_opt2">
              <div class="material-symbols-outlined">circle</div>
              Option 2
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q2_opt3" name="q2" value="1" id="">
            <label for="q2_opt3">
              <div class="material-symbols-outlined">circle</div>
              Option 3
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q2_opt4" name="q2" value="1" id="">
            <label for="q2_opt4">
              <div class="material-symbols-outlined">circle</div>
              Option 4
            </label>
          </div>
        </div>
      </div>
      <div class="question">
        <h4>Question <span>3 of 5</span></h4>
        <p class="q">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores ipsam, reprehenderit, minima voluptatem iste fugit placeat magni doloremque dolore consequatur sint corrupti ullam enim praesentium odit voluptates quisquam. Laudantium eveniet numquam, delectus exercitationem magnam maxime id quasi obcaecati repellendus eos accusantium. Libero repellendus perspiciatis nesciunt explicabo omnis minima aliquid doloremque.?
        </p>
        <div class="options">
          <div class="input">
            <input type="radio" id="q1_opt1" name="q1" value="1" id="">
            <label for="q1_opt1">
              <div class="material-symbols-outlined">circle</div>
              Option 1
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt2" name="q1" value="1" id="">
            <label for="q1_opt2">
              <div class="material-symbols-outlined">circle</div>
              Option 2
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt3" name="q1" value="1" id="">
            <label for="q1_opt3">
              <div class="material-symbols-outlined">circle</div>
              Option 3
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt4" name="q1" value="1" id="">
            <label for="q1_opt4">
              <div class="material-symbols-outlined">circle</div>
              Option 4
            </label>
          </div>
        </div>
      </div>
      <div class="question">
        <h4>Question <span>4 of 5</span></h4>
        <p class="q">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores ipsam, reprehenderit, minima voluptatem iste fugit placeat magni doloremque dolore consequatur sint corrupti ullam enim praesentium odit voluptates quisquam. Laudantium eveniet numquam, delectus exercitationem magnam maxime id quasi obcaecati repellendus eos accusantium. Libero repellendus perspiciatis nesciunt explicabo omnis minima aliquid doloremque.?
        </p>
        <div class="options">
          <div class="input">
            <input type="radio" id="q1_opt1" name="q1" value="1" id="">
            <label for="q1_opt1">
              <div class="material-symbols-outlined">circle</div>
              Option 1
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt2" name="q1" value="1" id="">
            <label for="q1_opt2">
              <div class="material-symbols-outlined">circle</div>
              Option 2
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt3" name="q1" value="1" id="">
            <label for="q1_opt3">
              <div class="material-symbols-outlined">circle</div>
              Option 3
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt4" name="q1" value="1" id="">
            <label for="q1_opt4">
              <div class="material-symbols-outlined">circle</div>
              Option 4
            </label>
          </div>
        </div>
      </div>
      <div class="question">
        <h4>Question <span>5 of 5</span></h4>
        <p class="q">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores ipsam, reprehenderit, minima voluptatem iste fugit placeat magni doloremque dolore consequatur sint corrupti ullam enim praesentium odit voluptates quisquam. Laudantium eveniet numquam, delectus exercitationem magnam maxime id quasi obcaecati repellendus eos accusantium. Libero repellendus perspiciatis nesciunt explicabo omnis minima aliquid doloremque.?
        </p>
        <div class="options">
          <div class="input">
            <input type="radio" id="q1_opt1" name="q1" value="1" id="">
            <label for="q1_opt1">
              <div class="material-symbols-outlined">circle</div>
              Option 1
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt2" name="q1" value="1" id="">
            <label for="q1_opt2">
              <div class="material-symbols-outlined">circle</div>
              Option 2
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt3" name="q1" value="1" id="">
            <label for="q1_opt3">
              <div class="material-symbols-outlined">circle</div>
              Option 3
            </label>
          </div>
          <div class="input">
            <input type="radio" id="q1_opt4" name="q1" value="1" id="">
            <label for="q1_opt4">
              <div class="material-symbols-outlined">circle</div>
              Option 4
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="btn-group">
      <a href="javascript:history.back()" class="btn primary">Continue</a>
    </div>
  </section>
</main>
<?php
require_once APPROOT . "/views/admin/inc/footer.php";
?>