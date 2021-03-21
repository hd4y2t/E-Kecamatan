<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model', 'galery');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $data = $this->dashboard->user();
        // $data['profile'] = $this->galery->profil();
        $data['title'] = 'E-Kecamatan';
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['surat'] = $this->db->get('surat')->num_rows();
        $data['user'] = $this->db->get('user')->num_rows();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/footer');
    }
    public function s_online()
    {
        // $data = $this->dashboard->user();
        // $data['profile'] = $this->galery->profil();
        $data['title'] = 'E-Kecamatan';
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['surat'] = $this->db->get('surat')->num_rows();
        $data['user'] = $this->db->get('user')->num_rows();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/s_online', $data);
        $this->load->view('home/footer');
    }
    // public function detail()
    // {
    //     // $data = $this->dashboard->user();
    //     $data['title'] = 'E-Kecamatan';

    //     // $data['sm'] = $this->db->get('surat_masuk')->row_array();
    //     // var_dump($data);
    //     $this->load->view('frontend/header', $data);
    //     $this->load->view('frontend/detail', $data);
    //     $this->load->view('frontend/footer');
    // }
}
