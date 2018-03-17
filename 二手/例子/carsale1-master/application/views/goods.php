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
	.grevise{
		cursor: pointer;
	}
	.img{
		width:65px;
		height:65px;
	}
	#table{
		margin-top: 20px;
		margin-bottom: 20px;
	    margin-right: 75px;
        margin-left: 100px;
	}
	#table td:nth-child(2){
		width:505px;
		
	}
	#table td:nth-child(4){
		width:100px;
		
	}#table td:nth-child(5){
		width:100px;
		
	}
	#table td:nth-child(6){
		width:50px;
		
	}
	#table td:nth-child(7){
		width:50px;
		
	}
	/*#select-btn1 li .bb{
		color:#fff;
	}*/
	#add{
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
             <li><a href="index.php/user/goods" class="selected">商品信息</a></li> 
				 <!-- <li><a href="index.php/user/order">订单信息</a></li> 
				 <li><a href="index.php/user/shopcar">购物车</a></li> 
				 <li><a href="index.php/user/kind">商品类目</a></li>  -->
				 <li><a href="index.php/user/manager" >管理员信息</a></li> 
				 <li><a href="index.php/user/people">用户信息</a></li> 
        </ul>
        <!-- <ul id="select-btn2">
            <li><a href="">二手车服务咨询</a></li>
        </ul> -->

    </div>
    </div>
