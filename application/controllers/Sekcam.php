<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekcam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Madmin');

        $this->load->model('Msekcam');
        $this->load->library('form_validation');
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
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Surat Sedang Dibuat',
            5 => 'Surat Telah Selesai!'

        ];
        $data['surat'] = [
            'SKM' => 'Surat Keterangan Miskin',
            'SKBPR' => 'Surat Keterangan Belum Punya Rumah',
            'SKU' => 'Surat Keterangan Usaha',
            'SKDP' => 'Surat Keterangan Domisili Perusahaan',
            'SKN' => 'Surat Keterangan Nikah',
            'SKD' => 'Surat Keterangan Domisili',
            'SKP' => 'Surat Keterangan Penghasilan',
            'SKOS' => 'Surat Keterangan Orang Yang Sama',
            'SPC' => 'Surat Pengantar Cerai',
            'SPSKCK' => 'Surat Pengantar SKCK',
            'SPIK' => 'Surat Pengantar Izin Keramaian'
        ];
        $this->load->model('MSekcam', 'sekcam');
        $data['ps'] = $this->sekcam->getSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('sekcam/pembuatan_surat', $data);
        $this->load->view('templates/footer');
    }
    public function buatSurat($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Kategori';
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('no_pengantar', 'Nomor Pengantar', 'required');
        $this->form_validation->set_rules('tgl_pengantar', 'Tanggal Pengantar', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $data['buat_surat'] = $this->db->get_where('pembuatan_surat', ['id' => $id])->row_array();

        $buat = $this->db->get_where('pembuatan_surat', ['id' => $id])->row_array();
        $id_pengaju = $buat['pengaju_id'];

        $no_surat =  $this->input->post("no_surat", TRUE);
        $no_pengantar =  $this->input->post("no_pengantar", TRUE);
        $tgl_pengantar =  $this->input->post("tgl_pengantar", TRUE);
        $keterangan =  $this->input->post("keterangan", TRUE);
        $data = [
            'no_pengantar' => $no_pengantar,
            'tgl_pengantar' => $tgl_pengantar,
            'status' => 3
        ];
        // $this->db->set('no_pengantar', $no_surat);
        // $this->db->set('tgl_pengantar', $tgl_pengantar);
        // $this->db->set('status', 3);
        $this->db->where('id_pengaju', $id_pengaju);
        $this->db->update('pengajuan_surat', $data);

        $array = [
            'no_surat' => $no_surat,
            'keterangan' => $keterangan,
            'status_surat' => 2
        ];
        $this->db->set('no_surat', $no_surat);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id', $id);
        $this->db->update('pembuatan_surat', $array);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Surat ' . $id . ' Telah Dibuat </div>'
        );
        redirect('pegawai/index');
    }

    public function ketahuisurat($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat_masuk'] = $this->db->get_where('surat_masuk', ['id' => $id])->row_array();

        $data['status'] = [
            1 => 'Pending',
            2 => 'Diketahui Sekcam',
            // 3 => 'Diketahui Sekcam dan Camat',
        ];
        $status = 2;
        $this->db->set('status', $status);
        $this->db->where(['id' => $id]);
        $this->db->update('surat_masuk');
        $this->session->set_flashdata('success', 'Status Surat Telah Diupdate!');
        redirect(base_url('sekcam/surat_masuk'));
    }

    public function surat_keluar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Keluar';

        $this->load->model('Msekcam', 'sekcam');
        $data['surat_keluar'] = $this->sekcam->getSurat();
        $data['surat'] = $this->db->get('surat')->result_array();

        $data['status'] = [
            1 => 'Belum ada file',
            2 => 'Pending',
            3 => 'Ditolak',
            4 => 'Diketahui Sekcam',
            5 => 'Diketahui Sekcam dan Camat'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('sekcam/surat_keluar', $data);
        $this->load->view('templates/footer');
    }
    public function terimasurat($id)
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

        $status = 4;
        // $data['pengajuan'] = $this->db->get('pengajuan_surat')->result_array();


        $this->db->set('status', $status);

        $this->db->where(['id' => $id]);
        $this->db->update('surat_keluar');


        $this->session->set_flashdata('success', 'Status Surat Nomor ' . $id . ' Telah Diketahui!');
        // var_dump($status);
        // die();
        redirect(base_url('sekcam/surat_keluar'));
    }
    public function tolaksurat($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Keluar';
        $data['status'] = [
            1 => 'Belum ada file',
            2 => 'Pending',
            3 => 'Ditolak',
            4 => 'Diketahui Sekcam',
            5 => 'Diketahui Sekcam dan Camat'
        ];

        $status = 3;
        // $data['pengajuan'] = $this->db->get('pengajuan_surat')->result_array();


        $this->db->set('status', $status);

        $this->db->where(['id' => $id]);
        $this->db->update('surat_keluar');


        $this->session->set_flashdata('success', 'Status Nomor Surat: ' . $id . ' Telah Ditolak!');
        // var_dump($status);
        // die();
        redirect(base_url('sekcam/surat_keluar'));
    }
}
