	<!-- Page Title Section -->
	<section class="page-title" style="background-image: url(<?= $assets ?>/images/background/5.jpg)">
		<div class="auto-container">
			<div class="content">
				<div class="text">Welcome to Greenfield Executive Education</div>
				<h1>Nominate an Awardee</h1>
			</div>
			<div class="breadcrumb-outer">
				<ul class="page-breadcrumb">
					<li><a href="/">Home</a></li>
					<li>Nomination Form</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- End Page Title Section -->
	
	<!-- Nomination Form Section -->
	<section class="contact-form-section">
		<div class="auto-container">
			<div class="row clearfix">
			<h5><?= $SELF->Toast(); ?></h5>
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
							<img src="<?= $assets ?>/images/resource/contact-5.jpg" alt="">
						</div>
						<div class="image-two">
							<img src="<?= $assets ?>/images/resource/contact-4.jpg" alt="">
						</div>
					</div>
				</div>
				
				<!-- Form Column -->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<div class="title color-three">Nomination Form</div>
							<h2>Nominate Someone for An Award</h2>
						</div>
						
						<!-- Nomination Form -->
						<div class="contact-form">
							<form method="POST" action="/nomination_form">
								<div class="row clearfix">
								
									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<span class="icon flaticon-user-4"></span>
										<input type="text" name="fullName" placeholder="Enter Full Name" required="">
									</div>
									
									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<span class="icon flaticon-house"></span>
										<input type="text" name="company" placeholder="Enter Company Name" required="">
									</div>
								
                                <!-- Form Group -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <span class="icon flaticon-envelope"></span>
                                    <input type="email" name="email" placeholder="Enter Email Address" required="">
                                </div>
                                
                                <!-- Form Group -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <span class="icon flaticon-telephone"></span>
                                    <input type="text" name="phoneNumber" placeholder="Enter Phone Number" required="">
                                </div>
									
									<!-- Form Group -->
									<div class="form-group col-lg-12 col-md-12 col-sm-12">
										<span class="icon flaticon-pen"></span>
										<textarea name="message" placeholder="Reason for Nomination"></textarea>
									</div>
									
									<!-- Form Group -->
									<div class="form-group col-lg-12 col-md-12 col-sm-12">
										<button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Nominate</span></button>
									</div>
									
								</div>
							</form>
								
						</div>
						<!-- end Contact Form -->
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Contact Form Section -->