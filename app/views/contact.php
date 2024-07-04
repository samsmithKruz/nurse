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
		<h2 style="line-height: 1; margin-bottom: .8rem;">Get in Touch with <br> <span>Foreign Nurse Global</span></h2>
		<p style="text-align: center;">We’re here to help you every step of the way on your journey to becoming a US Registered Nurse. Reach out to us through any of the following methods:</p>



		<div class="contact-agileinfo">
			<!-- contact address -->
			<div>
				<!-- <h3>Our Address</h3>
				<div>
					<img src="<?=URLROOT;?>/assets/c1.png" alt="">
					<div>
						<h5>Address</h5>
						<p> California, USA</p>
					</div>
				</div> -->
				<div>
					<img src="<?=URLROOT;?>/assets/c2.png" alt="">
					<div>
						<h5>Email</h5>
						<a href="mailto:<?=EMAIL;?>"> <?=EMAIL;?></a>
					</div>
				</div>
				<div>
					<img src="<?=URLROOT;?>/assets/c3.png" alt="">
					<div>
						<h5>Phone</h5>
						<p><?=NUMBER;?></p>
					</div>
				</div>
			</div>
			<!-- //contact address -->
			<!-- contact form -->
			<div class="contact-right">
				<form action="<?=URLROOT;?>/contact" method="post">
					<div class="input-group">
						<div class="input">
							<input type="text" class="form-control" name="name" placeholder="Name" required="">
						</div>
						<div class="input">
							<input type="email" class="form-control" name="email" placeholder="Email" required="">
						</div>
					</div>
					<div class="input">
						<input type="text" class="form-control" name="phone" placeholder="Phone" required="">
					</div>
					<div class="input">
						<textarea name="message" class="form-control" rows="10" placeholder="Message" required=""></textarea>
					</div>
					<input type="submit" name="q" value="Submit">
				</form>
			</div>
			<!-- contact form -->
		</div>
	</section>
</main>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>