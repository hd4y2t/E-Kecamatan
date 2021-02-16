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

    public function s_kelurahan()
    {
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Galery',
            'sub_title' => 'Struktur Kelurahan'
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('templates/header', $judul);
        $this->load->view('galery/s_kelurahan', $data);
        $this->load->view('templates/footer');
    }

    public function edit_s_kelurahan()
    {
        $this->form_validation->set_rules('s_kelurahan', 'Struktur Kelurahan', 'trim');

        if ($this->form_validation->run() == false) {
            $data['profil'] = $this->galery->profil();
            $judul = [
                'title' => 'Galery',
                'sub_title' => 'Struktur Kelurahan'
            ];

            // $data['sm'] = $this->db->get('surat_masuk')->row_array();
            // var_dump($data);
            $this->load->view('templates/header', $judul);
            $this->load->view('galery/edit_s_kelurahan', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->uri->segment(3);
            $upload_sk = $_FILES['s_kelurahan']['name'];

            $data['galery'] = $this->db->get_where('gallery', ['id' => $id])->row_array();

            if ($upload_sk) {
                $config['upload_path']          = './assets/galery/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('s_kelurahan')) {
                    $old_sk = $data['galery']['s_kelurahan'];
                    unlink(FCPATH . 'assets/galery/' . $old_sk);

                    $s_kelurahan = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $s_kelurahan = $this->input->post('s_kelurahan_old');
            }
            // var_dump($s_kelurahan);
            // die;

            $this->galery->UpdateSKelurahan($s_kelurahan, $id);
            $this->session->set_flashdata('success', 'Berhasil Di Update!');
            redirect('galery/s_kelurahan');
        }
    }
}
