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
        $str .= '<li class="nav-item"><a class="nav-link py-0" href="'.site_url().'/'.$list['menu_url'].'">'.trim($list['menu_title']).' '.$icon.'</a>';
        
        // if($subchild != '') {
        //     // $str .= '<ul class="dropdown-menu">';
        //     $str .= '<ul class="flex-column pl-2 nav">'.trim($subchild).'</ul>';
        //     // $str .= '</ul>';
        // }
        $str .= "</li>";
    }
    return $str;
}