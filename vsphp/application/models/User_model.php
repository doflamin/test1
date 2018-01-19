<?php


class User_model extends CI_Model
{

    public function add($name){
        $this->db->insert('table1',array(
            'username'=>$name
        ));
        return $this->db->affected_rows();
    }
	 public function user_list(){
        $query = $this -> db -> get("table1");
//        $query = $this -> db -> get_where("t_user",array('name'=>'lisi'));

        return $query->result();
    }
	  public function del_user($id){
        $this->db->delete('table1', array('id' => $id));
        return $this->db->affected_rows();
    }
	   public function get_user_by_id($id){
        $query = $this->db->get_where('table1', array('id' => $id));
        return $query->row();
    }

    public function update($id,$name){
        $this->db->where('id', $id);
        $this->db->update('table1', array(
            "name" => $name,
        ));
        return $this->db->affected_rows();
    }
	  


}