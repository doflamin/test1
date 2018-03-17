<?php
	if($this->session->userdata('login_in') != 'TRUE'){
		redirect('user/mlogin');
	}
?>
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
<style type="text/css">
	body{
		background:#8f8fbd;
		
	}
	#page li{
		float:right;
		padding-right:20px;
		
	}
	.img{
		width:65px;
		height:65px;
	}
	#table{
		
		margin-top: 20px;
		margin-bottom: 20px;
	    margin-right: 75px;
        margin-left: 130px;
	}
	#table td:nth-child(1){
		width:300px;
		
	}
	#table td:nth-child(2){
		width:300px;
		
	}
	
	#select-btn1 li .bb{
		color:#fff;
	}
	/*#add{
		height:30px;
		width:80px;
	}*/
	#madd,#mdelete,#mrevise{
		margin-left:230px;
		height:30px;
		width:80px;
		border-radius: 50%;
		margin-bottom:50px;
	}
	
	 #mm1,#mm2,#mm3{
		
		margin-left:300px;
		
	} 
	 
	.i1{
		margin-left:260px;
		width:50px;
		height:20px;
		
	}
	
</style>
</head>
<body>
	<div id="header" style="background: #fff">
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
        <div class="user">
             <a><?php echo $this->session->userdata('mname')?>已登录 </a>&nbsp|&nbsp
	            <a href='index.php/user/mlogout?name=$mname'>退出</a>
          </div>

    </div>
    <div class="header-select">
    <div class="wrapper">
        <ul id="select-btn1">
                 <li><a href="index.php/user/goods?id=goods">商品信息</a></li> 
				 <!-- <li><a href="index.php/user/order">订单信息</a></li> 
				 <li><a href="index.php/user/shopcar">购物车</a></li> 
				 <li><a href="index.php/user/kind">商品类目</a></li>  -->
				 <li><a href="index.php/user/manager?id=manager"  class="selected">管理员信息</a></li> 
				 <li><a href="index.php/user/people">用户信息</a></li> 
        </ul>
        <!-- <ul id="select-btn2">
            <li><a href="">二手车服务咨询</a></li>
        </ul> -->

    </div>
    </div>
</div>

    <div id="body">
	   <!-- <div id="navbar" class="menu"> 
			<ul> 
				 
				 <li><a href="index.php/user/goods">商品信息</a></li> 
				 <li><a href="index.php/user/order">订单信息</a></li> 
				 <li><a href="index.php/user/shopcar">购物车</a></li> 
				 <li><a href="index.php/user/kind">商品类目</a></li> 
				 <li><a href="index.php/user/manager" class="bb">管理员信息</a></li> 
				 <li><a href="index.php/user/people">用户信息</a></li> 
				 
			</ul> 
		</div> -->
		<div class="wrapper">
		
		<div id="table" >
		    <table border="1" cellpadding="50" cellspacing="5" bgcolor="#8f8fbd"  style="width: 900px;height:300px;margin-left: 10px;">	
		    	 <th colspan="2">管理员信息</th>
				 <tr><td align="center">管理员昵称</td><td align="center">密码</td></tr>
				 
				 <?php
			
				         foreach ($rs as $value) {
				 ?>
				            <tr><td align="center"><?php echo $value->mname;?></td><td align="center"><?php echo $value->mpwd;?></td></tr>
				 <?php
					     }
					
				 ?>
		    </table>
		    
		</div>
		<button id="madd">增添信息</button>
		<button id="mdelete">删除信息</button>
		<button id="mrevise">修改信息</button>
		  
	      <form action="index.php/user/mdelete" method="post" id="mm2">
		  	
		  </form>
		  <form action="index.php/user/mrevise" method="post" id="mm3">
		  	
		  </form>
		<form action="index.php/user/madd" method="post" id="mm1">
		  	
		  </form>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
	$('#madd').click(function(){
		$("#body #mm1").empty("");
		var foRM = '&nbsp;&nbsp;&nbsp;&nbsp;管理员昵称:&nbsp<input type="text" name="mname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理员密码:&nbsp;<input type="password" name="mpwd" class="p1"><br /><br /><input class="i1" type="submit" name="sub" value="增加">';
	
		$("#body #mm1").append(foRM);
			 
		});
		
	$('#mdelete').click(function(){
		$("#body #mm2").empty("");
		var foRM = '&nbsp;&nbsp;&nbsp;&nbsp;管理员昵称:&nbsp<input type="text" name="mname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理员密码:&nbsp;<input type="password" name="mpwd" class="p1"><br /><br /><input class="i1" type="submit" name="sub" value="删除">';
	
		$("#body #mm2").append(foRM);
			 
		});
		
	$('#mrevise').click(function(){
		$("#body #mm3").empty("");
		var foRM = '&nbsp;&nbsp;&nbsp;&nbsp;管理员昵称:&nbsp<input type="text" name="mname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;修改后的密码:&nbsp;<input type="password" name="mpwd" class="p1"><br /><br /><input class="i1" type="submit" name="sub" value="修改">';
	
		$("#body #mm3").append(foRM);
			 
		});
</script>
	
    
</body>
</html>