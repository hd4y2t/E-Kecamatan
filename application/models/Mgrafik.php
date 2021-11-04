<?php
class Mgrafik extends CI_Model
{

    function getDataGrafik()
    {
        $query = $this->db->query("SELECT kelurahan.nm_kelurahan,SUM(pengajuan)
                    AS pengajuan
                    FROM penduduk
                    join kelurahan
                    on kelurahan.id_kelurahan = penduduk.kelurahan
                    GROUP BY kelurahan")->result();
        return $query;
    }
}
