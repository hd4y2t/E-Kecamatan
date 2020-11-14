<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login E-Kecamatan';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function registration()
    {
        $this->form_validation->set_rules('ni', 'Ni', 'required|trim|is_unique[user.ni]|max_length[16]', [
            'is_unique[user.ni]' => 'NIK telah digunakan'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|mathces[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
        } else {
            $data = [
                'ni' => $this->input->post('ni'),
                'nama' => $this->input->post('nama'),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_create' => time()
            ];

            var_dump($data);
            exit;
            // $this->db->insert('user', $data);
            // redirect('auth');
        }
    }

    public function dashboard()
    {

        $this->load->view('auth/dashboard');
    }
}
