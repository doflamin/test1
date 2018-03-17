<?php
	if($this->session->userdata('login_in') != 'TRUE'){
		redirect('user/login');
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
  <style>
        #container{
            width: 900px;
            height: 500px;
            /*border: 1px solid #000;*/
            position: relative;
            left: 50%;
            margin-left: -450px;
            top: 50px;

        }
        #small-box{
            width: 400px;
            height: 450px;
            position: relative;
            float: left;
        }
        #drag{
            width: 100px;
            height: 150px;
            background: #ccc;
            opacity: 0.5;/*透明度*/
            filter: alpha(opacity = 50 ) ;
            position: absolute;
            left: 0;
            top: 0;
        }
        #big-box{
            width: 400px;
            height: 450px;
            float: left;
            overflow: hidden;
            display: none;
            position:relative;
        }
        #big-img{
            position: absolute;
        }

        #title{
            width: 400px;
            height: 300px;
            margin: 100px 20px 0 50px;
            float: right;
        }
        #title p{
            display: block;
            font-size: 24px;
            font-weight: bolder;
        }
        .price{
            margin: 50px 0 50px 60px ;
            color:orange;
            font-size: 20px;
        }
        .btn1{
            width: 120px;
            height: 50px;
            margin-left:120px;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bolder;
            color: #000;
        }
        #sel{
        	width: 100px;
        	height: 50px;
        	float:right;
            margin-top: 27px;
            display:none;
        }
        #ok{
        	margin-left: 30px;
        	margin-top: 5px;
        }
       
        .num1,.num2{
        	display: block;
        	width: 85px;
        	height: 20px;
        	font-size: 10px;
        	color: #C43C35;
        	float: left;
     	    overflow: hidden;
        }
         .num1{
        	margin-left: 103px;
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
<!-- <form action="<?php echo site_url("user/do_order")?>" method="post" accept-charset="utf-8">     -->
<?php	
			foreach ($rs as $value) {
		?>
<div id="container">
        <div id="small-box">		
        	<input type="image"  src="<?php echo $value->carimgurl;?>" name= 'carImgurl'  style="width:400px;height: 450px;"/>
           <!-- <img   src="<?php echo $value->carimgurl;?>"  style="width:400px;height: 450px;"/> -->
            <div id="drag"></div>
        </div>

        <div id="big-box">
            <img id="big-img" src="<?php echo $value->carimgurl;?>" style="width:800px;height: 600px;"/>

    </div>
       <div id="title">
           <p name= 'carname'><?php echo $value->carname;?></p>
               <div class="price">
                   现价：<i class="fc-org priType" name= 'ncarprice'><?php echo $value->ncarprice;?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                   原价：<s name= 'ocarprice'><?php echo $value->ocarprice;?></s>
               </div>
               <div class="num1" >卖家联系方式:</div><div class="num2" ><?php echo $value->s_num;?></div>
        <?php
			}
		?>	
               

           <input type="submit" name="p_way" value="付款方式" class="btn1"/> 
           <div id="sel" name="p_way2" >
           	<select  name="p_way"  style="width: 100px;height:20px;">
           		<option  value="一次性付清">一次性付清</option>
              	<option  value="分期付款 2期">分期付款 2期</option>
              	<option  value="分期付款 3期">分期付款 3期</option>
              	<option  value="分期付款 4期">分期付款 4期</option>
            </select></br>
              <input type="submit" name="ok" value="确定" id="ok"/>
           </div>

            </div> 
    
       </div>
       </form>
</div>

 <script src="assets/js/detail.js"></script>
 <script type="text/javascript" charset="utf-8">
     $(function(){
     	$('.btn1').mouseover(function(){
     		$('#sel').show();
     		$('#ok').on('click',function(){
     		alert('交易成功');
     		location.reload();
     	});
     	})
     })
 </script>
</body>
</html>