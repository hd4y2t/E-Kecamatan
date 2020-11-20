<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{
    public function register($data)
    {
       
        $this->db->insert('user', $data);
    }
}
