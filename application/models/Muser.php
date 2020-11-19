<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{
    public function register($user_data)
    {
        $this->db->insert('user', $user_data);
    }
}
