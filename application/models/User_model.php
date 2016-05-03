<?php
class User_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }


//获取所有用户信息
  public function get_users(){ 
    $query = $this->db->get('userinfo'); 
    return $query->result_array();
  }

//根据id查询用户信息
  public function get_userbyid($id){ 
  $query = $this->db->get_where('userinfo', array('id' => $id));
  return $query->row_array();
}

//根据Telphone查询用户信息
  public function get_userbytelphone($telephone){ 
  $query = $this->db->get_where('userinfo', array('telephone' => $telephone));
  return $query->row_array();
}

//根据用户名 密码查询用户信息
  public function get_user_login($name,$pwd){ 
 
  $wheres = array (
            'telephone' => $name,
            'password'=>$pwd
        );

        $this->db->where($wheres);
        $this->db->select('*')->from('userinfo');
        $query = $this->db->get();

        return $query->result_array(); 
}

//判断是否存在账号
   public function getActCount( $telephone = 0 ) {
        if( $telephone != 0 ){
            $this->db->where('telephone',$telephone);
        }
        $this->db->select('*')->from('userinfo');
        $query = $this->db->get();

        return $query->row_array();

    }
//注册&更新
 public function add_user( $telephone , $password ){
  //去请求环信 注册成功后插入数据库
        $data = array (
            'telephone' => $telephone, 
            'password' => $password,
             'userName' =>'WX'. $telephone,
             'type' => 'N',
            'sex' => 'M',
            'status' => 'N'
        );
       $this->db->insert('userinfo', $data);
        $id= $this->db->insert_id();
        if ($id!='0') {
           $query = $this->db->get_where('userinfo', array('id' => $id));
          return $query->row_array();
        }
        return $this->db->insert_id();
    }

 //获取通讯录中的好友
  public function get_contact_list($userlist){ 
   $sqls= "SELECT  *  FROM userinfo WHERE telephone IN ($userlist) "; 
   return $this->db->query($sqls)->result_array();
}

//修改用户资料
 public function updateUserInfo( $name , $telephone ) {
        $wheres = array ( 
            'telephone'=>$telephone
        );
        $data = array (
            'userName' => $name
        );
        $this->db->where($wheres);
        if($this->db->update('userinfo ', $data)){
            $query = $this->db->get_where('userinfo', $wheres);
            return $query->row_array();
        }
    }


}