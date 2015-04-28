jQuery(document).ready(function($) {

  'use strict';

/*==========================================================*/
/* Preloader
/*==========================================================*/

  $(window).on('load', function(){
    $('#status').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
  });

  $(".menu-toggle").click(function(){
    $(".responsive-nav").slideToggle("slow");
  });

  $("ul.sf-menu").superfish({
    delay:       500,                            // one second delay on mouseout
    animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
    speed:       'fast',                          // faster animation speed
    autoArrows:  true,                           // disable generation of arrow mark-up
    dropShadows: false,                            // disable drop shadows
    disableHI:   true                         // set to true to disable hoverIntent detection
  });

/*==========================================================*/
/* Collapsible sidebar
/*==========================================================*/

  $('#sidebar-button, #overlay').click(function() {
    $('.portfolio-full').removeClass('portfolio-open');
    $('#top').removeClass('portfolio-open');
    $('#sidebar-button').toggleClass('open');
    $('body').toggleClass('sidebar-open');
    return false;
  });

/*==========================================================*/
/* Main menu
/*==========================================================*/

  $('#mainmenu ul > li:has(ul)').each(function() {
    $(this).addClass('expandable');
  });

  $('#mainmenu ul > li:has(ul) > a').click(function() {
    $(this).parent('li').toggleClass('expanded');
    $(this).parent('li').children('ul').slideToggle();
    return false;
  });

});
