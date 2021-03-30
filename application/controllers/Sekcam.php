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
        // $this->db->where('is_active =', 0);
        $data['status'] = [
            1 => 'Pending',
            2 => 'Tolak',
            3 => 'Diterima dan Dilanjutkan',
        ];
        $status = $this->input->post('status');
        $this->load->model('Msekcam', 'sekcam');

        $data['surat_keluar'] = $this->sekcam->getSurat();
        $data['surat'] = $this->db->get('surat')->result_array();


        // $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        // $this->form_validation->set_rules('jenis', 'Jenis Surat', 'required');
        // $this->form_validation->set_rules('nm_surat_keluar', 'Nama Surat', 'required');
        // $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('sekcam/index', $data);
            $this->load->view('templates/footer');
        } else {
            $no_surat =  $this->input->post("no_surat", TRUE);
            $jenis =  $this->input->post("jenis", TRUE);
            $nm_surat_keluar =  $this->input->post("nm_surat_keluar", TRUE);
            $tgl =  $this->input->post("tgl", TRUE);
            $keterangan =  $this->input->post("keterangan", TRUE);
            // $file_surat =  $this->input->post("file_surat", TRUE);

            $config['upload_path']          = './upload/surat_masuk';
            $config['allowed_types']        = 'pdf|doc|docx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $save = [
                    'id' => '',
                    'no_surat' => $no_surat,
                    'jenis' => $jenis,
                    'nm_surat_keluar' => $nm_surat_keluar,
                    'tgl' => date('Y-m-d', strtotime($tgl)),
                    'keterangan' => $keterangan,
                    'file' => $file_surat
                ];

                $this->db->insert('surat_keluar', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("pegawai/surat_masuk"));
            }
        }
    }
}
