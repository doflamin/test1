<?php  
class Upload extends CI_Controller {  
  
    public function __construct()  
    {  
        parent::__construct();  
    }  
  
    public function do_upload()  
    {  
        //上传配置  
        $config['upload_path']      = './uploads/';  
        $config['allowed_types']    = 'gif|jpg|png';  
        $config['max_size']     = 100000;  
  
        //加载上传类  
        $this->load->library('upload', $config);  
  
        //执行上传任务  
        if($this->upload->do_upload('userfile')){  
            echo '上传成功';  //如果上传成功返回成功信息  
        }  
        else{  
            echo '上传失败，请重试'; //如果上传失败返回错误信息  
        }  
    }  
}  