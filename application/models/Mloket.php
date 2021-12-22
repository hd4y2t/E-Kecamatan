<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mloket extends CI_Model
{

    // public function getKategori()
    // {
    //     $query = "SELECT `surat`.*, `kategori`.`nm_kategori`
    //                FROM `surat` JOIN `kategori`
    //                ON `surat`.`id_kategori` = `kategori`.`id_kategori`
    //                ";
    //     return $this->db->query($query)->result_array();
    // }
    public function getSuratMasuk()
    {
        $query = "SELECT * FROM `surat_masuk` ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
    }

    public function joinDataSurat()
    {
        $query = "SELECT `surat`.* ,`kategori`.`nm_kategori`,`bidang`.`nm_bidang`
                    FROM `surat`
                    JOIN `kategori` ON `surat`.`id_kategori` = `kategori`.`id_kategori` 
                    JOIN `bidang` ON `surat`.`id_bidang`=`bidang`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getAllSurat()
    {
        $query = "SELECT `pembuatan_surat`.* ,`penduduk`.*,`pengajuan_surat`.*
                    FROM `pembuatan_surat`
                    JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju` 
                    JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju`=`pembuatan_surat`.`pengaju_id`
                    ORDER BY `pembuatan_surat`.`status_surat` DESC
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getSurat()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function skm()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skm'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    public function Countskm()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skm'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function sktm()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'sktm'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countsktm()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat`
                   WHERE `pengajuan_surat`.`status` = 1
                   AND `pengajuan_surat`.`id_surat` = 'sktm'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skbpr()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat`
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skbpr'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    public function Countskbpr()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat`
                   WHERE `pengajuan_surat`.`status` = 1
                   AND `pengajuan_surat`.`id_surat` = 'skbpr'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function sku()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'sku'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countsku()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat`
                    WHERE `pengajuan_surat`.`status` = 1
                   AND `pengajuan_surat`.`id_surat` = 'sku'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skdp()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skdp'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countskdp()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat`
                    WHERE `pengajuan_surat`.`status` = 1
                   AND `pengajuan_surat`.`id_surat` = 'skdp'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skn()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skn'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    public function Countskn()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat` 
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skn'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skd()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skd'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    public function Countskd()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat`
                   WHERE `pengajuan_surat`.`status` = 1
                   AND `pengajuan_surat`.`id_surat` = 'skd'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skp()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skp'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countskp()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat` 
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skp'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skos()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skos'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countskos()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat` 
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'skos'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function spc()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'spc'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countspc()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat` 
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'spc'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function spskck()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'spskck'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countspskck()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat` 
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'spskck'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function spik()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'spik'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countspik()
    {
        $query = "SELECT `pengajuan_surat`.*
                   FROM `pengajuan_surat` 
                   WHERE `pengajuan_surat`.`status` = 1 
                   AND `pengajuan_surat`.`id_surat` = 'spik'
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }








    public function getAntrian()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*,`surat`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   JOIN `surat` ON `surat`.`id_surat` = `pengajuan_surat`.`id_surat`
                   WHERE `pengajuan_surat`.`status` != 1
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    // $this->db->select('*');
    // $this->db->from('pengajuan_surat');
    // $this->db->join('penduduk', 'penduduk.nik=pengajuan_surat.nik');
    // $this->db->join('surat', 'surat.id_surat=pengajuan_surat.id_surat');
    // $this->db->where('status =', 1);
    // $this->db->order_by("tgl", "desc");

    // public function inputsubmenu($array)
    // {
    //     $this->db->insert('user_sub_menu', $array);
    // }

    // public function deleteSubmenu($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('user_sub_menu');
    // }
}
