<?php
	include('../db/role-assignment-class.php');
	$pk=new RoleAssignment;	
	$rid=$_POST['rid'];
	$pk->get_system_user_by_role($rid);
?>