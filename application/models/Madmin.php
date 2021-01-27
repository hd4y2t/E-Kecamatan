<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Madmin extends CI_Model
{

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
