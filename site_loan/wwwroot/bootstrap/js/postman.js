$(function(){
	
	/**
	 * 表单提交时通过curl调用远程服务器,并保存历史记录
	 */
	$("#req_form").on("submit", function(event) {
		event.preventDefault();
		var url = "?action=postman.restful";

		if ($("input[name='url']", $(this)).val() == '') {
			alert('URL请求不能为空!');
			return false;
		};

		$.post(url, $(this).serialize(), function(respone){

			alert(respone.msg);
			if (respone.code == 0) {
				$("#body").html(respone.data.body);
				$("#headers").html(respone.data.header);
			}
		},'json');
	});
	
	/**
	 * 重置表单
	 */
	$("#req_form").on("reset", function(event) {
		event.preventDefault();
		$(this).find("input").val("");
		$(this).find("textarea").val("");
		$("#actSel").val("0");
		$(this).find("div.in").collapse("hide");
		$(this).find("a[role='button']").children("span.glyphicon-remove").trigger("click");
	});
	
	/**
	 * 下拉按钮新增显示选择项
	 */
	$("ul.dropdown-menu").each(function(){
		
		$(this).children("li").each(function(){
			
			$(this).children("a[role='menuitem']").eq(0).on("click", function(e){
				e.preventDefault();
				
				$(this).parents("li.dropdown").children("a.dropdown-toggle").text($(this).text()).append('<b class="caret"></b>');
				$("#req_form").find("input[name=env]").first().val($(this).attr("idx"));
			});
		});
	});
	
	/**
	 * 表单提交方法改变时toggle表单panel
	 */
	$("#actSel").on("change", function(e) {
		e.preventDefault();
		$("#form_panel").collapse('toggle');
	});
	
	var $p = $(document);
	
	/**
	 * 拥有itemDetail的table触发函数itemDetail()
	 */
	if($.fn.itemDetail) $("table.itemDetail", $p).itemDetail();

    var prefox =$('#actSel').attr('prefox');
    if (prefox!=null && prefox !=''){
        $('#actSel').val($('#actSel').attr('prefox'));
        $("#form_panel").collapse('toggle');
        $("#params_panel").collapse('toggle');
        $("#header_panel").collapse('toggle');
    }


    $("a[name=list_group_item]").click(function () {
        $.getJSON('?action=collection.get&id=' + $(this).attr('prefox'), function (data) {
            if (data.code == 0) {
                $("input[name=url]").val(data.url);
                //params//
                $html_params = '<div class="panel panel-default" style="border-color: #FFF;">' +
                    '<table class="table itemDetail table-condensed" prefix="param" placeholder="URL Param Key">' +
                    '<tbody>' +
                    '<tr>' +
                    '<td class="col-md-2"><input type="text" name="param_key[]" placeholder="URL Param Key" class="form-control clean-input"></td>' +
                    '<td class="col-md-2"><input type="text" name="param_value[]" placeholder="Value" class="form-control clean-input"></td>' +
                    '<td class="col-md-1">' +
                    '<select name="param_type[]" class="form-control">' +
                    '<option value="1">STRING</option>' +
                    '<option value="0">INTEGER</option>' +
                    '</select>' +
                    '</td>' +
                    '<td class="col-md-6"><input type="text" name="param_desc[]" placeholder="Description" class="form-control clean-input"></td>' +
                    '<td class="col-md-1">' +
                    '<a href="javascript:void(null)" class="btn" role="button"><span class="glyphicon glyphicon-plus"></span></a>' +
                    '</td>' +
                    '</tr>';
					$.each(data.params, function (i, vas) {
                        if (vas[0] != '') {
                            $html_params += '<tr>' +
                                '<td class="col-md-2"><input type="text" name="param_key[]" placeholder="URL Param Key" class="form-control clean-input" value='+vas[0]+'></td>' +
                                '<td class="col-md-2"><input type="text" name="param_value[]" placeholder="Value" class="form-control clean-input" value='+vas[1]+'></td>' +
                                '<td class="col-md-1">' +
                                '<select name="param_type[]" class="form-control">' +
                                '<option value="1">STRING</option>' +
                                '<option value="0">INTEGER</option>' +
                                '</select>' +
                                '</td>' +
                                '<td class="col-md-6"><input type="text" name="param_desc[]" placeholder="Description" class="form-control clean-input" value='+vas[3]+'></td>' +
                                '<td class="col-md-1">' +
                                '<a href="javascript:void(null)" class="btn" role="button"><span class="glyphicon  glyphicon-remove"></span></a>' +
                                '</td>' +
                                '</tr>';
                        }
                    });
                $html_params += '	</tbody> </table> </div>';
                $('#params_panel').html($html_params);
                //params//


            }

        });

    });
});