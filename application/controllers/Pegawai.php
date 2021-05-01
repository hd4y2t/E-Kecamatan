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
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Surat';
        $this->load->model('Mpegawai', 'pegawai');
        $data['surat'] = $this->pegawai->joinDataSurat();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['bidang'] = $this->db->get('bidang')->result_array();

        $this->form_validation->set_rules('surat', 'surat', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('bidang', 'bidang', 'required');
        $this->form_validation->set_rules('syarat', 'syarat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/index', $data);
            $this->load->view('templates/footer');
        } else {
            $array = [

                'id_kategori' => $this->input->post('kategori', true),
                'id_bidang' => $this->input->post('bidang', true),
                'nm_surat' => $this->input->post('surat', true),
                'syarat' => $this->input->post('syarat', true),

            ];
            $this->db->insert('surat', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Surat Baru ditambahkan </div>'
            );
            redirect('pegawai');
        }
    }

    public function edit_surat($id_surat)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Surat';
        $this->form_validation->set_rules('nm_surat', 'Nama surat', 'required');
        $data['edit_surat'] = $this->db->get_where('surat', ['id_surat' => $id_surat])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['bidang'] = $this->db->get('bidang')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/edit_surat', $data);
            $this->load->view('templates/footer');
        } else {
            $nm_surat =  $this->input->post("nm_surat", TRUE);
            $id_kategori =  $this->input->post("kategori", TRUE);
            $id_bidang =  $this->input->post("bidang", TRUE);
            $syarat =  $this->input->post("syarat", TRUE);
            $array = [
                'id_kategori' => $id_kategori,
                'id_bidang' => $id_bidang,
                'nm_surat' => $nm_surat,
                'syarat' => $syarat
            ];
            $this->db->set('nm_surat', $nm_surat);
            $this->db->where('id_surat', $id_surat);
            $this->db->update('surat', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> surat berhasil di edit </div>'
            );
            redirect('pegawai');
        }
    }


    public function kategori()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Kategori Surat';

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('kategori', 'kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $array = [
                'id_kategori' => "",
                'nm_kategori' => $this->input->post('kategori', true)

            ];
            $this->db->insert('surat', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> kategori Baru ditambahkan </div>'
            );
            redirect('pegawai/kategori');
        }
    }

    public function editkategori($id_kategori)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Kategori';
        $this->form_validation->set_rules('nm_kategori', 'Nama Kategori', 'required');
        $data['edit_kategori'] = $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/editkategori', $data);
            $this->load->view('templates/footer');
        } else {
            $nm_kategori =  $this->input->post("nm_kategori", TRUE);
            $array = [
                'nm_kategori' => $nm_kategori
            ];
            $this->db->set('nm_kategori', $nm_kategori);
            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> kategori berhasil di edit </div>'
            );
            redirect('pegawai/kategori');
        }
    }
    // public function hapusKategori($id)
    // {
    //     $this->Madmin->delete_role($id);
    //     $this->session->set_flashdata('flash', 'Dihapus');
    //     redirect('admin/role');
    // }

    public function bidang()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Bidang Surat';

        $data['bidang'] = $this->db->get('bidang')->result_array();

        $this->form_validation->set_rules('bidang', 'bidang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/bidang', $data);
            $this->load->view('templates/footer');
        } else {
            $array = [
                'id' => "",
                'nm_bidang' => $this->input->post('bidang', true)

            ];
            $this->db->insert('bidang', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> bidang Baru ditambahkan </div>'
            );
            redirect('pegawai/bidang');
        }
    }

    public function editbidang($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit bidang';
        $this->form_validation->set_rules('nm_bidang', 'Nama bidang', 'required');
        // $data['edit_bidang'] = $this->db->get_where('bidang', ['id' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/bidang', $data);
            $this->load->view('templates/footer');
        } else {
            $nm_bidang =  $this->input->post("nm_bidang", TRUE);
            $array = [
                'nm_bidang' => $nm_bidang
            ];
            $this->db->set('nm_bidang', $nm_bidang);
            $this->db->where('id', $id);
            $this->db->update('bidang', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> bidang berhasil di edit </div>'
            );
            redirect('pegawai/bidang');
        }
    }

    public function antrian()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Antrian Surat';

        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Sudah Diketik dan Diparaf',
            5 => 'Ditandatangani Camat/<b>Selesai</b>',
        ];


        $this->db->select('*');
        $this->db->from('pengajuan_surat');
        $this->db->join('penduduk', 'penduduk.nik=pengajuan_surat.nik');
        $this->db->join('surat', 'surat.id_surat=pengajuan_surat.id_surat');
        $this->db->where('status <=', 3);
        $this->db->order_by("tgl", "desc");
        $query = $this->db->get();
        $data['pengajuan'] = $query->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/antrian', $data);
        $this->load->view('templates/footer');
    }

    public function updateStatus($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Antrian Surat';
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
                'nm_surat_keluar' => '[' . $pndk['nama'] . '-' . $pndk['nik'] . ']-Surat ' . $surat['nm_surat'],
                // 'surat_id' => $pSurat['id_surat'],
                'tgl' => date('Y-m-d', strtotime($dateNow)),
                'keterangan' => 'ID: ' . $pSurat['id'],
                'status' => 1
            ];

            $this->db->insert('surat_keluar', $save);
        }
        $this->db->set('status', $status);

        $this->db->where(['id' => $id]);
        $this->db->update('pengajuan_surat');


        $this->session->set_flashdata('success', 'Status Pengajuan ID: ' . $id . ' Telah Diupdate!');

        redirect(base_url('pegawai/antrian'));
    }


    public function surat_masuk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Masuk';
        $data['surat_masuk'] = $this->db->get('surat_masuk')->result_array();

        $data['status'] = [
            1 => 'Pending',
            2 => 'Diketahui Sekcam',
            3 => 'Diketahui Sekcam dan Camat ',
        ];
        $status = $this->input->post('status');
        // $data['pengajuan'] = $this->db->get('pengajuan_surat')->result_array();
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('nm_surat_masuk', 'Nama Surat', 'required');
        // $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/surat_masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $no_surat =  $this->input->post("no_surat", TRUE);
            $jenis =  $this->input->post("jenis", TRUE);
            $nm_surat_masuk =  $this->input->post("nm_surat_masuk", TRUE);
            // $tgl =  $this->input->post("tgl", TRUE);
            $keterangan =  $this->input->post("keterangan", TRUE);
            $file_surat =  $this->input->post("file_surat", TRUE);

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
                    'nm_surat_masuk' => $nm_surat_masuk,
                    'tgl' => date('d-m-Y'),
                    'keterangan' => $keterangan,
                    'file' => $file_surat,
                    'status' => 1
                ];

                $this->db->insert('surat_masuk', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("pegawai/surat_masuk"));
            }
        }
    }

    public function surat_keluar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Surat Keluar';
        // $data['surat_keluar'] = $this->db->get('surat_keluar')->result_array();
        $this->load->model('Mpegawai', 'pegawai');
        $data['surat_keluar'] = $this->pegawai->getSurat();
        $data['surat'] = $this->db->get('surat')->result_array();
        $data['status'] = [
            1 => 'Pending',
            2 => 'Ditolak',
            3 => 'Diterima dan Dilanjutkan',
        ];
        $data['jenis'] = [
            1 => 'Rahasia',
            2 => 'Penting',
            3 => 'Biasa',
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
            $this->load->view('pegawai/surat_keluar', $data);
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
                    'tgl' => date('d-m-Y', strtotime($tgl)),
                    'keterangan' => $keterangan,
                    'file' => $file_surat,
                    'status' => 1
                ];

                $this->db->insert('surat_keluar', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("pegawai/surat_keluar"));
            }
        }
    }

    public function hapusSuratKeluar($id)
    {

        $data = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();
        // unlink("./uploads/surat_keluar/" . $data['file_surat_keluar']);
        $this->db->where(['id' => $id]);
        $this->db->delete('surat_keluar');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('pegawai/surat_keluar'));
    }


    public function isi_surat($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Isi Surat';
        $this->load->model('Mpegawai', 'pegawai');
        $data['isi_surat'] = $this->pegawai->getDataAntrian($id);
        // $data['jenis'] = [
        //     1 => 'Rahasia',
        //     2 => 'Penting',
        //     3 => 'Biasa',
        // ];

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis ', 'required');
        $this->form_validation->set_rules('isi_surat', 'isi_surat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/isi_surat', $data);
            $this->load->view('templates/footer');
        } else {

            $no_surat =  $this->input->post("no_surat", TRUE);
            $tujuan =  $this->input->post("tujuan", TRUE);
            $jenis =  $this->input->post("jenis", TRUE);
            $isi_surat =  $this->input->post("isi_surat", TRUE);
            // $status = 1;
            $save = [
                'no_surat' => $no_surat,
                'tujuan' => $tujuan,
                'jenis' => $jenis,
                'isi_surat' => $isi_surat,
                // 'status' => 1
            ];
            // if ($status == 1) {
            //     // $pSurat = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
            //     $dateNow = date('Y-m-d');

            //     $update = [
            //         'tgl' => date('Y-m-d', strtotime($dateNow)),
            //         'status' => 4
            //     ];
            //     $this->db->where('id', $id);
            //     $this->db->update('pengajuan_surat', $update);
            // }

            // $this->db->where('id', $id);
            // $this->db->update('surat_keluar', $save);
            // $this->db->where('id', $id);
            // $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
            // redirect(base_url("pegawai/surat_keluar"));
            var_dump($save);
            die;
        }
    }


    public function penduduk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Penduduk';
        $this->load->model('Mpegawai', 'pegawai');
        $data['warga'] = $this->pegawai->getKelurahan();
        $data['surat'] = $this->db->get('surat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/penduduk', $data);
        $this->load->view('templates/footer');
    }
}
