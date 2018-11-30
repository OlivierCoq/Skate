<?php
/**
 * * 
 * @package Skate-Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"><!--Mobile-->
	<?php wp_head(); ?>    
<!--Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<!--Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Istok+Web|Montserrat" rel="stylesheet">
	
		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries. Just in case. -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->	 
</head>
<body <?php body_class(); ?>>
  
<!--Navigation-->
<div id="mainNav">    
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="icon">

                </div>
            </div>
            <div class="col-6 mob-body">
                <div id="nav-menu">
                    <div class="hamburger" onclick="mobMenu(this)">
                        <div class="bar1"></div>
  		                <div class="bar2"></div>
  		                <div class="bar3"></div>
                    </div>
                </div>
                <div id="nav-body" style="display:none;">
                    <ul>
                        <li><a href="#home" class="scroll"><strong>Home</strong></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="nav-body-mob">
                    <ul>
                        <li><a href="#home" class="scroll"><strong>Home</strong></a></li>
                    </ul>
                </div>                
            </div>
        </div>    
    </div>
</div>    
    