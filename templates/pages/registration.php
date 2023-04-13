	<!-- Page Title Section -->
	<section class="page-title" style="background-image: url(<?= $assets ?>/images/background/5.jpg)">
		<div class="auto-container">
			<div class="content">
				<div class="text">Welcome to Greenfield Executive Education</div>
				<div class="text">Register for <?= $Registrations->evetTitle ?></div>
			</div>
			<div class="breadcrumb-outer">
				<ul class="page-breadcrumb">
					<li><a href="/">Home</a></li>
					<li>Registration</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- End Page Title Section -->

	<!-- Contact Form Section -->
	<section class="contact-form-section">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Image Column -->
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="">
						<ul class="">
							<li>
								<h6>Professionals: <?= $Registrations->professionalLevel ?></h6>
							</li>
							<li>
								<h6>Organisers: <?= $Registrations->eventOrganisers ?></h6>
							</li>
							<li>
								<h6>Fee: <?= $Registrations->eventFee ?></h6>
							</li>
						</ul>
					</div>
					<div>
						<img src="<?= $Registrations->flyer ?>" alt="">
					</div>
				</div>

				<!-- Form Column -->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">

					<div class="sec-title">
						<div class="title color-three">Fill out the form to Register</div>
						<h6>Register for <?= $Registrations->evetTitle ?> Here</h6>
					</div>

					<!-- Contact Form -->
					<div class="contact-form">
						<form method="POST" action="/event_registration">
							<div class="row clearfix">

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<input type="hidden" name="event_id" value="<?= $Registrations->id ?>">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-user-4"></span>
									<input type="text" name="sureName" placeholder="Enter Your Surename" required="">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-user-4"></span>
									<input type="text" name="otherNames" placeholder="Enter Your Other Name(s)" required="">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-envelope"></span>
									<input type="email" name="email" placeholder="Enter Your Email" required="">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-telephone"></span>
									<input type="text" name="mobileNumber" placeholder="Enter Your Phone Number" required="">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-home"></span>
									<input type="text" name="homeAddress" placeholder="What's Your Home Address" required="">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-user-2"></span>
									<input type="text" name="jobTitle" placeholder="What's Your Job Title" required="">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-business"></span>
									<input type="text" name="company" placeholder="Enter Your Company's name" required="">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-phone-call"></span>
									<input type="text" name="businessNumber" placeholder="Enter Your Business Phone Number" required="">
								</div>

								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<span class="icon flaticon-map"></span>
									<input type="text" name="country" placeholder="What Country are You From?" required="">
								</div>


								<!-- Form Group -->
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<button class="theme-btn btn-style-three" type="submit"><span class="txt">Register</span></button>
								</div>

							</div>
						</form>

					</div>
					<!-- eND Contact Form -->


				</div>

			</div>
		</div>
	</section>
	<!-- End Contact Form Section -->