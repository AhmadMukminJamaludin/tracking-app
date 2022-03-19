<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    var $table = 'users'; //nama tabel dari database
    var $column_order = array(null, null, 'name', 'username', 'email', 'phone', null); //Sesuaikan dengan field
    var $column_search = array('name', 'username', 'email', 'phone'); //field yang diizin untuk pencarian 
    var $order = array('name' => 'asc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('role_id', 2);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatablesPegawai_query()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('divisi', 'divisi.id_divisi = users.divisi');
        $this->db->where('role_id', 3);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    private function _get_datatables_query_allPengajuan()
    {
        $this->db->select('*');
        $this->db->from('data_permohonan_kredit');
        $this->db->join('users', 'users.id_users = data_permohonan_kredit.user_id');
        $this->db->join('data_nasabah', 'data_nasabah.user_id = data_permohonan_kredit.user_id');

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_datatables_allPengajuan()
    {
        $this->_get_datatables_query_allPengajuan();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredPengajuan()
    {
        $this->_get_datatables_query_allPengajuan();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_allPengajuan()
    {
        $this->db->from('data_permohonan_kredit');
        return $this->db->count_all_results();
    }

    function get_datatables_allPegawai()
    {
        $this->_get_datatablesPegawai_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredPegawai()
    {
        $this->_get_datatablesPegawai_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_allPegawai()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    public function getDataUser($id)
    {
        $this->db->join('divisi', 'divisi.id_divisi = users.divisi');
        return $this->db->get_where('users', ['id_users' => $id])->row_array();
    }

    public function updateProfile($id, $data)
	{
		$this->db->update('users', $data, ['id_users' => $id]);
        return $this->db->affected_rows();
	}

    public function updatePassword($id, $data)
    {
        $this->db->update('users', $data, ['id_users' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllPengguna()
    {
        $this->db->get_where('users', ['role_id' => 2])->result_array();
    }

    public function getTotalPengguna()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    public function getDivisi()
    {
        return $this->db->get('divisi')->result();
    }

    public function getAllDivisi()
    {
        return $this->db->get('divisi')->result_array();
    }

    public function addDivisi($data)
    {
        $this->db->insert('divisi', $data);
    }

    public function deleteDivisi($id)
    {
        $this->db->where('id_divisi', $id);
        $this->db->delete('divisi');
    }

    public function getEditDivisi($id)
    {
        return $this->db->get_where('divisi', ['id_divisi' => $id])->result();
    }

    public function editDivisi($id, $data)
    {
        $this->db->update('divisi', $data, ['id_divisi' => $id]);
        return $this->db->affected_rows();
    }
    

    public function addNasabah($data)
    {
        $this->db->insert('users', $data);
    }

    public function addPegawai($data)
    {
        $this->db->insert('users', $data);
    }

    public function deleteNasabah($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('users');
    }

    public function getEditNasabah($id)
    {
        return $this->db->get_where('users', ['id_users' => $id])->result();
    }

    public function EditNasabah($id, $data)
    {
        $this->db->update('users', $data, ['id_users' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllPengajuan()
    {
        return $this->db->get('data_permohonan_kredit')->result_array();
    }

    public function getTotalPengajuan()
    {
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }

    public function getTotalPengajuanDiterimaBulanSekarang()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date('m'),0));
        $this->db->where('progress', 3);
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }

    public function getTotalPengajuanDiterima()
    {
        return $this->db->get_where('data_permohonan_kredit', ['progress' => 3])->num_rows();
    }

    public function getTotalPengajuanDitolakBulanSekarang()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date('m'),0));
        $this->db->where('progress', 4);
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }

    public function getTotalPengajuanDitolak()
    {
        return $this->db->get_where('data_permohonan_kredit', ['progress' => 4])->num_rows();
    }

    public function getUserDataNasabah($id)
    {
        return $this->db->get_where('data_nasabah', ['user_id' => $id])->row_array();
    }

    public function getUserDatapekerjaan($id)
    {
        return $this->db->get_where('data_pekerjaan', ['user_id' => $id])->row_array();
    }

    public function getUserDatapribadiNasabah($id)
    {
        return $this->db->get_where('data_pribadi_nasabah', ['user_id' => $id])->row_array();
    }

    public function getUserDataPermohonanKredit($id)
    {
        return $this->db->get_where('data_permohonan_kredit', ['user_id' => $id])->row_array();
    }

    public function editFormDataNasabah($id, $data)
    {
        $this->db->update('data_nasabah', $data, ['user_id' => $id]);
        return $this->db->affected_rows();
    }

    public function editFormDataPekerjaan($id, $data)
    {
        $this->db->update('data_pekerjaan', $data, ['user_id' => $id]);
        return $this->db->affected_rows();
    }

    public function editFormDataPribadiNasabah($id, $data)
    {
        $this->db->update('data_pribadi_nasabah', $data, ['user_id' => $id]);
        return $this->db->affected_rows();
    }

    public function getKodeBerkas()
    {
        return $this->db->get('kode_berkas')->result();
    }

    public function getAllKodeBerkas()
    {
        return $this->db->get('kode_berkas')->result_array();
    }

    public function addKodeBerkas($data)
    {
        $this->db->insert('kode_berkas', $data);
    }

    public function deleteKodeBerkas($id)
    {
        $this->db->where('id_kode_berkas', $id);
        $this->db->delete('kode_berkas');
    }

    public function getEditKodeBerkas($id)
    {
        return $this->db->get_where('kode_berkas', ['id_kode_berkas' => $id])->result();
    }

    public function editKodeBerkas($id, $data)
    {
        $this->db->update('kode_berkas', $data, ['id_kode_berkas' => $id]);
        return $this->db->affected_rows();
    }

    public function deletePegawai($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('users');
    }

    public function getEditPegawai($id)
    {
        return $this->db->get_where('users', ['id_users' => $id])->result();
    }

    public function EditPegawai($id, $data)
    {
        $this->db->update('users', $data, ['id_users' => $id]);
        return $this->db->affected_rows();
    }

    //awal bahan chartjs

    public function getTotal1()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(1),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal2()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(2),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal3()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(3),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal4()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(5),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal5()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(5),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal6()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(6),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal7()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(7),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal8()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(8),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal9()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(9),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal10()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(10),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal11()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(11),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }
    public function getTotal12()
    {
        $this->db->where('month(data_permohonan_kredit.created_at)',ltrim(date(12),0));
        return $this->db->get('data_permohonan_kredit')->num_rows();
    }

    //akhir bahan chartjs
}