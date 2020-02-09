<?php
include('../db/delete-data-class.php');
$pk=new DeleteData;
$opt=$_POST['opt'];
$id=$_POST['id'];
$pk->delete_data1($opt,$id);
?>
