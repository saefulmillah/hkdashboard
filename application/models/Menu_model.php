<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of categorymodel
 *
 * @author https://roytuts.com
 */
class Menu_model extends CI_Model {

    private $category = 'ion_menu';

    function __construct() {
        
    }

    public function category_menu() {
        // Select all entries from the menu table
        $query = $this->db->query("select id, title, url,
            parent_id from " . $this->category . " order by menu_order");

        // Create a multidimensional array to contain a list of items and parents
        $cat = array(
            'items' => array(),
            'parents' => array()
        );
        // Builds the array lists with data from the menu table
        foreach ($query->result() as $cats) {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $cat['items'][$cats->id] = $cats;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $cat['parents'][$cats->parent_id][] = $cats->id;
        }

        if ($cat) {
            $result = $this->build_category_menu(0, $cat);
            return $result;
        } else {
            return FALSE;
        }
    }

    // Menu builder function, parentId 0 is the root
    function build_category_menu($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            // $htmlChild .= "<div class=\"collapse\" id=\"submenu1\"><ul class=\"flex-column pl-2 nav\">";
            $html .= "<ul class=\"flex-column pl-2 nav\">";
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    $html .= "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#submenu1\">" . $menu['items'][$itemId]->title . "</a></li>";
                }
                if (isset($menu['parents'][$itemId])) {
                    $html .= "<li class=\"nav-item\"><a class=\"nav-link collapsed\" href=\"#submenu1\" data-toggle=\"collapse\" data-target=\"#submenu1\">" . $menu['items'][$itemId]->title . "</a>";
                    // $html .= $this->build_category_menu($itemId, $menu);
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";
        }
        return $html;
    }

    function build_menu_child($itemId, $menu)
    {
        # code...
    }

}

/* End of file categorymodel.php */
/* Location: ./application/models/categorymodel.php */