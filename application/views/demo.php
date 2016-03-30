<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WeChat 项目</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155; 
		text-align:center;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Wechat API接口</h1>
	 <p>=================注册用户================= </p>
	 <p>/wechat/index.php/mobile/user/regigter</p>
	<form action="/wechat/index.php/mobile/user/regigter" method="post"
		enctype="multipart/form-data">
		<label for="username">用户名:username</label><input type="text" name="username"
			id="username" /> <br /> <label for="password">密  码:password</label><input
			type="password" name="password" id="password" /> <br /> <input
			type="submit" name="submit" value="Submit" />
	</form>
<h1></h1>
	<p>=================登录测试================== </p>
	 <p>/wechat/index.php/mobile/user/login</p>
	<form action="/wechat/index.php/mobile/user/login" method="post">
		<label for="username">用户名:username </label><input type="text" name="username"
			id="username" /><br /> <label for="password">密 码: password </label><input
			type="password" name="password" id="password" /> <br /> <input
			type="submit" name="submit" value="Submit" />
	</form>
    <h1></h1>
    <p>=================获取用户列表================== </p>
      <p>/wechat/index.php/mobile/user/get_user_list </p>
      <p>参数 user_id  则根据user_id获取用户信息</p>
	<form action="/wechat/index.php/mobile/user/get_user_list"  method="post">
		<label for="user_id">用户ID:user_id</label><input type="text" name="user_id"
			id="user_id" /><br /> <input type="submit" name="submit"
			value="Submit" />
	</form>
	<h1></h1>
    <p>=================更新用户信息================== </p>
 <h1></h1>
    <p>=================创建群组================== </p>
 <p>/wechat/index.php/mobile/group/add_group </p>
      <p>参数 group_name ,group_id  members  owner_id description image_path</p>
	<form action="/wechat/index.php/mobile/group/add_group"  method="post">
		<label for="group_id">群组:group_id</label><input type="text" name="group_id"
			id="group_id" /><br />
		<label for="group_name">群组名:group_name</label><input type="text" name="group_name"
			id="group_name" /><br /> 
			<label for="owner_id">创建者:owner_id</label><input type="text" name="owner_id"
			id="owner_id" /><br /> 
			<label for="members">成员:members</label><input type="text" name="members"
			id="members" /><br /> 
			<label for="description">描述:description</label><input type="text" name="description"
			id="description" /><br /> 
			<label for="image_path">图标:image_path</label><input type="text" name="image_path"
			id="image_path" /><br /> 
			<input type="submit" name="submit" value="Submit" />
	</form>


 <h1></h1>
    <p>=================获取群组列表================== </p> 
     <p>/wechat/index.php/mobile/group/get_group_list </p>
      <p>参数 group_name ,group_id 则根据群组名,ID获取群组信息</p>
	<form action="/wechat/index.php/mobile/group/get_group_list"  method="post">
		<label for="group_name">群组:group_id</label><input type="text" name="group_id"
			id="group_id" /><br />
		<label for="group_name">群组名:group_name</label><input type="text" name="group_name"
			id="group_name" /><br /> <input type="submit" name="submit"
			value="Submit" />
	</form> 
 <h1></h1>
    <p>=================获取通讯录好友================== </p> 
     <p>/wechat/index.php/mobile/user/get_contact_list </p> 
	<form action="/wechat/index.php/mobile/user/get_contact_list"  method="post">
		<label for="group_name">联系人号码:userlist</label><input type="text" name="userlist"
			id="userlist" /><br />
		  <input type="submit" name="submit" value="Submit" />
	</form>
<h1></h1>
 <p>=================订阅号 发送消息================== </p> 
     <p>/wechat/index.php/mobile/user/send_msg_touser</p>
      <p>参数 group_name ,group_id 则根据群组名,ID获取群组信息</p>
	<form action="/wechat/index.php/mobile/user/send_msg_touser"  method="post">
		<label for="from_user">订阅号:from_user</label><input type="text" name="from_user"
			id="from_user" /><br />
		<label for="send_content">发送内容：send_content</label><input type="text" name="send_content"
			id="send_content" /><br /> <input type="submit" name="submit"
			value="Submit" />
	</form>
<h1></h1>
 
 <p>=================修改用户信息================== </p> 
     <p>/wechat/index.php/mobile/user/update_userinfo</p>
      <p>参数 group_name ,group_id 则根据群组名,ID获取群组信息</p>
	<form action="/wechat/index.php/mobile/user/update_userinfo"  method="post">
		<label for="telephone"> 手机号 telephone</label><input type="text" name="telephone"
			id="telephone" /><br />
		<label for="username">名字 username</label><input type="text" name="username"
			id="username" /><br /> <input type="submit" name="submit"
			value="Submit" />
	</form>
<h1></h1>


	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>