<?php

class Galery_model extends CI_Model
{
    public function profil()
    {
        return $this->db->get("gallery")->result_array();
    }

    public function UpdateProfil($id)
    {
        $profil = $this->input->post('profile');

        $this->db->set('profile', $profil);

        $this->db->where('id', $id);
        $this->db->update('gallery');
    }

    public function UpdateSKelurahan($s_kelurahan, $id)
    {
        $this->db->set('s_kelurahan', $s_kelurahan);

        $this->db->where('id', $id);
        $this->db->update('gallery');
    }
}
