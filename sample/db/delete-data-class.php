<?php
    include('database.php');

	class DeleteData extends Db{
		// Get Connection
		function __construct(){
			$this->connect();
        } 
        
        // Delete Data
        function delete_data1($opt,$id){
            // $this->delete_data($this->tbl[$opt],"id='".$id."'");
            $this->delete_data($this->tbl[$opt],$id);
            $msg['messageStr'] = 'Data was deleted.';
            $msg['status'] = "Inactive";
            echo json_encode($msg);
        }

        // Disable Data
        function disable_data1($opt,$id){
            $this->disable_data($this->tbl[$opt],"status=0",$id);
            $msg['messageStr'] = 'Data was disable.';
            $msg['status'] = "Inactive";
            echo json_encode($msg);
        }
    }

?>