<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_user extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	// login to load login page
	public function login()
	{
		$data['title'] = "Welcome to the Simple Login Form of Codeigniter";
		$this->load->view("login",$data);
	}

	// login validation
	public function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "User Name", 'required');
		$this->form_validation->set_rules("password", "Password", 'required');

		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model("user_model");
			if($this->user_model->can_login($username,$password)){
				$session_data = array(
						'username' => $username,
				);
				$this->session->set_userdata($session_data);
				$this->session->set_flashdata('success','Login Succesfull');
				redirect(base_url(). 'controller_user/add');
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
	public function dashboard(){
		$this->load->view('dashboard');
	}

	// insert data in to table
	public function add()
	{	
		// if($this->session->userdata('username') != ''){
		// 	echo '<h2>Welcome - ' .$this->session->userdata('username'). '</h2>';
		// 	echo '<a href="'.base_url().'controller_user/logout" class="btn btn-danger">Logout</a>';
		// }
		// else{
		// 	redirect(base_url(). 'controller_user/login');
		// }
		$data = $this->session->userdata('username');
		$this->load->view('add_user',$data);
	}

	// when inserting data in to table we check to validation
	public function form_validation()
	{
   		$this->load->library('form_validation');
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
					//$upload = '';
					$this->upload->display_errors();
				}
			}else{
				$upload = '';
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
		}
		else{
			$this->add();
		}
	}

	// to display all user
	public function list_all_user()
	{
		$this->load->model("User_model"); // calling user_model
		$data['h']=$this->User_model->list_all_data();  
        $this->load->view("list_all_user", $data);
	}

	//to delete user
	public function delete_user()
	{
		$id = $this->uri->segment(3);
		$this->load->model("User_model");
		$this->User_model->delete_single_user($id);
		$this->session->set_flashdata('error','User deleted Succesfully');
		redirect(base_url() . 'controller_user/list_all_user');
	}

	// to edite single user data
	public function edit_user()
	{
		$user_id = $this->uri->segment(3);
		$this->load->model("User_model");
		$data['user_data'] = $this->User_model->edit_single_data($user_id);  
		$this->load->view('add_user',$data);
	}

	// search 
	public function search()
	{
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
}
?>