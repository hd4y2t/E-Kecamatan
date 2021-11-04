<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model', 'galery');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');

        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("auth/login"));
        }
    }

    public function profil_kelurahan()
    {
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Galery',
            'sub_title' => 'Profil Kelurahan'
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data['profil'][0]['profile']);
        // die;
        $this->load->view('templates/header', $judul);
        $this->load->view('galery/profil_kelurahan', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profil()
    {
        $this->form_validation->set_rules('profil', 'Profil', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['profil'] = $this->galery->profil();
            $judul = [
                'title' => 'Galery',
                'sub_title' => 'Profil Kelurahan'
            ];

            $this->load->view('templates/header', $judul);
            $this->load->view('galery/edit_profil', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->uri->segment(3);
            $this->galery->UpdateProfil($id);
            $this->session->set_flashdata('success', 'Berhasil Di Update!');
            redirect('galery/profil_kelurahan');
        }
    }
}
