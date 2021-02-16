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
        $data['surat'] = $this->pegawai->getKategori();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('surat', 'surat', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/index', $data);
            $this->load->view('templates/footer');
        } else {
            $array = [

                'id_kategori' => $this->input->post('kategori', true),
                'nm_surat' => $this->input->post('surat', true),

            ];
            $this->db->insert('surat', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Surat Baru ditambahkan </div>'
            );
            redirect('pegawai');
        }
    }
    public function syarat()
    {
        $data['user'] = $this->db->get_where('user', ['ni' => $this->session->userdata('ni')])->row_array();
        $data['title'] = 'Persyaratan';
        $this->load->model('Mpegawai', 'pegawai');
        $data['syarat'] = $this->pegawai->getSurat();
        $data['surat'] = $this->db->get('surat')->result_array();

        $this->form_validation->set_rules('surat', 'surat', 'required');
        $this->form_validation->set_rules('syarat', 'syarat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/syarat', $data);
            $this->load->view('templates/footer');
        } else {
            $array = [

                'id_surat' => $this->input->post('surat', true),
                'syarat' => $this->input->post('syarat', true),

            ];
            $this->db->insert('persyaratan', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Persyaratan telah ditambahkan </div>'
            );
            redirect('pegawai/syarat');
        }
    }
}
