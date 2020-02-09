<?php
	include('../db/role-class.php');
	$pk = new Role;

	$con=$_POST['con'];
	$opt=$_POST['opt'];
	$s=$_POST['s'];
	$show_record=$_POST['show_record'];
	$limit="$s,$show_record";
?>
	<tr>
        <th class="text-center" style="width: 40px;">ID</th>
		<th>Role Name</th>
		<th>Note</th>
		<th>Status</th>
        <th class="text-center" style="width: 150px;">Action</th>
    </tr>
<?php
	$pk->get_role($opt,$con,$limit);
?>
 