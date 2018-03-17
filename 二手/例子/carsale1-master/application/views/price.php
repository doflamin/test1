<!DOCTYPE html>
<html>
<head lang="en">
	
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>二手车交易</title>
    <link rel="stylesheet" href="assets/css/index.css"/>
    <link rel="stylesheet" href="assets/css/buy.css"/>
    <link rel="stylesheet" href="assets/css/common.css"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.js" data-main=""></script>
    <script src="assets/js/require.js"></script>
    <script></script>

</head>
<body>
<div id="header">
    <div class="wrapper">
        <a class="logo" href="#logo">
            <img src="assets/img/indeximages/logo.jpg" alt=""/>
        </a>
        <div class="city">

        </div>
        <div class="search">
            <input  class="search-input"  type="text" placeholder="搜索您想要的车"/>
            <button class="btn-search"  href="#">搜索</button>
        </div>
        <!-- <div class="user">
            <a  id="login" href="#login">登录</a>
            <a  id="register"  href="#register">注册</a>
        </div> -->
    </div>
    <div class="header-select">
    <div class="wrapper">
        <ul id="select-btn1">
            <li><a href="index.php/user/index">首页</a></li>
            <li><a href="index.php/user/buy" class="selected">我要买车</a></li>
            <li><a href="index.php/user/sale">我要卖车</a></li>
        </ul>
        <ul id="select-btn2">
            <li><a href="">二手车服务咨询</a></li>
        </ul>

    </div>
    </div>
</div>

<div class="wrapper-buy">
    <!--header的两张图片-->
    <div id="header-h">
        <div class="header-img">
            <a href="index.php/user/sale"><img id="img1" src="assets/img/buyimages/img-sale.jpg" alt=""/></a>
        </div>
        <div class="header-img">
            <a href=""><img id="img2" src="assets/img/buyimages/img-service.jpg" alt=""/></a>
        </div>
    </div>
    <!--header的两张图片 end-->

    <!--导航开始-->

    <div id="header-nav">
        <ul class="nav">
            <li>品牌  :</li>
            <a href="http://localhost/carsale1/index.php/user/dazhong"><li>大众</li></a>
            <a href="http://localhost/carsale1/index.php/user/xiandai"><li>现代</li></a>
            <!-- <a href=""><li>丰田</li></a>
            <a href=""><li>日产</li></a>
            <a href=""><li>福特</li></a>
            <a href=""><li>奇瑞</li></a>
            <a href=""><li>哈弗</li></a>
            <a href=""><li>奥迪</li></a>
            <a href=""><li>本田</li></a> -->
        </ul>
        <ul class="nav">
            <li>车系  :</li>
            <a href="http://localhost/carsale1/index.php/user/chexi?id=高尔夫"><li>高尔夫</li></a>
            <a href="http://localhost/carsale1/index.php/user/chexi?id=伊兰特"><li>伊兰特</li></a>
            <a href="http://localhost/carsale1/index.php/user/chexi?id=途胜"><li>途胜</li></a>
            <!-- <a href=""><li>速腾</li></a>
            <a href=""><li>迈腾</li></a>
            <a href=""><li>捷达</li></a>
            <a href=""><li>大众POLO</li></a>
            <a href=""><li>福克斯</li></a>
            <a href=""><li>凯美瑞</li></a> -->
        </ul>
        <ul class="nav">
            <li>价格  :</li>
            <a href="http://localhost/carsale1/index.php/user/price?min=7"><li>7万以下</li></a>
            <a href="http://localhost/carsale1/index.php/user/price?min=7&max=9"><li>7-9万</li></a>
            <a href="http://localhost/carsale1/index.php/user/price?min=9&max=12"><li>9-12万</li></a>
            <a href="http://localhost/carsale1/index.php/user/price?min=12&max=14"><li>12-14万</li></a>
            <a href="http://localhost/carsale1/index.php/user/price?min=14&max=16"><li>14-16万</li></a>
            <a href="http://localhost/carsale1/index.php/user/price?min=16&max=18"><li>16-18万</li></a>
            <a href="http://localhost/carsale1/index.php/user/price?min=18&max=20"><li>18-20万</li></a>
            <a href="http://localhost/carsale1/index.php/user/price?max=20"><li>20万以上</li></a>
        </ul>
    </div>
</div>

    <!--导航 end-->

    <!--列表图片开始-->
<div class="wrapper-buy">
<div id="clear" class="list">
    <ul class="list-bigimg clearfix lazyLoadV2" id="clear1">
    	<?php	
			foreach ($rs as $value) {
		?>
    	<li>
    	<div class="list-infoBox">
    		<a title="<?php echo $value->carname;?>" class="imgtype" href="index.php/user/detail?id=<?php echo $value->carimgurl;?>">
    			<img width="290" height="194" src="<?php echo $value->carimgurl;?>" alt="">
    		</a>
    		<p class="infoBox">
    			<a title="<?php echo $value->carname;?>" href="" target="_blank" class="info-title"><?php echo $value->carname;?></a>
    		</p>
    		<p class="fc-gray"><span class=""><?php echo $value->sptime;?>上牌</span></p>
    		<p class="priType-s"><em class="tag-yellow">超值</em>
    		<span><i class="fc-org priType"><?php echo $value->ncarprice;?>万</i></span>
    		<s><?php echo $value->ocarprice;?>万</s></p>
    	</div>
      </li>
    	<?php
			}
		?>	
		
		
    </ul>
</div>
    </div>
    
</body>
</html>