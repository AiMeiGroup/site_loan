<?php
use Lavender\Validator;

echo($LANG);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo(L_SITE_NAME) ?></title>
	<link type="text/css" rel="stylesheet" href="css/style/layout.css"/>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
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

<body class="login_box">
<h1>
	<a style="color:white; font-size:25px "><?php echo(L_SITE_NAME) ?></a>
	<!--    <img src="images/login_logo.png" alt="" />-->
</h1>

<div class="login">
	<div class="box_top"></div>
	<div class="box">
		<form id="form2" method="post" action="?action=login.logon">
			<ul>
				<li><label>用户名：</label><input class="t_ipt" type="text" id="txtname" name="username"
				                              maxlength="50"/><?php if (!empty($data)) {
						echo($data["username"]);
					} ?></li>
				<li><label>密&nbsp;&nbsp;&nbsp;&nbsp;码：</label><input class="t_ipt" id="txtpasw" type="password"
				                                                     name="userpsw"
				                                                     maxlength="20"/><?php if (!empty($data)) {
						echo($data["userpsw"]);
					} ?></li>
			</ul>
			<a id="lblmessage" style=" color:#FF0000; font-size:12px"><?php if (!empty($data)) {
					echo($data["error"]);
				} ?></a>

			<div class="login_btn"><input class="btn_login" type="submit" name="" value=""></div>
		</form>
	</div>
	<div class="box_bottom"></div>
</div>
<div class="login_footer"><p>© 1999-2013 LAUNCH Corporation.All Rights Reserved. 粤B2-20042039</p></div>
</body>
</html>