<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekcam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Madmin');

        $this->load->model('Mpegawai', 'pegawai');
        $this->load->model('Msekcam', 'sekcam');
        $this->load->library('form_validation', 'Pdf');
        is_logged_in();
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $data['warga'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get('pengajuan_surat')->num_rows();
        $data['antrian_non'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['antrian_done'] = $this->db->get_where('pengajuan_surat', ['status' => 5])->num_rows();
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['user_non'] = $this->db->get('user')->num_rows();

        $chartPie = 'SELECT surat_id as name ,COUNT(surat_id) AS value FROM `pembuatan_surat` group BY surat_id';
        $data['pie'] = $this->db->query($chartPie)->result();

        $this->load->model('Mgrafik', 'grafik');
        $query = "SELECT `tgl` FROM `pembuatan_surat` ORDER BY `tgl` DESC LIMIT 1";
        $data['last'] = $this->db->query($query)->row_array();

        $data['chart'] = $this->grafik->getDataGrafik();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('sekcam/index', $data);
        $this->load->view('templates/footer');
    }
    public function pembuatan_surat()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Pembuatan Surat';
        $data['status'] = [
            1 => 'Surat Belum dibuat',
            2 => 'Ditolak',
            3 => 'Pending',
            4 => 'Dilanjutkan',
            5 => 'Telah Diketahui Camat',
        ];
        $data['surat'] = [
            'SKM' => 'SURAT KETERANGAN MISKIN',
            'SKTM' => 'SURAT KETERANGAN TIDAK MAMPU',
            'SKBPR' => 'SURAT KETERANGAN BELUM PUNYA RUMAH',
            'SKU' => 'SURAT KETERANGAN USAHA',
            'SKDP' => 'SURAT KETERANGAN DOMISILI PERUSAHAAN',
            'SKN' => 'SURAT KETERANGAN NIKAH',
            'SKD' => 'SURAT KETERANGAN DOMISILI',
            'SKP' => 'SURAT KETERANGAN PENGHASILAN',
            'SKOS' => 'SURAT KETERANGAN ORANG YANG SAMA',
            'SPC' => 'SURAT PENGANTAR CERAI',
            'SPSKCK' => 'SURAT PENGANTAR SKCK',
            'SPIK' => 'SURAT PENGANTAR IZIN KERAMAIAN'
        ];
        $this->load->model('Msekcam', 'sekcam');
        $data['ps'] = $this->sekcam->getSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('sekcam/pembuatan_surat', $data);
        $this->load->view('templates/footer');
    }

    public function terima($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Masuk';
        $data['status'] = [
            1 => 'Belum ada file',
            2 => 'Pending',
            3 => 'Ditolak',
            4 => 'Diketahui Sekcam',
            5 => 'Diketahui Sekcam dan Camat'
        ];

        // $surat = $this->db->get_where('pembuatan_surat', ['id' => $id])->row_array();
        $status = 4;
        // $data['pengajuan'] = $this->db->get('pengajuan_surat')->result_array();


        $this->db->set('status_surat', $status);

        $this->db->where(['no_surat' => $id]);
        $this->db->update('pembuatan_surat');


        $this->session->set_flashdata('success', 'Status Surat Nomor ' . $id . ' Telah Diketahui!');
        // var_dump($status);
        // die();
        redirect(base_url('sekcam/pembuatan_surat'));
    }

    public function tolak($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            3 => 'Telah diketahui Sekcam dan Camat',
        ];
        $kode = [
            'SKM' => 'SURAT KETERANGAN MISKIN',
            'SKTM' => 'SURAT KETERANGAN TIDAK MAMPU',
            'SKBPR' => 'SURAT KETERANGAN BELUM PUNYA RUMAH',
            'SKU' => 'SURAT KETERANGAN USAHA',
            'SKDP' => 'SURAT KETERANGAN DOMISILI PERUSAHAAN',
            'SKN' => 'SURAT KETERANGAN NIKAH',
            'SKD' => 'SURAT KETERANGAN DOMISILI',
            'SKP' => 'SURAT KETERANGAN PENGHASILAN',
            'SKOS' => 'SURAT KETERANGAN ORANG YANG SAMA',
            'SPC' => 'SURAT PENGANTAR CERAI',
            'SPSKCK' => 'SURAT PENGANTAR SKCK',
            'SPIK' => 'SURAT PENGANTAR IZIN KERAMAIAN'
        ];
        $pSurat = $this->db->get_where('pembuatan_surat', ['no_surat' => $id])->row_array();

        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        $catatan =  $this->input->post("catatan", TRUE);
        $dateNow = date('d-m-Y');

        $array = [
            'catatan_surat' => $catatan,
            'status_surat' => 2,
            'tgl' => $dateNow
        ];

        $this->db->where(['no_surat' => $id]);
        $this->db->update('pembuatan_surat', $array);
        $this->session->set_flashdata('danger', 'Status Surat Nomor:  ' . $id  .  $kode[$pSurat['no_surat']]  . ' Telah Ditolak! <br>Dengan Catatan : ' . $catatan);
        redirect(base_url('sekcam/pembuatan_surat'));
        // var_dump($array, $id);
        // die();
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
            'SKN' => 'SURAT KETERANGAN NIKAH',
            'SKD' => 'SURAT KETERANGAN DOMISILI',
            'SKP' => 'SURAT KETERANGAN PENGHASILAN',
            'SKOS' => 'SURAT KETERANGAN ORANG YANG SAMA',
            'SPC' => 'SURAT PENGANTAR CERAI',
            'SPSKCK' => 'SURAT PENGANTAR SKCK',
            'SPIK' => 'SURAT PENGANTAR IZIN KERAMAIAN'
        ];

        $this->load->model('Msekcam', 'sekcam');
        $data['surat'] = $this->sekcam->getSuratById($id);
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $this->load->view('cetak/cetak_skm', $data);
    }
}
