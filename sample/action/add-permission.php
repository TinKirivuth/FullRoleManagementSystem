<?php
	include('../db/role-assignment-class.php');
	$pk=new RoleAssignment;	
	$roleId=$_POST['roleId'];
	$menuId=$_POST['menuId'];
	$menuName=$_POST['menuName'];
	$mainId=$_POST['mainId'];
	$main=$_POST['main'];

	$pk->assign_menu_permission_to_role($roleId,$menuId,$menuName,$mainId,$main);


	// include('../db/user-class.php');
	// $pk=new User;	
	// $roleId=$_POST['roleId'];
	// $menuId=$_POST['menuId'];
	// $menuName=$_POST['menuName'];
	// $mainId=$_POST['mainId'];
	// $main=$_POST['main'];

	// $pk->assign_permission($roleId,$menuId,$menuName,$mainId,$main);
?>