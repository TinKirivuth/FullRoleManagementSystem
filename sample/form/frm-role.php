<div class="col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 frm-popup" style="">
    <form class="upl" method="post">
	    <div class="head">
	      <span class="frm-title"><b>Register New Role</b></span>
	      <i class="fa fa-times btn-close" title="Close"></i>
	    </div>
	    <div class="frm-body">

			<input type="hidden" name="txt_edit_id" id="txt_edit_id" value="0">
			<label style="width:25%;float: left;">ID<sup>*</sup></label>
			<input style="width:10%;float: left;" type="text" class="frm-control" name="txt_id" id="txt_id" value="0" readonly>
			<label></label>	      

			<label style="width: 25%;float: left;">Role Name <sup>*</sup></label>
			<input style="width:75%;float: left;" type="text" class="frm-control" name="txt_rname" id="txt_rname" placeholder="Enter Role Name" required>
			<label></label>

			<label style="width: 25%;float: left;">Note <sup>*</sup></label>
			<div style="width: 75%;float: left;">
	          	<textarea class="frm-control" name="txt_note" id="txt_note" rows="5" placeholder="Enter Note" required></textarea>
	      	</div>
			<label></label>

	      	<label style="width: 25%;float: left;">Data Oder <sup>*</sup></label>
			<input style="width:10%;float: left;" type="text" class="frm-control" name="txt_od" id="txt_od">
			<label></label>

			<label style="width: 25%;float: left;">Status <sup>*</sup></label>
            <div style="width: 10%;float: left;">
                <select class="frm-control" name="txt_status" id="txt_status">
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
            </div>
            <label></label>

	    
	     
	     
	    </div>
	    <div class="frm-footer" style="">
	      <a name="btn-post" id="btn-post" class="btn btn-success" style="color:white;width: 100%;"><i class="fa fa-database"></i>&nbsp;Save Data</a>
	    </div>
    </form>
</div>