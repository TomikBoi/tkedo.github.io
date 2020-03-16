// Sortable function from jQuery UI
window.onload = function() {
  $("#sorting").sortable({
    axis: "y",
  });
};
//Max character countdown (little extra)
$(function() {
  $("#countDown").keyup(function(){
    var remaining = 50 - $(this).val().length;
    $("#count2").text(remaining);

    if (remaining > 0) {
      $("#count2").css("color","grey");
    } else {
      $("#count2").css("color","red");
    }

  })
})
//Hello World, or...
console.log("Hello Ed! No errors here!")