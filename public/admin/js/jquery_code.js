$(document).ready(function(){
	$(".addForm").hide();
	$(".add").click(function(){
		$(".addForm").slideToggle(200);
	});
	$("#ok-add-categorie-form").click(function(){
		parent = $("#select-cate-parent").val();
		name = $("#txt-cate-title").val();
		error = "";
		if (name == ""){
			error += "<li>Please enter categorie title</li>";
			$("#add-error").html("<ul>"+error+"</ul>").addClass("mess_error");
		}else{
			$.ajax({
				"url" : baseUrl + "admin/categorie/add",
				"type": "post",
				"data": "name=" + name + "&parent=" + parent,
				"async": true,
				"success": function(result){
					// $.alert(result, "Message!");
					$("#txt-cate-title").val("");
					$("#select-cate-parent").val(0);
					$("#add-error").html("");
					$(".addForm").fadeOut(500);
					$("#cate-table").load(baseUrl + "admin/categorie/reload");
				}
			});
		}
		return false;
	});

	$(".delete").click(function(){
		if (confirm_delete() == true){
			id = $(this).attr("setid");
			$.ajax({
					"url" : baseUrl + "admin/categorie/del",
					"type": "post",
					"data": "id=" + id,
					"async": true,
					"success": function(result){
						$.alert(result, "Message!");
						$("#cate-table").load(baseUrl + "admin/categorie/reload");
					}
			});
		}
	});
});

$.extend({ alert: function (message, title) {
  $("<div></div>").dialog( {
    buttons: { "Ok": function () { $(this).dialog("close"); } },
    close: function (event, ui) { $(this).remove(); },
    resizable: false,
    title: title,
    modal: true
  }).text(message);
}
});