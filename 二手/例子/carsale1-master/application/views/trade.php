<?php
	if($this->session->userdata('login_in') != 'TRUE'){
		redirect('user/login');
	}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<base href="<?php echo site_url();?>">
    <meta charset="UTF-8">
    <title>二手车交易</title>
    <link rel="stylesheet" href="assets/css/sale.css"/>
    <!-- <link rel="stylesheet" href="assets/upload/css/bootstrap.css" />
    <link rel="stylesheet" href="" type="assets/upload/css/bootstrap.min.css" />
    <link rel="stylesheet" href="" type="assets/upload/css/bootstrap-responsive.css" />
    <link rel="stylesheet" href="" type="assets/upload/css/bootstrap-responsive.min.css" /> -->
     <script type="assets/upload/js/bootstrap.js" charset="utf-8"></script>
     <script type="assets/upload/js/bootstrap.min.js" charset="utf-8"></script>
      <script src="assets/js/jquery-1.7.2.min.js"></script>   
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


<div class="f-title"></div>
<form enctype="multipart/form-data"  action="<?php echo site_url("user/do_trade")?>" method="post" accept-charset="utf-8">
	<div id="c_sale">  
      <div id="message">
		<ul>
			<li> 卖家姓名：&nbsp;&nbsp;&nbsp;<input type="text" name="sp_name" value="" id="sp_name"/> </li>
			<li>手机号码：&nbsp;&nbsp;&nbsp;<input type="text" name="sp_pnum" value="" id="sp_num"/></li>
			<li>身份证号：&nbsp;&nbsp;&nbsp;<input type="text" name="sp_sid" value="" id="sp_sid"/></li>	
			<li>家庭住址：&nbsp;&nbsp;&nbsp;<input type="text" name="sp_addr" value="" id="p_addr"/> </li>
			<li>车&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：&nbsp;&nbsp;&nbsp;<input type="text" name="c_name" value="" id="c_name"/></li>	
			<li>买车的价格：<input type="text" name="c_sprice" value="" id="c_sprice"/></li>
			<li>出售的价格：<input type="text" name="c_price" value="" id="c_price"/></li>
			<li><input type="file" name="file" value="" id="c_pic" "/></li>
			<input type="submit" name="some_name" value="提交" class="btn-reg"/>
            <!-- <button class="btn-reg">提 交</button> -->
         </ul>
	</div>
	
	
	  	<!-- <img  src="" style="width:296px;height:270px;"/> -->
		
	</div>

  <!-- <p><input type="submit" value="Continue &rarr;"/></p> -->
  </form>
<p class="write"></p>
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
 
</body>
</html>