        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Join Now For Doctor/</h1>
                        <p>Here you can Registration for Join with Us</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us -->
        <div class="contact-us-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-7 contact-form wow fadeInLeft">
	                    

<script type="text/javascript" src="assets/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js" ></script>
<script type="text/javascript" src="assets/js/jquery.form.js"></script>

<script type="text/javascript">
$(function() {
$("#btn").click(function() {
    
				$("#regform").ajaxForm({
						target: '#show'
					}).submit();
                                        
});
});
</script>
						<h1>Doctor Registration Form</h1>
						<p><div id="show"></div>
	                    </p>
	                    <form role="form" action="Doctorregister.php" method="post" enctype="multipart/form-data" id="regform">
						<input type="hidden" value="saverec" name="saverec">
	                    	<div class="form-group">
	                    		<label for="contact-name">Doctor Name</label>
	                        	<input type="text" name="HHN" class="contact-name" id="contact-name">
	                        </div>
	                    	<div class="form-group">
	                    		<label for="contact-email">Hospital Name</label>
	                        	<input type="text" name="HN"  class="contact-email" id="contact-email">
	                        </div>
	                        <div class="form-group">
	                        	<label for="contact-subject">Hospital Email</label>
	                        	<input type="text" name="HUN"  class="contact-subject" id="contact-subject">
	                        </div>
							<div class="form-group">
	                        	<label for="contact-subject">Password</label>
	                        	<input type="Password" name="PASS" class="contact-subject" id="contact-subject">
	                        </div>
							<div class="form-group">
	                        	<label for="contact-subject">Re-Type Password</label>
	                        	<input type="Password" name="RTPASS" class="contact-subject" id="contact-subject">
	                        </div>

                        <div class="form-group">
	                        	<label for="contact-subject">Hospital Speciality(Eg. Cancer,Skin...)</label><br>
	                        	<Textarea name="HSPE" class="contact-subject" id="contact-subject"></Textarea>
	                        </div>

	                        <div class="form-group">
	                        	<label for="contact-subject">Hospital Contact No</label>
	                        	<input type="text" name="HCN"  class="contact-subject" id="contact-subject">
	                        </div>

	                        <div class="form-group">
	                        	<label for="contact-message">Address</label>
	                        	<textarea name="Address" placeholder="" class="contact-message" id="contact-message"></textarea>
	                        </div>

							<div class="form-group">
	                        	<label for="contact-subject">Upload Front Photo</label>
	                        	<input type="file" name="filename" class="contact-subject" id="contact-subject">
	                        </div>

							<div class="form-group">
	                        	<label for="contact-subject">Upload License Photo</label>
	                        	<input type="file" name="filenameL" class="contact-subject" id="contact-subject">
	                        </div>
							
	                        <button type="button" class="btn" id="btn">Register</button>
	                    </form>
	                </div>

	            </div>
	        </div>
        </div>