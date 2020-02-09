<?php
	session_start();
	include('database.php');
	class RoleAssignment extends Db{
		//opent conntection
		function __construct(){
			$this->connect();
		}
 
		//get role to select
		function get_role_to_select(){
			$post_data=$this->select_data($this->tbl[1],"status=1 AND rid>=0","rid","0,100");
			if($post_data !=0){?>
				<option value="0">--- Select One Role To Assign ---</option>
				<?php
				foreach($post_data as $val){
					?>
						<option value="<?php echo $val['rid'] ?>"><?php echo $val['rname']; ?></option>
	 				<?php
				}
			}
		}

		//get system menu by role
		function get_system_menu_by_role($rid){
			$post_data=$this->select_data($this->tbl[2],"rid=".$rid."","rid","0,100");
			if($post_data !=0){
				foreach($post_data as $val){
					?>
						<li data-opt="<?php echo $val['mid']; ?>" data-mid="<?php echo $val['main_id']; ?>"><a href="#"><i class="fa fa-circle-o"></i> <?php echo $val['mname']; ?></a></li>
					<?php
				}
			}
		}

		// get system user by role
		function get_system_user_by_role($rid){
			$post_data=$this->select_data($this->tbl[0],"rid=".$rid." AND status=1","rid","0,200");
			if($post_data !=0){
				foreach($post_data as $val){
					?>
						<li data-uid="<?php echo $val['uid'];?>"><a href="#"><i class="fa fa-circle-o"></i> <?php echo $val['lgname']; ?></a></li>
					<?php
				}
			}
		}

		// get system user (free user not yet assign role)
		function get_system_user(){
			$post_data=$this->select_data($this->tbl[0],"rid=0 AND status=1","rid","0,200");
			if($post_data !=0){
				foreach($post_data as $val){
					?>
						<li data-uid="<?php echo $val['uid'];?>"><a href="#"><i class="fa fa-circle-o"></i> <?php echo $val['lgname']; ?></a></li>
					<?php
				}
			}
		}

		//assign menu permission to role
		function assign_menu_permission_to_role($roleId,$menuId,$menuName,$mainId,$main){
			$this->insert_data($this->tbl[2],"'".$menuId."','".$roleId."','".$menuName."',0,'".$main."','".$mainId."'");
		}

		// remove menu permission from role
		function remove_menu_permission_from_role($roleId,$menuId){
			$this->delete_data($this->tbl[2],"rid='".$roleId."' AND mid='".$menuId."'");
		}

		// assign role to user
		function assign_role_to_user($rid,$uid){
			$this->update_data($this->tbl[0],"rid='".$rid."'","uid='".$uid."'");
		}

		// remove role from user
		function remove_role_from_user($rid,$uid){
			$this->update_data($this->tbl[0],"rid=0","uid='".$uid."'");
		}
	}
?>