<?php
/*
 *
 * Hello, 24 Data. This is the main public-facing file, written from scratch!
 * 
 * @package SkillsTest
*/    
get_header(); ?>    
    
<!-- Icon and form-->
<div class="container" style="margin-bottom: 5%;">
    <div class="row">
        <!--Icon-->
        <div class="col-md-8">
            <div class="img-cont">
                <img src="<?php bloginfo('template_url'); ?>/dist/IMG/FrontEndSkillsTestIconCompress.jpg" alt="Front End Skills Test Icon" style="width: 100%;">
            </div>
            <h1 class="center">This Icon Has Been Minified.</h1>
        </div>
        <!--Form-->
        <div class="col-md-4">
            <h1 class="center">This is the Form</h1><br>
            
<!--This is the form-->                    
<form class="form-horizontal" id="skillsForm" name="skillsForm" method="POST">
							
    <div class="form-input-cont">
	   <div class="row">							
		  <div class="col-md-12">
			 <input type="text" class="form-control" id="first" name="first" placeholder="Your First Name*" onkeydown="charLimit(this);" onkeyup="charLimit(this);">
			 <p id="data-vdtn-first" style="display: none;">Please enter your first name (no numbers or symbols). Maximum 20 characters.</p>
           </div>
        </div>
    </div>
    
    <div class="form-input-cont">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" id="last" name="last" placeholder="Your Last Name*" onkeydown="charLimit(this);" onkeyup="charLimit(this);">
                <p id="data-vdtn-last" style="display: none;">*Please enter your last name (no numbers or symbols). Maximum 20 characters.</p>
            </div>
        </div>
    </div>
    
    <div class="form-input-cont">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Your Zip Code*" onkeydown="zipLimit(this);" onkeyup="zipLimit(this);">
                <p id="data-vdtn-zip" style="display: none;">*Please enter a valid zip code.</p>
            </div>
        </div>
    </div>
    
    <div class="form-input-cont">
        <div class="row">
            <div class="col-md-12">
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Contact Phone*">
                <p id="data-vdtn-phone" style="display: none;">*Please enter your full phone number.</p>
            </div>
        </div>
    </div>
    
    <div class="form-input-cont">
        <div class="row">
            <div class="col-md-12">
                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email*">
                <p id="data-vdtn-email" style="display: none;">*Your email is missing an "@". Please enter your email in the proper email@domain format.</p>
            </div>
        </div>
    </div>
							
    <div class="form-input-cont">
        <div class="row">
            <div class="col-md-12">
                <label class="custom-label">
                    <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
                    <p class="custom-label-text">I hereby consent to receive emails, text messages and other electronic communications at the telephone and email listed above.</p>
                </label>  
                <p id="data-vdtn-checkbox" style="display: none;">*This is required.</p>
            </div>          
        </div>
    </div>
			
    
    <div class="form-input-cont">
	   <div class="row">
            <!--Submit and Reset-->
            <div class="col-md-12" align="center">
                <input class="btn btn-custom" align="center" name="sub-btn" id="sub-btn" type="submit" >
                <!--value="Submit" onclick="return false; return submitValid();"-->
            </div>
        </div>		
    </div>		
    
    <div class="form-input-cont">
	   <div class="row">
            <!--Success-->
            <div class="col-md-12" align="center">
                <p id="data-vdtn-success" style="display: none;">Welcome! We're so happy to have you! Check your inbox; you should expect a message from us soon. </p>
                <p id="data-vdtn-error" style="display: none;">Oops. There's been a processing error. Please refresh page and try again.</p>
            </div>
        </div>		
    </div>  
        
</form>  
            
            
            
        </div>
    </div>
</div>        
<?php
get_footer();
?>    