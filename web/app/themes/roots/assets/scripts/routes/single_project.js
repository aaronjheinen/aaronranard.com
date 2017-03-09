export default {
  init() { 
    /* Smooth Scroll */
    $('a[href*=#]').click(function() {
      //$('.sidebar-link').removeClass('current');
      //$('.headroom').addClass('headroom--noshow');
      //$(this).addClass('current');
      if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
        var $target = $(this.hash);
        $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
        if ($target.length) {
          var targetOffset = $target.offset().top - 168;
          // Account for direction of scrolling to allow scrolling past waypoint
          if($( window ).scrollTop() < $target.offset().top){
            targetOffset += 6;
          }
          var name = this.hash.slice(1);
          if(name === "overview"){
            targetOffset = 0;
          }
          $('html,body').animate({scrollTop: targetOffset}, 1000);
          return false;
        }
      }
    });
    /* Waypoints as scrolling */
    // $('.waypoint').waypoint(function(direction) {
    //   $('.sidebar-link').removeClass('current');
    //   $('#sidebar-link-' + $(this).attr('name')).addClass('current');
    // }, { offset: 165 });
  },
};
