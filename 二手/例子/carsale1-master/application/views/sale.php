<!-- // <?php
	// if($this->session->userdata('login_in') != 'TRUE'){
		// redirect('user/index');
	// }
// ?> -->
<!DOCTYPE html>
<html>
<head lang="en">
	<base href="<?php echo site_url();?>">
    <meta charset="UTF-8">
    <title>二手车交易</title>
    <link rel="stylesheet" href="assets/css/sale.css"/>
</head>
<body>

<div class="sale-header">
    <div class="sale-wrapper">
        <a href="#" id="logo">
            <img src="assets/img/saleimages/logo.jpg" alt=""/>
        </a>
    </div>
    <div id="select">
        <ul id="select-btn">
         <li><a href="index.php/user/index">首页</a></li>
	     <li><a href="index.php/user/buy">我要买车</a></li>
	     <li><a href="index.php/user/sale" class="selected">我要卖车</a></li>
         <li><a href="">服务咨询</a></li>
         <!-- <li><a  id="login" href="index.php/user/login'"><?php echo $this->session->userdata('name')?>已登录</a></li> -->
        </ul>
        <a href="index.php/user/mlogin" id="tubiao">
            <img src="assets/img/saleimages/tubiao.png" alt=""/>
        </a>
        <!-- <div class="new-search">
            <input class="i-search" type="text" placeholder="请输入手机号码"/>
            <button class="b-search"  href="#">免费卖车</button>
        </div> -->
    </div>
</div>

<div class="middle">
    <div id="first">
         1.实名认证<br/>
        卖家信息一切真实
        <div id="f-img"></div>
    </div>
    <div id="second">
        2.签约过户<br/>
        省时省财，全程保障
        <div id="s-img"></div>
    </div>
    <div id="third">
        3.全网代售<br/>
        成交快，效率高
        <div id="t-img"></div>
    </div>
</div>
<div class="f-title">卖车指南</div>
<div class="msg">
      本网站网成交量遥遥领先。二手车直卖网撮合个人直接卖给个人，没有中间商赚差价。<br/>
       在此平台上，车源均为8年15万公里以内的个人二手车，从源头保障车况。
    <p class="p1">Q:卖车需要准备什么？</p>
    <div id="n-msg">
    <div class="txt-box">
        <table>
            <tbody><tr>
                <td>身份证</td>
                <td>环保标</td>
                <td>购置税本</td>
            </tr>
            <tr>
                <td>行驶证</td>
                <td>检字标</td>
                <td>购置税发票</td>
            </tr>
            <tr>
                <td>车辆登记证</td>
                <td>交强险标</td>
                <td>购车发票/最近一次过户发票</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            </tbody></table>
    </div>
    </div>
    <p class="p2">Q:是否额外收费？何时成交？</p>
       <div id="p-text">
           大部分车辆在二手车交易网上只需一周就可成交。<br/>
           网站不会收取卖家任何费用，交易达成才会向买家收取不超过交易金额3%的服务费。
       </div>
</div>
<p class="write">填写表单</p>
 <a href="index.php/user/trade" class="backtotop">立即填写</a>


</body>
</html>