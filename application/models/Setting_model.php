<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

    public function getSettings()
    {
        return $this->db->get_where('settings', ['id_setting' => 1]);
    }

    public function getDataSettings()
    {
        return $this->db->get_where('settings', ['id_setting' => 1])->result_array();
    }

    public function EditSettings($dataform)
    {
        $this->db->update('settings', $dataform, ['id_setting' => 1]);
        return $this->db->affected_rows();
    }

}   