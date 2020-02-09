<?php
	include('../db/role-assignment-class.php');
	$pk=new RoleAssignment;	
	$rid=$_POST['rid'];
	$pk->get_system_menu_by_role($rid);


	// include('../db/user-class.php');
	// $pk=new User;	
	// $rid=$_POST['rid'];
	// $pk->get_role_permission($rid);
?> 