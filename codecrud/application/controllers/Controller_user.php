<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_user extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	private function logged_in()
    {
        if(!$this->session->userdata('username'))
			redirect(base_url(). 'controller_user/login');
    }

	// login to load login page
	public function login() {
		$this->load->view("login");
	}

	// login validation
	public function login_validation()
	{
		// $this->load->library('form_validation');
		$this->form_validation->set_rules("username", "User Name", 'required');
		$this->form_validation->set_rules("password", "Password", 'required');

		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$logged_in = TRUE;
			// $u_id = $this->session->userdata('userlogged_in');
			$this->load->model("user_model");
			if($this->user_model->can_login($username,$password)){
				$session_data = array(
						// 'id' => $u_id,
						'username' => $username,
						'logged_in' => $logged_in,
				);
				$this->session->set_userdata($session_data);
				$this->session->set_flashdata('success','Login Successfull');
				redirect(base_url(). 'controller_user/dashboard');
			}
			else{
				$this->session->set_flashdata('error','Invalid Username and Password');
				redirect(base_url(). 'controller_user/login');
			}
		}
		else{
			$this->login();
		}
	}

	// logout function
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('error','Logout Succesfull');
		redirect(base_url(). 'controller_user/login');
	}

	//dashboard
	public function dashboard()
	{
		$this->logged_in();
		$this->headerimg();
	    $i = 0; 
	    $dir = 'upload/users';
	    if ($handle = opendir($dir)) {
	        while (($file = readdir($handle)) !== false){
	            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
	                $i++;
	        }
	    }
    	$data['totaldata']= $i;
		$this->load->view('dashboard',$data);
	}

	// insert data in to table
	public function add()
	{	
		$this->headerimg();
		$data = $this->session->userdata('username');
		$this->load->view('add_user',$data);
	}

	// when inserting data in to table we check to validation
	public function form_validation()
	{
   		// $this->load->library('form_validation');
		$this->form_validation->set_rules("username", "User Name", 'required');
		$this->form_validation->set_rules("email", "Email", 'required');
		$this->form_validation->set_rules("password", "Password", 'required');

		if($this->form_validation->run()){
			//true
			$this->load->model("User_model"); // calling user_model

			//for uploading image start
			if(!empty($_FILES['upload']['name'])){
				$config["upload_path"] = "./upload/users";
				$config["allowed_types"] = "jpg|png|gif|jpeg";
				$config["file_name"] = $_FILES['upload']['name'];
				$config["overwrite"] = TRUE;
				$config["remove_spaces"] = TRUE;
				$config["max_size"] = 0;

				$this->load->library("upload",$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload("upload")){
					$uploaded_data = $this->upload->data();
					// to store only file name in DB
					// $upload = $uploaded_data['file_name'];

					// to store folder name and file name in DB
					$upload = "upload/users/".$uploaded_data['name'].$uploaded_data['file_name'];
					//echo "File " . $uploaded_data["file_name"] . " has been uploaded.";
				}
				else{
					$this->upload->display_errors();
				}
			}else{
				$upload = 'upload/user.jpg';
			}
			//for uploading image end

			// to insert data
			$data = array(
					"username" => $this->input->post("username"),
					"email" => $this->input->post("email"),
					"password" => $this->input->post("password"),
					"status" => $this->input->post("status"),
					"upload" => $upload
			);

			//	to check for update and insert
			if($this->input->post("update")){
				$this->User_model->update_data($data,$this->input->post("hidden_id"));
				$this->session->set_flashdata('success','User updated Succesfully');
				redirect(base_url(). 'controller_user/list_all_user');
			}
			if($this->input->post("submit")){
				$this->User_model->add($data);
				$this->session->set_flashdata('success','User added Succesfully');
				redirect(base_url() . 'controller_user/add');
			}
			if($this->input->post("updatepro")){
				$this->User_model->update_data($data,$this->input->post("hidden_id"));
				$this->session->set_flashdata('success','User Profile Updated Succesfully');
				redirect(base_url() . 'controller_user/editprofile');
			}
		}
		else{
			$this->add();
		}
	}

	// to display all user
	public function list_all_user()
	{
		$this->logged_in();
		$this->headerimg();
		$this->load->model("User_model"); // calling user_model
		$data['h']=$this->User_model->list_all_data();  
        $this->load->view("list_all_user", $data);
	}

	//to delete user
	public function delete_user()
	{
		$id = $this->uri->segment(3);
		$this->load->model("User_model");
		$files = $this->User_model->getFiles($id);
		foreach($files as $file){
            if ($file != null && $file->upload != "") {
                if (file_exists($file->upload)) {
                    chown($file->upload, 666);
                    unlink($file->upload);
                }
            } 
        }
        $result = $this->User_model->delete_single_user($id);
        if ($result) {
            	$this->session->set_flashdata('error','User deleted Succesfully');
				redirect(base_url() . 'controller_user/list_all_user');
        } else {
				redirect(base_url() . 'controller_user/list_all_user');
        }
		
	}

	// to edite single user data
	public function edit_user()
	{
		$this->headerimg();
		$user_id = $this->uri->segment(3);
		$this->load->model("User_model");
		$data['user_data'] = $this->User_model->edit_single_data($user_id);  
		$this->load->view('add_user',$data);
	}

	// search 
	public function search()
	{
		$this->headerimg();

		if(isset($_POST['txtSearchKeyWord']) && $_POST['txtSearchKeyWord'] != ""){
			$keyword=$_POST['txtSearchKeyWord'];
			$this->load->model("User_model");
			$data['get_data'] = $this->User_model->search_user($keyword);
			$this->load->view("sview", $data);
		}
		else
        {
			redirect(base_url() . 'controller_user/list_all_user');
        }
	}

	// to change pwd for login user
	public function changepwd()
	{	
		$this->logged_in();
		$this->headerimg();

		// $this->load->library('form_validation');
		$this->form_validation->set_rules("oldpassword", "Old Password", 'required');
		$this->form_validation->set_rules("newpassword", "New Password", 'required');
		$this->form_validation->set_rules("repnewpassword", "Repeat New Password", 'required|matches[newpassword]');

		if($this->form_validation->run()){
			$cur_pass = $this->input->post("oldpassword");
			$new_pass = $this->input->post("newpassword");
			$rep_pass = $this->input->post("repnewpassword");
			$user_id = $this->session->userdata('userlogged_in');
			$this->load->model("User_model");
			$passwd = $this->User_model->getcurrpwd($user_id);
			if($passwd->password == $cur_pass){ // current pwd not match
				if($new_pass == $rep_pass){ // new pwd & confirm pwd not match
					if($this->User_model->updatepwd($new_pass,$user_id)){
						$this->session->set_flashdata('success','Password update Successfully');
						redirect(base_url() . 'controller_user/changepwd');
					}
					else{
						$this->session->set_flashdata('error','Failed to update password');
						redirect(base_url() . 'controller_user/changepwd');
					}
				}
				else{
					$this->session->set_flashdata('error','New password & Confirm password not match');
					redirect(base_url() . 'controller_user/changepwd');
				}
			}
			else{
				$this->session->set_flashdata('error','current password not match');
				redirect(base_url() . 'controller_user/changepwd');
			}
		}
		else{
			$this->load->view("changepwd");
		}
	}

	//to update profile for login user
	public function editprofile()
	{
		$this->logged_in();
		$this->headerimg();
		// $this->load->library('table');
		$id = $this->session->userdata('userlogged_in');
		$this->load->model("User_model"); // calling user_model
		$data['pp'] = $this->User_model->edit_profile($id);  
		$this->load->view("editprofile",$data);	
	}

	//to update profile for login user
	public function headerimg()
	{
		$id = $this->session->userdata('userlogged_in');
		$this->load->model("User_model"); // calling user_model
		$data['pp'] = $this->User_model->header_image($id); 
		$this->load->view("include/header",$data);	
	}

	//to delete multiple user
	public function deleteAll()
    {
        $ids = $this->input->post('id');
        $this->db->where_in('id', explode(",", $ids));
        $this->db->delete('user');
        $this->session->set_flashdata('success_message', 'Selected Entitys has been Deleted Successfully');
        redirect(base_url() . 'controller_user/list_all_user');
        //echo json_encode(['success'=>"Data Deleted successfully."]);
    }
}
?>