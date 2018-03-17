<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			// $this->load->library('session');
		}
		
		
		public function index(){        //主页
			
			$this->load->view('index.php');
		}
		
		   public function login(){          //登录
	   	$this->load->view('login.php');
	   }
		public function do_login(){           
			$name=$this->input->post('uname');
			$pass=$this->input->post('pwd');
			$rs=$this->user_model->get_select($name,$pass);
				 if($rs){
				 	$arr=array(	
				 	      'id'=>$rs->uid,			     
					      'name'=>$rs->uname,
					      'pass'=>$rs->pwd,
					      'login_in'=>TRUE
					
					);
					
					$this->session->set_userdata($arr);
					echo"<script>alert('登录成功')</script>";
					header("Refresh:0;url=index");
				 }else{
						echo"<script>alert('对不起，用户不存在!');history.back();</script>";
					
				 }			
			}
		       
	      public function reg(){              //注册
	   	$this->load->view('reg.php');
	   }                 
		 public function do_reg(){
			$name=$this->input->post('uname');
			$pass=$this->input->post('pwd');
			// $rpass=$this->input->post('rpass');
			// if($pass==$rpass){ 
			$rs=$this->user_model->checkname($name);
			if($rs){
				echo"<script>alert('对不起，该用户已注册!');history.back();</script>";
			}else{
				if(strlen($pass)!=6){
					echo"<script>alert('密码长度为6位');history.back();</script>";
					// redirect("user/reg");
				}else{
				$rs=$this->user_model->set_insert($name,$pass);
				if($rs){
					// echo "<script>setTimeout('location.href='login'',3000)</script>";
					echo"<script>alert('注册已成功，将为你跳转到登录页面')</script>";
					header("Refresh:0;url=login");
				}	
			  }			
			}				
		}
		 
		    public function logout()               //用户注销
		{ 
			$this->load->view('logout.php');
		}
		
		
		
		
		
		public function buy(){         //我要买车
			
			$this->load->view('buy.php');
			
		}
		
		public function dazhong(){   //大众页面
		
			$this->load->view('dazhong.php');
		}
		public function do_dazhong(){       
			
			$rs=$this->user_model->get_seldz();
			// echo $rs;
			
			//json是js对象的字符串表示法
				$jsonobj = json_encode($rs);    
				//对变量进行json编码			
			    echo $jsonobj;
			
		}
		
		public function xiandai(){             //现代页面
		
			$this->load->view('xiandai.php');
			
		}
        public function do_xiandai(){
			
			$rs=$this->user_model->get_selxd();
			// echo $rs;
			
			//json是js对象的字符串表示法
				$jsonobj = json_encode($rs);    
				//对变量进行json编码			
			    echo $jsonobj;
			
		}
     public function chexi(){                   //车系页面
		
			$chexi=$this->input->get('id');
			$rs=$this->user_model->get_chexi($chexi);
			// var_dump($rs);
			// die;
			$arr["rs"]=$rs;
  			$this->load->view('chexi.php',$arr);
			
			
		}
		
		public function price(){                  //价格分类页面
		
			$sprice=$this->input->get('min');
			$bprice=$this->input->get('max');
			if($sprice){
				if($bprice){
					$rs=$this->user_model->get_both($sprice,$bprice);
				}else{
					$rs=$this->user_model->get_min($sprice);
				}
			}else{
				$rs=$this->user_model->get_max($bprice);
			}
			// echo $sprice;
			
			$arr["rs"]=$rs;
  			$this->load->view('price.php',$arr);
			
			
		}
		
			 public function detail()               //商品详情页面
		{
			// $user=$_GET('uid');
			// var_dump($user) ;
			// die(); 
			$img=$this->input->get('id');
			$rs=$this->user_model->get_carnews($img);
			
			$arr["rs"]=$rs;
			// $a=$this->user_model->o_insert($rs);
			$this->load->view('detail.php',$arr);
		}
		
		// public function do_order(){
			// $uid = $this->session->userdata('id');
			// // $cid = $this->session->
			// // var_dump($arr);
			// // die();
			// $imgurl=$this->input->post('carImgurl');
