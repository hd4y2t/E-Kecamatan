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
    public function surat_masuk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Masuk';
        $data['status'] = [
            1 => 'Pending',
            2 => 'Diketahui Sekcam',
            // 3 => 'Diketahui Sekcam dan Camat',
        ];
        $data['surat_masuk'] = $this->db->get_where('surat_masuk', ['status =' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('sekcam/surat_masuk', $data);
        $this->load->view('templates/footer');
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
