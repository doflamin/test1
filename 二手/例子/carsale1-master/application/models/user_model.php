<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
			
		public function get_select($name,$pass){
			$arr=array(
				'uname'=>$name,
				'pwd'=>$pass
			);
			$query=$this->db->get_where('user',$arr);
			return $query->row();
		}
		
		 public function m_select($mname,$mpwd){
			$arr=array(
				'mname'=>$mname,
				'mpwd'=>$mpwd
			);
			$query=$this->db->get_where('manager',$arr);
			return $query->row();
		}
		

      public function checkname($name){
			$arr=array(
				'uname'=>$name,
			);
			$query=$this->db->get_where('user',$arr);
			return $query->row();	
		}
		public function set_insert($name,$pass){
			$arr=array(
				'uname'=>$name,
				'pwd'=>$pass,
			);
			$query=$this->db->insert('user',$arr);
			return $query;
			
		}
		
		public function c_insert($p_name,$p_pnum,$p_sid,$p_addr,$name,$s_price,$price,$pic){
			$arr=array(		
				'sp_name'=>$p_name,
				'sp_pnum'=>$p_pnum,
				'sp_sid'=>$p_sid,
				'sp_addr'=>$p_addr,
				'c_name'=>$name,
				'c_sprice'=>$s_price,
				'c_price'=>$price,
				'c_pic'=>$pic,
				// 'uid'=>$uid,
				// 'some_name'=>$submit
			);
		        
			$query=$this->db->insert('s_car',$arr);
			return $query;
			
		}
		
		
				
		
		public function get_sel(){
			
			$query=$this->db->query("select * from carnews");
			
			return $query->result(); 
		}
		
		public function get_seldz(){
			
			$query=$this->db->query("select * from dz");
			
			return $query->result(); 
		}
		
		public function get_selxd(){
			
			$query=$this->db->query("select * from xd");
			
			return $query->result(); 
		}
		
		public function get_chexi($chexi){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("select * from chexi where carname like '%$chexi%'");
			
			return $query->result(); 
			
		}
		
		public function get_min($sprice){
			
			
			$query=$this->db->query("SELECT * FROM chexi WHERE ncarprice < '$sprice'");
			
			return $query->result(); 
			
		}
		
		public function get_both($sprice,$bprice){
			
			
			$query=$this->db->query("select * from chexi where ncarprice BETWEEN'$sprice'AND'$bprice'");
			
			return $query->result(); 
			
		}
		
		public function get_max($bprice){
			
			
			$query=$this->db->query("SELECT * FROM chexi WHERE ncarprice > $bprice");
			
			return $query->result(); 
			
		}
        public function get_carnews($img){
			
			$query=$this->db->query("select * from chexi where carimgurl = '$img'");
			// var_dump($img);
			// die();
		
			return $query->result(); 
		}
            
			public function get_manager($manager){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("select * from manager");
			
			return $query->result(); 
			
		}
		public function get_tf($mname){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			
			$query=$this->db->query("select mname from manager where mname = '$mname'");
			return $query->result(); 
			
		}
		
		public function get_madd($mname,$mpwd){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("INSERT INTO manager (mname,mpwd) VALUES ('$mname','$mpwd')");
			$query=$this->db->query("select * from manager");
			return $query->result(); 
			
		}
		
		public function get_mdelete($mname,$mpwd){
				
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("delete from manager where mname='$mname' and mpwd='$mpwd'");
			$query=$this->db->query("select * from manager");
			return $query->result(); 
			
		}
		
		public function get_mrevise($mname,$mpwd){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("UPDATE manager SET  mpwd = $mpwd WHERE mname = '$mname'");
			$query=$this->db->query("select * from manager");
			return $query->result(); 
			
		}
		public function get_goods($goods){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("select * from chexi");
			
			return $query->result(); 
			
		}
		public function get_user($user){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("select * from user");
			
			return $query->result(); 
			
		}
		
		function page($tablename,$per_nums,$start_position){//传入3个参数，表名字，每页的数据量，其实位置
		  $this->db->limit($per_nums,$start_position);
		  $query=$this->db->get($tablename);
		  $data=$query->result();
		  // var_dump($data);
		  // die();
		  
		  $data2['total_nums']=$this->db->count_all($tablename);
		  $data2[]=$data; //这里大家可能看的优点不明白，可以分别将$data和$data2打印出来看看是什么结果。
		  // var_dump($data2);
		  // die();
		  return $data2;
		}
			
			public function get_delete($delete){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("delete from chexi where carname='$delete'");
			
			return $query; 
			
		}
			public function  get_udelete($delete){
			
			// $query=$this->db->query("select * from carnews where carname like '%$chexi%';");
			$query=$this->db->query("delete from user where uname='$delete'");
			
			return $query; 
			
		}
			
		public function get_grevise($newcarid,$newcarname,$newncarprice,$newcarnum){
			
			$query=$this->db->query("UPDATE chexi SET  carname = '$newcarname',ncarprice = '$newncarprice',carnum = $newcarnum WHERE carid = $newcarid");
			$query=$this->db->query("select * from chexi");
			return $query->result(); 
			
		}
		public function get_urevise($newuid,$newuname,$newpwd){
			
			$query=$this->db->query("UPDATE user SET  uname = '$newuname',pwd = '$newpwd' WHERE uid = $newuid");
			$query=$this->db->query("select * from user");
			return $query->result(); 
			
		}
		
		public function get_add($newcarid,$newcarname,$newocarprice,$newncarprice,$newcarnum,$newsptime,$newimg){
			
			$query=$this->db->query("INSERT INTO chexi (carid,carname,ncarprice,ocarprice,carnum,sptime,carimgurl) VALUES ('$newcarid','$newcarname','$newncarprice','$newocarprice','$newcarnum','$newsptime','$newimg');");
			$query=$this->db->query("select * from chexi");
			return $query->result(); 
			
		}	
		public function get_uadd($newuid,$newuname,$newpwd){
			
			$query=$this->db->query("INSERT INTO user (uid,uname,pwd) VALUES ('$newuid','$newuname','$newpwd');");
			$query=$this->db->query("select * from user");
			return $query->result(); 
			
		}	
		
			
		
	}

			


?>