// 			
			// $cname=$this->input->post('carname');
			// $nprice=$this->input->post('ncarprice');
			// $oprice=$this->input->post('ocarprice');
			// $pway=$this->input->post('p_way');
// 			
			// $rs = $this->user_model->o_insert($uid,$imgurl,$cname,$nprice,$oprice,$pway);
// 			
// 			 
		// }
		
		
		
		public function sale(){           //我要卖车
		
			$this->load->view('sale.php');
		}
		
		public function do_buy(){
			
			$rs=$this->user_model->get_sel();
			//json是js对象的字符串表示法
				$jsonobj = json_encode($rs);    
				//对变量进行json编码			
			    echo $jsonobj;
			
		}
		
		 public function trade()                //我要卖车填单子页面
		{
			$this->load->view('trade.php');
		}
		
		 public function do_trade(){
		 	// $uid = $this->session->userdata('id');
		 	$p_name = $this->input->post('sp_name');
			$p_pnum = $this->input->post('sp_pnum');
			$p_sid = $this->input->post('sp_sid');
			$p_addr = $this->input->post('sp_addr');
			$name = $this->input->post('c_name');
			$s_price = $this->input->post('c_sprice');
			$price = $this->input->post('c_price');
			
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$pic=$_FILES["file"]["name"];
			$extension = end($temp);     // 获取文件后缀名
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
			&& in_array($extension, $allowedExts))
			{
				
					move_uploaded_file($_FILES["file"]["tmp_name"], "assets/img/" . $_FILES["file"]["name"]);
					$rs=$this->user_model->c_insert($p_name,$p_pnum,$p_sid,$p_addr,$name,$s_price,$price,$pic);
					if($rs){
						 echo "<script>alert('提交成功！')</script>";
						redirect('user/trade');
					}else{
				 		 echo "<script>alert('提交失败！');history.back();</script>";
					}		
			}else{
					echo "<script>alert('上传类型不正确');history.back();</script>";
			}
			
		 }
		 
		 public function order()          //订单
		{
			$this->load->view('order.php');
		}
		
	
		 public function mlogin()          //管理员登录页面
		{
			$this->load->view('mlogin.php');
		}
		
		 public function m_login(){           
			$mname=$this->input->post('mname');
			$mpwd=$this->input->post('mpwd');
			$rs=$this->user_model->m_select($mname,$mpwd);
				 if($rs){
				 	$arr=array(	
				 	      'id'=>$rs->mid,			     
					      'mname'=>$rs->mname,
					      'mpwd'=>$rs->mpwd,
					      'login_in'=>TRUE
					
					);
					$this->session->set_userdata($arr);
					echo"<script>alert('登录成功')</script>";
					header("Refresh:0;url=manager");
				 }else{
						echo"<script>alert('对不起，用户不存在!');history.back();</script>";
					
				 }			
			}
		
		 public function mlogout()          //管理员注册页面
		{
			$this->load->view('mlogout.php');
		}
		 // public function manager()          //管理员页面
		// {
			// $this->load->view('manager.php');
		// }
		 // public function goods()             //管理员下面的商品页面
		// {
			// $this->load->view('goods.php');
		// }
