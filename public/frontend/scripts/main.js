$(document).ready( function () {

  // DataTable
  $('.dataTable').DataTable();

  // xZoom
  $('.xzoom, .xzoom-gallery').xzoom({
    zoomwidth: 500,
    title: false,
    tint: '#333',
    xoffest: 15,
  });

} );

// Animate on Scroll
AOS.init();

// ztext
var ztxt = new Ztextify(".ztext", {
  depth: "20px",
  layers: 10,
  fade: true,
  direction: "forwards",
  event: "pointer",
  eventRotation: "20deg"
});