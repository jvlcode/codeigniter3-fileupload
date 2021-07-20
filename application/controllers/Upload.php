<?php 
	class Upload extends CI_Controller{
		

		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('url','form'));
		}

		public function index(){
			$data = $error =null;
			$this->load->view('upload_form',array('data'=>$data,'error'=>$error));
		}

		public function do_upload(){
			$config['upload_path'] = "./uploads/";
			$config['allowed_types'] = "jpg|png|pdf";
			$config['max_size'] = 1024;

			$this->load->library('upload',$config);

			if($this->upload->do_upload('file')){
				$data = $this->upload->data();
				$error = null;
			}else{
				$error = $this->upload->display_errors();
				$data = null;
			}

			$this->load->view('upload_form',array('data'=>$data,'error'=>$error));
			
		}

		
	}



?>
