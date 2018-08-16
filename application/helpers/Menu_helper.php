<?php 
$CI = NULL;

function print_recursive_list($data)
{
    $str = "";
    $icon ="";
    foreach($data as $list)
    {
        $subchild = print_recursive_list($list['child']);
        if (empty($subchild) != 1) {
            $icon = '<span class="glyphicon glyphicon-chevron-right" style="float:right;"></span>';
        } else {
            $icon = '';
        }
        $str .= '<li><a class="nav-link py-0" href="'.site_url().'/'.$list['menu_url'].'">'.trim($list['menu_title']).' '.$icon.'</a>';
        
        // if($subchild != '') {
        //     // $str .= '<ul class="dropdown-menu">';
        //     $str .= '<ul class="flex-column pl-2 nav">'.trim($subchild).'</ul>';
        //     // $str .= '</ul>';
        // }
        $str .= "</li>";
    }
    return $str;
}

function usersInfo($info = 'group_id')
{
    $CI =& get_instance();   
    $users = $CI->ion_auth->user()->row();
    $user_id = $users->id;

    $qGroup = $CI->db->query("SELECT u.`id` AS user_id, ug.`group_id`, u.`username`,u.`first_name`, g.`name` AS `group_name` 
                                FROM ion_users u 
                                INNER JOIN ion_users_groups ug ON u.`id`=ug.`user_id` 
                                INNER JOIN ion_groups g ON g.`id`=ug.`group_id`
                                WHERE user_id='$user_id'")->row_array();
    // $group = $this->ion_aputh->group()->row();

    return $qGroup[$info];
}

function categoryKeluhan($id)
{
    if ($id==1) {
        $tipeKeluhan = 'Keluhan';
    } elseif ($id==2) {
        $tipeKeluhan = 'Info Lalu Lintas';
    } elseif ($id==3) {
        $tipeKeluhan = 'Info Kecelakaan';
    } elseif ($id==4) {
        $tipeKeluhan = 'Panic Button';
    } else {
        $tipeKeluhan = 'Lain-lain';
    }
    
    return $tipeKeluhan;
}