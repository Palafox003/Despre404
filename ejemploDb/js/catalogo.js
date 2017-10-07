$(document).ready(function(){
	$(".btn-card").click(function(){
		var id=$(this).attr("idp");
		var titulo=$(this).parent().children().eq(0).text();
		$("#peli").val(id);
		$("#titulo").val(titulo);
	});
});