<?php
use Lavender\Validator;

echo($LANG);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>品盛金融—安全诚信的P2P金融网贷服务平台</title>
	<link href="css/main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/jquery.validate.ext.js" type="text/javascript"></script>
    <script src="js/jquery.metadata.js" type="text/javascript"></script>
	<script src="js/messages_cn.js" type="text/javascript"></script>
    <!--<script src="js/login.js" type="text/javascript"></script>-->
	<script language="javascript" type="text/javascript">
		$(function () {
			$('#form2').ajaxForm({
				beforeSubmit: checkForm,  // pre-submit callback
				success: complete,  // post-submit callback
				dataType: 'json'
			});
			function checkForm() {
				if ('' == $.trim($('#txtname').val())) {
					$('#lblmessage').html('用户名不能为空！').show();
					return false;
				}

				if ('' == $.trim($('#txtpasw').val())) {
					$('#lblmessage').html('密码不能为空！').show();
					return false;
				}

				return true;
			}

			function complete(data) {
				if (data.status == 1) {
					$('#lblmessage').html(data.info).show();
					// 更新列表
					location.href = "?action=home.index";

				} else {
					$('#lblmessage').html(data.info).show();
				}
			}

		});

	</script>


</head>

    <body screen_capture_injected="true">
    <!-- header start -->
    <div class="header">
      <div class="header-box o_a c_f">
        <h1 class="logo"></h1>
        <div class="hd-operate f_r">
          <ul class="user c_f">
            <li><a class="login" href="?action=login.login">登录</a></li>
            <li><a class="register" href="register.html">注册</a></li>
          </ul>
          <div style="clear: both;"></div>
          <ul class="nav c_f">
            <li><a href="?action=home.index">品盛首页</a></li>
            <li><a href="?action=loan.index">我要投资</a></li>
            <li><a href="">我要借款</a></li>
            <li><a href="">新手指南</a></li>
            <li><a href="">关于品盛</a></li>
            <li><a href="">品盛社区</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- header end -->

    <div class="main"> 
      <script language="javascript">
    function AddFavorite(sURL, sTitle) {
        try {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e) {
            try {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e) {
                alert("加入收藏失败，请使用Ctrl+D进行添加");
            }
        }
    }

    function SetHome(obj, vrl) {
        try {
            obj.style.behavior = 'url(#default#homepage)'; obj.setHomePage(vrl);
        }
        catch (e) {
            if (window.netscape) {
                try {
                    window.netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                }
                catch (e) {
                    alert("此操作被浏览器拒绝！");
                }
                var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
                prefs.setCharPref('browser.startup.homepage', vrl);
            }
        }
    }
</script>
      <div class="Deng">
        <form id="form2" method="post" action="?action=login.logon">
          <div class="DengLu">
            <div class="DengLu_Kuang">
              <div class="Kuang_Tile">登录</div>
              <div class="Kuang"><span>用户名：</span>
                <input name="username" type="text" maxlength="32" id="txtname" class="Kuang_Sty" z="">
              </div>
              <div class="Kuang"><span>密码：</span>
                <input name="userpsw" type="password" maxlength="20" id="txtpasw" class="Kuang_Sty02" validate="{required:true,minlength:6}">
              </div>
              <!--<div class="Kuang"><span>验证码：</span>
                <input name="txtCheckCode" type="text" maxlength="4" id="txtCheckCode" class="Kuang_Sty03" validate="{required:true,minlength:4,remote:&#39;GetPassword.aspx?action=exCheckCode&#39;}">
                <img src="images/captcha1.aspx" id="imgCaptcha" style="vertical-align: middle; cursor: pointer;"><a id="aChangeImage" href="" style="margin-left:10px;">换一张</a></div>-->
              <div class="ClearBoth"></div>
              <div class="KuangError">
                <label id="lblmessage"><?php if (!empty($data)) {
					echo($data["error"]);
				} ?></label>
              </div>
              <div class="ClearBoth"></div>
              <input type="submit" name="btnLogin" value="登录" id="btnLogin" class="Kuang_An">
              <div class="Kuang_Line"></div>
              <div class="Title">还没有账户？
                <span><a href="register.html">立即免费注册</a></span> 
                <span class="span1"><a href="">&nbsp;忘记密码？</a></span>
              </div>
            </div>
          </div>
        </form>
        <div class="Clear"></div>
      </div>
    </div>

    <!-- footer start -->
    <div class="footer">
      <p><a href="">关于我们</a> | <a href="">招贤纳士</a> | <a href="">联系我们</a></p>
      <p>Copyright &copy; 2013-2013 东莞市品盛实业投资有限公司 版权所有</p>
    </div>
    <!-- footer end -->
</body>
</html>
