  <?php
/**
 *Olivier here. Here's a typical footer.php file, written ...The way WordPress likes it, and from scratch.
 *
 */

?>


    <!--Includes Script-->
<?php wp_footer(); ?>

<!--Make sure this is underneath-->
<script>
    //Hamburger
	$("#nav-body").hide();	
	$(".nav-body-mob").hide();	
	function mobMenu(x) {
		x.classList.toggle("change");
        
		$("#nav-body").fadeToggle("fast");
		$(".nav-body-mob").fadeToggle("fast");
        
        $("a.scroll").on("click", function(event) {
            $(".nav-body-mob").fadeOut("fast");
            x.classList.remove("change");
        });
	}	
    
function charLimit(name)
{
    var max = 20;

    if(name.value.length > max) {
        name.value = name.value.substr(0, max);
    };
    
};       
    
</script>

    </body>
</html>