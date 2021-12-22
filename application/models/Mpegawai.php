<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpegawai extends CI_Model
{

    public function joinDataSurat()
    {
        $query = "SELECT `surat`.* ,`kategori`.`nm_kategori`,`bidang`.`nm_bidang`
                    FROM `surat`
                    JOIN `kategori` ON `surat`.`id_kategori` = `kategori`.`id_kategori` 
                    JOIN `bidang` ON `surat`.`id_bidang`=`bidang`.`id`
                                    ";
        return $this->db->query($query)->result_array();
    }

    public function getSurat()
    {
        $query = "SELECT `pembuatan_surat`.* ,`penduduk`.*,`pengajuan_surat`.*
                    FROM `pembuatan_surat`
                    JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju` 
                    JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju`=`pembuatan_surat`.`pengaju_id`
                    ORDER BY `pembuatan_surat`.`status_surat` ASC
                    ";
        return $this->db->query($query)->result_array();
    }
    public function getSuratById($id)
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.* , `kelurahan`.`nm_kelurahan`, `pengajuan_surat`.*
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`id` = '$id'
                   ";
        return $this->db->query($query)->row_array();
    }

    public function getKelurahan()
    {
        $query = "SELECT `penduduk`.*, `kelurahan`.`nm_kelurahan`
                   FROM `penduduk`
                   JOIN `kelurahan` ON `penduduk`.`kelurahan` = `kelurahan`.`id_kelurahan`
                   ";
        return $this->db->query($query)->result_array();
    }

    public function profile()
    {
        $query = "SELECT *
                   FROM `profile`
                   where id = 1
                   ";
        return $this->db->query($query)->row_array();
    }

    public function skm()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.* , `kelurahan`.`nm_kelurahan`, `pengajuan_surat`.*
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'skm'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    public function Countskm()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat`
                   WHERE `pembuatan_surat`.`surat_id` = 'skm'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function sktm()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'sktm'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countsktm()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat`
                   WHERE `pembuatan_surat`.`surat_id` = 'sktm'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skbpr()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'skbpr'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    public function Countskbpr()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat`
                   WHERE `pembuatan_surat`.`surat_id` = 'skbpr'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function sku()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'sku'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countsku()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat`
                   WHERE `pembuatan_surat`.`surat_id` = 'sku'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skdp()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'skdp'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countskdp()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat`
                   WHERE `pembuatan_surat`.`surat_id` = 'skdp'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skn()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'skn'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    public function Countskn()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat` 
                   WHERE `pembuatan_surat`.`surat_id` = 'skn'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skd()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'skd'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    public function Countskd()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat`
                   WHERE `pembuatan_surat`.`surat_id` = 'skd'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skp()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'skdp'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countskp()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat` 
                   WHERE `pembuatan_surat`.`surat_id` = 'skp'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function skos()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'skos'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countskos()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat` 
                   WHERE `pembuatan_surat`.`surat_id` = 'skos'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function spc()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'spc'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countspc()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat` 
                   WHERE `pembuatan_surat`.`surat_id` = 'spc'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function spskck()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'spskck'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countspskck()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat` 
                   WHERE `pembuatan_surat`.`surat_id` = 'spskck'
                   ";
        return $this->db->query($query)->num_rows();
    }

    public function spik()
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.*, `pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`surat_id` = 'spik'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function Countspik()
    {
        $query = "SELECT `pembuatan_surat`.*
                   FROM `pembuatan_surat` 
                   WHERE `pembuatan_surat`.`surat_id` = 'spik'
                   ORDER BY `pembuatan_surat`.`tgl` DESC
                   ";
        return $this->db->query($query)->num_rows();
    }
}