// 		
		 // public function people()            //管理员下面的用户信息页面
		// {
			// $this->load->view('people.php');
		// }
		
			
		 public function manager()
		{
			$manager=$this->input->get('id');
			$rs=$this->user_model->get_manager($manager); 
			// var_dump($rs);
			// die;
			$arr["rs"]=$rs;
  			
			$this->load->view('manager.php',$arr);
		}
		public function madd()    //添加管理员信息
		{
			$mname=$_POST['mname'];
		    $mpwd=$_POST['mpwd'];   
			$rs=$this->user_model->get_madd($mname,$mpwd);
			$arr["rs"]=$rs;
			$this->load->view('manager.php',$arr);
			echo"<script>alert('添加成功!');</script>";
			
		}
		
		public function mdelete()    //删除管理员信息
		{
			$mname=$_POST['mname'];
		    $mpwd=$_POST['mpwd'];   
			$rs=$this->user_model->get_mdelete($mname,$mpwd);
			$arr["rs"]=$rs;
			$this->load->view('manager.php',$arr);
			echo"<script>alert('删除成功!');</script>";
			 
			// var_dump($rs);
			// die;
			
		}
		
		public function mrevise()    //修改管理员信息
		{
			$mname=$_POST['mname'];
		    $mpwd=$_POST['mpwd'];   
			$rs=$this->user_model->get_tf($mname);
			if($rs){
				$rs=$this->user_model->get_mrevise($mname,$mpwd);
				$arr["rs"]=$rs;
			    $this->load->view('manager.php',$arr);
				echo"<script>alert('修改成功!');</script>";
			}else{
				
				echo"<script>alert('未找到该管理员!');</script>";
				header("Refresh:0;url=manager");
				
			}
			 
			// var_dump($rs);
			// die;
			
		}
		
		
			 
			// var_dump($rs);
			// die;
			
		
		
		
		 public function goods()
		{
			
			$page_num = '5';//每页的数据
			$data=$this->user_model->page('chexi',$page_num,$this->uri->segment(3));
			$total_nums=$data['total_nums']; //这里得到从数据库中的总页数
			$data['query']=$data[0]; //把查询结果放到$data['query']中
			$this->load->library('pagination');
			$config['base_url'] = $this->config->item('base_url').'/index.php/user/goods/';
			$config['total_rows'] = $total_nums;//总共多少条数据
			$config['per_page'] = $page_num;//每页显示几条数据
			$config['full_tag_open'] = '<p>';
			$config['full_tag_close'] = '</p>';
			$config['first_link'] = '首页';
			$config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
			$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
			$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
			$config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
			$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
			$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
			$config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
			$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
			$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
			$config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
			$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
			$config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
			$config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
			$config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$this->load->view('goods.php',$data);
			// var_dump($data);
			// die();
			// $goods=$this->input->get('id');
			// $pagesize=5;
			// $rs=$this->user_model->get_fenye(); 
			// echo $rs;
			// $rs=intval($rs);
			// $lastpage=ceil($rs/$pagesize);
// 			
			// $this->load->view('goods.php',$lastpage);
	}

		public function people()
		{
			
			$page_num = '5';//每页的数据
			$data=$this->user_model->page('user',$page_num,$this->uri->segment(3));
			$total_nums=$data['total_nums']; //这里得到从数据库中的总页数
			$data['query']=$data[0]; //把查询结果放到$data['query']中
			$this->load->library('pagination');
			$config['base_url'] = $this->config->item('base_url').'/index.php/user/people/';
			$config['total_rows'] = $total_nums;//总共多少条数据
			$config['per_page'] = $page_num;//每页显示几条数据
			$config['full_tag_open'] = '<p>';
			$config['full_tag_close'] = '</p>';
			$config['first_link'] = '首页';
			$config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
			$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
			$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
			$config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
			$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
			$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
			$config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
			$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
			$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
			$config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
			$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
			$config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
			$config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
			$config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$this->load->view('people.php',$data);
			
	}
		public function delete()
		{
			$delete=$this->input->get('id');
			
			
			$rs=$this->user_model->get_delete($delete);
			if($rs){
				
				$page_num = '5';//每页的数据
				$data=$this->user_model->page('chexi',$page_num,$this->uri->segment(3));
				$total_nums=$data['total_nums']; //这里得到从数据库中的总页数
				$data['query']=$data[0]; //把查询结果放到$data['query']中
				$this->load->library('pagination');
				$config['base_url'] = $this->config->item('base_url').'/index.php/user/goods/';
				$config['total_rows'] = $total_nums;//总共多少条数据
				$config['per_page'] = $page_num;//每页显示几条数据
				$config['full_tag_open'] = '<p>';
				$config['full_tag_close'] = '</p>';
				$config['first_link'] = '首页';
				$config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
				$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
				$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
				$config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
				$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
				$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
				$config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
				$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
				$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
				$config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
				$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
				$config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
				$config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
				$config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
				$config['num_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$this->load->view('goods.php',$data);
				echo"<script>alert('删除成功!');</script>";
			}
			// var_dump($rs);
			// die;
			
			
		}
		 public function udelete()
		{
			$delete=$this->input->get('id');
			
			
			$rs=$this->user_model->get_udelete($delete);
			if($rs){
				
				$page_num = '5';//每页的数据
				$data=$this->user_model->page('user',$page_num,$this->uri->segment(3));
				$total_nums=$data['total_nums']; //这里得到从数据库中的总页数
				$data['query']=$data[0]; //把查询结果放到$data['query']中
				$this->load->library('pagination');
				$config['base_url'] = $this->config->item('base_url').'/index.php/user/goods/';
				$config['total_rows'] = $total_nums;//总共多少条数据
				$config['per_page'] = $page_num;//每页显示几条数据
				$config['full_tag_open'] = '<p>';
				$config['full_tag_close'] = '</p>';
				$config['first_link'] = '首页';
				$config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
				$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
				$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
				$config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
				$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
				$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
				$config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
				$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
				$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
				$config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
				$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
				$config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
				$config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
				$config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
				$config['num_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$this->load->view('people.php',$data);
				echo"<script>alert('删除成功!');</script>";
			}
			// var_dump($rs);
			// die;
			
			
		}
		public function grevise()    //修改商品信息
		{
			$newcarid=$this->input->get('newcarid');
			$newcarname=$this->input->get('newcarname');
			$newncarprice=$this->input->get('newncarprice');
			$newcarnum=$this->input->get('newcarnum');
			$rs=$this->user_model->get_grevise($newcarid,$newcarname,$newncarprice,$newcarnum);
			if($rs){
				
				$page_num = '5';//每页的数据
				$data=$this->user_model->page('chexi',$page_num,$this->uri->segment(3));
				$total_nums=$data['total_nums']; //这里得到从数据库中的总页数
				$data['query']=$data[0]; //把查询结果放到$data['query']中
				$this->load->library('pagination');
				$config['base_url'] = $this->config->item('base_url').'/index.php/user/goods/';
				$config['total_rows'] = $total_nums;//总共多少条数据
				$config['per_page'] = $page_num;//每页显示几条数据
				$config['full_tag_open'] = '<p>';
				$config['full_tag_close'] = '</p>';
				$config['first_link'] = '首页';
				$config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
				$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
				$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
				$config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
				$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
				$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
				$config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
				$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
				$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
				$config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
				$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
				$config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
				$config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
				$config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
				$config['num_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$this->load->view('goods.php',$data);
				echo"<script>alert('修改成功!');</script>";
			}
			// $grivise=$this->input->get('id');
			// $rs=$this->user_model->get_grivise($grivise);
		}
		public function urevise()    //修改商品信息
		{
			$newuid=$this->input->get('newuid');
			$newuname=$this->input->get('newuname');
			$newpwd=$this->input->get('newpwd');
			
			$rs=$this->user_model->get_urevise($newuid,$newuname,$newpwd);
			if($rs){
				
				$page_num = '5';//每页的数据
				$data=$this->user_model->page('user',$page_num,$this->uri->segment(3));
				$total_nums=$data['total_nums']; //这里得到从数据库中的总页数
				$data['query']=$data[0]; //把查询结果放到$data['query']中
				$this->load->library('pagination');
				$config['base_url'] = $this->config->item('base_url').'/index.php/user/people/';
				$config['total_rows'] = $total_nums;//总共多少条数据
				$config['per_page'] = $page_num;//每页显示几条数据
				$config['full_tag_open'] = '<p>';
				$config['full_tag_close'] = '</p>';
				$config['first_link'] = '首页';
				$config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
				$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
				$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
				$config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
				$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
				$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
				$config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
				$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
				$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
				$config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
				$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
				$config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
				$config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
				$config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
				$config['num_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$this->load->view('people.php',$data);
				echo"<script>alert('修改成功!');</script>";
			}
			// $grivise=$this->input->get('id');
			// $rs=$this->user_model->get_grivise($grivise);
		}
		public function add()    //添加商品
		{
			$newcarid=$this->input->get('newcarid');
			$newcarname=$this->input->get('newcarname');
			$newocarprice=$this->input->get('newocarprice');
			$newncarprice=$this->input->get('newncarprice');
			$newcarnum=$this->input->get('newcarnum');
			$newsptime=$this->input->get('newsptime');
			$newimg=$this->input->get('newimg');
			$rs=$this->user_model->get_add($newcarid,$newcarname,$newocarprice,$newncarprice,$newcarnum,$newsptime,$newimg);
			if($rs){
				
				$page_num = '5';//每页的数据
				$data=$this->user_model->page('chexi',$page_num,$this->uri->segment(3));
				$total_nums=$data['total_nums']; //这里得到从数据库中的总页数
				$data['query']=$data[0]; //把查询结果放到$data['query']中
				$this->load->library('pagination');
				$config['base_url'] = $this->config->item('base_url').'/index.php/user/goods/';
				$config['total_rows'] = $total_nums;//总共多少条数据
				$config['per_page'] = $page_num;//每页显示几条数据
				$config['full_tag_open'] = '<p>';
				$config['full_tag_close'] = '</p>';
				$config['first_link'] = '首页';
				$config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
				$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
				$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
				$config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
				$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
				$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
				$config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
				$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
				$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
				$config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
				$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
				$config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
				$config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
				$config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
				$config['num_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$this->load->view('goods.php',$data);
				echo"<script>alert('添加成功!');</script>";
			}
			// $grivise=$this->input->get('id');
			// $rs=$this->user_model->get_grivise($grivise);
		}

public function uadd()    //添加商品
		{
			$newuid=$this->input->get('newuid');
			$newuname=$this->input->get('newuname');
			$newpwd=$this->input->get('newpwd');
			
			$rs=$this->user_model->get_uadd($newuid,$newuname,$newpwd);
			if($rs){
				
				$page_num = '5';//每页的数据
				$data=$this->user_model->page('user',$page_num,$this->uri->segment(3));
				$total_nums=$data['total_nums']; //这里得到从数据库中的总页数
				$data['query']=$data[0]; //把查询结果放到$data['query']中
				$this->load->library('pagination');
				$config['base_url'] = $this->config->item('base_url').'/index.php/user/people/';
				$config['total_rows'] = $total_nums;//总共多少条数据
				$config['per_page'] = $page_num;//每页显示几条数据
				$config['full_tag_open'] = '<p>';
				$config['full_tag_close'] = '</p>';
				$config['first_link'] = '首页';
				$config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
				$config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
				$config['last_link'] = '尾页';//你希望在分页的右边显示“最后一页”链接的名字。
				$config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
				$config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
				$config['next_link'] = '下一页';//你希望在分页中显示“下一页”链接的名字。
				$config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
				$config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
				$config['prev_link'] = '上一页';//你希望在分页中显示“上一页”链接的名字。
				$config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
				$config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
				$config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
				$config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
				$config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
				$config['num_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$this->load->view('people.php',$data);
				echo"<script>alert('添加成功!');</script>";
			}
			// $grivise=$this->input->get('id');
			// $rs=$this->user_model->get_grivise($grivise);
		}
		
		
		 
		 	
		 



		
		
		
	
	   
	 
	}
	
?>
