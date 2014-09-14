/**
 * @author guozhen.huang@cnluanch.com
 */
(function($){
	$.fn.extend({
		combox: function(){
			return this.each(function(){
				$(this).on("change", function(){
					var url = $(this).attr("refurl");
					url = url.replace(/{value}/g, $(this).val());
					console.log(url);
					$child = $($(this).attr("ref"));
					$child.val("0");
					$.get(url,function(response){
						if(response.code == 0) {
							$child.empty();
							$child.append("<option value='0'>全部</option>"); 
							$.each(response.data, function(idx, content){
								var html = "<option value='"+ content.id +"'>"+ content.name +"</option>";
								$child.append(html); 
							});
						}
					},'json');
				});
			});
		}
	});
})(jQuery);