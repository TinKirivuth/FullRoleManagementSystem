<?php
	session_start();
	include('database.php');
	class Role extends Db{
		//opent conntection
		function __construct(){
			$this->connect();
		}

		// get role for listing page
		function get_role($opt,$con,$limit){
		    $od="rid DESC";
		    $post_data=$this->select_data($this->tbl[$opt],$con,$od,$limit);
		    if($post_data!=0){
			    foreach ($post_data as $row) {
			?>
			    	<tr>
				        <td class="text-center"><?php echo $row['rid']; ?></td>
						<td><?php echo $row['rname']; ?></td>
                        <td><?php echo $row['note']; ?></td>
						<td><?php echo $row['status']==1 ? "Active" : "Inactive"; ?></td>
				        <td class="text-center">
				        	<span class="text-info btn-edit" title="View"><i class="fa fa-eye" style="font-size: 20px;"></i></span>&nbsp;&nbsp;
				        	<span class="text-danger btn-disable" title="Disable"><i class="fa fa-trash" style="font-size: 18px;"></i></span>
							<!-- <a href="#" class="btn-edit" title="View" style="color: white;font-size: 20px;"><i class="fa fa-eye"></i> View</a> &nbsp;&nbsp;
							<a href="#" class="btn-disable" title="Disable" style="color: white;font-size: 18px;"><i class="fa fa-trash-alt"></i> Disable</a> -->
				        </td>
			      </tr>       
			<?php
			    }
			}
        }

        // save role
        function save_role(
                $opt,
                $id,
                $od,
                $rname,
                $note,
                $status
                ){
        		if($id==0){	
					$dpl=$this->dpl($this->tbl[$opt],"rname='".$rname."'");
					if($dpl==1){
						$msg['dpl']=1;	
						$msg['messageStr'] = 'Data was douplicate!';
					}else{
						$this->insert_data($this->tbl[$opt],
												"null,
												'".$od."',
                                                '".$rname."',
                                                '".$note."',
												'".$status."'");
												$msg['id']=$this->last_id;
						                        $msg['rname'] = $rname;
						                        $msg['note'] = $note;
												$msg['dpl']=0;
												$msg['messageStr'] = 'Successfully.';
					}	
				}else{
					$this->update_data($this->tbl[$opt],"
												od = '".$od."',
												rname = '".$rname."',
		                                        note = '".$note."',
		                                        status = '".$status."'
												","rid='".$id."'");
												$msg['id']='edit';
				}	
				
				echo json_encode($msg);
        }

        // get role eidt
        function get_role_edit($id,$opt){
			$sql="SELECT * FROM ".$this->tbl[$opt]." WHERE rid=".$id."";
			$result=$this->cn->query($sql);
            $row=$result->fetch_array();  
			$msg['id']=$row['rid'];
			$msg['od']=$row['od']; 
			$msg['rname']=$row['rname'];
            $msg['note']=$row['note'];
			$msg['status']=$row['status'];
			
			echo json_encode($msg);
		} 


	}
?>