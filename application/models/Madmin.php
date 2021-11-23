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

    public function getRole()
    {
        $query = "SELECT `user`.* ,`user_role`.`role`
                    FROM `user`
                    JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }
    public function getIdRole($id)
    {
        $query = "SELECT * FROM user_role Where id = $id
                    ";
        return $this->db->query($query)->row_array();
    }

    function getDataKelurahan()
    {
        $query = "SELECT kelurahan,COUNT(*)
        AS 'kelurahan'
        FROM penduduk
        GROUP BY kelurahan
        ";

        // $this->db->group_by('kelurahan');
        // $this->db->select('kelurahan');
        // $this->db->select("count(*) as pengajuan_surat");
        // return $this->db->from('pengajuan_surat')->get()->result();
        return $this->db->query($query)->result();
    }
}
