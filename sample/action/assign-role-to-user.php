<?php
	include('../db/role-assignment-class.php');
	$pk=new RoleAssignment;	
	$rid=$_POST['rid'];
	$uid=$_POST['uid'];
	$pk->assign_role_to_user($rid,$uid);
?>