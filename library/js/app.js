$(document).ready(function(){
    
    
    /*Scrolling*/
      // Add smooth scrolling to specific links
     
    if ($('a').parent().hasClass('scroll')) {
        
        $('a').on('click', function(ev) {
          ev.preventDefault();
           
               var target = this.hash,
                   $target = $(target);
           
               $('html, body').animate({
                   'scrollTop': $target.offset().top/* -70 //minus height of the navbar*/
               }, 900); 
           });
           
    } else {
        $('a').unbind('click');
    } 
        /*Scroll to Top Button*/
    $(window).scroll(function(){
        if ($(window).scrollTop() > 450) {
            $("#scrollToTop").show();
        } else {
             $("#scrollToTop").hide();
        } 
    }); 
});     