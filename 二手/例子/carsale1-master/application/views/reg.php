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
     	<form action="<?php echo site_url("user/do_reg")?>" method="post" accept-charset="utf-8">
		   用户名：<input type="text" name="uname" placeholder="请输入数字或字母" id="some_name"/><br/>
                     密    码：<input type="password" name="pwd" placeholder="请输入6位有效数字" id="some_name"/><br/>
              <button class="btn-reg"  href="../index.php">注 册</button>
					
		 </form>
              
     </div>
</div>
</body>
</html>
