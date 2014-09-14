/**
 * @author guozhen.huang@cnluanch.com
 */
(function ($) {

    $.extend({
        addNext: function (obj) {
            $table = $(obj).parents("div.panel:first").children("table");


            var html = '';
            html += '<td class="col-md-2"><input type="text" name="_key[]" placeholder="' + $table.attr("placeholder") + '" class="form-control clean-input"/></td>';
            html += '<td class="col-md-2"><input type="text" name="' + $table.attr("prefix") + '_value[]" placeholder="Value" class="form-control clean-input"/></td>';
            var td = '<td class="col-md-1"><select name="' + $table.attr("prefix") + '_type[]" class="form-control">';
            td += '<option value="1">STRING</option>';
            td += '<option value="0">INTEGER</option>';
            td += '</select>';
            html += td;
            html += '<td class="col-md-6"><input type="text" name="' + $table.attr("prefix") + '_desc[]" placeholder="Description" class="form-control clean-input"/></td>';
            html += '<td class="col-md-1"><a href="javascript:void(null)" class="btn" role="button"><span class="glyphicon glyphicon-plus"></span></a></td>';

            var tr = '<tr>' + html + '</tr>';

            $(obj).children("span.glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-remove");

            $(obj).unbind("click").click(function () {
                $(this).parents("tr:first").remove();
                return false;
            }).parents("tr:first").before($(tr));//find("input[name='_key[]']").attr("name", $table.attr("prefix")+"_key[]");

            $table.find("input[name='_key[]']").attr("name", $table.attr("prefix") + "_key[]");

            $(obj).parents("table").find("tr:first").find("a[role='button']").click(function () {
                $.addNext(this);
            });
        }
    });

    $.fn.extend({
        itemDetail: function () {
            return this.each(function () {
                $tbody = $(this).find("tbody");
                $tbody.find("a[role='button']").children("span.glyphicon-remove").click(function () {
                    var $btnDel = $(this);
                    $btnDel.parents("tr:first").remove();
                    return false;
                });

                $addBut = $tbody.find("a[role='button']");
                $addBut.click(function () {
                    $.addNext(this);
                });
            });
        }
    });
})(jQuery);