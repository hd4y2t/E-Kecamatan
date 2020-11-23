<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['ni' => $this->session->userdata('ni')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('user/index');
        $this->load->view('templates/auth_footer');
    }
}
