<?php
$styles = '
<link rel="stylesheet" href="' . URLROOT . '/css/index-admin.css">
<link rel="stylesheet" href="' . URLROOT . '/css/class.css">
<link rel="stylesheet" href="' . URLROOT . '/css/question_take.css">
<link rel="stylesheet" href="' . URLROOT . '/css/student_overview.css">
';
require_once APPROOT . "/views/student/inc/header.php";
?>
<main>
  <section class="wrapper test">
    <div class="test-head">
      <h3>Test on Bladder</h3>
      <div class="time">
        <span class="icon">
          <img src="<?=URLROOT;?>/assets/timer.svg" alt="">
        </span>
        <span class="time">00:00:00</span>
      </div>
    </div>
    <form action="<?=URLROOT;?>/student/test_submit" style="padding: 0;">
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
        <input type="submit" style="width: fit-content;" value="Submit" class="btn primary">
      </div>
    </form>
  </section>
</main>
<script>
  let time_ = document.querySelector(".time span.time")
let startTimer = () => {
    let duration = <?=$timer;?> * 60;
    let timer = duration, hours, minutes, seconds;
    let countdown = setInterval(() => {
        hours = parseInt(timer / 3600, 10);
        minutes = parseInt((timer % 3600) / 60, 10);
        seconds = parseInt((timer % 60), 10);

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        time_.textContent = `${hours}:${minutes}:${seconds}`;
        if(--timer<0){
            clearInterval(countdown);
            document.querySelector("input[type=submit]").click();
        }
    }, 1000);
}
startTimer()
</script>
<?php require_once APPROOT . "/views/student/inc/footer.php"; ?>