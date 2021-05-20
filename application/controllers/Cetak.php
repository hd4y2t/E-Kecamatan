<?php
class Cetak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        // is_logged_in();
    }

    function index($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['title'] = 'Isi Surat';
        $data['surat_keluar'] = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();


        $this->load->view('cetak/cetak_surat', $data);
    }
}
