<?php
include('../../db/role-class.php');
$pk=new Role;
$id=$_POST['id'];
$opt=$_POST['opt'];
$pk->get_role_edit($id,$opt);
?>