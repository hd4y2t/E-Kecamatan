<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpegawai');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['ni' => $this->session->userdata('ni')])->row_array();
        $data['title'] = 'Data Surat';
        $this->load->model('Mpegawai', 'pegawai');
        $data['kategori'] = $this->pegawai->getKategori();
        $data['surat'] = $this->db->get('surat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }
}
