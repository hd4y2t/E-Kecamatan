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
    public function getSuratSKM($id)
    {
        $query = "SELECT `pembuatan_surat`.* ,`penduduk`.*,`pengajuan_surat`.* , `kelurahan`.`nm_kelurahan`
                    FROM `pembuatan_surat`
                    JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju` 
                    JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju`=`pembuatan_surat`.`pengaju_id`
                    JOIN `kelurahan` ON `kelurahan`.`id_kelurahan`=`penduduk`.`kelurahan`
                    WHERE `pembuatan_surat`.`no_surat` = $id
                    ";
        return $this->db->query($query)->row_array();
    }

    public function getSuratBaru()
    {
        $query = "SELECT `surat_keluar`.*, `surat`.`nm_surat`
                   FROM `surat_keluar` JOIN `surat`
                   ON `surat_keluar`.`surat_id` = `surat`.`id_surat`
                   WHERE `surat_keluar`.`status` = 1
                   ";
        return $this->db->query($query)->result_array();
    }
    public function getKelurahan()
    {
        $query = "SELECT `penduduk`.*, `kelurahan`.`nm_kelurahan`
                   FROM `penduduk`
                   JOIN `kelurahan` ON `penduduk`.`kelurahan` = `kelurahan`.`id_kelurahan`
                   ";
        return $this->db->query($query)->result_array();
    }
    public function getDataAntrian($id)
    {
        $query = "SELECT `surat_keluar`.*, `pengajuan_surat`.*
                   FROM `surat_keluar`
                   JOIN `pengajuan_surat` ON `surat_keluar`.`pengaju_id` = `pengajuan_surat`.`id`
                   WHERE `surat_keluar`.`id` = $id
                   ";
        return $this->db->query($query)->row_array();
    }
    public function profile()
    {
        $query = "SELECT *
                   FROM `profile`
                   where id = 1
                   ";
        return $this->db->query($query)->row_array();
    }
    public function getBerita()
    {
        $query = "SELECT `berita`.*,`user`.`nama`,`kategori_berita`.`nm_kategori`
                   FROM berita
                   JOIN `user` ON `berita`.`author` = `user`.`username`
                   JOIN `kategori_berita` ON `berita`.`kategori_id` = `kategori_berita`.`id_kategori`
                   ORDER BY id_berita DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function detailBerita($slug)
    {
        $query = "SELECT `berita`.*,`user`.`nama`
                   FROM berita
                   JOIN `user` ON `berita`.`author` = `user`.`username`
                   WHERE slug = '$slug'
                   ";
        return $this->db->query($query)->row_array();
    }
    public function getEditBerita($id)
    {
        $query = "SELECT *
                   FROM berita
                  WHERE id_berita = $id
                   ";
        return $this->db->query($query)->row_array();
    }
    public function getBeritaLimit()
    {
        $query = "SELECT `berita`.*,`user`.`nama`
                   FROM berita
                   JOIN `user` ON `berita`.`author` = `user`.`username`
                   ORDER BY id_berita DESC LIMIT 4
                   ";
        return $this->db->query($query)->result_array();
    }
}
