<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'admin');
		is_admin();
		is_login();
	}

	public function index()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;
		$data['total_pengguna'] = $this->admin->getTotalPengguna();
		$data['total_pengajuan'] = $this->admin->getTotalPengajuan();
		$data['total_pengajuan_diterima'] = $this->admin->getTotalPengajuanDiterima();
		$data['total_pengajuan_ditolak'] = $this->admin->getTotalPengajuanDitolak();
		$data['januari'] = $this->admin->getTotal1();
		$data['februari'] = $this->admin->getTotal2();
		$data['maret'] = $this->admin->getTotal3();
		$data['april'] = $this->admin->getTotal4();
		$data['mei'] = $this->admin->getTotal5();
		$data['juni'] = $this->admin->getTotal6();
		$data['juli'] = $this->admin->getTotal7();
		$data['agustus'] = $this->admin->getTotal8();
		$data['september'] = $this->admin->getTotal9();
		$data['oktober'] = $this->admin->getTotal10();
		$data['november'] = $this->admin->getTotal11();
		$data['desember'] = $this->admin->getTotal12();
		$data['title'] = 'Tracking-APP';
		$data['page'] = 'admin/dashboard';
		$this->load->view('template/template_admin', $data);
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
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Halaman profil';
		$data['page'] = 'admin/profil';
		$data['divisi'] = $this->admin->getAllDivisi();
		$this->load->view('template/template_admin', $data);
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
			redirect(base_url('admin/profile'));
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
				$this->admin->updateProfile($id, $data);
				$this->session->set_flashdata('success', 'Data profil berhasil diubah'); 
				redirect(base_url('admin/profil'));
			}
			else
			{
				$id = $this->input->post('id');
				$gambar = $this->upload->data('file_name');
				if($gambar){
					// Ambil data user
					$imageProfile = $this->admin->getDataUser($id);
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
				$this->admin->updateProfile($id, $data);
				$this->session->set_flashdata('success', 'Data profil berhasil diubah'); 
				redirect(base_url('admin/profil'));
			}			
		}
	}

	public function ubah_pass()
	{
		$this->form_validation->set_rules('old_password', 'Password lama', 'required|trim',[
			'required' => 'Password lama tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('new_password', 'Password baru', 'required|trim',[
			'required' => 'Password baru tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('change_password', 'Konfirmasi password', 'required|trim|matches[new_password]',[
			'required' => 'Konfirmasi password tidak boleh kosong.',
			'matches'	=> 'Konfirmasi password harus sesuai'
		]);

		if($this->form_validation->run() == FALSE){
			$id = $this->session->userdata('id_users');
			$user = $this->admin->getDataUser($id);
			$data['data_user'] = $user;
			$data['title'] = 'Halaman ganti password';
			$data['page'] = 'admin/ubah_pass';
			$this->load->view('template/template_admin', $data);
		} else {
			$id = $this->session->userdata('id_users');
			$user = $this->admin->getDataUser($id);
			$password = $this->input->post('old_password');

			if (hashEncryptVerify($password, $user['password']) == TRUE) {
				$data = [
					'password'		=> hashEncrypt($this->input->post('new_password')),
				];
				$this->admin->updatePassword($id, $data);
				$this->session->set_flashdata('success', 'Password berhasil diubah'); 
				redirect(base_url('admin/profil'));
			} else {
				$this->session->set_flashdata('error', 'Password gagal diubah');
				$id = $this->session->userdata('id_users');
				$user = $this->admin->getDataUser($id);
				$data['data_user'] = $user;
				$data['title'] = 'Halaman ganti password';
				$data['page'] = 'admin/ubah_pass';
				$this->load->view('template/template_admin', $data);
			}
		}
		
	}

	public function all_pengguna()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;		
		$data['title'] = 'Halaman data pengguna';
		$data['page'] = 'admin/all_pengguna';
		$this->load->view('template/template_admin', $data);
	}

	public function ambilAllPengguna()
	{
		if ($this->input->is_ajax_request() == true) {
            $list = $this->admin->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                
                $no++;
                $row = array();               
                $row[] = $no.'.';
				if (!empty($field->photo)) {
					$row[] = '<img alt="image" src="'.base_url('images/' . $field->photo).'" class="rounded-circle" width="35" data-toggle="tooltip" title="'.$field->username.'">';
				} else {
					$row[] = '<img alt="image" src="'.base_url('assets/img/avatar/avatar-1.png').'" class="rounded-circle" width="35" data-toggle="tooltip" title="'.$field->username.'">';					
				}
                $row[] = $field->name;
                $row[] = $field->username;
                $row[] = $field->email;
                $row[] = $field->phone;
                $row[] = '<a href="#" data-toggle="modal" data-target="#ModalEdit" onclick="getDataEditNasabah('.$field->id_users.')" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a> <a href="#" onclick="hapusNasabah('.$field->id_users.')" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Hapus</a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->admin->count_all(),
                "recordsFiltered" => $this->admin->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
	}

	public function all_divisi()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;		
		$data['title'] = 'Halaman data divisi';
		$data['page'] = 'admin/all_divisi';
		$this->load->view('template/template_admin', $data);
	}

	function data_divisi()
	{
		$dataDivisi = $this->admin->getDivisi();
		echo json_encode($dataDivisi);
	}

	function data_edit_divisi($id)
	{
		$getEditDivisi = $this->admin->getEditDivisi($id);
		echo json_encode($getEditDivisi);
	}

	function edit_divisi()
	{
		$id = $this->input->post('id_divisi');
		$nama_divisi = $this->input->post('nama_divisi');
		if ($nama_divisi=='') {
			$result['pesan']="Nama divisi tidak boleh kosong";
		} else {
			$result['pesan']="";
			
			$data = [
				'nama_divisi' => $nama_divisi
			];

			$this->admin->editDivisi($id, $data);
		}
		echo json_encode($result);
	}

	function tambah_divisi(){
		$nama_divisi = $this->input->post('nama_divisi');

		if ($nama_divisi=='') {
			$result['pesan']="Nama divisi tidak boleh kosong";
		} else {
			$result['pesan']="";
			
			$data = [
				'nama_divisi' => $nama_divisi
			];

			$this->admin->addDivisi($data);
		}
		echo json_encode($result);
	}

	function hapus_divisi($id)
	{
		$this->admin->deleteDivisi($id);
	}

	function tambah_nasabah()
	{
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$password = hashEncrypt($this->input->post('password'));

		if ($name=='') {
			$result['pesan']="Nama pengguna tidak boleh kosong";
		} elseif ($username=='') {
			$result['pesan']="Nama pengguna tidak boleh kosong";
		} elseif ($phone=='') {
			$result['pesan']="No. Whatsapp/telepon tidak boleh kosong";
		} elseif ($email=='') {
			$result['pesan']="email tidak boleh kosong";
		} elseif ($password=='') {
			$result['pesan']="password tidak boleh kosong";
		} else {
			$result['pesan']="";
			
			$data = [
				'name' 		=> $this->input->post('name'),
				'username' 	=> $this->input->post('username'),
				'phone' 	=> $this->input->post('phone'),
				'role_id' 	=> 2,
				'email' 	=> $this->input->post('email'),
				'password' => hashEncrypt($this->input->post('password')),
				'created_at'=> date('Y-m-d'), 
			];

			$this->admin->addNasabah($data);
		}
		echo json_encode($result);
	}

	function hapus_nasabah($id)
	{
		$this->admin->deleteNasabah($id);
	}

	function data_edit_nasabah($id)
	{
		$getEditNasabah = $this->admin->getEditNasabah($id);
		echo json_encode($getEditNasabah);
	}

	function edit_nasabah()
	{
		$id = $this->input->post('id_users');
		$name = $this->input->post('name_edit');
		$username = $this->input->post('username_edit');
		$phone = $this->input->post('phone_edit');
		$email = $this->input->post('email_edit');

		if ($name=='') {
			$result['pesan']="Nama pengguna tidak boleh kosong";
		} elseif ($username=='') {
			$result['pesan']="Nama pengguna tidak boleh kosong";
		} elseif ($phone=='') {
			$result['pesan']="No. Whatsapp/telepon tidak boleh kosong";
		} elseif ($email=='') {
			$result['pesan']="email tidak boleh kosong";
		} else {
			$result['pesan']="";
			
			$data = [
				'name' 		=> $name,
				'username' 	=> $username,
				'phone' 	=> $phone,
				'email' 	=> $email,
			];

			$this->admin->EditNasabah($id, $data);
		}
		echo json_encode($result);
	}

	public function all_pengajuan()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;		
		$data['title'] = 'Halaman data pengajuan kredit';
		$data['page'] = 'admin/all_pengajuan';
		$data['all_pengajuan'] = $this->admin->getAllPengajuan();
		$data['all_kode_berkas'] = $this->admin->getAllKodeBerkas();
		$this->load->view('template/template_admin', $data);
	}
	
	public function edit_data_nasabah($id)
	{
		$id_users = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id_users);
		$data['data_user'] = $user;		
		$data['title'] = 'Halaman data pengajuan kredit';
		$data['page'] = 'admin/edit_data_nasabah';
		$data['data_nasabah'] = $this->admin->getUserDataNasabah($id);
		$this->load->view('template/template_admin', $data);
	}

	public function edit_form_data_nasabah()
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
			redirect(base_url('admin/edit_data_nasabah/'.$id));
		} else {
			$id = $this->input->post('user_id');
			$data = [
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
			$this->admin->editFormDataNasabah($id, $data);
			$this->session->set_flashdata('success', 'Data nasabah berhasil diperbarui!'); 
			redirect(base_url('admin/edit_data_nasabah/'.$id));
		}
	}

	public function edit_data_pekerjaan($id)
	{
		$id_users = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id_users);
		$data['data_user'] = $user;
		$data['title'] = 'Permohonan Kredit';
		$data['page'] = 'admin/edit_data_pekerjaan';
		$data['data_pekerjaan'] = $this->admin->getUserDatapekerjaan($id);
		$this->load->view('template/template_admin', $data);
	}

	public function edit_form_data_pekerjaan()
	{
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',[
			'required' => 'Pekerjaan tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('nama_perusahaan', 'Nama perusahaan', 'required|trim',[
			'required' => 'Nama perusahaan tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Data pekerjaan gagal diperbarui, silahkan lengkapi formulir!');
			redirect(base_url('admin/edit_data_pekerjaan/'.$id));
		} else {
			$id = $this->input->post('user_id');
			$data = [	
				'pekerjaan'			=> $this->input->post('pekerjaan'),
				'bd_usaha'			=> $this->input->post('bd_usaha'),
				'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
				'tahun'				=> $this->input->post('tahun'),
				'bulan'				=> $this->input->post('bulan'),
				'penghasilan'		=> $this->input->post('penghasilan'),
			];
			$this->admin->editFormDataPekerjaan($id, $data);
			$this->session->set_flashdata('success', 'Data nasabah berhasil diperbarui, silahkan isi formulir data pekerjaan!'); 
			redirect(base_url('admin/edit_data_pekerjaan/'.$id));
		}
	}

	public function edit_data_pribadi_nasabah($id)
	{
		$id_users = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id_users);
		$data['data_user'] = $user;
		$data['title'] = 'Permohonan Kredit';
		$data['page'] = 'admin/edit_data_pribadi_nasabah';
		$data['data_pribadi_nasabah'] = $this->admin->getUserDatapribadiNasabah($id);
		$this->load->view('template/template_admin', $data);
	}

	public function edit_form_data_pribadi_nasabah()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim',[
			'required' => 'Pekerjaan tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('no_ktp', 'Nomer KTP', 'required|trim',[
			'required' => 'Nomer KTP tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Data pribadi nasabah gagal diperbarui, silahkan lengkapi formulir!');
			redirect(base_url('admin/edit_data_pribadi_nasabah/'.$id));
		} else {
			$id = $this->input->post('user_id');
			$data = [
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
			$this->admin->editFormDataPribadiNasabah($id, $data);
			$this->session->set_flashdata('success', 'Data nasabah berhasil diperbarui, silahkan isi formulir data pekerjaan!'); 
			redirect(base_url('admin/edit_data_pribadi_nasabah/'.$id));
		}
	}

	public function all_berkas()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;		
		$data['title'] = 'Halaman data kode berkas';
		$data['page'] = 'admin/all_berkas';
		$this->load->view('template/template_admin', $data);
	}

	public function data_berkas()
	{
		$dataKodeBerkas = $this->admin->getKodeBerkas();
		echo json_encode($dataKodeBerkas);
	}

	public function tambah_kode_berkas()
	{
		$kode_berkas = $this->input->post('kode_berkas');

		if ($kode_berkas=='') {
			$result['pesan']="Kode berkas tidak boleh kosong";
		} else {
			$result['pesan']="";
			
			$data = [
				'kode_berkas' => $kode_berkas,
				'qrcode' => $kode_berkas
			];

			$this->admin->addKodeBerkas($data);
		}
		echo json_encode($result);
	}

	public function hapus_kode_berkas($id)
	{
		$this->admin->deleteKodeBerkas($id);
	}

	public function data_edit_kode_berkas($id)
	{
		$getEditKodeBerkas = $this->admin->getEditKodeBerkas($id);
		echo json_encode($getEditKodeBerkas);
	}

	public function edit_kode_berkas()
	{
		$id = $this->input->post('id_kode_berkas');
		$kode_berkas = $this->input->post('kode_berkas');
		if ($kode_berkas=='') {
			$result['pesan']="Nama divisi tidak boleh kosong";
		} else {
			$result['pesan']="";
			
			$data = [
				'kode_berkas' => $kode_berkas,
				'qrcode' => $kode_berkas
			];

			$this->admin->editKodeBerkas($id, $data);
		}
		echo json_encode($result);
	}

	public function all_pegawai()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;		
		$data['divisi'] = $this->admin->getAllDivisi();		
		$data['title'] = 'Halaman data pegawai';
		$data['page'] = 'admin/all_pegawai';
		$this->load->view('template/template_admin', $data);
	}

	public function ambilAllPegawai()
	{
		if ($this->input->is_ajax_request() == true) {
            $list = $this->admin->get_datatables_allPegawai();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                
                $no++;
                $row = array();               
                $row[] = $no.'.';
				if (!empty($field->photo)) {
					$row[] = '<img alt="image" src="'.base_url('images/' . $field->photo).'" class="rounded-circle" width="35" data-toggle="tooltip" title="'.$field->username.'">';
				} else {
					$row[] = '<img alt="image" src="'.base_url('assets/img/avatar/avatar-1.png').'" class="rounded-circle" width="35" data-toggle="tooltip" title="'.$field->username.'">';					
				}
                $row[] = $field->name;
                $row[] = $field->username;
                $row[] = $field->email;
                $row[] = $field->phone;
                $row[] = $field->nama_divisi;
                $row[] = '<a href="#" data-toggle="modal" data-target="#ModalEdit" onclick="getDataEditPegawai('.$field->id_users.')" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a> <a href="#" onclick="hapusPegawai('.$field->id_users.')" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Hapus</a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->admin->count_all(),
                "recordsFiltered" => $this->admin->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
	}

	public function tambah_pegawai()
	{
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$divisi = $this->input->post('divisi');
		$password = hashEncrypt($this->input->post('password'));
		if ($name=='') {
			$result['pesan']="Nama pengguna tidak boleh kosong";
		} elseif ($username=='') {
			$result['pesan']="Nama pengguna tidak boleh kosong";
		} elseif ($phone=='') {
			$result['pesan']="No. Whatsapp/telepon tidak boleh kosong";
		} elseif ($email=='') {
			$result['pesan']="email tidak boleh kosong";
		} else {
			$result['pesan']="";
			
			$data = [
				'name' 		=> $name,
				'username' 	=> $username,
				'phone' 	=> $phone,
				'role_id' 	=> 3,
				'email' 	=> $email,
				'divisi' 	=> $divisi,
				'password' => $password,
				'created_at'=> date('Y-m-d'), 
			];

			$this->admin->addPegawai($data);
		}
		echo json_encode($result);
	}
	
	public function hapus_pegawai($id)
	{
		$this->admin->deletePegawai($id);
	}

	public function data_edit_pegawai($id)
	{
		$getEditPegawai = $this->admin->getEditPegawai($id);
		echo json_encode($getEditPegawai);
	}

	public function edit_pegawai($di)
	{
		$id = $this->input->post('id_users');
		$name = $this->input->post('name_edit');
		$username = $this->input->post('username_edit');
		$phone = $this->input->post('phone_edit');
		$divisi = $this->input->post('divisi_edit');
		$email = $this->input->post('email_edit');

		if ($name=='') {
			$result['pesan']="Nama pengguna tidak boleh kosong";
		} elseif ($username=='') {
			$result['pesan']="Nama pengguna tidak boleh kosong";
		} elseif ($phone=='') {
			$result['pesan']="No. Whatsapp/telepon tidak boleh kosong";
		} elseif ($email=='') {
			$result['pesan']="email tidak boleh kosong";
		} else {
			$result['pesan']="";
			
			$data = [
				'name' 		=> $name,
				'username' 	=> $username,
				'phone' 	=> $phone,
				'divisi' 	=> $divisi,
				'email' 	=> $email,
			];

			$this->admin->EditPegawai($id, $data);
		}
		echo json_encode($result);
	}
}
