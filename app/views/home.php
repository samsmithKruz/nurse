<?php
$page = 'index';
$styles = '<link rel="stylesheet" href="' . URLROOT . '/css/index.css" />';
require_once APPROOT . "/views/inc/header.php";
?>
<!-- FOREIGN NURSE GLOBAL (FNG) -->
<main>
  <section class="hero">
    <div class="slides">
      <div class="slide">
        <div class="wrapper">
          <div class="text">
            <h5>Making Your US Nursing Dream Possible</h5>
            <h1>Transforming Nursing Careers Globally</h1>
            <p>
              FNG understands the challenges and provides personalized mentoring for a smooth transition to US healthcare.
            </p>
            <div class="btn-group">
              <a href="<?= URLROOT; ?>/signup" class="btn primary">Register Now</a>
              <a href="<?= URLROOT; ?>/contact" class="btn red">Contact us</a>
            </div>
          </div>
        </div>
      </div>
      <div class="slide" style="--image: url('../assets/bg-2.png')">
        <div class="wrapper">
          <div class="text">
            <h5>Expert Guidance for International Nurses</h5>
            <h1>Seamless Transition to US Nursing</h1>
            <p>
              With FNG, navigate credentialing and licensure with confidence. Achieve your professional goals effortlessly.
            </p>
            <div class="btn-group">
              <a href="<?= URLROOT; ?>/signup" class="btn primary">Register Now</a>
              <a href="<?= URLROOT; ?>/contact" class="btn red">Contact us</a>
            </div>
          </div>
        </div>
      </div>
      <div class="slide" style="--image: url('../assets/bg-3.png')">
        <div class="wrapper">
          <div class="text">
            <h5>From Aspiration to Reality</h5>
            <h1>Guiding You Every Step of the Way</h1>
            <p>
              FNG offers comprehensive services, from credential evaluation to visa application, ensuring a smooth journey
            </p>
            <div class="btn-group">
              <a href="<?= URLROOT; ?>/signup" class="btn primary">Register Now</a>
              <a href="<?= URLROOT; ?>/contact" class="btn red">Contact us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <span class="material-symbols-outlined">arrow_left_alt</span>
    <span href="#" class="material-symbols-outlined right">arrow_right_alt</span>
  </section>
  <section id="about" class="wrapper">
    <img src="./assets/about.png" alt="" />
    <div class="content">
      <h5 class="_">About Us</h5>
      <h3 class="_">Foreign Nurse Global (FNG)</h3>
      <p class="_">
        At <b>Foreign Nurse Global (FNG)</b>, we are dedicated to helping internationally trained nurses achieve their dreams of practicing in the US. Recognizing the complexities and challenges of the credentialing and licensure process, we provide comprehensive support and personalized mentoring to make this journey as smooth and hassle-free as possible.
      </p>
      <p class="_">
        Our experienced team of USRNs is committed to guiding you through every step, from credential evaluation to NCLEX preparation and visa application, ensuring you have all the resources and assistance needed to succeed in the US healthcare system.
      </p>
      <div class="btn-group">
        <a href="<?= URLROOT; ?>/more" class="btn primary">Read more</a>
        <a href="<?=NUMBER_;?>" class="btn">
          <svg viewBox="0 0 41.32 41.32" width="94px" height="180px">
            <path class="fil0" d="M15.7 11.92l0.54 -0.54c0.55,-0.6 0.8,-1.1 0.77,-1.49 -0.03,-0.39 -0.35,-0.88 -0.94,-1.48l-6.95 -7.03c-0.77,-0.78 -1.31,-1.2 -1.62,-1.26 -0.41,-0.12 -0.98,0.18 -1.7,0.9l-0.54 0.45 10.44 10.45zm-1.16 0.99l-10.19 -10.18c-1.32,1.81 -2.34,3.6 -3.06,5.4 -1.14,2.77 -1.29,5.08 -0.45,6.94 0.54,1.2 1.05,2.19 1.54,2.98 0.29,0.48 0.77,1.11 1.43,1.89 0.66,0.78 1.2,1.47 1.62,2.07 3.49,3.96 8.11,8.61 13.88,13.96 0.6,0.48 1.29,1.06 2.07,1.76 0.78,0.69 1.41,1.18 1.89,1.48 0.78,0.48 1.74,0.96 2.88,1.44 1.81,0.67 4.11,0.46 6.94,-0.63 1.8,-0.72 3.63,-1.71 5.49,-2.97l-10.09 -10.18 -2.79 3.69c-0.36,0.55 -0.96,0.61 -1.8,0.19 -0.78,-0.3 -1.56,-0.84 -2.34,-1.62l-1.89 -1.99c-3.9,-3.9 -6.34,-6.39 -7.3,-7.48 -0.78,-0.77 -1.35,-1.53 -1.71,-2.24 -0.36,-0.91 -0.3,-1.54 0.18,-1.9l3.7 -2.61zm25.39 23.15l0.46 -0.45c0.66,-0.66 0.93,-1.23 0.8,-1.71 -0.11,-0.3 -0.57,-0.81 -1.34,-1.53l-6.94 -6.94c-0.66,-0.6 -1.17,-0.93 -1.53,-0.99 -0.36,-0.06 -0.84,0.18 -1.45,0.72l-0.44 0.45 10.44 10.45z" />
          </svg>
          <?=NUMBER;?>
        </a>
      </div>
      <div class="sec">
        <div>
          <span class="icon">
            <svg width="71px" height="79px" viewBox="0 0 4270.76 4791.72">
              <path d="M801.89 4261l3468.87 0 0 530.72 -3468.87 0c-222.27,0 -411.6,-78.2 -568.07,-233.82 -155.62,-156.47 -233.82,-342.24 -233.82,-557.38l0 -3209.33c0,-215.13 78.2,-400.9 233.82,-557.37 156.47,-155.62 345.8,-233.82 568.07,-233.82l3468.87 0 0 3729.35 -3468.87 0c-76.49,0 -140.51,25.81 -192.9,78.27 -51.61,51.54 -78.27,114.63 -78.27,187.56 0,72.92 26.66,135.15 78.27,187.62 52.39,51.54 116.41,78.2 192.9,78.2zm531.64 -927.21l0 -2938.23c0,-34.64 -12.47,-65.72 -36.5,-93.31 -24.88,-28.44 -55.96,-41.77 -94.24,-41.77 -38.2,0 -69.36,13.33 -93.31,41.77 -24.88,27.59 -36.5,58.67 -36.5,93.31l0 2938.23c0,34.65 11.62,64.02 36.5,87.97 23.95,24.88 55.11,36.5 93.31,36.5 38.28,0 69.36,-11.62 94.24,-36.5 24.03,-23.95 36.5,-53.32 36.5,-87.97z" />
            </svg>
          </span>
          <span class="text">Lectures</span>
        </div>
        <div>
          <span class="icon">
            <svg width="88px" height="71px" viewBox="0 0 14.65 11.73">
              <path d="M7.33 5.87l-5.47 -2.18 0.34 8.04 -1.46 0 0.35 -8.36 -1.09 -0.42 7.33 -2.95 7.32 2.95 -7.32 2.92zm0 -3.67c-0.21,0 -0.39,0.04 -0.53,0.1 -0.15,0.07 -0.22,0.16 -0.22,0.26 0,0.1 0.07,0.2 0.22,0.27 0.14,0.08 0.32,0.12 0.53,0.12 0.21,0 0.38,-0.04 0.53,-0.12 0.14,-0.07 0.21,-0.17 0.21,-0.27 0,-0.1 -0.07,-0.19 -0.21,-0.26 -0.15,-0.06 -0.32,-0.1 -0.53,-0.1zm0 4.41l4.09 -1.63c0.53,0.72 0.86,1.53 0.97,2.4 -0.25,-0.04 -0.47,-0.05 -0.66,-0.05 -0.93,0 -1.79,0.22 -2.56,0.68 -0.77,0.46 -1.39,1.06 -1.84,1.8 -0.46,-0.74 -1.08,-1.34 -1.85,-1.8 -0.77,-0.46 -1.63,-0.68 -2.56,-0.68 -0.19,0 -0.41,0.01 -0.66,0.05 0.12,-0.87 0.44,-1.68 0.97,-2.4l4.1 1.63z" />
            </svg>
          </span>
          <span class="text">Lectures</span>
        </div>
        <div>
          <span class="icon">
            <svg width="69px" height="69px" viewBox="0 0 4.54 4.54">
              <path d="M2.27 0c-0.41,0 -0.79,0.1 -1.14,0.3 -0.35,0.21 -0.62,0.48 -0.83,0.83 -0.2,0.35 -0.3,0.73 -0.3,1.14 0,0.42 0.1,0.8 0.3,1.14 0.21,0.35 0.48,0.62 0.83,0.83 0.35,0.2 0.73,0.3 1.14,0.3 0.42,0 0.8,-0.1 1.14,-0.3 0.35,-0.21 0.62,-0.48 0.83,-0.83 0.2,-0.34 0.3,-0.72 0.3,-1.13 0,-0.41 -0.1,-0.79 -0.31,-1.15 -0.21,-0.35 -0.48,-0.62 -0.83,-0.83 -0.35,-0.2 -0.72,-0.3 -1.13,-0.3zm-0.58 3.39l0 -2.24 1.69 1.11 -1.69 1.13z" />
            </svg>
          </span>
          <span class="text">Lectures</span>
        </div>
      </div>
    </div>
  </section>
  <section id="ads">
    <div class="wrapper">
      <div class="content">
        <h5 class="_">Registration is Open</h5>
        <h3 class="_">NCLEX ONLINE CLASS (June/July)</h3>
        <p class="_">
          Secure your spot in our upcoming NCLEX online class for June/July! Join Foreign Nurse Global's expert-led sessions to enhance your preparation and increase your chances of success. Don't miss this opportunity to achieve your dream of becoming a USRN with our comprehensive and supportive training program. Register now and take the next step in your nursing career!
        </p>
        <a href="<?= URLROOT; ?>/signup" class="btn primary">Register</a>
      </div>
      <img src="<?= URLROOT; ?>/assets/flyer.png" alt="" />
    </div>
  </section>
  <section id="services">
    <div class="wrapper">
      <h5 class="_">Our Services</h5>
      <p class="_">
        At Foreign Nurse Global (FNG), we offer a comprehensive range of services designed to support internationally trained nurses in their journey to becoming US Registered Nurses. Our services include:
      </p>
      <p class="_">
        <b>NCLEX PREPARATION: </b>
        Access to extensive resources and expert guidance to help you prepare effectively for the NCLEX exam.
      </p>
      <p class="_">
        <b>MENTORING AND GUIDANCE: </b>
        From the initial stages to becoming a USRN, our experienced team provides personalized mentoring and support to navigate every challenge.
      </p>
      <p class="_">
        <b>INTERNATION PAYMENT SUPPORT: </b>
        Facilitation of international and dollar transactions to simplify the financial aspects of your journey.
      </p>
      <h4>Payment Guide</h4>
      <p class="_">
      To complete your registration, payments are processed manually. Please follow the steps below:
      </p>
      <div class="boxes">
        <div class="box">
          <h5>Step 1.</h5>
          <p>Register and create an account.</p>
        </div>
        <div class="box">
          <h5>Step 2.</h5>
          <p>Make the appropriate payment regarding the selected program and class.</p>
        </div>
        <div class="box">
          <h5>Step 3.</h5>
          <p>Send a proof/evidence of payment to <?=EMAIL;?> and wait upon confirmation.</p>
        </div>
        <div class="box">
          <h5>Step 4.</h5>
          <p>After successful confirmation you'll be granted access to your student portal.</p>
        </div>
      </div>
      <p class="_">
      We kindly ask for your patience as we confirm your payment. This process ensures accuracy and security for all transactions. You will receive a confirmation email once your payment has been verified. Thank you for your understanding and cooperation.
      </p>
      
    </div>
  </section>
  <section id="testimonials">
    <div>
      <h4>30+</h4>
      <p>Registered Students</p>
    </div>
    <div>
      <h4>95%</h4>
      <p>NCLEX Pass Rate</p>
    </div>
    <div>
      <h4>100+</h4>
      <p>Study Materials</p>
    </div>
  </section>
  <div id="consult">
    <h4>Consult Us Today</h4>
    <div class="btn-group">
      <a href="<?=URLROOT;?>/signup" class="btn primary">Get Started</a>
      <a href="<?=URLROOT;?>/contact" class="btn red">Contact Us</a>
    </div>
  </div>
</main>
<?php require_once APPROOT . "/views/inc/footer.php"; ?>