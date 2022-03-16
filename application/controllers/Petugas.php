<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->model('pengajuan_model', 'pengajuan');
        is_petugas();
		is_login();
	}

	public function index()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Pengajuan Kredit';
		$data['page'] = 'petugas/dashboard';
        $data['total_pengguna'] = $this->admin->getTotalPengguna();
		$data['total_pengajuan'] = $this->admin->getTotalPengajuan();
		$data['total_pengajuan_diterima'] = $this->admin->getTotalPengajuanDiterima();
		$data['total_pengajuan_ditolak'] = $this->admin->getTotalPengajuanDitolak();
		$this->load->view('template/template_petugas', $data);
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
		$data['page'] = 'petugas/profil';
		$data['divisi'] = $this->admin->getAllDivisi();
		$this->load->view('template/template_petugas', $data);
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
			redirect(base_url('petugas/profil'));
		}else{
			if ($this->input->post('divisi')==1) {
				$this->session->set_flashdata('error', 'Anda tidak dapat mengubah divisi menjadi administrator');
				redirect(base_url('petugas/profil'));
			} else {
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
						'divisi'	=> $this->input->post('divisi'),
						'email' 	=> $this->input->post('email'),
						'phone' 	=> $this->input->post('phone')
					];
					$this->admin->updateProfile($id, $data);
					$this->session->set_flashdata('success', 'Data profil berhasil diubah'); 
					redirect(base_url('petugas/profil'));
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
						'divisi'	=> $this->input->post('divisi'),
						'email' 	=> $this->input->post('email'),
						'phone' 	=> $this->input->post('phone')
					];
					// Timpa data foto dengan nama yg baru
					$data['photo'] = $gambar;
					$this->admin->updateProfile($id, $data);
					$this->session->set_flashdata('success', 'Data profil berhasil diubah'); 
					redirect(base_url('petugas/profil'));
				}	
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
			$data['page'] = 'petugas/ubah_pass';
			$this->load->view('template/template_petugas', $data);
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
				redirect(base_url('petugas/profil'));
			} else {
				$this->session->set_flashdata('error', 'Password gagal diubah');
				$id = $this->session->userdata('id_users');
				$user = $this->admin->getDataUser($id);
				$data['data_user'] = $user;
				$data['title'] = 'Halaman ganti password';
				$data['page'] = 'petugas/ubah_pass';
				$this->load->view('template/template_petugas', $data);
			}
		}
		
	}

	public function all_pengguna()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;		
		$data['title'] = 'Halaman data pengguna';
		$data['page'] = 'petugas/all_pengguna';
		$this->load->view('template/template_petugas', $data);
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
		$data['page'] = 'petugas/all_divisi';
		$this->load->view('template/template_petugas', $data);
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
		$data['page'] = 'petugas/all_pengajuan';
        $data['all_pengajuan'] = $this->admin->getAllPengajuan();
		$this->load->view('template/template_petugas', $data);
	}

    public function ambilAllPengajuan()
	{
		if ($this->input->is_ajax_request() == true) {
            $list = $this->admin->get_datatables_allPengajuan();
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
                $row[] = '<h5> Rp'.$field->jumlah_nominal.'</h5>';
                $row[] = $field->tujuan_penggunaan;
                $row[] = $field->jaminan_kredit;
				if (($field->progress)==1) {
					$row[] = '<div class="badge badge-info">Pengajuan baru</div>';
				} elseif (($field->progress)==2) {
					$row[] = '<div class="badge badge-warning">Dalam pemeriksaan petugas...</div>';
				} elseif (($field->progress)==3) {
					$row[] = '<div class="badge badge-success">Pengajuan diterima</div>';
				} else {
					$row[] = '<div class="badge badge-danger">Pengajuan ditolak</div>';
				}
				if ($field->scan_berkas=='') {
					$row[] = '<div class="badge badge-danger"><i class="fas fa-exclamation-triangle"></i> Tidak melampirkan berkas</div>';
				} else {
					$row[] = '<a href="'.base_url('./berkas/'.$field->scan_berkas).'" download class="btn btn-icon icon-left btn-primary"><i class="fas fa-file-download"></i> Download</a>';					
				}
                $row[] = '<a href="'.base_url('pengajuan/detail_pengajuan_user/'. $field->id_users).'" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Detail</a> <a href="#" data-toggle="modal" onclick="" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a> <a href="#" onclick="" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Hapus</a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->admin->count_allPengajuan(),
                "recordsFiltered" => $this->admin->count_filteredPengajuan(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
	}

    public function ubah_status_pengajuan()
	{
		if ($this->input->is_ajax_request() == true) {
            $list = $this->admin->get_datatables_allPengajuan();
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
                $row[] = '<h5> Rp'.$field->jumlah_nominal.'</h5>';
                $row[] = $field->tujuan_penggunaan;
                $row[] = $field->jaminan_kredit;
				if (($field->progress)==1) {
					$row[] = '<div class="badge badge-info">Pengajuan baru</div>';
				} elseif (($field->progress)==2) {
					$row[] = '<div class="badge badge-warning">Dalam pemeriksaan Customer Service</div>';
				} elseif (($field->progress)==3) {
					$row[] = '<div class="badge badge-success">Pengajuan diterima</div>';
				} else {
					$row[] = '<div class="badge badge-danger">Pengajuan ditolak</div>';
				}
				if ($field->scan_berkas=='') {
					$row[] = '<div class="badge badge-danger"><i class="fas fa-exclamation-triangle"></i> Tidak melampirkan berkas</div>';
				} else {
					$row[] = '<a href="'.base_url('./berkas/'.$field->scan_berkas).'" download class="btn btn-icon icon-left btn-primary"><i class="fas fa-file-download"></i> Download</a>';					
				}
                $row[] = '<a href="'.base_url('petugas/detail_pengajuan_user/'. $field->id_users).'" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Detail</a> <a href="#" data-toggle="modal" data-target="#modal_ubah_pengajuan'.$field->id_users.'" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Ubah Status Pengajuan</a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->admin->count_allPengajuan(),
                "recordsFiltered" => $this->admin->count_filteredPengajuan(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
	}

    public function tambah_progres_pengajuan()
    {
        $user_id = $this->input->post('user_id');
        $id_petugas = $this->input->post('id_petugas');
        $status_pengajuan = $this->input->post('status_pengajuan');

		if ($user_id=='') {
			$result['pesan']="user id tidak boleh kosong";
		} elseif ($id_petugas=='') {
			$result['pesan']="id petugas tidak boleh kosong";
		} elseif ($status_pengajuan=='') {
			$result['pesan']="status pengajuan tidak boleh kosong";
		} else {
			$result['pesan']="";
			$data = [
				'user_id' => $user_id,
				'id_petugas' => $id_petugas,
				'status_progres' => $status_pengajuan,
				'tanggal_progres' => date('Y-m-d')
			];
        	$this->pengajuan->addProgressPengajuan($data);
		}
		echo json_encode($result);        
    }

	public function detail_pengajuan_user($id) 
	{
		$id_admin = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id_admin);
		$data['data_user'] = $user;
		$data['title'] = 'Pengajuan Kredit';
		$data['page'] = 'petugas/detail_pengajuan_kredit';
		$data['data_nasabah'] = $this->pengajuan->getUserDataNasabah($id);
		$data['data_pekerjaan'] = $this->pengajuan->getUserDatapekerjaan($id);
		$data['data_pribadi_nasabah'] = $this->pengajuan->getUserDatapribadiNasabah($id);
		$data['data_permohonan_kredit'] = $this->pengajuan->getUserDataPermohonanKredit($id);
		$data['progres_permohonan_kredit'] = $this->pengajuan->getUserDataProgresPermohonanKredit($id);
		$this->load->view('template/template_petugas', $data);
	}

}