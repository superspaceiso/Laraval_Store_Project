$(document).ready(function(){
  $(".addtobasket").click(function(){
      event.preventDefault();
      var id = $(this).attr("id");
    $.post("/",{"p":id}, function(data){
    });
  });
});