</div>
   
		<div class="wrapper">
		
		
		
		
		 <div id="table" >
		    <table border="1" cellspacing="3" cellpadding="10" bgcolor="#8f8fbd">	
		    	 <th colspan="7">商品信息</th>
				 <tr><td align="center">商品编号</td><td align="center">商品名称</td><td align="center">商品样图</td><td align="center">商品价格</td><td align="center">商品数量</td><td align="center" colspan="2">操作</td></tr>
				  <?php
				          foreach ($query as $value) {
				  ?>
				            <tr><td align="center" class="carid"><?php echo $value->carid;?></td><td class="carname"><?php echo $value->carname;?></td><td><img class="img" src="<?php echo $value->carimgurl;?>" alt=""/></td>
				           	 <td align="center" class="ncarprice"><?php echo $value->ncarprice;?>万</td><td align="center" class="carnum"><?php echo $value->carnum;?></td><td align="center"><a href="index.php/user/delete?id=<?php echo $value->carname;?>">[删除]</a></td>
				           	 <td align="center"><a class="grevise">[修改]</a></td></tr>
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
			
		<!-- <?php


		// if(isset($_GET['p'])){
			 // $page=$_GET['p'];
		 // }else{
			 // $page=1;
		 // }
// 		
		 // $pagesize=5;
		 // $pp=($page-1)*$pagesize;   //从第几条开始查
// 			 	
// 	 	
		 // $sql="select count(*) as allnum from fenye ";
		 // $query=mysqli_query($link,$sql);
		 // $rs=mysqli_fetch_array($query);
// 	 	
		 // $lastpage=ceil($rs[allnum]/$pagesize);   //计算一共多少页
		// // echo $lastpage;
		// // die();
		 // $sql="select * from fenye limit $pp,$pagesize";
		 // $query=mysqli_query($link,$sql);
		 echo "<table align='center' width='500' border=1 cellspacing=0>";
	     while($rs=mysqli_fetch_array($query)){
			// echo $sql;
			// die();
		 	
			$_GET['p']?$_GET['p']:1;
		 	
			 for($i=0;$i<50;$i++){
				 $fyname='laoshan'.$i;
				 $sql="insert into fenye(fyid,fyname) values(null,'$fyname')";
				 mysqli_query($link,$sql);
			 }
			 
		?>
		<tr><td align="center"><?php echo $value->carid;?></td><td><?php echo $value->carname;?></td><td align="center"><img class="img" src="<?php echo $value->carimgurl;?>" alt=""/></td>
		<td align="center"><?php echo $value->ncarprice;?>万</td><td align="center"><?php echo $value->carnum;?></td><td align="center">[删除]</td><td align="center">[修改]</td></tr>
		
		 <?php
			 }
			 echo "<tr>";
			
			 echo "<td colspan='2'>";
			 echo "<a href='index.php/user/fenye?p=1'>首页</a>";
			 echo "<a href='index.php/user/fenye?p=".(($page>1)?$page-1:1)."'>上一页</a>";
			 echo "<a href='index.php/user/fenye?p=".(($page>=$lastpage)?$lastpage:$page+1)."'>下一页</a>";
			 echo "<a href='index.php/user/fenye?p=$lastpage'>末页</a>";
			 echo "</td>";
			 echo "</tr>";
			 echo "</table>";
		 ?> 
		 
		 
    </div>-->
			<button id="add">添加商品</button>
		
			<!-- <form action="index.php/user/grevise" method="post" class="f1">
					  	
			</form> -->
		
		</div>
		<!--<script type="text/javascript" charset="utf-8">
	    $('.grevise').click(function(){
	    	alert(222);
	    	var carId=$(this).parent().siblings(".carid").text();
	    	var carName=$(this).parent().siblings(".carname").text();
	    	var ncarPrice=$(this).parent().siblings(".ncarprice").text();
	    	var carNum=$(this).parent().siblings(".carnum").text();
	    	// console.log(carId);
	    	// console.log(carName);
	    	// console.log(ncarPrice);
	    	// console.log(carNum);
		// var foRM = '&nbsp;&nbsp;&nbsp;&nbsp;用户昵称:&nbsp<input type="text" name="mname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;修改后的密码:&nbsp;<input type="password" name="mpwd" id="p1"><br /><br /><input id="i1" type="submit" name="sub" value="修改">';
// 	
		// $("#into").append(foRM);
			  var oDiv1 = document.createElement('div');
		});
</script>-->
<script> 
 $('.grevise').click(function(){
	
		var carId=$(this).parent().siblings(".carid").text();
    	var carName=$(this).parent().siblings(".carname").text();
    	var ncarPrice=$(this).parent().siblings(".ncarprice").text();
    	var carNum=$(this).parent().siblings(".carnum").text();
	
		var createDiv = document.createElement("div");
		var h3A1 = document.createElement("h2");
		var aText = document.createElement("text");
		var h3A2 = document.createElement("h3");
		var h3A3 = document.createElement("h3");
		var h3A4 = document.createElement("h3");
		
		// var inPut1 = document.createElement("input");
		var inPut2 = document.createElement("input");
		var inPut3 = document.createElement("input");
		var inPut4 = document.createElement("input");
		
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
        h3A1.style.top="160px";
        h3A1.innerHTML="商品编号为：";
        $("html").append(h3A1);
        
        aText.style.position="absolute";
        aText.style.right="130px";
        aText.style.top="165px";
        aText.innerHTML=carId;
        aText.id="carid";
        $("html").append(aText);
        
        h3A2.style.position="absolute";
        h3A2.style.right="280px";
        h3A2.style.top="250px";
        h3A2.innerHTML="商品名称 ：";
        $("html").append(h3A2);
        
        h3A3.style.position="absolute";
        h3A3.style.right="280px";
        h3A3.style.top="330px";
        h3A3.innerHTML="商品价格 ：";
        $("html").append(h3A3);
         
        h3A4.style.position="absolute";
        h3A4.style.right="280px";
        h3A4.style.top="410px";
        h3A4.innerHTML="商品数量 ：";
        $("html").append(h3A4);
        
        inPut2.style.position="absolute";
        inPut2.style.right="100px";
        inPut2.style.top="250px";
        inPut2.value=carName;
        // inPut2.innerHTML=carName;
        $("html").append(inPut2);
        
        inPut3.style.position="absolute";
        inPut3.style.right="100px";
        inPut3.style.top="330px";
        inPut3.value=ncarPrice;
        $("html").append(inPut3);
        
        inPut4.style.position="absolute";
        inPut4.style.right="100px";
        inPut4.style.top="410px";
        inPut4.value=carNum;
        $("html").append(inPut4);
       
       
        aa.style.position="absolute";
        aa.style.right="180px";
        aa.style.top="500px";
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
        	var newinPut4=inPut4.value;
        	var carid=aText.innerHTML;
        	// console.log(carid);
        	
        	$("#save").attr("href","http://localhost/carsale1/index.php/user/grevise?newcarname="+newinPut2+"&newncarprice="+newinPut3+"&newcarnum="+newinPut4+"&newcarid="+carid);
		  // });
        });
        
    });
       
       
       
    $('#add').click(function(){
	
	
		var createDiv = document.createElement("div");
		
		var h3A1 = document.createElement("h3");
		var h3A2 = document.createElement("h3");
		var h3A3 = document.createElement("h3");
		var h3A4 = document.createElement("h3");
		var h3A5 = document.createElement("h3");
		var h3A6 = document.createElement("h3");
		var h3A7 = document.createElement("h3");
		
		// var inPut1 = document.createElement("input");
		var inPut1 = document.createElement("input");
		var inPut2 = document.createElement("input");
		var inPut3 = document.createElement("input");
		var inPut4 = document.createElement("input");
		var inPut5 = document.createElement("input");
		var inPut6 = document.createElement("input");
		var inPut7 = document.createElement("input");
		
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
        h3A1.style.top="170px";
        h3A1.innerHTML="商品编号 ：";
        $("html").append(h3A1);
        
        h3A2.style.position="absolute";
        h3A2.style.right="250px";
        h3A2.style.top="230px";
        h3A2.innerHTML="商品名称 ：";
        $("html").append(h3A2);
        
        h3A3.style.position="absolute";
        h3A3.style.right="250px";
        h3A3.style.top="290px";
        h3A3.innerHTML="商品原价 ：";
        $("html").append(h3A3);
        
        h3A5.style.position="absolute";
        h3A5.style.right="250px";
        h3A5.style.top="350px";
        h3A5.innerHTML="商品现价 ：";
        $("html").append(h3A5);
         
        h3A4.style.position="absolute";
        h3A4.style.right="250px";
        h3A4.style.top="410px";
        h3A4.innerHTML="商品数量 ：";
        $("html").append(h3A4);
        
        h3A6.style.position="absolute";
        h3A6.style.right="210px";
        h3A6.style.top="470px";
        h3A6.innerHTML="商品上牌时间 ：";
        $("html").append(h3A6);
        
        h3A7.style.position="absolute";
        h3A7.style.right="250px";
        h3A7.style.top="530px";
        h3A7.innerHTML="商品样图 ：";
        $("html").append(h3A7);
        
        inPut1.style.position="absolute";
        inPut1.style.right="70px";
        inPut1.style.top="170px";
        // inPut2.value=carName;
        // inPut2.innerHTML=carName;
        $("html").append(inPut1);
        
        inPut2.style.position="absolute";
        inPut2.style.right="70px";
        inPut2.style.top="230px";
        // inPut2.value=carName;
        // inPut2.innerHTML=carName;
        $("html").append(inPut2);
        
        inPut3.style.position="absolute";
        inPut3.style.right="70px";
        inPut3.style.top="290px";
        // inPut3.value=ncarPrice;
        $("html").append(inPut3);
        
        inPut5.style.position="absolute";
        inPut5.style.right="70px";
        inPut5.style.top="350px";
        // inPut4.value=carNum;
        $("html").append(inPut5);
        
        inPut4.style.position="absolute";
        inPut4.style.right="70px";
        inPut4.style.top="410px";
        // inPut4.value=carNum;
        $("html").append(inPut4);
        
        inPut6.style.position="absolute";
        inPut6.style.right="70px";
        inPut6.style.top="470px";
        inPut6.type="date";
        // inPut4.value=carNum;
        $("html").append(inPut6);
        
        inPut7.style.position="absolute";
        inPut7.style.right="70px";
        inPut7.style.top="530px";
      
        // inPut4.value=carNum;
        $("html").append(inPut7);
       
       
        aa.style.position="absolute";
        aa.style.right="180px";
        aa.style.top="600px";
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
        	var newinPut5=inPut5.value;
        	var newinPut4=inPut4.value;
        	var newinPut6=inPut6.value;
        	var newinPut7=inPut7.value;
        	
        	// console.log(carid);
        	
        	 $("#add1").attr("href","http://localhost/carsale1/index.php/user/add?newcarid="+newinPut1+"&newcarname="+newinPut2+"&newocarprice="+newinPut3+"&newncarprice="+newinPut5+"&newcarnum="+newinPut4+"&newsptime="+newinPut6+"&newimg="+newinPut7);
		  // });
        });
        
    });
</script>
</body>
</html>