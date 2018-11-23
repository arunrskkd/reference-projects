
// mobile menu
jQuery(document).ready(function () {
    


    jQuery('.navicon').on('click', function(e) {
        jQuery('body').toggleClass('open-menu');
        e.preventDefault();
    
    });
    jQuery(' .main-navigation .header-menu').prepend('<i class="fas fa-times close"></i>');

    jQuery('.close').on('click', function(e) {
        jQuery('body').removeClass('open-menu');
        e.preventDefault();
    
    });

   

    

});

function bindMenuHover(){

     var w = jQuery(window).width();
        if(w > 1024) {
       jQuery("nav li").hover(function (){
        
        jQuery(this).children(".sub-menu").stop(true,true).slideDown("slow");
        
        },function (){
        
        jQuery(this).children(".sub-menu").slideUp("slow");
        
        }
        );

     }else{
           jQuery("nav li").unbind('mouseenter mouseleave')
     }
     
  }

jQuery(document).ready(function () {
    bindMenuHover();
  
     
    jQuery('.scroll-down').click(function() {
    event.preventDefault();
            jQuery('html,body').animate({
                scrollTop: jQuery('#block-2').offset().top - 0},
            1000);
    });



});

jQuery( window ).resize(function() {
bindMenuHover();

});



