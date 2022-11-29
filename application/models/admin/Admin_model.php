<?php
class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function is_category_exist($id,$name){
    	$this->db->where('name',$name);
    	$this->db->where_not_in('id',$id);
    	return $this->db->get('category')->result_array();
    }
     function is_slug_exist($id,$url_slug){
        $this->db->where('url_slug',$url_slug);
        $this->db->where_not_in('id',$id);
        return $this->db->get('category')->result_array();
    }
    function is_group_exist($id,$name){
    	$this->db->where('name',$name);
    	$this->db->where_not_in('id',$id);
    	return $this->db->get('group_table')->result_array();
    }
}
 