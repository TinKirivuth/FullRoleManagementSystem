<?php
    include('../../db/role-class.php');
    $pk=new Role;	
     
    $opt=$_POST['opt'];
    $id=$_POST['id'];	
    $od=$_POST['od'];

    $rname=$_POST['rname'];
    $rname=trim($rname);
    $rname=str_replace("'","''",$rname);
    
    $note=$_POST['note'];
    $note=trim($note);
    $note=str_replace("'","''",$note);

    $status=$_POST['status'];
      
    $pk->save_role(
                    $opt,
                    $id,
                    $od,
                    $rname,
                    $note,
                    $status
                    );
?>