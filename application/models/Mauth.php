<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mauth extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('user', $data);
    }

    public function input_role($array)
    {
        $this->db->insert('user_sub_menu', $array);
    }

    public function delete_role($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }
}
