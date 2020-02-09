 <?php
  include('../db/role-assignment-class.php');
  $pk = new RoleAssignment;
?> 
<div class="box-body permission">
    <div class="col-md-12">
      <div class="col-md-1"></div>
      <div class="col-md-10" style="padding: 2px;">
        <p>Assign Menus For Role</p>
        <div class="form-group">
          <label>Select Role</label>
          <select class="form-control" id="txt_role">
            <?php $pk->get_role_to_select();?>
          </select>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>

    <div class="col-md-1"></div>

    <div class="col-md-5">
      <div class="box box-solid" style="border:1px solid #eee;border-bottom: none;">
        <div class="box-header with-border" style="border-top-left-radius: 2px;border-top-right-radius: 3px;">
          <i class="fa fa-text-width"></i>

          <h3 class="box-title">System Menu</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul style="list-style: none;" class="systemMenu">
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-5">
      <div class="box box-solid" style="border:1px solid #eee;border-bottom: none;">
        <div class="box-header with-border" style="border-top-left-radius: 2px;border-top-right-radius: 3px;">
          <i class="fa fa-text-width"></i>

          <h3 class="box-title">Menu In Roles</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul style="list-style: none;" class="menuInRole">
            
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-1"></div>







    <div class="col-md-12">
      <div class="col-md-1"></div>
      <div class="col-md-10" style="padding: 2px;">
        <p>Assign Users For Role</p>
        <div class="form-group">
          <label>Select Role</label>
          <select class="form-control" id="txt_role1">
            <?php $pk->get_role_to_select();?>
          </select>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
    
    <div class="col-md-1"></div>

    <div class="col-md-5">
      <div class="box box-solid" style="border:1px solid #eee;border-bottom: none;">
        <div class="box-header with-border" style="border-top-left-radius: 2px;border-top-right-radius: 3px;">
          <i class="fa fa-text-width"></i>

          <h3 class="box-title">System User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul style="list-style: none;" class="systemUser">
            <?php $pk->get_system_user(); ?>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-5">
      <div class="box box-solid" style="border:1px solid #eee;border-bottom: none;">
        <div class="box-header with-border" style="border-top-left-radius: 2px;border-top-right-radius: 3px;">
          <i class="fa fa-text-width"></i>

          <h3 class="box-title">User In Roles</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul style="list-style: none;" class="userInRole">
            
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-1"></div>
</div>