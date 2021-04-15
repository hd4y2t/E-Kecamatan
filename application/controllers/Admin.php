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

        $this->load->model('Madmin', 'admin');
        $data['hasil'] = $this->admin->getDataKelurahan(); //untuk grafik

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
    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile';
        $data['profile'] = $this->db->get_where('profile', ['id' => 1])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/profile', $data);
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
        // $id = '';
        //         $ni = htmlspecialchars($this->input->post('ni', true));
        //         $nama = htmlspecialchars($this->input->post('nama', true));
        //         $foto = 'default.jpg';
        //         $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        //         $role_id = 3;
        //         $is_active = 0;
        //         $date_create = time();
        //         $data = array(
        //             'id_user' => $id,
        //             'ni' => $ni,
        //             'nama' => $nama,
        //             'foto' => $foto,
        //             'password' => $password,
        //             'role_id' => $role_id,
        //             'is_active' => $is_active,
        //             'date_create' => $date_create

        //         );

        //         $this->Mauth->register($data);

        //         $this->session->set_flashdata(
        //             'message',
        //             '<div class="alert alert-success" role="alert"> Selamat! akun anda telah terdaftar, Silakan datang ke Kecamatan untuk aktifasi akun </div>'
        //         );
        //         redirect('auth');
    }
}
