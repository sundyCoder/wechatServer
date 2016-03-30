<?php
/***************************************************************************
 * 
 * Copyright (c) 2015  , Inc. All Rights Reserved
    群组信息操作
 * 
 **************************************************************************/
require_once APPPATH. 'core/MC_Controller.php'; //引入父类
require_once APPPATH. 'controllers/mobile/Easemob.php';

class Group extends MC_Controller {
 public function __construct()
  {
    parent::__construct();
    $this->load->model('Group_model'); 
  }

public function index()
  {
     echo "group hello world";
  }

 

  //获取用户列表 ，有id则根据id查询
  public function get_group_list()
  {
     $group_name =$this->input->post('group_name');
    $group_id =$this->input->post('group_id');      
     $return_array=$this->Group_model->get_grouplist($group_name,$group_id); 
      if ($return_array) {
           $this->json_return($return_array, "success",1);  
           } else {
                $this->json_return($return_array, "group list is NULL",-1);  
          } 
  }

  public function add_group() {

    $input['group_id']=$this->input->post('group_id'); 
    $input['group_name']=$this->input->post('group_name'); 
    $input['members']=$this->input->post('members');
    $input['image_path']=$this->input->post('image_path');
    $input['owner_id']=$this->input->post('owner_id');
    $input['description']=$this->input->post('description');

    $return_array=$this->Group_model->add_group($input); 
     if($return_array) {
        $this->json_return($return_array, "添加成功",1);   
        }else {
          $this->json_return(array(), '添加失败', -1);
        }
  }




   } 
 ?>