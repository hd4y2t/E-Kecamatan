<?php
class Cetak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('Mpegawai', 'pegawai');
        // is_logged_in();
    }

    function index($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['title'] = 'Isi Surat';
        $data['surat_keluar'] = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();


        $this->load->view('cetak/cetak_surat', $data);
    }

    public function cetak_skm($id)
    {
        $data['title'] = 'E-Kecamatan';
        $data['kode'] = [
            'SKM' => 'SURAT KETERANGAN MISKIN',
            'SKTM' => 'SURAT KETERANGAN TIDAK MAMPU',
            'SKBPR' => 'SURAT KETERANGAN BELUM PUNYA RUMAH',
            'SKU' => 'SURAT KETERANGAN USAHA',
            'SKDP' => 'SURAT KETERANGAN DOMISILI PERUSAHAAN',
            'SKN' => 'SURAT KETERANGAN UNTUK MENIKAH',
            'SKD' => 'SURAT KETERANGAN DOMISILI',
            'SKP' => 'SURAT KETERANGAN PENGHASILAN',
            'SKOS' => 'SURAT KETERANGAN ORANG YANG SAMA',
            'SPC' => 'SURAT PENGANTAR CERAI',
            'SPSKCK' => 'SURAT PENGANTAR SKCK',
            'SPIK' => 'SURAT PENGANTAR IZIN KERAMAIAN'
        ];

        $data['surat'] = $this->pegawai->getSuratById($id);
        // $data['surat'] = $this->db->get_where('pembuatan_surat', ['id' => $id])->row_array();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $this->load->view('cetak/cetak_skm', $data);
    }
}
