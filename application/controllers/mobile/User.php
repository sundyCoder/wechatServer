<?php
/***************************************************************************
 * 
 * Copyright (c) 2015  , Inc. All Rights Reserved
    用户信息操作
 * 
 **************************************************************************/
require_once APPPATH. 'core/MC_Controller.php'; //引入父类
require_once APPPATH. 'controllers/mobile/Easemob.php';

class User extends MC_Controller {
    public $options = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->options['client_id']='YXA6TUqyQPhfEeSI7zmSEyM-Dw';      
        $this->options['client_secret']='YXA6Q1hmPqAjW1op00h-oQjCC7tci5M';
        $this->options['org_name']='juns';     
        $this->options['app_name']='wechat'; 
    }

    public function index()
    {
        echo "juns hello world";
    }

  //登陆
    public function login()
    {
      	$username =$this->input->post('username'); 
        $password =$_POST['password'];   
        if (empty($username) || empty($password)) {
            $this->json_return(array(), "username or password is null", -1);   
        }else{
            $return_array=$this->user_model->get_user_login($username,$password); 
            if($return_array) {
    		      $this->json_return($return_array, "login success",1);   
            }else {
                $this->json_return(array(), 'username or password error', -1);
            }
        }
    }


//注册
public function regigter()
 { 
   $username =$this->input->post('username'); 
   $password =$_POST['password'];   

        if(class_exists('Easemob')){     
            $easemob = new Easemob( $this->options);    
            $options['username']=$username;
            $options['password']=$password; 
            $re=  $easemob->accreditRegister($options);
            // echo $re;exit; 
            $result = json_decode($re,true);
            // var_dump($result);exit;
            if(!isset($result["error"])){
                $records = $this->user_model->getActCount($username); 
                if($records){
                    $this->json_return(array(), '用户已经存在', -1);
                }else {
                    $return_array=$this->user_model->add_user($username,$password); 
                    if($return_array) {
                        $this->json_return($return_array, "注册成功",1);   
                    }else{
                        $this->json_return(array(), '注册失败', -1);
                    }
                }
            }else {
                if($result["error"]=="duplicate_unique_property_exists"){
                    $this->json_return(array(), '用户已经存在', -1);
                }elseif ($result["error"]=="illegal_argument") {
                    $this->json_return(array(), '用户名格式不正确', -1);
                }
                
            }
            
        }
   }

    //获取用户列表 ，有id则根据id查询
    public function get_user_list()
    {
        // $user_id =$this->input->post('user_id'); 
        $user_id =$this->input->post('telphone'); 
     // echo  $user_id;
        if (empty($user_id)) 
        {
            $return_array=$this->user_model->get_users();  
            $this->json_return($return_array, "success",1);   
        } else {
            $return_array=$this->user_model->get_userbytelphone($user_id);  
            $this->json_return($return_array, "success",1);   
        }     
    }


    //获取通讯录中的好友
    public function get_contact_list()
    {
        $userlist =$this->input->post('userlist'); 
     // echo  $user_id;
        if (empty($userlist)) 
        {
            $this->json_return(array(), '参数userlist错误！', -1);  
        } else {
            $return_array=$this->user_model->get_contact_list($userlist); 
            if($return_array) { 
            $this->json_return($return_array, "success",1);   
            }else{
                $this->json_return(array(), '通讯录没有好友！', -1); 
            }
        }     
    }

    //推送消息 订阅号
    public function send_msg_touser(){

        if(class_exists('Easemob')){     
            $easemob = new Easemob( $this->options);   
            //参数
            $from_user=$this->input->post('from_user'); 
            $username_array=array('18500320457','18601934679');
            $send_content=$this->input->post('send_content');
             $ext_array = array (
                    'imgputh' => '', 
                    'info' => '',
                    'status' => ''
                ); 
            $re=$easemob->yy_hxSend($from_user, $username_array, $send_content,"users",''); 
            echo $re; 

       }
    }

    //修改用户资料
    public function update_userinfo() {
        $telephone =$this->input->post('telphone'); 
        $name =$this->input->post('username'); 
          // echo  $telephone;
        if (empty($telephone))  
        {
            $this->json_return(array(), '参数错误！', -1);  
        }else{
            $return_array=$this->user_model->updateUserInfo($name,$telephone); 
            if($return_array) { 
                $this->json_return($return_array, "success",1);   
            }
        }
    }

} 
 ?>