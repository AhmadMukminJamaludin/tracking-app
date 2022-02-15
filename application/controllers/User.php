<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('user_model', 'user');
		is_login();
	}

	public function index()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->user->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Tracking-APP';
		$data['page'] = 'user/dashboard';
		$this->load->view('template/template_user', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
        session_destroy();
        redirect(base_url());
	}

	public function profil()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->user->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Halaman profil';
		$data['page'] = 'user/profil';
		$this->load->view('template/template_user', $data);
	}

	public function update_profile()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim',[
			'required' => 'Nama lengkap tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('username', 'Nama', 'required|trim',[
			'required' => 'Nama pengguna tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required' => 'Email tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			redirect(base_url('user/profile'));
		}else{
			$config['upload_path']          = './images/';
			$config['encrypt_name']          = TRUE;
			$config['allowed_types']        = 'jpg|jpeg|png|JPG|PNG|JPEG|pdf';
			$config['max_size']             = 5000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				$id = $this->input->post('id');
				$data = [
					'nip'		=> $this->input->post('nip'),
					'name'		=> $this->input->post('name'),
					'username'	=> $this->input->post('username'),
					'email' 	=> $this->input->post('email'),
					'phone' 	=> $this->input->post('phone')
				];
				$this->user->updateProfile($id, $data);
				$this->session->set_flashdata('success', 'Data profil berhasil diubah'); 
				redirect(base_url('user/profil'));
			}
			else
			{
				$id = $this->input->post('id');
				$gambar = $this->upload->data('file_name');
				if($gambar){
					// Ambil data user
					$imageProfile = $this->user->getDataUser($id);
					// Hapus foto user sebelum di update
					if(file_exists('images/' . $imageProfile['photo']) && $imageProfile['photo']){
						unlink('images/' . $imageProfile['photo']);
					}
				}
				$data = [
					'nip'		=> $this->input->post('nip'),
					'name'		=> $this->input->post('name'),
					'username'	=> $this->input->post('username'),
					'email' 	=> $this->input->post('email'),
					'phone' 	=> $this->input->post('phone')
				];
				// Timpa data foto dengan nama yg baru
				$data['photo'] = $gambar;
				$this->user->updateProfile($id, $data);
				$this->session->set_flashdata('success', 'Data profil berhasil diubah'); 
				redirect(base_url('user/profil'));
			}			
		}
	}

	public function data_nasabah()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->user->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Pengajuan Kredit';
		$data['page'] = 'user/data_nasabah';
		$data['data_nasabah'] = $this->user->getUserDataNasabah($id);
		$this->load->view('template/template_user', $data);
	}

	public function data_pekerjaan()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->user->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Permohonan Kredit';
		$data['page'] = 'user/data_pekerjaan';
		$data['data_pekerjaan'] = $this->user->getUserDatapekerjaan($id);
		$this->load->view('template/template_user', $data);
	}

	public function data_pribadi_nasabah()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->user->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Permohonan Kredit';
		$data['page'] = 'user/data_pribadi_nasabah';
		$data['data_pribadi_nasabah'] = $this->user->getUserDatapribadiNasabah($id);
		$this->load->view('template/template_user', $data);
	}

	public function data_permohonan_kredit()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->user->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Permohonan Kredit';
		$data['page'] = 'user/data_permohonan_kredit';
		$data['data_permohonan_kredit'] = $this->user->getUserDataPermohonanKredit($id);
		$this->load->view('template/template_user', $data);
	}

	public function form_data_nasabah()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim',[
			'required' => 'Nama lengkap tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('no_ktp', 'KTP', 'required|trim',[
			'required' => 'Nomer KTP/Identitas tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('npwp', 'NPWP', 'required|trim',[
			'required' => 'NPWP tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Data nasabah gagal diperbarui, silahkan lengkapi formulir!');
			redirect(base_url('user/data_nasabah'));
		} else {
			$data = [
				'user_id'			=> $this->input->post('user_id'),
				'nama_nasabah'		=> $this->input->post('name'),
				'tempat_lahir'		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
				'phone' 			=> $this->input->post('phone'),
				'no_ktp' 			=> $this->input->post('no_ktp'),
				'npwp' 				=> $this->input->post('npwp'),
				'kewarganegaraan' 	=> $this->input->post('kewarganegaraan'),
				'provinsi' 			=> $this->input->post('provinsi'),
				'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'nama_ibu' 			=> $this->input->post('nama_ibu'),
				'alamat_identitas' 	=> $this->input->post('alamat_identitas'),
				'alamat_terkini' 	=> $this->input->post('alamat_terkini')
			];
			$this->user->addFormDataNasabah($data);
			$this->session->set_flashdata('success', 'Data nasabah berhasil diperbarui, silahkan isi formulir data pekerjaan!'); 
			redirect(base_url('user/data_pekerjaan'));
		}
	}

	public function form_data_pekerjaan()
	{
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',[
			'required' => 'Pekerjaan tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('nama_perusahaan', 'Nama perusahaan', 'required|trim',[
			'required' => 'Nama perusahaan tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Data pekerjaan gagal diperbarui, silahkan lengkapi formulir!');
			redirect(base_url('user/data_pekerjaan'));
		} else {
			$data = [
				'user_id'			=> $this->input->post('user_id'),	
				'pekerjaan'			=> $this->input->post('pekerjaan'),
				'bd_usaha'			=> $this->input->post('bd_usaha'),
				'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
				'tahun'				=> $this->input->post('tahun'),
				'bulan'				=> $this->input->post('bulan'),
				'penghasilan'		=> $this->input->post('penghasilan'),
			];
			$this->user->addFormDataPekerjaan($data);
			$this->session->set_flashdata('success', 'Data nasabah berhasil diperbarui, silahkan isi formulir data pekerjaan!'); 
			redirect(base_url('user/data_pribadi_nasabah'));
		}
	}

	public function form_data_pribadi_nasabah()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim',[
			'required' => 'Pekerjaan tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('no_ktp', 'Nomer KTP', 'required|trim',[
			'required' => 'Nomer KTP tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Data pribadi nasabah gagal diperbarui, silahkan lengkapi formulir!');
			redirect(base_url('user/data_pribadi_nasabah'));
		} else {
			$data = [
				'user_id'			=> $this->input->post('user_id'),
				'name'				=> $this->input->post('name'),
				'tempat_lahir'		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
				'no_ktp'			=> $this->input->post('no_ktp'),
				'alamat_identitas'	=> $this->input->post('alamat_identitas'),
				'alamat_terkini'	=> $this->input->post('alamat_terkini'),
				'kepemilikan_rumah'	=> $this->input->post('kepemilikan_rumah'),
				'tahun'				=> $this->input->post('tahun'),
				'bulan'				=> $this->input->post('bulan'),
				'pendidikan'		=> $this->input->post('pendidikan'),
				'nama_suamiistri'	=> $this->input->post('nama_suamiistri'),
				'nama_gadis_ibu_kandung'				=> $this->input->post('nama_gadis_ibu_kandung'),
				'jumlah_tanggungan'	=> $this->input->post('jumlah_tanggungan'),
			];
			$this->user->addFormDataPribadiNasabah($data);
			$this->session->set_flashdata('success', 'Data nasabah berhasil diperbarui, silahkan isi formulir data pekerjaan!'); 
			redirect(base_url('user/data_permohonan_kredit'));
		}
	}

	public function form_data_permohonan_kredit()
	{
		$config['upload_path']          = './berkas/';
		$config['encrypt_name']          = TRUE;
		$config['allowed_types']        = 'jpg|jpeg|png|JPG|PNG|JPEG|pdf';
		$config['max_size']             = 5000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('scan_berkas'))
		{
			$this->form_validation->set_rules('jumlah_nominal', 'Jumlah nominal', 'required|trim',[
				'required' => 'Jumlah nominal tidak boleh kosong.'
			]);
			$this->form_validation->set_rules('tujuan_penggunaan', 'Tujuan penggunaan', 'required|trim',[
				'required' => 'Tujuan penggunaan tidak boleh kosong.'
			]);
			$this->form_validation->set_rules('ket_penggunaan', 'Keterangan penggunaan', 'required|trim',[
				'required' => 'Keterangan penggunaan tidak boleh kosong.'
			]);
			$this->form_validation->set_rules('jaminan_kredit', 'Jaminan kredit', 'required|trim',[
				'required' => 'Jaminan kredit tidak boleh kosong.'
			]);
	
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error', 'Data permohonan gagal diajukan, silahkan lengkapi formulir!');
				redirect(base_url('user/data_pribadi_nasabah'));
			} else {
				$data = [
					'user_id'				=> $this->input->post('user_id'),
					'jumlah_nominal'		=> $this->input->post('jumlah_nominal'),
					'tujuan_penggunaan'		=> $this->input->post('tujuan_penggunaan'),
					'ket_penggunaan'		=> $this->input->post('ket_penggunaan'),
					'jumlah_tanggungan'		=> $this->input->post('jumlah_tanggungan'),
					'jaminan_kredit'		=> $this->input->post('jaminan_kredit'),
					'posisi_jaminan'		=> $this->input->post('posisi_jaminan'),
					'status_jaminan'		=> $this->input->post('status_jaminan'),
					'created_at'			=> date('Y-m-d'),
					'progress'				=> 1
				];
				$data1 = [
					'user_id'	=> $this->input->post('user_id')
				];
				$this->user->addFormDataPermohonanKredit($data, $data1);
				$this->session->set_flashdata('success', 'Data permohonan berhasil diajukan, silahkan tunggu proses selanjutnya');
				redirect(base_url('user'));
			}
		} else {
			$scan_berkas = $this->upload->data('file_name');
			$this->form_validation->set_rules('jumlah_nominal', 'Jumlah nominal', 'required|trim',[
				'required' => 'Jumlah nominal tidak boleh kosong.'
			]);
			$this->form_validation->set_rules('tujuan_penggunaan', 'Tujuan penggunaan', 'required|trim',[
				'required' => 'Tujuan penggunaan tidak boleh kosong.'
			]);
			$this->form_validation->set_rules('ket_penggunaan', 'Keterangan penggunaan', 'required|trim',[
				'required' => 'Keterangan penggunaan tidak boleh kosong.'
			]);
			$this->form_validation->set_rules('jaminan_kredit', 'Jaminan kredit', 'required|trim',[
				'required' => 'Jaminan kredit tidak boleh kosong.'
			]);
	
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error', 'Data permohonan gagal diajukan, silahkan lengkapi formulir!');
				redirect(base_url('user/data_pribadi_nasabah'));
			} else {
				$data = [
					'user_id'				=> $this->input->post('user_id'),
					'jumlah_nominal'		=> $this->input->post('jumlah_nominal'),
					'tujuan_penggunaan'		=> $this->input->post('tujuan_penggunaan'),
					'ket_penggunaan'		=> $this->input->post('ket_penggunaan'),
					'jumlah_tanggungan'		=> $this->input->post('jumlah_tanggungan'),
					'jaminan_kredit'		=> $this->input->post('jaminan_kredit'),
					'posisi_jaminan'		=> $this->input->post('posisi_jaminan'),
					'status_jaminan'		=> $this->input->post('status_jaminan'),
					'created_at'			=> date('Y-m-d'),
					'progress'				=> 1,
					'scan_berkas'			=> $scan_berkas
				];
				$data1 = [
					'user_id'			=> $this->input->post('user_id'),
					'tanggal_progres' 	=> date('Y-m-d'),
					'status_progres'	=> 'Permohonan kredit baru'
				];
				$this->user->addFormDataPermohonanKredit($data, $data1);
				$this->session->set_flashdata('success', 'Data permohonan berhasil diajukan, silahkan tunggu proses selanjutnya');
				redirect(base_url('user'));
			}
		}
	}

	public function all_data_permohonan_kredit()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->user->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Permohonan Kredit';
		$data['data_nasabah'] = $this->user->getUserDataNasabah($id);
		$data['data_pekerjaan'] = $this->user->getUserDatapekerjaan($id);
		$data['data_pribadi_nasabah'] = $this->user->getUserDatapribadiNasabah($id);
		$data['data_permohonan_kredit'] = $this->user->getUserDataPermohonanKredit($id);
		$data['progres_permohonan_kredit'] = $this->user->getUserDataProgresPermohonanKredit($id);
		$data['page'] = 'user/all_data_permohonan_kredit';
		$this->load->view('template/template_user', $data);
	}
}