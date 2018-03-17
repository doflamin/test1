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
		position: relative;
	}
	a{
		color: #000000;
	}
	.urevise{
		cursor: pointer;
	}
	
	#table{
		margin-top: 80px;
		margin-bottom: 20px;
	    margin-right: 75px;
        margin-left: 100px;
       
	}
	#table td:nth-child(1){
		width:200px;
		
	}
	#table td:nth-child(2){
		width:200px;
		
	}
	#table td:nth-child(3){
		width:200px;
		
	}
	#table td:nth-child(4){
		width:165px;
		
	}#table td:nth-child(5){
		width:165px;
		
	}
	
	
	/*#select-btn1 li .bb{
		color:#fff;
	}*/
	#uadd{
		height:30px;
		width:80px;
		float:right;
		margin-right:130px;
	}
	#pagelist{
		margin-left:100px;
	}
	#pagelist ul li { 
		float:left;
		border:1px solid #e0691a; 
		height:20px; 
		font-weight:bold; 
		line-height:20px; 
		margin:0px 10px; 
		list-style:none;
		}
    #pagelist ul li a,
    .current { 
    	background:#FFB27A; 
    	display:block; 
    	padding:0px 6px; 
    	font-weight:bold;
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
    <div class="header-select" id="into">
    <div class="wrapper">
        <ul id="select-btn1">
             <li><a href="index.php/user/goods">商品信息</a></li> 
				
				 <li><a href="index.php/user/manager" >管理员信息</a></li> 
				 <li><a href="index.php/user/people" class="selected">用户信息</a></li> 
        </ul>


    </div>
    </div>
</div>
   
		<div class="wrapper">
		
		
		
		
		 <div id="table" >
		    <table border="1" cellspacing="3" cellpadding="10" bgcolor="#8f8fbd" style="width: 950px;height:300px;margin-left: 10px;">	
		    	 <th colspan="5">用户信息</th>
				 <tr><td align="center">用户编号</td><td align="center">用户姓名</td><td align="center">用户密码</td><td align="center" colspan="2">操作</td></tr>
				  <?php
				          foreach ($query as $value) {
				  ?>
				            <tr><td align="center" class="uid"><?php echo $value->uid;?></td><td  align="center" class="uname"><?php echo $value->uname;?></td>
				           	 <td align="center" class="pwd"><?php echo $value->pwd;?></td><td align="center"><a href="index.php/user/udelete?id=<?php echo $value->uname;?>">[删除]</a></td>
				           	 <td align="center"><a class="urevise">[修改]</a></td></tr>
				  <?php
					      }
					
				  ?> 
				
		    </table>
		</div> 
		<div id="pagelist">
		  <ul>
		  	<?php echo $this->pagination->create_links();?>
		</ul>
		</div>
			
		
			<button id="uadd">添加用户</button>
		
		</div>
		
<script> 
 $('.urevise').click(function(){
	
		var uId=$(this).parent().siblings(".uid").text();
    	var uName=$(this).parent().siblings(".uname").text();
    	var pwd=$(this).parent().siblings(".pwd").text();
    	
	
		var createDiv = document.createElement("div");
		var h3A1 = document.createElement("h2");
		var aText = document.createElement("text");
		var h3A2 = document.createElement("h3");
		var h3A3 = document.createElement("h3");
		
		// var inPut1 = document.createElement("input");
		var inPut2 = document.createElement("input");
		var inPut3 = document.createElement("input");
		
		
		var aa = document.createElement("a");
		var aButton = document.createElement("button");
		
        createDiv.style.background="pink";
        // createDiv.style.border="1px solid orange";
        createDiv.style.width="400px";
        createDiv.style.height="535px";
        createDiv.style.position="absolute";
        createDiv.style.right="0px";
        createDiv.style.top="131px";
        // createDiv.innerHTML="Testcreateadivelement!";
        $("html").append(createDiv);
        
        h3A1.style.position="absolute";
        h3A1.style.right="150px";
        h3A1.style.top="250px";
        h3A1.innerHTML="用户编号为：";
        $("html").append(h3A1);
        
        aText.style.position="absolute";
        aText.style.right="130px";
        aText.style.top="250px";
        aText.innerHTML=uId;
        aText.id="uid";
        $("html").append(aText);
        
        h3A2.style.position="absolute";
        h3A2.style.right="280px";
        h3A2.style.top="350px";
        h3A2.innerHTML="用户姓名 ：";
        $("html").append(h3A2);
        
        h3A3.style.position="absolute";
        h3A3.style.right="280px";
        h3A3.style.top="450px";
        h3A3.innerHTML="用户密码 ：";
        $("html").append(h3A3);
         
        
        inPut2.style.position="absolute";
        inPut2.style.right="100px";
        inPut2.style.top="350px";
        inPut2.value=uName;
        // inPut2.innerHTML=carName;
        $("html").append(inPut2);
        
        inPut3.style.position="absolute";
        inPut3.style.right="100px";
        inPut3.style.top="450px";
        inPut3.value=pwd;
        $("html").append(inPut3);
        
        
       
        aa.style.position="absolute";
        aa.style.right="180px";
        aa.style.top="550px";
        // aa.style.height="30px";
        // aa.style.width="80px";
        aa.id="save";
        aButton.style.height="30px";
        aButton.style.width="80px";
        aButton.innerHTML="保存";
        $("html").append(aa);
        $('#save').append(aButton);
        
        $('#save').click(function(){
        	var newinPut2=inPut2.value;
        	var newinPut3=inPut3.value;
        	
        	var uid=aText.innerHTML;
        	// console.log(carid);
        	
        	$("#save").attr("href","http://localhost/carsale1/index.php/user/urevise?newuname="+newinPut2+"&newpwd="+newinPut3+"&newuid="+uid);
		  // });
        });
        
    });
       
       
       
    $('#uadd').click(function(){
	
	
		var createDiv = document.createElement("div");
		
		var h3A1 = document.createElement("h3");
		var h3A2 = document.createElement("h3");
		var h3A3 = document.createElement("h3");
		
		
		// var inPut1 = document.createElement("input");
		var inPut1 = document.createElement("input");
		var inPut2 = document.createElement("input");
		var inPut3 = document.createElement("input");
		
		
		var aa = document.createElement("a");
		var aButton = document.createElement("button");
		
        createDiv.style.background="pink";
        // createDiv.style.border="1px solid orange";
        createDiv.style.width="400px";
        createDiv.style.height="535px";
        createDiv.style.position="absolute";
        createDiv.style.right="0px";
        createDiv.style.top="131px";
        // createDiv.innerHTML="Testcreateadivelement!";
        $("html").append(createDiv);
        
        h3A1.style.position="absolute";
        h3A1.style.right="250px";
        h3A1.style.top="200px";
        h3A1.innerHTML="用户编号 ：";
        $("html").append(h3A1);
        
        h3A2.style.position="absolute";
        h3A2.style.right="250px";
        h3A2.style.top="300px";
        h3A2.innerHTML="用户姓名 ：";
        $("html").append(h3A2);
        
        h3A3.style.position="absolute";
        h3A3.style.right="250px";
        h3A3.style.top="400px";
        h3A3.innerHTML="用户密码 ：";
        $("html").append(h3A3);
        
       
        
        inPut1.style.position="absolute";
        inPut1.style.right="70px";
        inPut1.style.top="200px";
        // inPut2.value=carName;
        // inPut2.innerHTML=carName;
        $("html").append(inPut1);
        
        inPut2.style.position="absolute";
        inPut2.style.right="70px";
        inPut2.style.top="300px";
        // inPut2.value=carName;
        // inPut2.innerHTML=carName;
        $("html").append(inPut2);
        
        inPut3.style.position="absolute";
        inPut3.style.right="70px";
        inPut3.style.top="400px";
        // inPut3.value=ncarPrice;
        $("html").append(inPut3);
        
        
       
        aa.style.position="absolute";
        aa.style.right="180px";
        aa.style.top="500px";
        // aa.style.height="30px";
        // aa.style.width="80px";
        aa.id="add1";
        aButton.style.height="30px";
        aButton.style.width="80px";
        aButton.innerHTML="添加";
        $("html").append(aa);
        $('#add1').append(aButton);
        
        $('#add1').click(function(){
        	var newinPut1=inPut1.value;
        	var newinPut2=inPut2.value;
        	var newinPut3=inPut3.value;
        	
        	
        	// console.log(carid);
        	
        	 $("#add1").attr("href","http://localhost/carsale1/index.php/user/uadd?newuid="+newinPut1+"&newuname="+newinPut2+"&newpwd="+newinPut3);
		  // });
        });
        
    });
</script>
</body>
</html>