<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_fids');
	}

	public function index()
	{
		$this->load->view('admin/login2');
	}

	public function f_login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		if (isset($_POST["btn_login"])) {
			$result = $this->Model_fids->select_condition("tabel_user", array('username' => $username));
			if ($result->num_rows() > 0) {
				$data = $result->row();
				if (password_verify($password, $data->password)) {
					$_SESSION["username"] = $data->username;
					$_SESSION["password"] = $data->password;
					echo "<script>
					alert('Success');
					window.location.href = '" . base_url() . "Admin';
					</script>";
				} else {
					echo "<script>";
					echo "alert('Login Gagal')";
					echo "</script>";
					$this->index();
				}
			} else {
				echo "<script>";
				echo "alert('Login Gagal')";
				echo "</script>";
				$this->index();
			}
		}
	}

	//LOGOUT
	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}
