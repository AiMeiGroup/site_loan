<!DOCTYPE html>
<!-- saved from url=(0026)index.html -->
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="http://www.anxinjudai.com/favicon.ico" type="image/x-icon">
    <title>品盛金融—安全诚信的P2P金融网贷服务平台</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script src="js/jquery1.42.min.js" type="text/javascript"></script>
    <script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <link href="css/layout1.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.hhService.js" type="text/javascript"></script>
    <script src="js/banner.js" type="text/javascript"></script>
    <style type="text/css">
      .annou {
      	margin: 2px 0 2px 0;
      	height: 30px;
      	line-height: 30px;
      	text-align: center;
      	border: 1px solid #FF8000;
      	color: #F13A46;
      	background: #FFE1C4;
      }
      .annou a {
      	color: #F13A46;
      	text-decoration: none;
      }
      .annou a:hover {
      	text-decoration: underline;
      }
    </style>
    <link type="text/css" rel="stylesheet" href="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/style.css">
    <script type="text/javascript" charset="utf-8" src="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/js/page_context.js"></script>
    </head>
    <body screen_capture_injected="true">
    <!-- header start -->
    <div class="header">
      <div class="header-box o_a c_f">
        <h1 class="logo"></h1>
        <div class="hd-operate f_r">
          <ul class="user c_f">
            <li><a class="login" href="login.html">登录</a></li>
            <li><a class="register" href="register.html">注册</a></li>
          </ul>
          <div style="clear: both;"></div>
          <ul class="nav c_f">
            <li><a href="?action=home.index">品盛首页</a></li>
            <li><a href="?action=loan.index">我要投资</a></li>
            <li><a href="borrow.html">我要借款</a></li>
            <li><a href="guide.html">新手指南</a></li>
            <li><a href="about.html">关于品盛</a></li>
            <li><a href="forum.html">品盛社区</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- header end -->

    <!-- banner start -->
    <div class="jy_banner">
      <div class="banner">
        <div id="idContainer2" class="container" style="position: relative; overflow: hidden;">
          <table id="idSlider2" border="0" cellspacing="0" cellpadding="0" style="position: absolute; left: -100%;">
            <tr>
              <td class="td_f">
                <a href="" target="_blank"><img src="images/banner1.jpg"></a>
              </td>
              <td class="td_f">
                <a href="" target="_blank"><img src="images/banner2.jpg"></a>
              </td>
              <td class="td_f">
                <a href="" target="_blank"><img src="images/banner3.jpg"></a>
              </td>
              <td class="td_f">
                <a href="" target="_blank"><img src="images/banner4.jpg"></a>
              </td>
            </tr>
          </table>
          <ul id="idNum" class="num"></ul>
        </div>
      </div>
    </div>
    <!-- banner end -->

    <div class="clearfix"></div>
    <div id="anx-safe">
      <div class="fl fourbtn">
        <ul>
          <li>
            <a href="" target="_self" class="nhd"></a><em>新手指南</em>
            <p>三步轻松注册<br>坐享财富盛宴</p>
            <p><a href="" target="_blank" class="more">了解更多&gt;&gt;</a></p>
          </li>
          <li>
            <a href="" target="_self" class="sbz"></a><em>安全保障</em>
            <p>100%本息保障<br>所有项目担保公司全额垫付!</p>
            <p><a href="" target="_blank" class="more">了解更多&gt;&gt;</a></p>
          </li>
          <li>
            <a href="" target="_self" class="trm"></a><em>赎回投资</em>
            <p>玩转手中资金<br>随时随心赎回投资!</p>
            <p><a href="" target="_blank" class="more">了解更多&gt;&gt;</a></p>
          </li>
          <li>
            <a href="" target="_blank" class="slb"></a><em>生利宝</em>
            <p>比银行活期利息高10倍<br>资金随进随出不耽误!</p>
            <p><a href="" target="_blank" class="more">了解更多&gt;&gt;</a></p>
          </li>
        </ul>
      </div>
      <div class="fr anxinfo">
        <p><em>关于安信聚贷</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;安信聚贷有成熟、严谨的风险控制评估机制，为降低平台交易各方的风险、保障交易各方的利益，安信聚贷推行四重风险防控保障。<a href="" target="_blank" class="more">了解更多&gt;&gt;</a></p>
      </div>
    </div>
    <div class="clearfix"></div>
    <div id="bdi-contaner">
      <div class="fl bdi-con">
        <dl class="investment">
          <dt>
            <span class="title-nbid" title="投资项目"></span>
            <span class="tip-time" style="display:none;">距离标的下次更新时间：<em>07</em>时<em>15</em>分<em>22</em>秒</span>
          </dt>
          <dd>
             <?php
               foreach($loan_list as $loan){
            ?>
            <ul>
              <li class="info">
                <div class="fl bdi-class">
                  <a href="?action=investment.index" target="_self" class="class-logo-6"></a>
                  <p><?php echo  $loan['loan_type'] ?><br><?php echo  $loan['id'] ?></p>
                </div>
                <div class="fr bdi-infoBox">
                  <div class="t-box s-c">
                    <p class="a"><em><?php echo  $loan['annual_rate'] ?></em>%<br><i>年化收益</i></p>
                    <p class="b"><em><?php echo  $loan['amount'] ?></em>元<br><i>债权总额</i></p>
                    <p class="c"><em><?php echo  $loan['deadline']/30 ?></em>个月<br><i>借款期限</i></p>
                    <p class="d"><span class="bdi-diyu-class class-logo-db-s"></span><i>抵押担保</i></p>
                  </div>
                  <div class="e-box">
                    <p class="fl title">投资进度</p>
                    <div class="jindu-tiao fl">
                      <label style="display:block; width:8%; height:12px; background:#6CB0E0;"></label>
                    </div>
                    <p class="fl percen-num">8.33%</p>
                    <a class="btn-yes fr" href=""></a> 
                  </div>
                </div>
              </li>
            </ul>
           <?php
            }
            ?>  
          </dd>
        </dl>
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

<script type="text/javascript">
var forEach = function(array, callback, thisObject){
    if(array.forEach){
        array.forEach(callback, thisObject);
    }else{
        for (var i = 0, len = array.length; i < len; i++) { callback.call(thisObject, array[i], i, array); }
    }
}

var st = new SlideTrans("idContainer2", "idSlider2", 4, { Vertical: false });

var nums = [];
//插入数字
for(var i = 0, n = st._count - 1; i <= n;){
    (nums[i] = $("idNum").appendChild(document.createElement("li"))).innerHTML = ++i;
}

forEach(nums, function(o, i){
    o.onmouseover = function(){ o.className = "on"; st.Auto = false; st.Run(i); }
    o.onmouseout = function(){ o.className = ""; st.Auto = true; st.Run(); }
})

//设置按钮样式
st.onStart = function(){
    forEach(nums, function(o, i){ o.className = st.Index == i ? "on" : ""; })
}
st.Run();
</script>