<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpegawai', 'pegawai');
        $this->load->library('form_validation', 'Pdf');
        $this->load->library('Pdf');

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

        $data['kode'] = [
            'SKM' => 'SURAT KETERANGAN MISKIN',
            'SKTM' => 'SURAT KETERANGAN TIDAK MAMPU',
            'SKBPR' => 'SURAT KETERANGAN BELUM PUNYA RUMAH',
            'SKU' => 'SURAT KETERANGAN USAHA',
            'SKDP' => 'SURAT KETERANGAN DOMISILI PERUSAHAAN',
            'SKN' => 'SURAT KETERANGAN NIKAH',
            'SKD' => 'SURAT KETERANGAN DOMISILI',
            'SKP' => 'SURAT KETERANGAN PENGHASILAN',
            'SKOS' => 'SURAT KETERANGAN ORANG YANG SAMA',
            'SPC' => 'SURAT PENGANTAR CERAI',
            'SPSKCK' => 'SURAT PENGANTAR SKCK',
            'SPIK' => 'SURAT PENGANTAR IZIN KERAMAIAN'
        ];


        $this->load->model('Mpegawai', 'pegawai');
        $data['surat'] = $this->db->get('surat')->result_array();
        // $data['antri'] = $this->db->get('pengajuan_surat')->result_array();
        $data['antri'] = $this->pegawai->getSurat();

        //  KASIH PELAYANAN UMUM
        $data['skm'] = $this->pegawai->skm();
        $data['countskm'] = $this->pegawai->Countskm();

        $data['sktm'] = $this->pegawai->sktm();
        $data['countsktm'] = $this->pegawai->Countsktm();

        $data['skbpr'] = $this->pegawai->skbpr();
        $data['countskbpr'] = $this->pegawai->Countskbpr();

        $data['skp'] = $this->pegawai->skp();
        $data['countskp'] = $this->pegawai->Countskp();

        $data['spik'] = $this->pegawai->spik();
        $data['countspik'] = $this->pegawai->Countspik();

        $data['spskck'] = $this->pegawai->spskck();
        $data['countspskck'] = $this->pegawai->Countspskck();

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Pembuatan Surat';
        $this->load->model('Mpegawai', 'pegawai');
        $data['ps'] = $this->pegawai->getSurat();
        $data['status'] = [
            1 => 'Surat Belum dibuat',
            2 => 'Ditolak',
            3 => 'Pending',
            4 => 'Dilanjutkan',
            5 => 'Telah Diparaf',
        ];
        $data['surat'] = [
            'SKM' => 'SURAT KETERANGAN MISKIN',
            'SKM' => 'SURAT KETERANGAN TIDAK MAMPU',
            'SKBPR' => 'SURAT KETERANGAN BELUM PUNYA RUMAH',
            'SKU' => 'SURAT KETERANGAN USAHA',
            'SKDP' => 'SURAT KETERANGAN DOMISILI PERUSAHAAN',
            'SKN' => 'SURAT KETERANGAN NIKAH',
            'SKD' => 'SURAT KETERANGAN DOMISILI',
            'SKP' => 'SURAT KETERANGAN PENGHASILAN',
            'SKOS' => 'SURAT KETERANGAN ORANG YANG SAMA',
            'SPC' => 'SURAT PENGANTAR CERAI',
            'SPSKCK' => 'SURAT PENGANTAR SKCK',
            'SPIK' => 'SURAT PENGANTAR IZIN KERAMAIAN'
        ];

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/index', $data);
            $this->load->view('templates/footer');
        } else {
            $no_surat =  $this->input->post("no_surat", TRUE);
            $tgl =  $this->input->post("tgl", TRUE);
            $keterangan =  $this->input->post("keterangan", TRUE);
            // $file_surat =  $this->input->post("file_surat", TRUE);


            $save = [
                'id' => '',
                'no_surat' => $no_surat,
                'tgl' => date('d-m-Y', strtotime($tgl)),
                'keterangan' => $keterangan,
                'status' => 1
            ];

            $this->db->update('pembuatan_surat', $save);
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
            redirect(base_url("pegawai/index"));
        }
    }

    public function buatSurat($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Kategori';
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('no_pengantar', 'Nomor Pengantar', 'required');
        $this->form_validation->set_rules('tgl_pengantar', 'Tanggal Pengantar', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $data['buat_surat'] = $this->db->get_where('pembuatan_surat', ['id' => $id])->row_array();

        $buat = $this->db->get_where('pembuatan_surat', ['id' => $id])->row_array();
        $id_pengaju = $buat['pengaju_id'];

        $no_surat =  $this->input->post("no_surat", TRUE);
        $no_pengantar =  $this->input->post("no_pengantar", TRUE);
        $tgl_pengantar =  $this->input->post("tgl_pengantar", TRUE);
        $keterangan =  $this->input->post("keterangan", TRUE);
        $data = [
            'no_pengantar' => $no_pengantar,
            'tgl_pengantar' => $tgl_pengantar,
            'status' => 2
        ];
        $this->db->where('id_pengaju', $id_pengaju);
        $this->db->update('pengajuan_surat', $data);

        $array = [
            'no_surat' => $no_surat,
            'keterangan' => $keterangan,
            'status_surat' => 3
        ];
        $this->db->set('no_surat', $no_surat);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id', $id);
        $this->db->update('pembuatan_surat', $array);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Surat ' . $id . ' Telah Dibuat </div>'
        );
        redirect('pegawai/index');
    }

    public function cetak_skm($id)
    {
        $data['title'] = 'E-Kecamatan';
        $data['kode'] = [
            'SKM' => 'SURAT KETERANGAN MISKIN',
            'SKM' => 'SURAT KETERANGAN TIDAK MAMPU',
            'SKBPR' => 'SURAT KETERANGAN BELUM PUNYA RUMAH',
            'SKU' => 'SURAT KETERANGAN USAHA',
            'SKDP' => 'SURAT KETERANGAN DOMISILI PERUSAHAAN',
            'SKN' => 'SURAT KETERANGAN NIKAH',
            'SKD' => 'SURAT KETERANGAN DOMISILI',
            'SKP' => 'SURAT KETERANGAN PENGHASILAN',
            'SKOS' => 'SURAT KETERANGAN ORANG YANG SAMA',
            'SPC' => 'SURAT PENGANTAR CERAI',
            'SPSKCK' => 'SURAT PENGANTAR SKCK',
            'SPIK' => 'SURAT PENGANTAR IZIN KERAMAIAN'
        ];

        $data['surat'] = $this->pegawai->getSuratSKM($id);
        // $data['surat'] = $this->db->get_where('pembuatan_surat', ['id' => $id])->row_array();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $this->load->view('cetak/cetak_skm', $data);
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

        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
        ];
        $status = $this->input->post('status');

        if ($status == 3) {
            $pSurat = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
            $pndk = $this->db->get_where('penduduk', ['nik' => $pSurat['nik']])->row_array();
            $surat = $this->db->get_where('surat', ['id_surat' => $pSurat['id_surat']])->row_array();
            $dateNow = date('Y-m-d');

            $save = [
                'nm_surat_keluar' => '[' . $pndk['nama'] . '-' . $pndk['nik'] . ']-Surat ' . $surat['nm_surat'],
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

    public function isi_surat($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Isi Surat';
        $this->load->model('Mpegawai', 'pegawai');
        $data['isi_surat'] = $this->pegawai->getDataAntrian($id);
        $data['surat_keluar'] = $this->db->get_where('surat_keluar', ['id' => $id]);
        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/isi_surat', $data);
            $this->load->view('templates/footer');
        } else {

            $no_surat =  $this->input->post("no_surat", TRUE);
            $file_surat =  $this->input->post("file_surat", TRUE);

            $config['upload_path']          = './upload/surat_keluar';
            $config['allowed_types']        = 'pdf|doc|docx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];
                $status = 2;
                $save = [
                    'no_surat' => $no_surat,
                    'tgl' => date('d-m-Y'),
                    'file' => $file_surat,
                    'status' => $status
                ];
                if ($status = 2) {
                    $surat = $this->db->get_where('surat_keluar', ['id' => $id])->row_array();
                    $aju = $surat['pengaju_id'];
                    $dateNow = date('d-m-Y');

                    $update = [
                        'tgl' => date('d-m-Y', strtotime($dateNow)),
                        'status' => 4
                    ];
                    $this->db->where('id', $aju);
                    $this->db->update('pengajuan_surat', $update);
                }

                $this->db->where('id', $id);
                $this->db->update('surat_keluar', $save);
                $this->session->set_flashdata('success', 'Berhasil Tambah file!');
                redirect(base_url("pegawai/surat_keluar"));
            }
        }
    }

    public function perbaikan($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'File Surat';
        $this->load->model('Mpegawai', 'pegawai');
        $data['isi_surat'] = $this->pegawai->getDataAntrian($id);
        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        $data['surat_keluar'] = $this->db->get_where('surat_keluar', ['id' => $id]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/perbaikan', $data);
            $this->load->view('templates/footer');
        } else {
            $no_surat =  $this->input->post("no_surat", TRUE);
            $file_surat =  $this->input->post("file_surat", TRUE);
            $config['upload_path']          = './upload/surat_keluar';
            $config['allowed_types']        = 'pdf|doc|docx';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file_surat')) {
                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];
                $save = [
                    'no_surat' => $no_surat,
                    'file' => $file_surat,
                    'status' => 2
                ];
                $this->db->where('id', $id);
                $this->db->update('surat_keluar', $save);
                $this->session->set_flashdata('success', 'Berhasil Diperbaiki!');
                redirect(base_url("pegawai/surat_keluar"));
            }
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

    public function edit_berita($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Berita';
        $this->load->model('Mpegawai', 'pegawai');
        $data['kategori_berita'] = $this->db->get('kategori_berita')->result_array();
        $data['berita'] = $this->pegawai->getEditBerita($id);

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pegawai/edit_berita', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul', true);
            $author = $user['username'];
            $judulSlug = trim(strtolower($this->input->post('judul')));
            $body =  $this->input->post("body", TRUE);
            $out = explode(" ", $judulSlug);
            $slug = implode("-", $out);
            $pecah = explode(".", $body);

            $excerpt = $pecah[0];


            $config['upload_path']          = './upload/berita';
            $config['allowed_types']        = 'jpg|jpeg|png|JPG';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];

                $save = [
                    'id_berita' => '',
                    'author' => $author,
                    'judul' => $judul,
                    'slug' => $slug,
                    'excerpt' => $excerpt,
                    'body' => $body,
                    'foto' => $foto,
                    'created_at' => date('d-m-Y')
                ];

                $this->db->update('berita', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("pegawai/berita"));
            }
        }
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile';
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('camat', 'camat', 'required');
        $this->form_validation->set_rules('sekcam', 'sekcam', 'required');
        $this->form_validation->set_rules('detail', 'detail', 'required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('no', 'no', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $foto_camat =  $this->input->post("foto_camat", TRUE);
            $foto_sekcam =  $this->input->post("foto_sekcam", TRUE);
            $camat =  $this->input->post("camat", TRUE);
            $sekcam =  $this->input->post("sekcam", TRUE);
            $kecamatan =  $this->input->post("kecamatan", TRUE);
            $detail =  $this->input->post("detail", TRUE);
            $lokasi =  $this->input->post("lokasi", TRUE);
            $email =  $this->input->post("email", TRUE);
            $no =  $this->input->post("no", TRUE);

            $config['upload_path']          = './assets/img/testimonials';
            $config['allowed_types']        = 'jpg|jpeg|png|JPG|PNG';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_camat,foto_sekcam')) {

                $data = array('upload_data' => $this->upload->data());
                $kecamatan = $this->input->post('kecamatan', true);
                $camat = $this->input->post('camat', true);
                $sekcam = $this->input->post('sekcam', true);
                $foto_camat = $data['upload_data']['foto_camat'];
                $foto_sekcam = $data['upload_data']['foto2'];
                $detail = $this->input->post('detail', true);
                $lokasi = $this->input->post('lokasi', true);
                $email = $this->input->post('email', true);
                $no = $this->input->post('no', true);

                $save = [
                    'kecamatan' => $kecamatan,
                    'detail' => $detail,
                    'camat' => $camat,
                    'sekcam' => $sekcam,
                    'f_camat' => $foto_camat,
                    'f_sekcam' => $foto_sekcam,
                    'lokasi' => $lokasi,
                    'email' => $email,
                    'no' => $no,
                ];

                // var_dump($save);
                // die;
                $this->db->where('id', 1);
                $this->db->update('profile', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("pegawai/profile"));
            }
        }
    }
}
