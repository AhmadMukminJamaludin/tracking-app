<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {

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

    public function getUserDataProgresPermohonanKredit($id)
    {
        $this->db->select('*');
        $this->db->from('progres_permohonan_kredit');
        $this->db->where('user_id', $id);
        return $this->db->get()->result();
    }

    public function addProgressPengajuan($data)
    {
        $this->db->insert('progres_permohonan_kredit', $data);
    }

    public function updateProgressPengajuan($user_id, $data1)
    {
        $this->db->update('data_permohonan_kredit', $data1, ['user_id' => $user_id]);
        return $this->db->affected_rows();
    }

    public function deletePengajuan($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('data_permohonan_kredit');
    }

    public function ubahQrcodePengajuan($id, $data)
    {
        $this->db->update('data_permohonan_kredit', $data, ['user_id' => $id]);
        return $this->db->affected_rows();
    }

}