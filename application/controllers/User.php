<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Ganti Password';
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        // $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek',
            'required' => 'Password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password saat ini salah! </div>');
                redirect('user/changepassword');
                // var_dump($current_password, $data['user']['password']);
                // die;
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password saat ini tidak boleh sama! </div>');
                    // var_dump($current_password, $new_password);
                    // die;
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    // var_dump($password_hash);
                    // die;
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil diganti! </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'My Profile';
        $data['surat'] = $this->db->get('surat')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nm_surat', 'Nama Surat', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $array = [

                'id_kategori' => $this->input->post('id_kategori', true),
                'nm_surat' => $this->input->post('nm_surat', true),

            ];
            $this->db->insert('surat', $array);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Surat Baru ditambahkan </div>'
            );
        }
    }



    public function edit_profile()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Profile';
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            //cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('username', $username);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil diedit</div>');
            redirect('user/profile');
        }
    }
    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Ganti Password';
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        // $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek',
            'required' => 'Password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password saat ini salah! </div>');
                redirect('user/changepassword');
                // var_dump($current_password, $data['user']['password']);
                // die;
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password saat ini tidak boleh sama! </div>');
                    // var_dump($current_password, $new_password);
                    // die;
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    // var_dump($password_hash);
                    // die;
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil diganti! </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
