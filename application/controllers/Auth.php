<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Muser', 'auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login E-Kecamatan';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('ni', 'Ni', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password tidak sama!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|mathces[password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
        } else {
            $ni = $this->input->post('Ni', true);
            $nama = $this->input->post('Nama', true);
            $foto = 'default.jpg';
            $password = password_hash($this->input->post('Password'), PASSWORD_DEFAULT);
            $role_id = 3;
            $is_active = 1;
            $date_create = time();
            $user_data = array(
                'ni' => $ni,
                'nama' => $nama,
                'foto' => $foto,
                'password' => $password,
                'role_id' => $role_id,
                'is_active' => $is_active,
                'date_create' => $date_create

            );
            // var_dump($user_data);
            // die();
            // echo 'data berhasil';
            $this->Muser->register($user_data);
            redirect('auth');
            // $this->db->insert('user', $data);
            // redirect('auth');
        }
    }

    public function dashboard()
    {

        $this->load->view('auth/dashboard');
    }
}
