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

                $this->load->helper(array('form', 'url'));
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

            public function skm()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {
                    $kode = [
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
                    $this->load->model('M_Penduduk', 'penduduk');
                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $surat = $this->input->post('surat', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $surat = "SKM";

                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                // $this->upload->do_upload("ktp");
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    // var_dump($id);
                    // die;
                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);

                            // $this->upload->do_upload("pengantar");
                            $this->upload->initialize($config);
                            // $this->upload->do_upload("kk");
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                            // $data = array('upload_data' => $this->upload->data());
                            // $b_pengantar = $data['upload_data']['file_name'];

                        }
                    }
                    if (isset($_FILES['pernyataan'])) {


                        if ($_FILES['pernyataan']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> File yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {
                            if ($_FILES['pernyataan']['name'] == null) {
                                $pernyataan = '-';
                            } else {
                                $namafile = substr($_FILES['pernyataan']['name'], -7);
                                $pernyataan = "P-" . $nik . $namafile;
                                $config['upload_path']          = './upload/pernyataan'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $pernyataan;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                // $this->upload->do_upload("kk");
                                if ($this->upload->do_upload('pengantar')) {
                                    $f4 = $this->upload->data();
                                }
                            }
                        }
                    }
                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'f_pengantar' => $f3['file_name'],
                        'f_pernyataan' => $f4['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Keterangan Miskin</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function sktm()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {

                    $kode = [
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
                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $surat = $this->input->post('surat', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $surat = "SKTM";

                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    // var_dump($id);
                    // die;
                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['pernyataan'])) {


                        if ($_FILES['pernyataan']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> File yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {
                            if ($_FILES['pernyataan']['name'] == null) {
                                $pernyataan = '-';
                            } else {
                                $namafile = substr($_FILES['pernyataan']['name'], -7);
                                $pernyataan = "P-" . $nik . $namafile;
                                $config['upload_path']          = './upload/pernyataan'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $pernyataan;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('pengantar')) {
                                    $f4 = $this->upload->data();
                                }
                            }
                        }
                    }
                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'f_pengantar' => $f3['file_name'],
                        'f_pernyataan' => $f4['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Keterangan Tidak Mampu</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function skbpr()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {

                    $kode = [
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
                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $surat = $this->input->post('surat', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $surat = "SKBPR";
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }

                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'f_pengantar' => $f3['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Keterangan Belum Punya Rumah</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }

            public function sku()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
                $this->form_validation->set_rules('nm_usaha', 'Nama Usaha', 'required');
                $this->form_validation->set_rules('almt_usaha', 'Alamat Usaha', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {


                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $surat = $this->input->post('surat', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $nm_usaha = $this->input->post('nm_usaha', TRUE);
                    $almt_usaha = $this->input->post('almt_usaha', TRUE);
                    $surat = "SKU";
                    $kode = [
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
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['permohonan'])) {

                        if ($_FILES['permohonan']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat permohonan yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['permohonan']['name'], -7);
                            $permohonan = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/permohonan'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $permohonan;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('permohonan')) {
                                $f4 = $this->upload->data();
                            }
                        }
                    }

                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'nm_usaha' => $nm_usaha,
                        'almt_usaha' => $almt_usaha,
                        'f_pengantar' => $f3['file_name'],
                        'f_permohonan' => $f4['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Keterangan Usaha</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function skdp()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
                $this->form_validation->set_rules('nm_perusahaan', 'Nama Perusahaan', 'required');
                $this->form_validation->set_rules('almt_perusahaan', 'Alamat Perusahaan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {


                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $nm_perusahaan = $this->input->post('nm_perusahaan', TRUE);
                    $almt_perusahaan = $this->input->post('almt_perusahaan', TRUE);
                    $surat = "SKDP";
                    $kode = [
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
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Lurah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }

                    if (isset($_FILES['spt'])) {

                        if ($_FILES['spt']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Kepemilikan Tanah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['spt']['name'], -7);
                            $spt = "SPT-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pemilikan_tanah'; //lokasi folder
                            $config['allowed_types']        = 'pdf'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $spt;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('spt')) {
                                $f4  = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['srl'])) {

                        if ($_FILES['srl']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Rekomendasi Lembaga yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['srl']['name'], -7);
                            $srl = "SRL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/rekomendasi_lembaga'; //lokasi folder
                            $config['allowed_types']        = 'pdf'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $srl;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('srl')) {
                                $f5 = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['domisili'])) {

                        if ($_FILES['domisili']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat domisili yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['domisili']['name'], -7);
                            $domisili = "D-" . $nik . $namafile;
                            $config['upload_path']          = './upload/domisili'; //lokasi folder
                            $config['allowed_types']        = 'pdf'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $domisili;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('domisili')) {
                                $f6 = $this->upload->data();
                            }
                        }
                    }

                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'nm_perusahaan' => $nm_perusahaan,
                        'almt_perusahaan' => $almt_perusahaan,
                        'f_pengantar' => $f3['file_name'],
                        'spt' => $f4['file_name'],
                        'srl' => $f5['file_name'],
                        'sd' => $f6['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Keterangan Domisili Perusahaan</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function skn()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('mpria', 'mpria', 'required');
                $this->form_validation->set_rules('mwanita', 'mwanita', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {

                    $kode = [
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
                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $mpria = $this->input->post('mpria', TRUE);
                    $mwanita = $this->input->post('mwanita', TRUE);
                    $surat = "SKN";
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KTP Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KK Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Lurah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }

                    if (isset($_FILES['pnikah'])) {

                        if ($_FILES['pnikah']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Nikah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pnikah']['name'], -7);
                            $pnikah = "pnikah-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar_nikah'; //lokasi folder
                            $config['allowed_types']        = 'pdf'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pnikah;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pnikah')) {
                                $f4  = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['skbn'])) {

                        if ($_FILES['skbn']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Keterangan Belum Menikah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['skbn']['name'], -7);
                            $skbn = "skbn-" . $nik . $namafile;
                            $config['upload_path']          = './upload/keterangan_nikah'; //lokasi folder
                            $config['allowed_types']        = 'pdf'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $skbn;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('skbn')) {
                                $f5 = $this->upload->data();
                            }
                        }
                    }

                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'nm_mempelai_pria' => $mpria,
                        'nm_mempelai_wanita' => $mwanita,
                        'f_pengantar' => $f3['file_name'],
                        'spn' => $f4['file_name'],
                        'skbn' => $f5['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Rekomendasi Nikah</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function skd()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {

                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $surat = "SKD";
                    $kode = [
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
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KTP Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KK Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Lurah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }



                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'f_pengantar' => $f3['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Keterangan Domisili</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function skp()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
                $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {
                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $pekerjaan = $this->input->post('pekerjaan', TRUE);
                    $surat = "SKP";
                    $kode = [
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
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KTP Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KK Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'pekerjaan' => $pekerjaan,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Lurah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['pernyataan'])) {

                        if ($_FILES['pernyataan']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pernyataan  yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pernyataan']['name'], -7);
                            $pernyataan = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pernyataan'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pernyataan;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pernyataan')) {
                                $f4 = $this->upload->data();
                            }
                        }
                    }



                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'f_pengantar' => $f3['file_name'],
                        'f_pernyataan' => $f4['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Keterangan Penghasilan</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function skos()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
                $this->form_validation->set_rules('nm_pakai', 'nm_pakai', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {
                    $kode = [
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
                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $nm_pakai = $this->input->post('nm_pakai', TRUE);
                    $surat = "SKOS";
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KTP Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KK Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Lurah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['akte_kelahiran'])) {

                        if ($_FILES['akte_kelahiran']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat akte_kelahiran  yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['akte_kelahiran']['name'], -7);
                            $akte_kelahiran = "akte-" . $nik . $namafile;
                            $config['upload_path']          = './upload/akte_kelahiran'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $akte_kelahiran;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('akte_kelahiran')) {
                                $f = $this->upload->data();
                            }
                        }
                    } else {
                        $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Akte kelahiran tidak boleh kosong!!</div>');
                        redirect(base_url("home/s_online"));
                    }



                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'nm_yg_dipakai' => $nm_pakai,
                        'f_pengantar' => $f3['file_name'],
                        'akte_kelahiran' => $f['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Keterangan Orang Yang Sama</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function spc()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {

                    $kode = [
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
                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $surat = "SPC";
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KTP Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KK Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Lurah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['pernyataan'])) {

                        if ($_FILES['pernyataan']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pernyataan  yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pernyataan']['name'], -7);
                            $pernyataan = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pernyataan'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pernyataan;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pernyataan')) {
                                $f4 = $this->upload->data();
                            }
                        }
                    }



                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'f_pengantar' => $f3['file_name'],
                        'f_pernyataan' => $f4['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Pengantar Cerai</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function spskck()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {

                    $kode = [
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
                    $nama = $this->input->post('nama', TRUE);
                    $nik = $this->input->post('nik', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $surat = "SPSKCK";
                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {
                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KTP Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KK Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {

                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Lurah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }
                    if (isset($_FILES['pernyataan'])) {

                        if ($_FILES['pernyataan']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pernyataan  yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pernyataan']['name'], -7);
                            $pernyataan = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pernyataan'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pernyataan;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pernyataan')) {
                                $f4 = $this->upload->data();
                            }
                        }
                    }



                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'f_pengantar' => $f3['file_name'],
                        'f_pernyataan' => $f4['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Pengantar SKCK</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function spik()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
                $this->form_validation->set_rules('rt', 'rt', 'required');
                $this->form_validation->set_rules('rw', 'rw', 'required');
                $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
                $this->form_validation->set_rules('almt_keramaian', 'almt_keramaian', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/s_online', $data);
                    $this->load->view('home/footer');
                } else {

                    $kode = [
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
                    $nik = $this->input->post('nik', TRUE);
                    $nama = $this->input->post('nama', TRUE);
                    $no_hp = $this->input->post('no_hp', TRUE);
                    $email = $this->input->post('email', TRUE);
                    $alamat = $this->input->post('alamat', TRUE);
                    $kelurahan = $this->input->post('kelurahan', TRUE);
                    $rt = $this->input->post('rt', TRUE);
                    $rw = $this->input->post('rw', TRUE);
                    $keperluan = $this->input->post('keperluan', TRUE);
                    $almt_keramaian = $this->input->post('almt_keramaian', TRUE);
                    $surat = "SPIK";

                    $status = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];
                    if ($this->penduduk->cek_penduduk($nik)->num_rows() > 0) {
                        if ($this->penduduk->cek_pengajuan($nik)->num_rows() > 0) {
                            $aju = $this->penduduk->cek_pengajuan($nik)->row_array();
                            $this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-block"></i> Maaf!
                                        </h5>
                                        Maaf Anda telah mengajukan pembuatan ' . $kode[$aju['id_surat']] . '</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $aju['id_pengaju'] . '
                                            </b>
                                            <br> Dengan Status ' . $status[$aju['status']] . '
                                            </div>');

                            redirect(base_url("home/s_online"));
                        } else {
                            $this->penduduk->pengajuan($nik);
                        }
                    } else {

                        if (isset($_FILES['ktp'])) {
                            if ($_FILES['ktp']['size'] >= 2097152) { //5MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KTP yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['ktp']['name'], -7);
                                $ktp = "KTP-" . $nik . $namafile;
                                $config['upload_path']          = './upload/ktp'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $ktp;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('ktp')) {
                                    $f1 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KTP Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }
                        if (isset($_FILES['kk'])) {

                            if ($_FILES['kk']['size'] >= 2097152) { //2MB
                                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> KK yang diupload Lebih 2MB!</div>');
                                redirect(base_url("home/s_online"));
                            } else {
                                $namafile = substr($_FILES['kk']['name'], -7);
                                $kk = "KK-" . $nik . $namafile;
                                $config['upload_path']          = './upload/kk'; //lokasi folder
                                $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                                $config['overwrite']            = true; // tindih file dengan file baru
                                $config['max_size']             = 2048; // 2MB
                                $config['file_name']            = $kk;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if ($this->upload->do_upload('kk')) {
                                    $f2 = $this->upload->data();
                                }
                            }
                        } else {
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Scan KK Wajib diupload</div>');
                            redirect(base_url("home/s_online"));
                        }

                        $save = [
                            'nik' => $nik,
                            'nama' => $nama,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'kelurahan' => $kelurahan,
                            'rt' => $rt,
                            'rw' => $rw,
                            'ktp' => $f1['file_name'],
                            'kk' => $f2['file_name'],
                            'pengajuan' => 1
                        ];
                        $this->db->insert('penduduk', $save);
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
                    $id = $id . $rid3 . "-" . $randomize . "-" . $count . "-" . $s;

                    if (isset($_FILES['pengantar'])) {
                        if ($_FILES['pengantar']['size'] >= 2097152) { //2MB
                            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fas-ban"></i> MAAF!</h5> Surat Pengantar Lurah yang diupload Lebih 2MB!</div>');
                            redirect(base_url("home/s_online"));
                        } else {

                            $namafile = substr($_FILES['pengantar']['name'], -7);
                            $pengantar = "PL-" . $nik . $namafile;
                            $config['upload_path']          = './upload/pengantar'; //lokasi folder
                            $config['allowed_types']        = 'pdf|jpg|jpeg|png'; //tipe data yang di upload
                            $config['overwrite']            = true; // tindih file dengan file baru
                            $config['max_size']             = 2048; // 2MB
                            $config['file_name']            = $pengantar;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('pengantar')) {
                                $f3 = $this->upload->data();
                            }
                        }
                    }

                    $data = [
                        'id_pengaju' => $id,
                        'nik' => $nik,
                        'id_surat' => $surat,
                        'tgl' => date('d-m-Y'),
                        'keperluan' => $keperluan,
                        'almt_keramaian' => $almt_keramaian,
                        'f_pengantar' => $f3['file_name'],
                        'status' => 1
                    ];
                    $this->pengajuan_track->insert_p_surat($data);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5>
                                        <i class="icon fas fa-check"></i> Selamat!
                                        </h5>
                                        Berhasil Mengajukan <b>Surat Pengantar Izin Keramaian</b>, Berikut
                                        <b>ID</b>
                                        anda:
                                        <b>
                                        ' . $id . '
                                            </b>
                                            </div>');
                    redirect(base_url("home/s_online"));
                }
            }
            public function s_online()
            {
                $data['title'] = 'E-Kecamatan';
                $data['penduduk'] = $this->db->get('penduduk')->num_rows();
                $data['antrian'] = $this->db->get_where('pengajuan_surat', ['status !=' => 5])->num_rows();
                $data['surat'] = $this->db->get('surat')->result_array();
                $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
                $data['user'] = $this->db->get('user')->num_rows();
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();

                $this->load->view('home/header', $data);
                $this->load->view('home/navbar', $data);
                $this->load->view('home/s_online', $data);
                $this->load->view('home/footer');
            }
            public function tracking()
            {
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
            public function cariSurat()
            {

                $id = $this->input->post('trackid', TRUE);
                $row = $this->pengajuan_track->getPengajuanById($id);

                $data = [
                    'id' => $id,
                    'row' => $row
                ];

                // var_dump($row);
                // die;

                if ($row === null) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-bank"></i> Maaf!</h5> ID yang anda masukkan Salah! <b>ID: </b><b>' . $id . '</b> <i>tidak ditemukan</i></div>');
                    redirect(base_url("home/tracking"));
                } else {
                    $data['row'] = $this->pengajuan_track->getPengajuanById($id);
                    $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
                    $data['title'] = 'Tracking Surat';
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
                    $data['status'] = [
                        1 => 'Pending',
                        2 => 'Syarat Tidak Terpenuhi',
                        3 => 'Diterima dan Dilanjutkan',
                        4 => 'Surat Telah dibuat, dan Sedang diperiksa',
                        5 => 'Telah Selesai Dibuat',
                    ];

                    $this->load->view('home/header', $data);
                    $this->load->view('home/navbar', $data);
                    $this->load->view('home/result', $data);
                    $this->load->view('home/footer');
                }
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
                $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
                $this->load->view('cetak/cetak_surat', $data);
            }
        }
