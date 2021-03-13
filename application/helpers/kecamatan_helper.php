<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where(
            'user_access_menu',
            [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]
        );

        if ($userAccess->num_rows() < 1) {
            redirect('auth/block');
        }
    }

    function check_access($role_id, $menu_id)
    {
        $ci = get_instance();
        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu_id);
        $result = $ci->db->get('user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }

    function check_access_submenu($id, $menu_id)
    {
        $ci = get_instance();
        $ci->db->where('id', $id);
        $ci->db->where('menu_id', $menu_id);
        $result = $ci->db->get('user_sub_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }

    function check_active($username, $is_active)
    {
        $ci = get_instance();
        $ci->db->where('username', $username);
        $active = $ci->db->where('is_active =', $is_active);


        if ($active = 1) {
            return "checked='checked'";
        }
    }
}
