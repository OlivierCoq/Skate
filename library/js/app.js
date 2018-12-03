$(document).ready(function(){
    
    
    /*Scrolling*/
      // Add smooth scrolling to specific links
     
 
        $('a').on('click', function(event) {
            
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                
                // Store hash
                var hash = this.hash;
                
                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function() {
                    
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
                return false;
            } // End if
        }); 

        /*Scroll to Top Button*/
    $(window).scroll(function(){
        if ($(window).scrollTop() > 450) {
            $("#scrollToTop").show();
        } else {
             $("#scrollToTop").hide();
        } 
    }); 
});      