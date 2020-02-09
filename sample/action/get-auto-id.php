<?php
    include('../db/database.php');
    $pk=new Db;
    $opt=$_POST['opt'];
    $id=$_POST['id'];
    $msg['id']=$pk->get_auto_id($opt,$id);
    echo json_encode($msg);
?>
