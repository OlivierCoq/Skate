<?php
/* 
 * Template Name: Junior Skaters
*/  
?>     
<?php get_header(); ?>   
<!--include "dev/header.php"; ?> -->


<section id="juniors">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm-12 col-md-6">
                <div id="junior-graphic">
                    <div class="copy mx-auto">
                        <h1>Our Juniors Don't Mess Around</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="cont-copy mx-auto">
                    <h1>Wanna Join?</h1>
                    <p>Get your little one skatin'.</p>
                </div>
                <div class="cont-form mx-auto">
                    
                    <!--Sign-Up Form-->
                    <form id="signUp" name="signUp" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <input name="first" id="first" type="text" placeholder="Timmy">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <input name="last" id="last" type="text" placeholder="Smith">
                                </div>
                            </div>
                        </div>
                                                
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 col-md-8">
                                    <input name="email" id="email" type="email" placeholder="youremail@example.com">
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" id="birthday" name="birthday" placeholder="Birthday (mm-dd-yyyy)">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="phone" id="phone" placeholder="(123) 456-7890">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="lessCheck" name="lessCheck">
                                        <label class="custom-control-label" for="lessCheck">Skating Lessons?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" id="signUpSubmit" class="mx-auto d-block" value="Let's Go!">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Footer-->
<?php
get_footer();
?>      
