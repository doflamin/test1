<!DOCTYPE html>
<html>
<head lang="en">
	<base href="<?php echo site_url();?>">

    <meta charset="UTF-8">
    <title>二手车交易</title>
    
    <link rel="stylesheet" href="assets/css/common.css"/>
    <link rel="stylesheet" href="assets/css/index.css"/>
    <link rel="stylesheet" href="assets/css/dialog.css"/>
    
    <script src="assets/js/jquery-1.7.2.min.js"></script>   
    <script src="assets/js/carousel.js"></script>
     <script src="assets/js/city.js"></script>
</head>
<body>
<div id="header">
    <div class="wrapper">
        <a class="logo" href="#logo">
            <img src="assets/img/indeximages/logo.jpg" alt=""/>
        </a>
        <div class="city">
            <span>城市选择</span>
            <select name="" id="s_city" >
            	<option >请选择城市</option>
            </select>
        </div>
        <div class="search">
            <input  class="search-input"  type="text" placeholder="搜索您想要的车"/>
            <button class="btn-search"  href="#">搜索</button>
        </div>
           <!-- <div class="name">
             <a target="_top"><?php echo $this->session->userdata('name')?>已登录</a>
			<a  target="_top" class="exit">[退出]</a>
            </div> -->
             <div class="user">
            <?php 
                   // session_start();
					if(isset($_SESSION['name'])){
						$name=$_SESSION['name'];
						echo "<a>".$name."</a>已登录"."&nbsp;";
						echo "<a href='index.php/user/logout?name=$name'>注销</a>";
					}else{
						echo"<a href='index.php/user/login' id='login'>登录</a>";
						echo"<a href='index.php/user/reg' id='register'>注册</a>";
					}
             ?>            
        </div>
    </div>
    <div class="header-select">
	    <div class="wrapper">
	        <ul id="select-btn1">
	            <li><a href="index.php/user/index" class="selected">首页</a></li>
	            <li><a href="index.php/user/buy">我要买车</a></li>
	            <li><a href="index.php/user/sale">我要卖车</a></li>
	        </ul>
	        <ul id="select-btn2">
	            <li><a href="">二手车服务咨询</a></li>
	        </ul>
	    </div>
    </div>
