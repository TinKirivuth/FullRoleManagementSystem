 <?php
    include('../db/database.php');
    $pk=new Db;
    $opt=$_POST['opt'];// variable for pagination
    $con=$_POST['con'];
    $pk->count_data($opt,$con);
  ?>
