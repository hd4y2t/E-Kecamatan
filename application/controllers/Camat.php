<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Camat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Madmin');

        $this->load->model('Mcamat');
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
        // $this->db->where('is_active =', 0);
        // $data['status'] = [
        //     1 => 'Pending',
        //     2 => 'Syarat Tidak Terpenuhi',
        //     3 => 'Diterima dan Dilanjutkan',
        //     4 => 'Sudah Diketik dan Diparaf',
        //     5 => 'Ditandatangani Camat/<b>Selesai</b>',
        // ];
        // $status = $this->input->post('status');
        // $this->load->model('Mcamat', 'camat');

        // $data['surat_keluar'] = $this->camat->getSurat();
        // $data['surat'] = $this->db->get('surat')->result_array();


        // $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        // $this->form_validation->set_rules('jenis', 'Jenis Surat', 'required');
        // $this->form_validation->set_rules('nm_surat_keluar', 'Nama Surat', 'required');
        // $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('camat/index', $data);
        $this->load->view('templates/footer');
    }
    public function surat_masuk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Masuk';
        $data['surat_masuk'] = $this->db->get_where('surat_masuk', ['status =' => 2])->result_array();
        $data['status'] = [
            // 1 => 'Pending',
            2 => 'Diketahui Sekcam',
            3 => 'Diketahui Sekcam dan Camat',
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('camat/surat_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function surat_keluar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Keluar';

        $this->load->model('Mcamat', 'camat');
        $data['surat_keluar'] = $this->camat->getSurat();
        $data['surat'] = $this->db->get('surat')->result_array();

        $data['status'] = [
            1 => 'Pending',
            2 => 'Tolak',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Telah Diparaf'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('camat/surat_keluar', $data);
        $this->load->view('templates/footer');
    }
}
