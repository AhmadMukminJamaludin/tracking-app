<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getDataUser($id)
    {
        return $this->db->get_where('users', ['id_users' => $id])->row_array();
    }

    public function updateProfile($id, $data)
    {
        $this->db->update('users', $data, ['id_users' => $id]);
        return $this->db->affected_rows();
    }

    public function addFormDataNasabah($data)
    {
        $this->db->insert('data_nasabah', $data);
    }

    public function addFormDataPekerjaan($data)
    {
        $this->db->insert('data_pekerjaan', $data);
    }

    public function addFormDataPribadiNasabah($data)
    {
        $this->db->insert('data_pribadi_nasabah', $data);
    }

    public function addFormDataPermohonanKredit($data, $data1)
    {
        $this->db->insert('data_permohonan_kredit', $data);
        $this->db->insert('progres_permohonan_kredit', $data1);
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
    
    public function getUserDataProgresPermohonanKredit($id)
    {
        $this->db->select('*');
        $this->db->from('progres_permohonan_kredit');
        $this->db->where('user_id', $id);
        return $this->db->get()->result();
    }

}