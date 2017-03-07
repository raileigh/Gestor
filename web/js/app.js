//Widget principal div con tres tablas----------------------------

$('#myTabs a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

// Mostrar y ocultar elementos del twig de perfil para editar------------------

$(document).ready(function(){
 $("#editar").click(function(){
  
   $("#editarPerfil").css("display", "block");
   $("input").prop('disabled', false);


   if ($("#editarPerfil").css("display", "block")){

    $("#editar").css("display", "none");
  }	
  
});
}); 

// spinner

$("a").click(function(){

  $(".spinner").css("display","block");


})



