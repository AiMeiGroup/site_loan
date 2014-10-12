//monkey    2014-8-20 11:17:44
$(document).ready(function () {
    //点击小图显示大图
    $("a[rel=example_gp]").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none',
        'titlePosition': 'over',
        'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });

    //获取分页数据
    var pageIndex = 1;
    getData(pageIndex);

    //金额加
    $("#btnAdd").click(function () {
        var investAmout = $("#investAmout").val();
        if (isNaN(investAmout)) {
            investAmout = 0;
        }
        investAmout = parseInt(investAmout) + 100;
        $("#investAmout").val(investAmout);
        if (checkAmount()) {
            calculateIncome();
        }
        return false;
    });

    //金额减
    $("#btnMinus").click(function () {
        var investAmout = $("#investAmout").val();
        if (isNaN(investAmout) || investAmout <= 100) {
            investAmout = 100;
        } else {
            investAmout = parseInt(investAmout) - 100 < 100 ? 100 : parseInt(investAmout) - 100;
        }

        $("#investAmout").val(investAmout);
        if (checkAmount()) {
            calculateIncome();
        }
        return false;
    });

    //金额发生变化
    $("#investAmout").keydown(function (event) {
        //console.info(event.keyCode);
        if (!checkNum(event.keyCode)) {
            return false;
        }
    });
    $("#investAmout").keyup(function (event) {
        if (checkAmount()) {
            calculateIncome();
        }
    });

    //标的结束输入框不能输入
    var projectStatus = $("#hdProjectStatus").val();
    if (projectStatus == "0") {
        $("#investAmout").attr("disabled", "disabled");
        $("#btnAdd").unbind("click");
        $("#btnMinus").unbind("click");
    } 
});

//获取投资人的数据
function getData(pageIndex) {
    var projectId = $("#hdProjectId").val();
    $.ajax({
        url: 'doGetInvestRecord.ashx',
        type: 'post',
        data: { pageIndex: pageIndex, projectId: projectId },
        dataType: 'json',
        success: function (data) {
            if (data) {
                $("#listRecord").text("");
                $("#page").text("");
                $("#listRecord").append(data.list);
                $("#page").append(data.page);
            }
        }
    });
}

//计算时间
var maxtime = 0;
var timer;
$(function () {
    maxtime = $("#hdLeftTime").val(); //用秒来计算
    if (maxtime > 0) {
        timer = setInterval("CountDown()", 1000);
    } else {
        $("#lbTimer").html("标的已结束");
    }
});

function CountDown() {
    if (maxtime > 0) {
        day = '<span style="color: #E33B0C; font-size: 18px;">' + Math.floor(maxtime / 60 / 60 / 24) + '</span>';  //天
        hour = '<span style="color: #E33B0C; font-size: 18px;">' + Math.floor(maxtime / 60 / 60 % 24) + '</span>';  //时
        minutes = '<span style="color: #E33B0C; font-size: 18px;">' + Math.floor(maxtime / 60 % 60) + '</span>';  //分
        seconds = '<span style="color: #E33B0C; font-size: 18px;">' + Math.floor(maxtime % 60) + '</span>';   //秒
        msg = day + "天" + hour + "时" + minutes + "分" + seconds + "秒";
        $("#lbTimer").html(msg);
        --maxtime;
    }
    else {
        $("#lbTimer").html("标的已结束");
        clearInterval(timer);
    }
}

//只能输入数字
function checkNum(k) {
    if ((k == 9) || (k == 13) || (k == 46) || (k == 8) || (k == 109) || (k >= 48 && k <= 57) || (k >= 96 && k <= 105) || (k >= 37 && k <= 40)) {
        return true;
    } else {
        return false;
    }
}

//检查表单输入
function checkFormData() {
    if (checkAmount()) {
        //判断是否同意合同范本
        var htCheck = $("#htCheck").attr("checked");
        if (!htCheck) {
            alert("请同意合同范本");
            return false;
        }
    } else {
        return false;
    }

    return true;
}

//显示错误信息
function showError(msg) {
    $("#spanError").text(msg);
    $("#errorMsg").show();
    $("#divPreIncome").hide();
}

//计算收益
function calculateIncome() {
    var totalAmount = 0;
    var investAmout = $("#investAmout").val();
    if (investAmout && (!isNaN(investAmout))) {
        var yearRate = $("#yearRate").text();
        var borrowDay = $("#borrowDay").text();
        totalAmount = parseFloat(investAmout) * parseFloat(yearRate) / 100 / 360 * parseFloat(borrowDay);
        totalAmount = parseFloat(totalAmount).toFixed(2);
    }
    $("#preIncome").text(totalAmount + "元");

    $("#errorMsg").hide();
    $("#divPreIncome").show();
}

//检查金额
function checkAmount() {
    var investAmout = $("#investAmout").val();
    if (!investAmout) {
        showError("请输入金额");
        return false;
    }

    if (isNaN(investAmout)) {
        showError("金额只能输入数字");
        return false;
    }

    var userAvlAmt = $("#userAvlAmt").text();
    userAvlAmt = userAvlAmt.replace(/,/g, '');
    if ((parseFloat(userAvlAmt) < parseFloat(100)) || (parseFloat(investAmout) > parseFloat(userAvlAmt))) {
        showError("余额不足请充值");
        return false;
    }

    if (parseInt(investAmout) < 100) {
        showError("金额不能小于100");
        return false;
    }

    if (parseInt(investAmout) % 100 != 0) {
        showError("投资金额必须是100的倍数");
        return false;
    }

    var leftAmt = $("#leftAmt").text();
    leftAmt = leftAmt.replace(/,/g, '');
    if (parseFloat(investAmout) > parseFloat(leftAmt)) {
        showError("投资金额不能大于可投金额");
        return false;
    }

    return true;
}
