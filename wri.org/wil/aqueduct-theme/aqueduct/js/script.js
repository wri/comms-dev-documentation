jQuery(function($) {

$(document).ready(function() {
  
  // set toggle to show/hide menu
  $('.aqueduct-responsive-menu').click(function(){
    $('.menu-block-24').toggle();
  });
  
  // run check on initial page load
  checkSize();

  // run check on resize of the window
  $(window).resize(checkSize);

});

//checks css media query to determine browser width (cross-platform/browser fix)

function checkSize(){

  if (jQuery(".aqueduct-responsive-menu").css("display") == "none" ){
    jQuery('.menu-block-24').show();
  }
  else {
    jQuery('.menu-block-24').hide();
  }
    
}
  
});

