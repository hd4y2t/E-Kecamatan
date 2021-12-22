<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Madmin');
        $this->load->model('Mloket');
        // $this->load->model('Mcamat');
        // $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Antrian';
        $data['warga'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get('pengajuan_surat')->num_rows();
        $data['antrian_non'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['antrian_done'] = $this->db->get_where('pengajuan_surat', ['status' => 5])->num_rows();
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['user_non'] = $this->db->get('user')->num_rows();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Surat Sedang Dibuat',
            5 => 'Surat Telah Selesai!'

        ];

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


        $this->load->model('Mloket', 'loket');
        $data['surat'] = $this->db->get('surat')->result_array();
        // $data['antri'] = $this->db->get('pengajuan_surat')->result_array();
        $data['antri'] = $this->loket->getSurat();

        //  KASIH PELAYANAN UMUM
        $data['skm'] = $this->loket->skm();
        $data['countskm'] = $this->loket->Countskm();

        $data['sktm'] = $this->loket->sktm();
        $data['countsktm'] = $this->loket->Countsktm();

        $data['skbpr'] = $this->loket->skbpr();
        $data['countskbpr'] = $this->loket->Countskbpr();

        $data['skp'] = $this->loket->skp();
        $data['countskp'] = $this->loket->Countskp();

        $data['spik'] = $this->loket->spik();
        $data['countspik'] = $this->loket->Countspik();

        $data['spskck'] = $this->loket->spskck();
        $data['countspskck'] = $this->loket->Countspskck();


        // KASIH PEMERINTAHAN
        $data['skn'] = $this->loket->skn();
        $data['countskn'] = $this->loket->Countskn();

        $data['skdp'] = $this->loket->skdp();
        $data['countskdp'] = $this->loket->Countskdp();

        $data['sku'] = $this->loket->sku();
        $data['countsku'] = $this->loket->Countsku();

        $data['skd'] = $this->loket->skd();
        $data['countskd'] = $this->loket->Countskd();

        $data['skos'] = $this->loket->skos();
        $data['countskos'] = $this->loket->Countskos();

        $data['spc'] = $this->loket->spc();
        $data['countspc'] = $this->loket->Countspc();

        // $data['antri'] = $this->loket->getAntrian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('loket/index', $data);
        $this->load->view('templates/footer');
    }

    public function pemerintahan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $data['warga'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get('pengajuan_surat')->num_rows();
        $data['antrian_non'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['antrian_done'] = $this->db->get_where('pengajuan_surat', ['status' => 5])->num_rows();
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['user_non'] = $this->db->get('user')->num_rows();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Surat Sedang Dibuat',
            5 => 'Surat Telah Selesai!'

        ];

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


        $this->load->model('Mloket', 'loket');
        $data['surat'] = $this->db->get('surat')->result_array();
        $data['antri'] = $this->loket->getSurat();

        // KASIH PEMERINTAHAN
        $data['skn'] = $this->loket->skn();
        $data['skdp'] = $this->loket->skdp();
        $data['sku'] = $this->loket->sku();
        $data['skd'] = $this->loket->skd();
        $data['skos'] = $this->loket->skos();
        $data['spc'] = $this->loket->spc();

        // $data['antri'] = $this->loket->getAntrian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('loket/antri_pemerintahan', $data);
        $this->load->view('templates/footer');
    }
    public function pelayanan_umum()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $data['warga'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get('pengajuan_surat')->num_rows();
        $data['antrian_non'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['antrian_done'] = $this->db->get_where('pengajuan_surat', ['status' => 5])->num_rows();
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['user_non'] = $this->db->get('user')->num_rows();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Surat Sedang Dibuat',
            5 => 'Surat Telah Selesai!'

        ];

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


        $this->load->model('Mloket', 'loket');
        $data['surat'] = $this->db->get('surat')->result_array();
        $data['antri'] = $this->db->get('pengajuan_surat')->result_array();
        $data['surat_keluar'] = $this->loket->getSurat();


        //  KASIH PELAYANAN UMUM
        $data['skm'] = $this->loket->skm();
        $data['sktm'] = $this->loket->sktm();
        $data['skbpr'] = $this->loket->skbpr();
        $data['skp'] = $this->loket->skp();
        $data['spik'] = $this->loket->spik();
        $data['spskck'] = $this->loket->spskck();


        // $data['antri'] = $this->loket->getAntrian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('loket/antri_umum', $data);
        $this->load->view('templates/footer');
    }

    public function terima($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
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
        $pSurat = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
        $dateNow = date('d-m-Y');

        $save = [
            'surat_id' => $pSurat['id_surat'],
            'pengaju_id' => $pSurat['id_pengaju'],
            'nik_pengaju' => $pSurat['nik'],
            'tgl' => date('d-m-Y', strtotime($dateNow)),
            'status_surat' => 1
        ];

        $this->db->insert('pembuatan_surat', $save);

        $this->db->set('status', 3);
        $this->db->where(['id' => $id]);
        $this->db->update('pengajuan_surat');
        $this->session->set_flashdata('success', 'Status Pengajuan ID:  ' . $pSurat['id_pengaju'] . ' Pengajuan  ' . $kode[$pSurat['id_surat']]  . '  Telah Diterima!');
        redirect(base_url('loket/index'));
    }

    public function tolak($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Telah diketahui Sekcam ',
            5 => 'Telah diketahui Camat',
        ];
        $kode = [
            'SKM' => 'SURAT KETERANGAN MISKIN',
            'SKM' => 'SURAT KETERANGAN TIDAK MAMPU',
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
        $pSurat = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();

        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        $catatan =  $this->input->post("catatan", TRUE);
        $dateNow = date('d-m-Y');


        $this->db->set('status', 2);
        $this->db->set('catatan', $catatan);
        $this->db->set('tgl', $dateNow);
        $this->db->where(['id' => $id]);
        $this->db->update('pengajuan_surat');
        $this->session->set_flashdata('danger', 'Status Pengajuan ID:  ' . $pSurat['id_pengaju']  . ' Pengajuan  ' . $kode[$pSurat['id_surat']]  . ' Telah Ditolak! <br>Dengan Catatan : ' . $catatan);
        redirect(base_url('loket/index'));
    }


    public function pembuatan_surat()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Pembuatan Surat';
        $this->load->model('Mloket', 'loket');
        $data['ps'] = $this->loket->getAllSurat();
        $data['status'] = [
            1 => 'Surat Belum dibuat',
            2 => 'Ditolak',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Telah diketahui sekcam',
            5 => 'Telah Diparaf Camat'
        ];
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


        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('loket/pembuatan_surat', $data);
            $this->load->view('templates/footer');
        } else {
            $no_surat =  $this->input->post("no_surat", TRUE);
            $tgl =  $this->input->post("tgl", TRUE);
            $keterangan =  $this->input->post("keterangan", TRUE);

            $save = [
                'id' => '',
                'no_surat' => $no_surat,
                'tgl' => date('d-m-Y', strtotime($tgl)),
                'keterangan' => $keterangan,
                'status' => 1
            ];

            $this->db->update('surat_keluar', $save);
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
            redirect(base_url("loket/pembuatan_surat"));
        }
    }


    public function download($id)
    {
        $data = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();
        force_download('upload/surat_keluar/' . $data['file'], NULL);
    }
}
