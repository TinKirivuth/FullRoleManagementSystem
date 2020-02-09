<?php
include('../../db/user-class.php');
$pk=new User;
$id=$_POST['id'];
$opt=$_POST['opt'];
$pk->get_user_edit($id,$opt);
?>