<?php
$page = 'contact';
$styles = '<link rel="stylesheet" href="' . URLROOT . '/css/contact.css" />';
require_once APPROOT . "/views/inc/header.php";
?>
    <main>
        <div id="accord">
            <ul class="wrapper">
              <li>Home</li>
              <li>Contact us</li>
            </ul>
          </div>
          <section id="contact" class="wrapper">
            <h2>Contact <span>Us</span></h2>
            <p style="text-align: center;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ut, aperiam quaerat similique ipsam praesentium.</p>



            <div class="contact-agileinfo">
				<!-- contact address -->
				<div>
					<h3>Our Address</h3>
					<div>
                        <img src="./assets/c1.png" alt="" >
						<div>
							<h5>Address</h5>
							<p> California, USA</p>
						</div>
					</div>
					<div>
                        <img src="./assets/c2.png" alt="" >
						<div>
							<h5>Email</h5>
                            <a href="mailto:example@email.com"> mail@example.com</a>
						</div>
					</div>
					<div>
                        <img src="./assets/c3.png" alt="" >
						<div>
							<h5>Phone</h5>
							<p>+1 234 567 8901</p>
						</div>
					</div>
				</div>
				<!-- //contact address -->
				<!-- contact form -->
				<div class="contact-right">
					<form action="#" method="post">
						<div class="input-group">
							<div class="input">
								<input type="text" class="form-control" name="Name" placeholder="Name" required="">
							</div>
							<div class="input">
								<input type="email" class="form-control" name="Email" placeholder="Email" required="">
							</div>
						</div>
						<div class="input">
							<input type="text" class="form-control" name="Phone" placeholder="Phone" required="">
						</div>
						<div class="input">
							<textarea name="Message" class="form-control" 
                            rows="10"
                            placeholder="Message" required=""></textarea>
						</div>
						<input type="submit" value="Submit">
					</form>
				</div>
				<!-- contact form -->
			</div>
          </section>
    </main>
    
    <?php require_once APPROOT . "/views/inc/footer.php"; ?>