</div>
<div id="nav">
	<div class="wrapper">
	    <div class="select_area">
	        <div class="buy-tit"><a href="index.php/user/buy">我要买车</a></div>
	        <div class="border">
	            <a href="#">品牌</a>
	            <ul class="item">
	               <a href="http://localhost/carsale1/index.php/user/dazhong" class="ss"><li>大众</li></a>
                   <a href="http://localhost/carsale1/index.php/user/xiandai"><li>现代</li></a>
	                <!-- <a href=""><li>丰田</li></a>
	                <a href=""><li>日产</li></a>
	                <a href=""><li>福特</li></a>
	                <a href=""><li>奇瑞</li></a>
	                <a href=""><li>哈弗</li></a>
	                <a href=""><li>奥迪</li></a>
	                <a href=""><li>本田</li></a> -->
	            </ul>
	        </div>
	        <div class="border">
	            <a href="#">价格</a>
	            <ul class="item">
				    <a href="index.php/user/price?min=7"><li>7万以下</li></a>
		            <a href="index.php/user/price?min=7&max=9"><li>7-9万</li></a>
		            <a href="index.php/user/price?min=9&max=12"><li>9-12万</li></a>
		            <a href="index.php/user/price?min=12&max=14"><li>12-14万</li></a>
		            <a href="index.php/user/price?min=14&max=16"><li>14-16万</li></a>
		            <a href="index.php/user/price?min=16&max=18"><li>16-18万</li></a>
		            <a href="index.php/user/price?min=18&max=20"><li>18-20万</li></a>
		            <a href="index.php/user/price?max=20"><li>20万以上</li></a>
	            </ul>
	        </div>
	        <!-- <div class="border">
	            <a href="#">车型</a>
	            <ul class="item">
	                <li>SUV</li>
	                <li>商务</li>
	                <li>准车型</li>
	                <li>急售</li>
	            </ul>
	        </div> -->
	        <div class="buy-tit"><a href="index.php/user/sale">我要卖车</a></div>
	    </div>
	</div>

     <div id="carousel">
      <div class="content">
           <img src="assets/img/indeximages/1.jpg" alt="" class="selected"/>
           <img src="assets/img/indeximages/2.jpg" alt=""/>
           <img src="assets/img/indeximages/3.jpg" alt=""/>
           <img src="assets/img/indeximages/4.jpg" alt=""/>
      </div>
      <div id="span">
          <span id="L-btn"></span>
          <span id="R-btn"></span>
      </div>

  </div>


    <div id="purpose">
        <ul>
            <li>
                <div class="circle radius">
                    <i class="lc-01"></i>
                </div>
                <div class="txt">
                    <h4>一年/两万公里质保</h4>
                </div>
            </li>
            <li>
                <div class="circle radius">
                    <i class="lc-02"></i>
                </div>
                <div class="txt">
                    <h4>全面检测</h4>
                </div>
            </li>
            <li>
                <div class="circle radius">
                    <i class="lc-03"></i>
                </div>
                <div class="txt">
                    <h4>14天可退</h4>
                </div>
            </li>
            <li>
                <div class="circle radius">
                    <i class="lc-04"></i>
                </div>
                <div class="txt">
                    <h4>100%个人车源</h4>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="special">
    <div class="wrapper">
	    <div class="block-description">
	        <span class="title"> 特色 </span>
	    </div>
	    <div class="active-banner fl">
	        <a href="index.php/user/buy">
	            <h2>
	                <font color="#f79630">259项</font>
	                "全面检测"
	            </h2>
	            <P>严苛检测标准，无事故</P>
	            <img src="assets/img/indeximages/sun_banner.jpg" alt=""/>
	        </a>
	    </div>
	    <div class="active-blocks fr">
	        <ul>
	            <li class="li_01">
	                <a href="http://localhost/carsale1/index.php/user/dazhong" title="实用代步车" target="_blank">
	                    <p class="title">实用代步车</p>
	                    <p class="li_content">驾驭想象 聆听声音</p>
	                    <div class="pic">
	                        <img src="assets/img/indeximages/car1.jpg" alt="保值车型"/>
	                    </div>
	                </a>
	            </li>
	            <li class="li_02">
	                <a href="index.php/user/price?min=7&max=9" title="7-9万能买啥" target="_blank">
	                    <p class="title">7-9万能买啥</p>
	                    <p class="li_content">驾有所值 动气强劲</p>
	                    <div class="pic">
	                        <img src="assets/img/indeximages/car2.jpg" alt="7-9万能买啥"/>
	                    </div>
	                </a>
	            </li>
	            <li class="li_03">
	                <a href="index.php/user/price?min=14&max=16" title="14-16万能买啥" target="_blank">
	                    <p class="title">14-16万能买啥</p>
	                    <p class="li_content">风范 与自由同行</p>
	                    <div class="pic">
	                        <img src="assets/img/indeximages/car3.jpg" alt="14-16万能买啥"/>
	                    </div>
	                </a>
	            </li>
	            <li class="li_04">
	                <a href="http://localhost/carsale1/index.php/user/dazhong" title="奥迪车库" target="_blank">
	                    <p class="title">奥迪车库</p>
	                    <p class="li_content">奥迪——</p>
	                    <div class="pic">
	                        <img src="assets/img/indeximages/logo-3.jpg" alt="奥迪车库"/>
	                    </div>
	                </a>
	            </li>
	            <li class="li_05">
	                <a href="http://localhost/carsale1/index.php/user/dazhong" title="大众车库" target="_blank">
	                    <p class="title">大众车库</p>
	                    <p class="li_content">大众——</p>
	                    <div class="pic">
	                        <img src="assets/img/indeximages/logo-4.jpg" alt="大众车库"/>
	                    </div>
	                </a>
	            </li>
	            <li class="li_06">
	                <a href="http://localhost/carsale1/index.php/user/dazhong" title="岂止于大" target="_blank">
	                    <p class="title">岂止于大</p>
	                    <p class="li_content">钟爱车型</p>
	                    <div class="pic">
	                        <img src="assets/img/indeximages/car4.jpg" alt="岂止于大"/>
	                    </div>
	                </a>
	            </li>
	        </ul>
	    </div>
    </div>
</div>

<div class="footer">
    <div class="wrapper">
        Copyright © 2016-2017, snncar.com,All Rights Reserved 皖ICP备16022456号-1
    </div>
</div>


</body>
</html>