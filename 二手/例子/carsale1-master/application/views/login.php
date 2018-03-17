 <!DOCTYPE html>
<html>
<head lang="en">
	<base href="<?php echo site_url();?>">
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="assets/css/login.css"/>
    
</head>
<body>
<div id="login">
     <div class="input">
     	<form action="<?php echo site_url("user/do_login")?>" method="post" accept-charset="utf-8">		 
			用户名：<input type="text" name="uname" placeholder="请输入用户名" id="some_name"/><br/>
                  密    码：<input type="password" name="pwd" value="" id="some_name"/>
                       <button class="btn-reg">登 录</button>  
		 </form>
            <a href="index.php/user/reg">新用户请先注册</a>
     </div>
</div>
</body>
</html>

