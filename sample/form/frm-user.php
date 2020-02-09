<div class="col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 frm-popup" style="">
    <form class="upl" method="post">
	    <div class="head">
	      <span class="frm-title"><b>Register New User</b></span>
	      <i class="fa fa-times btn-close" title="Close"></i>
	    </div>
	    <div class="frm-body">

			<input type="hidden" name="txt_edit_id" id="txt_edit_id" value="0">
			<label style="width:25%;float: left;">ID<sup>*</sup></label>
			<input style="width:10%;float: left;" type="text" class="frm-control" name="txt_id" id="txt_id" value="0" readonly>
			<label></label>

			<label style="width: 25%;float: left;">First Name <sup>*</sup></label>
			<input style="width:75%;float: left;" type="text" class="frm-control" name="txt_fname" id="txt_fname" placeholder="Enter First Name" required>
			<label></label>

			<label style="width: 25%;float: left;">Last Name <sup>*</sup></label>
			<input style="width:75%;float: left;" type="text" class="frm-control" name="txt_lname" id="txt_lname" placeholder="Enter Last Name" required>
			<label></label>

			<label style="width: 25%;float: left;">Loing Name <sup>*</sup></label>
			<input style="width:75%;float: left;" type="text" class="frm-control" name="txt_login_name" id="txt_login_name" placeholder="Enter Login Name" required>
			<label></label>

			<label style="width: 25%;float: left;">Password <sup>*</sup></label>
			<div style="width: 75%;float: left;">
				<label class="text-red">Auto Generate By System Policies</label>
				<input style="width:100%;float: left;" type="password" class="frm-control" name="txt_password" id="txt_password" value="Kc@123456" required readonly>
			</div>
			<label></label>

			<label style="width: 25%;float: left;">Note <sup>*</sup></label>
			<div style="width: 75%;float: left;">
			  	<textarea class="frm-control" name="txt_note" id="txt_note" rows="5" placeholder="Enter Note" required></textarea>
			</div>
			<label></label>

			<label style="width: 25%;float: left;">Photo<sup>*</sup></label>
			<div style="width: 75%;float: left;">
			  <div style="border: 1px solid rgba(197,214,222,.7);float: left;font-size: 12px;">
			      <div style="width: 160px;height: 160px;border-bottom: 1px solid #eee;">
			          <div class="img-box">
			              <input type="file" name="txt_file" id="txt_file" class="form-control" title="Please Select File">
			          </div>
			          <input type="hidden" name="txt_photo" id="txt_photo" class="form-control">
			          <label></label>
			      </div>
			      <div style="padding: 5px;background-color: #eee;">
			          <span>
			              Click To Start
			              <br><i>Image dimesion must be free with <br>.jpg or .png type</i>
			          </span>
			      </div>
			      <span class="btn btn-secondary btn-sm clr-img" style="margin: 5px;">Clear</span>
			  </div> 
			</div>
			<label></label>

			<label style="width: 25%;float: left;">Status <sup>*</sup></label>
            <div style="width: 10%;float: left;">
                <select class="frm-control" name="txt_status" id="txt_status">
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
            </div>
            <label></label>

			<label style="width: 25%;float: left;">Data Oder <sup>*</sup></label>
			<input style="width:10%;float: left;" type="text" class="frm-control" name="txt_od" id="txt_od">
			<label></label>
	    </div>
	    <div class="frm-footer" style="">
	      <a name="btn-post" id="btn-post" class="btn btn-success" style="color:white;width: 100%;"><i class="fa fa-database"></i>&nbsp;Save Data</a>
	    </div>
    </form>
</div>