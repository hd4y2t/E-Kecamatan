<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
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
        $this->db->where('is_active =', 0);
        $data['user_non'] = $this->db->get('user')->num_rows();

        $this->load->model('Mgrafik', 'grafik');
        // $grafik = $this->grafik->getDataGrafik();
        // var_dump($grafik);
        $this->load->model('Madmin', 'admin');
        $data['hasil'] = $this->admin->getDataKelurahan(); //untuk grafik
        $data['kelurahan'] = $this->db->get('kelurahan')->result_array();

        $data['kode'] = [
            'SURAT KETERANGAN MISKIN',
            'SURAT KETERANGAN TIDAK MAMPU',
            'SURAT KETERANGAN BELUM PUNYA RUMAH',
            'SURAT KETERANGAN USAHA',
            'SURAT KETERANGAN DOMISILI PERUSAHAAN',
            'SURAT KETERANGAN NIKAH',
            'SURAT KETERANGAN DOMISILI',
            'SURAT KETERANGAN PENGHASILAN',
            'SURAT KETERANGAN ORANG YANG SAMA',
            'SURAT PENGANTAR CERAI',
            'SURAT PENGANTAR SKCK',
            'SURAT PENGANTAR IZIN KERAMAIAN'
        ];

        $chartPie = 'SELECT surat_id as name ,COUNT(surat_id) AS value FROM `pembuatan_surat` group BY surat_id';
        $data['pie'] = $this->db->query($chartPie)->result();

        $query = "SELECT `tgl` FROM `pembuatan_surat` ORDER BY `tgl` DESC LIMIT 1";
        $data['last'] = $this->db->query($query)->row_array();

        $data['chart'] = $this->grafik->getDataGrafik();
        // $chart = $this->galery_model->getDataGrafik();
        // var_dump($a);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Role';
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $array = [
                'role' => $this->input->post('role', true),
            ];
            $this->db->insert('user_role', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Role Baru ditambahkan </div>'
            );
            redirect('admin/role');
        }
    }

    public function role_akses($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Role Access';
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/role_akses', $data);
        $this->load->view('templates/footer');
    }

    public function editRole($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Role';
        $this->form_validation->set_rules('role', 'Nama Role', 'required');
        $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

        $role =  $this->input->post("role", TRUE);
        $array = [
            'role' => $role
        ];
        $this->db->set('role', $role);
        $this->db->where('id', $id);
        $this->db->update('user_role', $array);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> role berhasil di edit </div>'
        );
        redirect('admin/role');
    }


    public function delete_role($id)
    {
        $this->Madmin->delete_role($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/role');
    }

    public function changeakses()
    {
        $meun_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $meun_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Akses telah diubah </div>'
        );
    }

    public function activasi()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Activasi';
        $data['active'] = $this->db->get('user')->result_array();
        $this->db->where('id !=', 13);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/activasi', $data);
        $this->load->view('templates/footer');
    }

    public function user()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'User';

        $this->load->model('Madmin', 'admin');
        $data['akun'] = $this->admin->getRole();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('templates/footer');
        } else {
            $id = '';
            $username = htmlspecialchars($this->input->post('username', true));
            $nama = htmlspecialchars($this->input->post('nama', true));
            $nip = htmlspecialchars($this->input->post('nip', true));
            $foto = 'default.jpg';
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $role_id = $this->input->post('role', true);
            $active = $this->input->post('active', true);
            $date_create = time();
            $data = array(
                'id_user' => $id,
                'username' => $username,
                'nama' => $nama,
                'nip' => $nip,
                'foto' => $foto,
                'password' => $password,
                'role_id' => $role_id,
                'is_active' => $active,
                'date_create' => $date_create

            );

            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> User Baru ditambahkan </div>'
            );
            redirect('admin/user');
        }
    }
    public function editUser()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'User';

        $this->load->model('Madmin', 'admin');
        $data['akun'] = $this->admin->getRole();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('templates/footer');
        } else {
            $id = '';
            $username = htmlspecialchars($this->input->post('username', true));
            $nama = htmlspecialchars($this->input->post('nama', true));
            $nip = htmlspecialchars($this->input->post('nip', true));
            $foto = 'default.jpg';
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $role_id = $this->input->post('role', true);
            $active = $this->input->post('active', true);
            $date_create = time();
            $data = array(
                'id_user' => $id,
                'username' => $username,
                'nama' => $nama,
                'nip' => $nip,
                'foto' => $foto,
                'password' => $password,
                'role_id' => $role_id,
                'is_active' => $active,
                'date_create' => $date_create

            );

            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> User Baru ditambahkan </div>'
            );
            redirect('admin/user');
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
