<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan_umum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpegawai', 'pegawai');
        $this->load->model('Mcetak', 'cetak');
        $this->load->library('form_validation', 'Pdf');
        $this->load->library('Pdf');

        // is_logged_in();
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
            5 => 'Selesai',
        ];
        $data['surat'] = [
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

        // var_dump($ps[0]);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pelayanan_umum/index', $data);
        $this->load->view('templates/footer');
    }


    public function buatSurat($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('id_pengaju', 'Id Pengaju', 'required');
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('no_pengantar', 'Nomor Pengantar', 'required');
        $this->form_validation->set_rules('tgl_pengantar', 'Tanggal Pengantar', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $id_pengajuan =  $this->input->post("id_pengaju", TRUE);
        $no_surat =  $this->input->post("no_surat", TRUE);
        $no_pengantar =  $this->input->post("no_pengantar", TRUE);
        $tgl_pengantar =  $this->input->post("tgl_pengantar", TRUE);
        $keterangan =  $this->input->post("keterangan", TRUE);

        $data = [
            'no_pengantar' => $no_pengantar,
            'tgl_pengantar' => $tgl_pengantar,
            'status' => 4
        ];
        // var_dump($data);
        $this->db->where('id_pengaju', $id);
        $this->db->update('pengajuan_surat', $data);

        $array = [
            'no_surat' => $no_surat,
            'keterangan' => $keterangan,
            'status_surat' => 3
        ];
        // var_dump($array, $id_pengajuan);
        // die;
        $this->db->where('pengaju_id', $id);
        $this->db->update('pembuatan_surat', $array);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Surat ' . $no_surat . ' Telah Dibuat </div>'
        );

        redirect(base_url("pelayanan_umum/index"));
        // redirect('pelayanan_umum/index');
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

        $data['surat'] = $this->cetak->getSuratById($id);
        // $data['surat'] = $this->db->get_where('pembuatan_surat', ['id' => $id])->row_array();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $this->load->view('cetak/cetak_skm', $data);
    }

    public function penduduk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Penduduk';
        $this->load->model('Mpegawai', 'pegawai');
        $data['warga'] = $this->pegawai->getKelurahan();
        $data['surat'] = $this->db->get('surat')->result_array();
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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pelayanan_umum/penduduk', $data);
        $this->load->view('templates/footer');
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
            $this->load->view('pelayanan_umum/profile', $data);
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
                redirect(base_url("pelayanan_umum/profile"));
            }
        }
    }
}
