<?php
class Group_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_grouplist($name='',$id=''){
  if ($name != '')
  {
     $query = $this->db->get_where('groupinfo', array('group_name' => $name));
      return $query->row_array(); 
  }
   if ($id != '')
  {
     $query = $this->db->get_where('groupinfo', array('group_id' => $id));
      return $query->row_array(); 
  }
 $query = $this->db->get('groupinfo'); 
    return $query->result_array();
}

 public function add_group($input) {
  $data = array (
             'group_id' => $input['group_id'],
            'group_name' => $input['group_name'], 
            'description' => $input['description'],
            'image_path' => $input['image_path'],
            'owner_id' => $input['owner_id'],
            'members' => $input['members']
        );
       $this->db->insert('groupinfo', $data);
        $id= $this->db->insert_id();
        if ($id!='0') {
           $query = $this->db->get_where('groupinfo', array('id' => $id));
          return $query->row_array();
        }
        return $this->db->insert_id();
  }




}