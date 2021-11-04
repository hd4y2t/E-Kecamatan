<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Madmin');
        $this->load->model('Mloket');
        // $this->load->model('Mcamat');
        // $this->load->library('form_validation');
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
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Surat Sedang Dibuat',
            5 => 'Surat Telah Selesai!'

        ];
        $status = $this->input->post('status');
        $this->load->model('Mcamat', 'camat');

        $data['surat_keluar'] = $this->camat->getSurat();
        $data['surat'] = $this->db->get('surat')->result_array();
        $data['antri'] = $this->db->get('pengajuan_surat')->result_array();
        $this->load->model('Mloket', 'loket');
        $data['pengajuan'] = $this->loket->getAntri();
        $data['antri'] = $this->loket->getAntrian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('loket/index', $data);
        $this->load->view('templates/footer');
    }

    public function updateStatus($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        // $data['surat'] = $this->db->get('surat', => )->result_array();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
        ];
        $status = $this->input->post('status');
        // $data['pengajuan'] = $this->db->get('pengajuan_surat')->result_array();

        if ($status == 3) {
            $pSurat = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
            $pndk = $this->db->get_where('penduduk', ['nik' => $pSurat['nik']])->row_array();
            $surat = $this->db->get_where('surat', ['id_surat' => $pSurat['id_surat']])->row_array();
            $dateNow = date('Y-m-d');

            $save = [
                'nm_surat_keluar' => '[' . $pndk['nama'] . '-' . $pndk['nik'] . ']',
                'surat_id' => $pSurat['id_surat'],
                'tgl' => date('d-m-Y', strtotime($dateNow)),
                'keterangan' => 'Surat ' . $surat['nm_surat'],
                'pengaju_id' => $pSurat['id'],
                'status' => 1
            ];

            $this->db->insert('surat_keluar', $save);
        }
        $this->db->set('status', $status);
        $this->db->where(['id' => $id]);
        $this->db->update('pengajuan_surat');
        $this->session->set_flashdata('success', 'Status Pengajuan ID: ' . $id . ' Telah Diupdate!');
        redirect(base_url('loket/index'));
    }

    public function surat_masuk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Masuk';
        $this->load->model('Mloket', 'loket');
        $data['surat_masuk'] = $this->loket->getSuratMasuk();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Diketahui Sekcam',
            3 => 'Diketahui Sekcam dan camat'
        ];
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('nm_surat_masuk', 'Nama Surat', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('loket/surat_masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $no_surat =  $this->input->post("no_surat", TRUE);
            $jenis =  $this->input->post("jenis", TRUE);
            $nm_surat_masuk =  $this->input->post("nm_surat_masuk", TRUE);
            // $tgl =  $this->input->post("tgl", TRUE);
            $keterangan =  $this->input->post("keterangan", TRUE);
            $file_surat =  $this->input->post("file_surat", TRUE);

            $config['upload_path'] = './upload/surat_masuk';
            $config['allowed_types'] = 'pdf|doc|docx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $save = [
                    'id' => '',
                    'no_surat' => $no_surat,
                    'jenis' => $jenis,
                    'nm_surat_masuk' => $nm_surat_masuk,
                    'tgl' => date('d-m-Y'),
                    'keterangan' => $keterangan,
                    'file' => $file_surat,
                    'status' => 1
                ];

                $this->db->insert('surat_masuk', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("loket/surat_masuk"));
            }
        }
    }
    public function edit_surat_masuk($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Masuk';
        $data['masuk'] = $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
        ];

        $this->form_validation->set_rules('noSurat', 'noSurat', 'trim|required');
        $noSurat = $this->input->post('noSurat');
        $jenis = $this->input->post('jenis');
        $namaSurat = $this->input->post('namaSurat');
        $keterangan = $this->input->post('keterangan');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('loket/edit_surat_masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('noSurat', $noSurat);
            $this->db->set('jenis', $jenis);
            $this->db->set('namaSurat', $namaSurat);
            $this->db->set('keterangan', $keterangan);
            if ($_FILES['file']['size'] >= 5242880) {
                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> File Lebih 2MB!</div>');
                redirect(base_url("home/s_online"));
            }

            $config['upload_path'] = './upload/surat_masuk';
            $config['allowed_types'] = 'pdf|doc|docx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $array = [
                    'no_surat' => $noSurat,
                    'jenis' => $jenis,
                    'nama_surat_masuk' => $namaSurat,
                    'keterangan' => $keterangan,
                    'file' => $file_surat
                ];
                $this->db->where(['id' => $id]);
                $this->db->update('surat_masuk', $array);


                $this->session->set_flashdata('success', 'Status Pengajuan ID: ' . $noSurat . ' Telah Diupdate!');

                redirect(base_url('loket/surat_masuk'));
            }
        }
    }
    public function surat_keluar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Keluar';
        $this->load->model('Mloket', 'loket');
        $data['surat_keluar'] = $this->loket->getSurat();
        $data['surat'] = $this->db->get('surat')->result_array();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Ditolak',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Telah Diparaf',
        ];

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('nm_surat_keluar', 'Nama Surat', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('loket/surat_keluar', $data);
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
                    'file' => $file_surat,
                    'status' => 1
                ];

                $this->db->insert('surat_keluar', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("pegawai/surat_masuk"));
            }
        }
    }

    public function download($id)
    {
        $data = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();
        force_download('upload/surat_keluar/' . $data['file'], NULL);
    }
}
