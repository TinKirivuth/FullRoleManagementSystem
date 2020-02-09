<?php
	include('../db/role-assignment-class.php');
	$pk=new RoleAssignment;		
	$roleId=$_POST['roleId'];
	$menuId=$_POST['menuId'];

	$pk->remove_menu_permission_from_role($roleId,$menuId);

	// include('../db/user-class.php');
	// $pk=new User;	
	// $roleId=$_POST['roleId'];
	// $menuId=$_POST['menuId'];

	// $pk->remove_permission($roleId,$menuId);
?>