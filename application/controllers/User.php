<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['ni' => $this->session->userdata('ni')])->row_array();
        $data['title'] = 'Pengajuan Surat';
        $data['surat'] = $this->db->get('kategori')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    // public function edit()
    // {
    //     $data['user'] = $this->db->get_where('user', ['ni' => $this->session->userdata('ni')])->row_array();
    //     $data['title'] = 'User Edit Profile';
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/navbar', $data);
    //     $this->load->view('user/edit', $data);
    //     $this->load->view('templates/footer');
    // }
}
