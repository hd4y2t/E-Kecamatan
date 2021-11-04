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
        $this->load->helper(array('url', 'download'));
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
    public function ketahuisurat($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Masuk';
        // $this->db->get('surat_masuk')->result_array();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Diketahui Sekcam',
            3 => 'Diketahui Camat & Sekcam',
        ];
        $status = 3;
        $this->db->set('status', $status);
        $this->db->where(['id' => $id]);
        $this->db->update('surat_masuk');
        $this->session->set_flashdata('message', 'Status Surat Telah Diketahui!');
        // var_dump($status);
        // die();
        redirect(base_url('camat/surat_masuk'));
    }

    public function surat_keluar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Keluar';

        $this->load->model('Mcamat', 'camat');
        $data['surat_keluar'] = $this->camat->getSurat();
        $data['surat'] = $this->db->get('surat')->result_array();

        $data['status'] = [
            1 => 'Belum ada file',
            2 => 'Pending',
            3 => 'Ditolak',
            4 => 'Belum Diparaf',
            5 => 'Telah Diparaf'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('camat/surat_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function ttd($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Keluar';
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $data['surat_keluar'] = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('camat/ttd', $data);
        $this->load->view('templates/footer');

        $file_surat =  $this->input->post("file_surat", TRUE);
        $config['upload_path']          = './upload/surat_keluar';
        $config['allowed_types']        = 'pdf|doc|docx';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file_surat')) {
            $data = array('upload_data' => $this->upload->data());
            $file_surat = $data['upload_data']['file_name'];
            $save = [
                'file' => $file_surat,
                'status' => 5
            ];
            $this->db->where('id', $id);
            $this->db->update('surat_keluar', $save);
            $this->session->set_flashdata('success', 'Berhasil Diperbaiki!');
            redirect(base_url("camat/surat_keluar"));
        }
    }
    public function download($id)
    {
        $data = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();
        force_download('upload/surat_keluar/' . $data['file'], NULL);
    }
    public function paraf()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Paraf';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('camat/paraf', $data);
        $this->load->view('templates/footer');
    }
}
