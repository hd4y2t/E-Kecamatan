<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mauth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // var_dump($seksi);
        if (!$this->session->userdata('username')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required', [
                'required' => 'Username harus diisi!'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'trim|required', [
                'required' => 'Password harus diisi!'
            ]);
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login E-Kecamatan';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
            } else {
                //validasi login
                $this->_login();
            }
        } else {
            $seksion = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $username = $seksion['username'];
            $query = "SELECT `user`.* ,`user_role`.*
                        FROM `user`
                        JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`
                        WHERE `user`.`username` = '$username'
                        ";
            $sesi = $this->db->query($query)->row_array();
            redirect($sesi['role']);
        }
    }
    private function _login()
    {
        $user = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $user])->row_array();

        //jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        redirect('pelayanan_umum');
                    } else if ($user['role_id'] == 3) {
                        redirect('pemerintahan');
                    } else if ($user['role_id'] == 4) {
                        redirect('camat');
                    } else if ($user['role_id'] == 5) {
                        redirect('sekcam');
                    } else if ($user['role_id'] == 6) {
                        redirect('loket');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun anda belum aktif </div>');
                redirect('auth');
            }
        } else {
            //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username tidak terdaftar </div>');
            redirect('auth');
        }
        // var_dump($user);
        // die;
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil logout </div>');
        redirect('auth');
    }

    public function dashboard()
    {
        $this->load->view('auth/dashboard');
    }

    public function icons()
    {
        $this->load->view('auth/icons');
    }

    public function tables()
    {
        $this->load->view('auth/tables');
    }

    public function user()
    {
        $this->load->view('auth/user');
    }

    public function notification()
    {
        $this->load->view('auth/notification');
    }

    public function block()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Block Aksess';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('auth/block');
        $this->load->view('templates/footer');
    }
}
