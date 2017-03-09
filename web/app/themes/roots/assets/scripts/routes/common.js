// this attaches `Waypoint` to window
require('waypoints/lib/noframework.waypoints.js');

export default {
  init() {
    // JavaScript to be fired on all pages
    new window.Waypoint({
      element: document.getElementById('content'),
      handler: function(direction) { 
        if (direction === "down") {
          $(".navbar").addClass("shadow");
        } else {
          $(".navbar").removeClass("shadow");
        }
      },
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
