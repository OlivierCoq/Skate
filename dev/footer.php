<script src="dist/js/production.min.js"></script>
<!--Scroll to Top Link-->
<div id="scrollToTop" style="display: none;">
    <a href="#home" class="scroll"><button><i class="fas fa-chevron-up"></i></button></a>
</div>   
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

<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="cont-foot-copy">
                    <p>&copy; <?php $curYear = date('Y '); echo $curYear; ?> | WordPress Theme developed by <a href="https://www.oliviercoq.online"><strong>OlivierCoq.Online</strong></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


    </body>
</html>