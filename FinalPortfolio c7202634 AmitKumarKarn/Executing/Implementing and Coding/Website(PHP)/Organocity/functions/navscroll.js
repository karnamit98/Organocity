$(document).ready(function () {
  //z-indeces of navbar and search-box when they roll over each other
  $(".navbar").css("z-index", "10");
  $("body").css("z-index", "9");
  // $(".navbar").css("top", "40px");

  //when page reloads, the navbar goes on top even if the scroll bar is slided down
  if ($("body").scrollTop() > 20 || $("html").scrollTop() > 20) {
    $(".navbar").css("top", "0px");
  }
  $(window).scroll(function () {
    if ($("body").scrollTop() > 20 || $("html").scrollTop() > 20) {
      $(".navbar").css("top", "0px");
      $(".navbar").css("position", "fixed");
      $(".navbar").css("width", "100%");
      // $(".navbar").children().css("width", "100%");
    } else {
      $(".navbar").css("width", "100%");
      $(".navbar").css("position", "");
      $(".navbar").children().css("box-shadow", "0 0 0");
    }
  });
});
