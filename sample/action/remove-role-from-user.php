<?php
	include('../db/role-assignment-class.php');
	$pk=new RoleAssignment;		
	$rid=$_POST['rid'];
	$uid=$_POST['uid'];
	$pk->remove_role_from_user($rid,$uid);
?>