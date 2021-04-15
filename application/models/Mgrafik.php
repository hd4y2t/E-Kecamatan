<?php
class Mgrafik extends CI_Model
{

    function get_data_stok()
    {
        $query = $this->db->query("SELECT kelurahan,SUM(pengajuan) AS pengajuan FROM penduduk GROUP BY kelurahan");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
