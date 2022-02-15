<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->model('pengajuan_model', 'pengajuan');
		$this->load->library('ciqrcode');
		is_login();
	}

	public function index()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id);
		$data['data_user'] = $user;
		$data['title'] = 'Pengajuan Kredit';
		$data['page'] = 'admin/pengajuan';
		$this->load->view('template/template_admin', $data);
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
                $row[] = $field->nama_nasabah;
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
                $row[] = '<a href="'.base_url('pengajuan/detail_pengajuan_user/'. $field->id_users).'" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Detail</a> <a href="#" data-toggle="modal" data-target="#modal_qrcode'.$field->id_users.'" class="btn btn-icon icon-left btn-info"><i class="fas fa-qrcode"></i> Qrcode</a> <a href="#" data-toggle="modal" data-target="#modal_ubah_pengajuan'.$field->id_users.'" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Ubah Status Pengajuan</a> <a href="'.base_url('admin/edit_data_nasabah/'. $field->id_users).'" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a> <a href="#" onclick="" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Hapus</a>';
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

	public function detail_pengajuan_user($id) 
	{
		$id_admin = $this->session->userdata('id_users');
		$user = $this->admin->getDataUser($id_admin);
		$data['data_user'] = $user;
		$data['title'] = 'Pengajuan Kredit';
		$data['page'] = 'admin/detail_pengajuan_kredit';
		$data['data_nasabah'] = $this->pengajuan->getUserDataNasabah($id);
		$data['data_pekerjaan'] = $this->pengajuan->getUserDatapekerjaan($id);
		$data['data_pribadi_nasabah'] = $this->pengajuan->getUserDatapribadiNasabah($id);
		$data['data_permohonan_kredit'] = $this->pengajuan->getUserDataPermohonanKredit($id);
		$data['progres_permohonan_kredit'] = $this->pengajuan->getUserDataProgresPermohonanKredit($id);
		$this->load->view('template/template_admin', $data);
	}

	public function tambah_progres_pengajuan()
    {
        $user_id = $this->input->post('user_id');
        $id_petugas = $this->input->post('id_petugas');
		$progress = $this->input->post('progress');
        $status_pengajuan = $this->input->post('status_pengajuan');
        $data = [
            'user_id' => $user_id,
            'id_petugas' => $id_petugas,
            'status_progres' => $status_pengajuan,
            'tanggal_progres' => date('Y-m-d')
        ];

		$data1 = [
			'progress' => $progress
		];
		
		if ($status_pengajuan == '') {
			$this->pengajuan->updateProgressPengajuan($user_id, $data1);
		} elseif ($progress == '') {
			$this->pengajuan->addProgressPengajuan($data);			
		} else {
			$this->pengajuan->addProgressPengajuan($data);
			$this->pengajuan->updateProgressPengajuan($user_id, $data1);			
		}

        redirect(base_url('admin/all_pengajuan'));
    }

	public function ciqrcode($kode)
    {
        qrcode::png(
            $kode,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 6,
            $margin = 1
        );
    }
}