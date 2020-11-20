<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('ni', 'Nomor induk', 'trim|required', [
            'required' => 'Nomor induk harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login E-Kecamatan';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('ni', 'Ni', 'required|trim|is_unique[user.ni]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[pwd]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek'
        ]);

        $this->form_validation->set_rules('pwd', 'Pwd', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
        } else {
            $id = "";
            $ni = htmlspecialchars($this->input->post('ni', true));
            $nama = htmlspecialchars($this->input->post('nama', true));
            $foto = 'default.jpg';
            $password = password_hash($this->input->post('Password'), PASSWORD_DEFAULT);
            $role_id = 3;
            $is_active = 1;
            $date_create = time();
            $data = array(
                'id' => $id,
                'ni' => $ni,
                'nama' => $nama,
                'foto' => $foto,
                'password' => $password,
                'role_id' => $role_id,
                'is_active' => $is_active,
                'date_create' => $date_create

            );

            $this->Muser->register($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat! akun anda telah terdaftar, tolong login! </div>');
            redirect('auth');
            // var_dump($user_data);
            // die();
            // echo 'data berhasil';
            // $this->db->insert('user', $user_data);
            // redirect('auth');
        }
    }

    public function dashboard()
    {

        $this->load->view('auth/dashboard');
    }
}
