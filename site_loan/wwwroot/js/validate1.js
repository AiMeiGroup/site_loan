
$(function () {
    $("form").ligerForm();
    var v = $("form").validate({
        errorPlacement: function (lable, element) {
            if (element.hasClass("l-textarea")) {
                element.addClass("l-textarea-invalid");
            }
            else if (element.hasClass("l-text-field")) {
                element.parent().addClass("l-text-invalid");
            }
            $(element).removeAttr("title").ligerHideTip();
            $(element).attr("title", lable.html()).ligerTip();
        },
        success: function (lable) {
            if (lable.attr("for").length > 0) {
                            var element = $("#" + lable.attr("for"));
                            if (element.hasClass("l-textarea")) {
                                element.removeClass("l-textarea-invalid");
                            }
                            else if (element.hasClass("l-text-field")) {
                                element.parent().removeClass("l-text-invalid");
                            }
                            $(element).removeAttr("title").ligerHideTip();
            }
        }
    });
}); 