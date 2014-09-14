/**
 * @author guozhen.huang@cnluanch.com
 */
(function($){
	
	$.fn.onEnter = function(func) {
        this.bind('keypress', function(e) {
            if (e.keyCode == 13) func.apply(this, [e]);    
        });               
        return this; 
     };
	
	$.fn.extend({		
		stable: function() {
			return this.each(function() {
				$table = $(this);
				
				// 删除按钮
				$(this).find("td a.btn-del").click(function(){
					$tr = $(this).parents("tr:first");
					$.post($(this).attr("href"), function(data){
						if(data.code == 0) {
							$tr.remove();
						}
						alert(data.msg);
					},'json');
					return false;
				});
				
				// 表头单击
				$(this).find("th[orderfield]").click(function(){
					console.log("table head was clicked!");
				});
				
				// 分页
				$("ul.pager").find("li > a").click(function(){
					console.log("pager: "+$(this).attr("rel"));
					if($(this).attr("rel") == 0) {
						console.log("it is already the first page");
						return false;
					}
					$form = $("#pagerForm");
					$form.find("input[name='offset']").val($(this).attr("rel"));
					$form.trigger("submit")
					return false;
				});
				
				// 可编辑
				$(this).find("td.enable").click(function(){
					if(! $(this).is(".editing")) {
						var input = $('<input type="text" />').val($(this).text()).attr("placeholder",$(this).text())
						.width($(this).width()).addClass('clean-input');
						
						$(this).addClass('editing').html("").append(input);

						$(this).find("input").focus().blur(function(){
							$(this).parent().removeClass('editing').html($(this).attr("placeholder"));
						});
						
						$(this).find('input').focus().onEnter(function(){
							$input = $(this);
							var fvalue = $(this).val();
							if( fvalue != '') {								
								var kvalue = $(this).parents("tr:first").attr("rel");
								var fkey = $table.find("th").eq($(this).parent().index()).attr("field");
								var url = $table.attr("url-target");
								url = url.replace(/{key}/g, kvalue);
								
								$.post(url, JSON.parse('{"' + fkey + '":"' + fvalue +'"}'), function(data){
									console.log(data);
									if(data.code == 0) {
										$input.parent().removeClass('editing').html(fvalue);
									}
									else {
										$input.parent().removeClass('editing').html($input.attr("placeholder"));
									}
								},"json");
							}
							else {
								$input.parent().removeClass('editing').html($input.attr("placeholder"));
							}
						});
					}
				});
			});
		}
	});
})(jQuery);