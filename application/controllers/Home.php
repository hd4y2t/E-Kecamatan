<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengajuan_track_model', 'pengajuan_track');
        $this->load->model('M_Penduduk', 'penduduk');
        $this->load->model('Mpegawai', 'pegawai');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['title'] = 'E-Kecamatan';
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['surat'] = $this->db->get('surat')->num_rows();
        $data['user'] = $this->db->get('user')->num_rows();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
        $data['n_kelurahan'] = $this->db->get('kelurahan')->num_rows();

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/footer');
    }
    public function layanan()
    {
        $data['title'] = 'E-Kecamatan';
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $data['suratIzin'] = $this->db->get_where('surat', ['id_kategori' => 1])->result_array();
        $data['suratNonIzin'] = $this->db->get_where('surat', ['id_kategori' => 2])->result_array();

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/layanan', $data);
        $this->load->view('home/footer');
    }
    public function alur()
    {
        $data['title'] = 'E-Kecamatan';
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/alur', $data);
        $this->load->view('home/footer');
    }
    public function struktur()
    {
        $data['title'] = 'E-Kecamatan';
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/struktur', $data);
        $this->load->view('home/footer');
    }

    public function s_online()
    {
        $data['title'] = 'E-Kecamatan';
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['surat'] = $this->db->get('surat')->result_array();
        $data['user'] = $this->db->get('user')->num_rows();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('surat', 'surat', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/header', $data);
            $this->load->view('home/navbar', $data);
            $this->load->view('home/s_online', $data);
            $this->load->view('home/footer');
        } else {
            $status = [
                1 => 1,  // Pending
                2 => 2,  // Diterima dan Dilanjutkan
                3 => 3,  // Sudah Diketik dan Diparaf
                4 => 4,  // Sudah Ditandatangani Camat dan Selesai
            ];

            $nama = $this->input->post('nama', TRUE);
            $nik = $this->input->post('nik', TRUE);
            $no_hp = $this->input->post('no_hp', TRUE);
            $surat = $this->input->post('surat', TRUE);
            $email = $this->input->post('email', TRUE);

            $ceknik = $this->penduduk->cek_penduduk($nik)->num_rows();

            if ($ceknik <= 0) {
                $save = [
                    'nik' => $nik,
                    'nama' => $nama,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'pengajuan' => 'pengajuan' + 1
                ];

                $this->db->insert('penduduk', $save);
                // $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-cross"></i> Maaf!</h5> NIK Anda tidak Terdaftar!</div>');
                // redirect(base_url("suratonline"));
            }

            //Output a v4 UUID
            $rid = uniqid($surat, TRUE);
            $rid2 = str_replace('.', '', $rid);
            $rid3 = substr(str_shuffle($rid2), 0, 3);

            $cc = $this->db->count_all('pengajuan_surat') + 1;
            $count = str_pad($cc, 3, STR_PAD_LEFT);
            $id = $surat . "-";
            $d = date('d');
            $y = date('y');
            $mnth = date("m");
            $s = date('s');
            $randomize = $d + $y + $mnth + $s;
            $id = $id . $rid3 . $randomize . $count . $y;

            // var_dump($id);
            // die;

            if ($_FILES['file']['size'] >= 5242880) {
                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> File Lebih 2MB!</div>');
                redirect(base_url("home/s_online"));
            }

            if ($_FILES['file']['name'] == null) {
                $file = '-';
            } else {
                $namafile = substr($_FILES['file']['name'], -7);
                $file = $surat . uniqid() . $namafile;
                $config['upload_path']          = './upload/berkas';
                $config['allowed_types']        = '*';
                $config['max_size']             = 5120; // 5MB
                $config['file_name']            = $file;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload("file")) {
                    $data = array('upload_data' => $this->upload->data());
                    $berkas = $data['upload_data']['file_name'];
                }
            }

            $data = [
                'id' => $id,
                // 'nama' => $nama,
                'nik' => $nik,
                // 'no_hp' => $no_hp,
                'id_surat' => $surat,
                'file' => $file,
                'tgl' => date('d-m-Y'),
                'status' => $status[1]
            ];

            // var_dump($data);
            // die;

            $this->pengajuan_track->insert_p_surat($data);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
            <i class="icon fas fa-check"></i> Selamat!
            </h5>
            Berhasil Mengajukan Surat! Berikut
            <b>ID</b>
            anda:
            <b>
         ' . $id . '
            </b>
            </div>');
            redirect(base_url("home/s_online"));
        }
    }
    public function tracking()
    {
        // $data = $this->dashboard->user();
        // $data['profile'] = $this->galery->profil();
        $data['title'] = 'E-Kecamatan';
        $data['penduduk'] = $this->db->get('penduduk')->num_rows();
        $data['antrian'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
        $data['surat'] = $this->db->get('surat')->result_array();
        $data['user'] = $this->db->get('user')->num_rows();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/tracking', $data);
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
    public function cariSurat()
    {

        $id = $this->input->post('trackid', TRUE);
        $row = $this->pengajuan_track->findById($id);

        $data = [
            'id' => $id,
            'row' => $row
        ];

        // var_dump($row);
        // die;

        if ($row === null) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-bank"></i> Maaf!</h5> ID yang anda masukkan Salah! <b>ID: </b><b>' . $id . '</b> <i>tidak ditemukan</i></div>');
            redirect(base_url("tracking"));
        } else {
            redirect(base_url("home/tracked/") . $id);
        }
    }

    public function tracked()
    {
        $id = $this->uri->segment(3);   
        $data['row'] = $this->pengajuan_track->showById($id);
        // $data['pengajuan_surat'] = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        // $this->load->model('M_penduduk', 'penduduk');
        // $data['detail'] = $this->penduduk->getSurat();
        $data['title'] = 'Tracking Surat';


        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);  $this->load->view('home/header', $data);

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/result', $data);
        $this->load->view('home/footer');
    }

    public function cetak()
    {
        $data['title'] = 'E-Kecamatan';
        $id = 2222;
        $query = "SELECT `surat_keluar`.*, `penduduk`.*
                   FROM `penduduk`
                   JOIN `surat_keluar` ON `penduduk`.`nik` = `surat_keluar`.`nm_surat_keluar`
                   WHERE `penduduk`.`nik` = $id
                   ";
        $data['surat_keluar'] = $this->db->query($query)->row_array();
        // $data['surat_keluar'] = $this->penduduk->getJoinPenduduk($id);
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $this->load->view('cetak/cetak_surat', $data);
    }
}
