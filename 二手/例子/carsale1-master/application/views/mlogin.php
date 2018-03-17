<!DOCTYPE html>
<html>
<head lang="en">
	<base href="<?php echo site_url();?>">
    <meta charset="UTF-8">
    <title>二手车交易</title>
    
    <link rel="stylesheet" href="assets/css/common.css"/>
    <link rel="stylesheet" href="assets/css/index.css"/>
    <link rel="stylesheet" href="assets/css/dialog.css"/>

</head>
<style type="text/css">
	
	#page li{
		float:right;
		padding-right:20px;
		
	}
	.img{
		width:65px;
		height:65px;
	}
	#table{
		margin-top: 100px;
		margin-bottom: 20px;
		margin-left: 400px;
	
	}
	#some_name{
		margin: 20px;
	}
	.btn-reg{
		width: 50px;
		margin-top: 20px;
		margin-left: 105px;
		
	}
</style>
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
            <a  id="login" href="index.php/user/login'"><?php echo $this->session->userdata('name')?>已登录</a>
            <a  id="register"  href="index.php/user/reg'">注册</a>
        </div> -->
    </div>
    <div class="header-select">
    <div class="wrapper">
        <ul id="select-btn1">
          <li><a href="index.php/user/index">二手车网站首页</a></li>
          <li>商品信息</li>
	     <li>管理员信息</li>
	     <li>用户信息</li>
        </ul>

    </div>
    </div>
</div>
		<div class="wrapper">
		
		<div id="table" >
		     <form action="<?php echo site_url("user/m_login")?>" method="post" accept-charset="utf-8">		 
			         用户名：<input type="text" name="mname" placeholder="请输入管理员姓名" id="some_name"/><br/>
                           密    码：&nbsp;&nbsp;<input type="password" name="mpwd" value="" id="some_name"/><br/>
                             <button class="btn-reg">登 录</button>  
		     </form>
				 
		    </table>
		    
		</div>
		
			
		
		
		 
		 
    </div>
</div>
</body>
</html>