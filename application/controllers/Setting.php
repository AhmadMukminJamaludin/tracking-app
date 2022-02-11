<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->model('setting_model', 'setting');
		is_admin();
	}

	public function index()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Settings';
		$data['page'] = 'admin/setting';
		$this->load->view('template/template_admin', $data);
	}

	function getSettings()
	{
		$getSettings = $this->setting->getSettings()->result();
		echo json_encode($getSettings);
	}

	function EditSettings()
	{
		$this->form_validation->set_rules('judul_1', 'Judul_1', 'required|trim',[
			'required' => 'judul_1 tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('subjudul_1', 'subjudul_1', 'required|trim',[
			'required' => 'subjudul_1 tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('judul_2', 'Judul_2', 'required|trim',[
			'required' => 'judul_2 tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('subjudul_2', 'Subjudul_2', 'required|trim',[
			'required' => 'subjudul_2 tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Halaman gagal diubah'); 
			redirect(base_url('setting'));
		}else{
			$config['upload_path']          = './assets/img/login/';
			$config['encrypt_name']          = TRUE;
			$config['allowed_types']        = 'jpg|jpeg|png|JPG|PNG|JPEG|pdf';
			$config['max_size']             = 5000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar'))
			{
				$data = [
					'judul_1'		=> $this->input->post('judul_1'),
					'subjudul_1'	=> $this->input->post('subjudul_1'),
					'judul_2'		=> $this->input->post('judul_2'),
					'subjudul_2' 	=> $this->input->post('subjudul_2')
				];
				$this->setting->EditSettings($data);
				$this->session->set_flashdata('success', 'Halaman berhasil diubah'); 
				redirect(base_url('setting'));
			}
			else
			{
				$gambar = $this->upload->data('file_name');
				if($gambar){
					// Ambil data user
					$imageProfile = $this->input->post('gambar_lama');
					// Hapus foto user sebelum di update
					if(file_exists('./assets/img/login/' . $imageProfile) && $imageProfile){
						unlink('./assets/img/login/' . $imageProfile);
					}
				}
				$data = [
					'judul_1'		=> $this->input->post('judul_1'),
					'subjudul_1'	=> $this->input->post('subjudul_1'),
					'judul_2'		=> $this->input->post('judul_2'),
					'subjudul_2' 	=> $this->input->post('subjudul_2')
				];
				// Timpa data foto dengan nama yg baru
				$data['gambar'] = $gambar;
				$this->setting->EditSettings($data);
				$this->session->set_flashdata('success', 'Halaman berhasil diubah'); 
				redirect(base_url('setting'));
			}			
		}
	}
}