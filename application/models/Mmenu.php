<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmenu extends CI_Model
{
    public function input($array)
    {
        $this->db->insert('user_menu', $array);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                   FROM `user_sub_menu` JOIN `user_menu`
                   ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                   ";
        return $this->db->query($query)->result_array();
    }

    public function inputsubmenu($array)
    {
        $this->db->insert('user_sub_menu', $array);
    }

    public function deleteSubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }
}
