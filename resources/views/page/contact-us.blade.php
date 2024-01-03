@extends('layouts.app')
@section('content')
<!-- Titlebar -->
<x-breadcrumb></x-breadcrumb>

 <!-- Content --> 
 <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="utf-contact-location-info-aera margin-bottom-50">
          <div id="utf-single-job-map-container-item">
            <div id="singleListingMap" data-latitude="48.8566" data-longitude="2.3522" data-map-icon="im im-icon-Hamburger"></div>
          </div>
        </div>
      </div>      
	  <div class="col-xl-4 col-lg-4">
		<div class="utf-boxed-list-headline-item margin-bottom-35">
            <h3><i class="icon-feather-map-pin"></i> Office Address</h3>
        </div>
		<div class="utf-contact-location-info-aera margin-bottom-50">
			<div class="contact-address">
				<ul>
				  <li><strong>Phone:-</strong> (+91) 8750 299 299</li>
				  <li><strong>Website:-</strong> <a href="{{ url('/')}}">www.naukriskills.com</a></li>
				  <li><strong>E-Mail:-</strong> <a href="#">info@naukriskills.com</a></li>              
				  <li><strong>Address:-</strong> Noida, Uttar Pradesh, India 201301.</li>
				</ul>
			</div>
		</div>		
	  </div>
	  <div class="col-xl-8 col-lg-8">
        <section id="contact" class="margin-bottom-50">
          <div class="utf-boxed-list-headline-item margin-bottom-35">
            <h3><i class="icon-material-outline-description"></i> Contact Form</h3>
          </div>
		  <div class="utf-contact-form-item">
			  <form method="post" name="contactform" id="contactform">
				<div class="row">
				  <div class="col-md-6">
					<div class="utf-no-border">
					  <input class="utf-with-border" name="name" type="text" id="firstname" placeholder="Frist Name" required />
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="utf-no-border">
					  <input class="utf-with-border" name="name" type="text" id="lastname" placeholder="Last Name" required />
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="utf-no-border">
					  <input class="utf-with-border" name="email" type="email" id="email" placeholder="Email Address" required />
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="utf-no-border">
					  <input class="utf-with-border" name="subject" type="text" id="subject" placeholder="Subject" required />
					</div>
				  </div>
				</div>
				<div>
				  <textarea class="utf-with-border" name="comments" cols="40" rows="3" id="comments" placeholder="Message..." required></textarea>
				</div>
				<div class="utf-centered-button margin-top-10">
					<input type="submit" class="submit button" id="submit" value="Submit Message" />
				</div>
			  </form>
		  </div>
        </section>
      </div>
    </div>
  </div>
  <!-- Container / End --> 
@endsection