<?php
    include('../../db/user-class.php');
    $pk=new User;	
     
    $opt=$_POST['opt'];
    $id=$_POST['id'];	
    $od=$_POST['od'];

    $fname=$_POST['fname'];
    $fname=trim($fname);
    $fname=str_replace("'","''",$fname);

    $lname=$_POST['lname'];
    $lname=trim($lname);
    $lname=str_replace("'","''",$lname);

    $login_name=$_POST['login_name'];
    $login_name=trim($login_name);
    $login_name=str_replace("'","''",$login_name);

    $password=$_POST['password'];
    $password=trim($password);
    $password=str_replace("'","''",$password);
    $password=md5($password);
    
    $note=$_POST['note'];
    $note=trim($note);
    $note=str_replace("'","''",$note);

    $photo=$_POST['photo'];
    $rid=0;
    $status=$_POST['status'];
      
    $pk->save_user(
                    $opt,
                    $id,
                    $od,
                    $fname,
                    $lname,
                    $login_name,
                    $password,
                    $note,
                    $photo,
                    $rid,
                    $status
                    );
?>