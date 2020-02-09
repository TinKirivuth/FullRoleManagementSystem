<?php
	session_start();
	include('database.php');
	class User extends Db{
		//opent conntection
		function __construct(){
			$this->connect();
		}

		// get user login
		function login($uname,$upass){
		    $sql="SELECT * FROM users WHERE lgname='".$uname."' AND password='".$upass."' AND status=1 AND rid<>0";
		    $result=$this->cn->query($sql);
		    $num=$result->num_rows;
		    if($num>0){
				$row=$result->fetch_array();
		      	$msg['login']='1';
				$_SESSION['userID']=$row['uid'];
				$_SESSION['loginName']=$row['lgname'];
				$_SESSION['userPhoto']=$row['photo'];
				$_SESSION['userRole']=$row['rid'];
				$_SESSION['userStatus']=$row['status'];
		    }else{
		      $msg['login']='0';
		    }
		    echo json_encode($msg);
		}

		// get user for listing page
		function get_user($opt,$con,$limit){
			// $sql="SELECT u.*,r.* FROM ".$this->tbl[$opt]." u LEFT JOIN ".$this->tbl[1]." r ON u.rid = r.rid  ORDER BY ".$od." LIMIT ".$limit."";
		 //    $result=$this->cn->query($sql);
		 //    if($result->num_rows>0){
		 //    	while($row=$result->fetch_array()){ 
		    		
		    $od="uid DESC";
		    $post_data=$this->select_data($this->tbl[$opt],$con,$od,$limit);
		    if($post_data!=0){
			    foreach ($post_data as $row) {
			?>
			    	<tr>
				        <td class="text-center"><?php echo $row['uid']; ?></td>
						<td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lgname']; ?></td>
						<td>
							<?php
								if ($row['photo'] <> ""){
									$img = "upl-img/".$row['photo'];
								}else{
									$img = "images/download.jpg";
								}

							?>
							<input type="hidden" name="" value="<?php echo $row['photo'];?>">
							<img src="<?php echo $img;?>" style="width: 50px;height: 50px;border-radius: 50%;border:1px solid #eee;">
						</td>
						<td><?php echo $row['rid']; ?></td>
						<td><?php echo $row['status']==1 ? "Active" : "Inactive"?></td>
				        <td class="text-center">
							<span class="text-info btn-edit" title="View"><i class="fa fa-eye" style="font-size: 20px;"></i></span>&nbsp;&nbsp;
				        	<span class="text-danger btn-disable" title="Disable"><i class="fa fa-trash" style="font-size: 18px;"></i></span>
				        </td>
			      </tr>       
			<?php
			    }
			}
        }

        // save user
        function save_user(
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
                ){
        		if($id==0){	
					$dpl=$this->dpl($this->tbl[$opt],"lgname='".$login_name."'");
					if($dpl==1){
						$msg['dpl']=1;	
						$msg['messageStr'] = 'Data was douplicate!';
					}else{
						$this->insert_data($this->tbl[$opt],
												"null,
												'".$od."',
												'".$rid."',
                                                '".$fname."',
                                                '".$lname."',
                                                '".$login_name."',
                                                '".$password."',
                                                '".$note."',
												'".$photo."',
												'".$status."'");
												$msg['id']=$this->last_id;
						                        $msg['fname'] = $fname;
						                        $msg['lname'] = $lname;
						                        $msg['login_name'] = $login_name;
						                        $msg['note'] = $note;
						                        $msg['photo'] = $photo;
												$msg['dpl']=0;
												$msg['messageStr'] = 'Successfully.';
					}	
				}else{
					$this->update_data($this->tbl[$opt],"
												od = '".$od."',
												fname = '".$fname."',
		                                        lname = '".$lname."',
		                                        lgname = '".$login_name."',
		                                        note = '".$note."',
		                                        photo = '".$photo."',
		                                        status = '".$status."'
												","uid='".$id."'");
												$msg['id']='edit';
				}	
				
				echo json_encode($msg);
        }

        // get user edit
        function get_user_edit($id,$opt){
			$sql="SELECT * FROM ".$this->tbl[$opt]." WHERE uid=".$id."";
			$result=$this->cn->query($sql);
            $row=$result->fetch_array();  
			$msg['id']=$row['uid'];
			$msg['od']=$row['od']; 
			$msg['rid']=$row['rid'];
			$msg['fname']=$row['fname'];
			$msg['lname']=$row['lname'];
			$msg['login_name']=$row['lgname'];
			$msg['password']=$row['password'];
            $msg['note']=$row['note'];
            $msg['photo']=$row['photo'];
			$msg['status']=$row['status'];
			
			echo json_encode($msg);
		}
}
?>