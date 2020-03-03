$(function() {
  $(".js-delete-row").on("click", function() {
    const id = $(this).attr("data-id"); //atributa vertiba @html, skat jq delete poga

    $.ajax({
      method: "GET",
      url:
        "/tkedo.github.io/php/mvc/delete.php?id=" + id + "&redirect=false"
    }).then(function() {
      window.location = "/tkedo.github.io/php/mvc/";
    });
  });
});