/**
 * @author guozhen.huang@cnluanch.com
 */
$(function(){
	var $p = $(document);
	if ($.fn.stable) $("table.table", $p).stable();
	if ($.fn.combox) $("select[ref]", $p).combox();
	
	$("#pagerForm").submit(function(){
		$form = $(this);
		$("#unitBox").load($(this).attr("action"), $(this).serialize(),function(){
			if ($.fn.stable) $("table.table", $p).stable();	
			if ($.fn.combox) $("select[ref]", $p).combox();
			$form.find("input[name='offset']").val(1);
		});
		return false;
	});
	
	$("div.modal-dialog").find("form[action]:first").submit(function(){
		console.log($(this).attr("action"));
		$dialog = $(this).parents("div.modal-dialog:first");
		$.post($(this).attr("action"), $(this).serializeArray(),function(data){
			$dialog.hide();
			alert(data.msg);
			if(data.code == 0) {
				console.log(data.callback);
				window.location.href = data.callback;
			}
		},'json');
		return false;
	});
	
	$("table a.glyphicon-export").click(function(){
		var href = $(this).attr("href");
		$("#export").modal('show').find("form").submit(function(){
			var url = href + "&" + $(this).serialize();
			console.log(url);
			window.open(url);
			return false;
		});
		return false;
	});
});