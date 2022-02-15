<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
		is_login(true);
	}

    public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
			'required'		=> 'Email tidak boleh kosong',
			'valid_email'	=> 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required',[
			'required'		=> 'Password tidak boleh kosong'
		]);

		if($this->form_validation->run() == FALSE){
			$data['gambar'] = $this->auth->getDataSetting();
			$data['title'] = 'Sign in';
			$this->load->view('login', $data);
		} else {
			$password 	= $this->input->post('password');
			$user 		= $this->auth->checkEmail();
			
			// Cek user berdasarkan email
			if(isset($user)){
				// Cek password sesuai atau tidak
				if(hashEncryptVerify($password, $user['password']) == TRUE){
					$this->session->set_userdata($user);
					$this->session->set_userdata('auth', TRUE);
					$this->session->set_userdata('is_login', TRUE);
					
					if($user['role_id'] == 1){
						$this->session->set_flashdata('hello', 'Selamat Datang!');						
						redirect('admin');
					} elseif ($user['role_id'] == 3) {
						$this->session->set_flashdata('hello', 'Selamat Datang!');						
						redirect('petugas');
					} else{
						$this->session->set_flashdata('hello', 'Selamat Datang!');						
						redirect('user');
					}
				}else{
					// Jika password tidak sesuai
					$this->session->set_flashdata('error', 'Password yang anda masukkan salah'); 
					redirect('auth');
				}
			}else{
				// Jika email tidak sesuai
				$this->session->set_flashdata('error', 'Email yang anda masukkan salah');
				redirect('auth');
			}
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
			'required'		=> 'Email tidak boleh kosong',
			'valid_email'	=> 'Email tidak valid'
		]);
		$this->form_validation->set_rules('new_password', 'Password', 'required',[
			'required'		=> 'Password tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password-confirm', 'Password-confirm', 'required|trim|matches[new_password]',[
			'required'		=> 'Konfirmasi password tidak boleh kosong',
			'matches'		=> 'Konfirmasi password harus sesuai'
		]);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Mohon isikan data register dengan benar.');
			$data['title'] = 'Register';
			$this->load->view('register', $data);
		} else {
			$data = [
				'name'		=> $this->input->post('name'),
				'username'	=> $this->input->post('username'),
				'email'		=> $this->input->post('email'),
				'phone'		=> $this->input->post('phone'),
				'role_id'	=> 2,
				'created_at'=> date('Y-m-d'),
				'password' 	=> hashEncrypt($this->input->post('new_password'))
			];

			$this->auth->addRegister($data);
			$this->session->set_flashdata('message', 'Data register berhasil ditambahkan.');
			redirect(base_url('auth'));
		}
	}
}