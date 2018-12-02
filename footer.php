<?php
/**
 *Olivier here. Here's a typical footer.php file, written ...The way WordPress likes it, and from scratch.
 *
 */
?>


    <!--Includes Script-->
<?php wp_footer(); ?>

<!--Scroll to Top Link-->
<div id="scrollToTop" style="display: none;">
    <a href="#home" class="scroll"><button><i class="fas fa-chevron-up"></i></button></a>
</div>   

<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="cont-foot-copy">
                    <p>&copy; <?php $curYear = date('Y '); echo $curYear; ?> | WordPress Theme developed by <a href="https://www.oliviercoq.online"><strong>OlivierCoq.Online</strong></a></p>
                </div>
            </div>
            <div class="col-4">
                <nav class="foot-nav">
                    <?php 
                
                        $args = array(
                            'theme_location' => 'footer'
                        );
                
                    wp_nav_menu(  $args); 
                    ?>
                </nav>
            </div>
        </div>
    </div>
</footer>


    </body>
</html>