<?php include('layout/header.php');?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

	<?php include('layout/header_bar.php');?>
 
	<!-- Left side column. contains the sidebar -->
	<?php include('layout/sidebar.php');?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <?php include('layout/blank.php');?>
	</div>
	<!-- /.content-wrapper -->

	<?php include('layout/footer.php');?>
 
	<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
  
</div>

<!-- ./wrapper -->
<?php include('layout/bottom_js.php');?>

</body>
<script>
  var ind;
  var opt;
  var con;
  var id;
  var num; // use for update status text
  var sData=$('#txt_s');
  var tData=$('#txt_total_data');
  var total_record=$('#txt_total_record');
  var show_record=$('#my-select');
  var userID=$('#txtUserID').val();
  var loginName=$('#txtLgName').val();
  var userPhoto=$('#txtUserPhoto').val();
  var userRole=$('#txtUserRole').val();
  var userStatus=$('#txtStatus').val();
  var tbl=['get-user','get-role','get-assign-role'];
  var frm=['frm-user','frm-role','frm-assign-role'];
  var contentWrapper = $('.content-wrapper');
  var body=$('body');
  var menuPermission='<li data-opt="1000" data-mid="0" data-main="1"><a href="#"><i class="fa fa-circle-o"></i> Admin Tools</a></li><li data-opt="1001" data-mid="0" data-main="1"><a href="#"><i class="fa fa-circle-o"></i> Operations</a></li><li data-opt="0" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Users</a></li><li data-opt="1" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Roles</a></li><li data-opt="2" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Role Assignment</a></li><li data-opt="3" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Owner</a></li><li data-opt="4" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Settings</a></li><li data-opt="5" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Categories</a></li><li data-opt="6" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Unit Types</a></li><li data-opt="7" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Groups</a></li><li data-opt="8" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Assets</a></li><li data-opt="9" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Supliers</a></li>';

  $(document).ready(function(){
    //upload image
    body.on('change','#txt_file',function(){
        var eThis=$(this);
        upload_image(eThis,body);
    });

    // Upload Image function
    function upload_image(eThis,body){
        var frm = eThis.closest('form.upl');
        var frm_data = new FormData(frm[0]);
        $.ajax({
            url:'action/upl.php',
            type:'POST',
            data:frm_data,
            contentType:false,
            cache:false,
            processData:false,
            dataType:"json",
            success:function(data){
                $('.img-box').css({'background-image':'url("upl-img/'+data.photoName+'")'});
                $('#txt_photo').val(data.photoName);
            }
        });
    }

    // clear image
    body.on('click','.clr-img',function(){
        $('.img-box').css({'background-image':'url("images/download.jpg")'});
        $('#txt_photo').val('');
    });
    // Loading Function
    function loading(){
        var popup='<div class="popup"><div style="margin: auto;width: 200px;margin-top:10%;font-size: 200px;color: white;"><img src="images/loading.gif"></div></div>';
        body.append(popup);
    }

    // Change Display Records
    $('#my-select').on('change',function(){
      var eThis=$(this);
      tData.val(parseInt(total_record.text())-parseInt(show_record.val()));
      loading();
      $.ajax({
          url:'action/'+tbl[opt]+'.php',
          type:'POST',
          data:{s:0,con:con,opt:opt,show_record:show_record.val()},
          cache:false,
          success:function(data){
              $('#tblData').html(data);
              $('.popup').remove(); //remove loading
          }
      });
    });

    // Next Button
    $('#btn_next').on('click', function(){
      if(tData.val()<=0){
          alert('No record next..!');
          return;
      }
      tData.val(parseInt(tData.val())-parseInt(show_record.val()));
      sData.val(parseInt(sData.val())+parseInt(show_record.val()));
      loading();
      $.ajax({
          url:'action/'+tbl[opt]+'.php',
          type:'POST',
          data:{s:sData.val(),con:con,opt:opt,show_record:show_record.val()},
          cache:false,
          success:function(data){
              $('#tblData').html(data);
              $('.popup').remove(); //remove loading
          }
      });
    });

    // Back Button
    $('#btn_back').on('click', function(){
      if(sData.val()<=0){
          alert('No record back..!');
          return;
      }
      tData.val(parseInt(tData.val())+parseInt(show_record.val()));
      sData.val(parseInt(sData.val())-parseInt(show_record.val()));
      loading();
      $.ajax({
          url:'action/'+tbl[opt]+'.php',
          type:'POST',
          data:{s:sData.val(),con:con,opt:opt,show_record:show_record.val()},
          cache:false,
          success:function(data){
              $('#tblData').html(data);
              $('.popup').remove(); //remove loading
          }
      });
    });

    // function search data
    function search_data(){
      var findText=$('#txt_find_text').val();

      if (opt==0){ //user
          con="users.uid>0 AND users.status=1 AND users.lname like '%"+findText+"%' OR users.fname like '%"+findText+"%'";
      }else if(opt==1){ //role
          con="roles.rid>0 AND roles.status=1 AND roles.rname like '%"+findText+"%' OR roles.note like '%"+findText+"%'";
      }else if(opt==2){ //role assignment
          con="";
      }else if(opt==3){ //owner
          con="tbl_company_profile.vi_des_en like '%"+findText+"%'";
      }else if(opt==4){ //setting
          con="tbl_management_team.position_en like '%"+findText+"%'";
      }else if(opt==5){ //category
          con="tbl_product_service.type_link_en like '%"+findText+"%'";
      }else if(opt==6){ //unit type 
          con="tbl_job_opportunity.close_date like '%"+findText+"%'";
      }else if(opt==7){ //group
          con="tbl_photo_gallery.created_at like '%"+findText+"%'";
      }else if(opt==8){ //asset  
          con="tbl_public_holiday.title_en like '%"+findText+"%'";
      }else if(opt==9){ //supploer
          con="tbl_news.created_at like '%"+findText+"%'";
      }
      loading();
      $.ajax({
          type:'POST',
          url:'action/'+tbl[opt]+'.php',
          data:{s:0,con:con,opt:opt,show_record:show_record.val()},
          cache:false,
          success:function(data){
              $('#tblData').html(data);
              $('.popup').remove(); //remove loading
          }
      });
      // count data after find
      $.ajax({
          type:'POST',
          url:'action/countdata.php',
          data:{opt:opt,con:con},// variable for pagination
          cache:false,
          dataType:"json",
          success:function(data){
              tData.val(data.total-parseInt(show_record.val()));
              sData.val(0);
              total_record.text(data.total);//Total Record at listing page
          }
      });
    }

    // Search Data with Enter Key on text box search
    var input = document.getElementById("txt_find_text");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            search_data();
        }
    });

    // Search Data By Click Button Search
    $('#btn_find').on('click', function(){
      search_data();
    });

    // Listing Page View
    $('.mainMenu').on('click','ul li',function(){
      var eThis=$(this);
      opt=eThis.data('opt');
      contentWrapper.find('.content-header').show();
      contentWrapper.find('.content').show();
      contentWrapper.find('.content-header .navigate').text(eThis.text());
      contentWrapper.find('.content .box-title').text(eThis.text() + ' Listing');
      contentWrapper.find('.mainNavigation').show();
      $('#btn-add-new').show();
      contentWrapper.find('.searchBox').show();
      con="status=1";
      if(opt==0){ // user
        id="users.uid";
        con="users.uid>0"; 
      }else if(opt==1){ // role
        id="roles.rid";
        con="roles.rid>0";
      }else if(opt==2){ // role assignment
        con="status=1";
        $('#btn-add-new').hide();
        contentWrapper.find('.searchBox').hide();
        contentWrapper.find('.mainNavigation').hide();
        $('#tblData').html('');
      }else if(opt==3){ // owner 
        con="status=1";
        $('#btn-add-new').hide();
        contentWrapper.find('.searchBox').hide();
        contentWrapper.find('.mainNavigation').hide();
        $('#tblData').html('');
      }else if(opt==4){ // setting
        con="status=1";
        $('#btn-add-new').hide();
        contentWrapper.find('.searchBox').hide();
        contentWrapper.find('.mainNavigation').hide();
        $('#tblData').html('');
      }else if(opt==5){ // category
        con="status=1";
      }else if(opt==6){ // unit type
        con="status=1";
      }else if(opt==7){ // group
        con="status=1";
      }else if(opt==8){ // asset
        con="status=1";
      }else if(opt==9){ // supplier
        con="status=1";
      }
      loading();
      $.ajax({
        url:'action/'+tbl[opt]+'.php',
        type:'POST',
        data:{s:0,con:con,opt:opt,show_record:show_record.val()},
        cache:false,
        success:function(data)
        {
          $('#tblData').html(data);
          $('.popup').remove(); //remove loading
        }
      });

      // //count data
      $.ajax({
          url:'action/countdata.php',
          type:'POST',
          data:{opt:opt,con:con},// variable for pagination
          cache:false,
          dataType:"json",
          success:function(data){
              tData.val(data.total-parseInt(show_record.val()));
              sData.val(0);
              total_record.text(data.total);//Total Record at listing page
          }
      });
    });

    // Add New Button Click
    $('#btn-add-new').on('click', function(){
      var popup='<div class="popup-form"></div>';
      loading();
      body.append(popup);
      $.ajax({
          type:'POST',
          url:'form/'+frm[opt]+'.php',
          data:{opt:opt},
          cache:false,
          success:function(data){
              $('.popup-form').append(data);
              // Get AutoID
              $.ajax({
                  type:'POST',
                  url:'action/get-auto-id.php',
                  data:{opt:opt,id:id},
                  cache:false,
                  dataType:'json',
                  success:function(data){
                      $('#txt_id').val(data.id);
                      $('#txt_od').val(data.id);
                  }
              });
              body.find('input').attr({"autocomplete":"off"});
              $('.popup').remove(); //remove loading
          }
      });
    });

    // Close button click to remove form popup form
    body.on('click','.btn-close', function(){
        $('.popup-form').remove();
    });

    // Post Data
    body.on('click','#btn-post', function(){
        var eThis=$(this);
        post_data_to_server(eThis,body);
    });

    function post_data_to_server(eThis,body){
      if(opt==0){ // user
        save_user(eThis,body);
      }else if(opt==1){ // role
        save_role(eThis,body); 
      }else if(opt==2){ // role assignment

      }else if(opt==3){ // owner
          
      }else if(opt==4){ // setting
          
      }else if(opt==5){ // category
          
      }else if(opt==6){ // unit type 
          
      }else if(opt==7){ // group
          
      }else if(opt==8){ // asset/item 
          
      }else if(opt==9){ // supplier
          
      }else{
        return 0;
      }
    }

    // Save New User
    function save_user(eThis,body){
      var imgBox=$('.img-box');
      var edit_id=$('#txt_edit_id');
      var id=$('#txt_id');
      var od=$('#txt_od'); 
      var fname=$('#txt_fname');
      var lname=$('#txt_lname');
      var login_name=$('#txt_login_name');
      var password=$('#txt_password');
      var note=$('#txt_note');
      var photo=$('#txt_photo');
      var status=$('#txt_status option:selected').val();
      var status_text=$('#txt_status option:selected').html();
      if(fname.val()==''){
        alert('Please Enter First Name..!');
        fname.focus();
        return;
      }
      if(lname.val()==''){
        alert('Please Enter Last Name..!');
        lname.focus();
        return;
      }
      if(login_name.val()==''){
        alert('Please Enter Login Name..!');
        login_name.focus();
        return;
      }
 
      $.ajax({
          type:'POST',
          url:'action/user/save-user.php',
          data:{
              opt:opt,
              id:edit_id.val(),
              od:od.val(),
              fname:fname.val(),
              lname:lname.val(),
              login_name:login_name.val(),
              password:password.val(),
              photo:photo.val(),
              note:note.val(),
              status:status
          },
          cache:false,
          dataType:"json",
          success:function(data){
            if(data.id=='edit'){ // edit data
                  $('#tblData').find('tr:eq('+ind+') td:eq(1)').text(lname.val());
                  $('#tblData').find('tr:eq('+ind+') td:eq(2)').text(fname.val());
                  $('#tblData').find('tr:eq('+ind+') td:eq(3)').text(login_name.val());
                  $('#tblData').find('tr:eq('+ind+') td:eq(4) input').val(photo.val());
                  $('#tblData').find('tr:eq('+ind+') td:eq(4) img').attr("src","upl-img/"+photo.val()+"");
                  $('#tblData').find('tr:eq('+ind+') td:eq(6)').text(status_text);
                  body.find('.popup-form').remove();
            }else{ // save data    
                if(data.dpl==1){
                    alert(data.messageStr);
                }else{
                    alert(data.messageStr);
                    var tr='<tr> <td class="text-center">'+id.val()+'</td> <td>'+data.fname+'</td> <td>'+data.lname+'</td> <td>'+data.login_name+'</td> <td><input type="hidden"  value="'+data.photo+'"><img src="upl-img/'+data.photo+'" style="width: 50px;height: 50px;border-radius: 50%;border:1px solid #eee;"></td> <td></td> <td>'+status_text+'</td> <td class="text-center"> <span class="text-info btn-edit" title="View"><i class="fa fa-eye" style="font-size: 20px;"></i></span>&nbsp;&nbsp;<span class="text-danger btn-disable" title="Disable"><i class="fa fa-trash" style="font-size: 18px;"></i></span> </td></tr>';
                    $('#tblData').find('tr:eq(0)').after(tr);
                    id.val(data.id+1);
                    od.val(data.id+1);
                    fname.val('');
                    lname.val('');
                    login_name.val('');
                    note.val('');
                    photo.val('');
                    imgBox.css({'background-image': 'url("images/download.jpg")'});  
                }               
            }
          }
      });
    }

    // Save New Role
    function save_role(eThis,body){
      var edit_id=$('#txt_edit_id');
      var id=$('#txt_id');
      var od=$('#txt_od'); 
      var rname=$('#txt_rname');
      var note=$('#txt_note');
      var status=$('#txt_status option:selected').val();
      var status_text=$('#txt_status option:selected').html();
      if(rname.val()==''){
        alert('Please Enter Role Name..!');
        rname.focus();
        return;
      }
      $.ajax({
          type:'POST',
          url:'action/user/save-role.php',
          data:{
              opt:opt,
              id:edit_id.val(),
              od:od.val(),
              rname:rname.val(),
              note:note.val(),
              status:status
          },
          cache:false,
          dataType:"json",
          success:function(data){
            if(data.id=='edit'){ // edit data
                  $('#tblData').find('tr:eq('+ind+') td:eq(1)').text(rname.val());
                  $('#tblData').find('tr:eq('+ind+') td:eq(2)').text(note.val());
                  $('#tblData').find('tr:eq('+ind+') td:eq(3)').text(status_text);
                  body.find('.popup-form').remove();
            }else{ // save data    
                if(data.dpl==1){
                    alert(data.messageStr);
                }else{
                    alert(data.messageStr);
                    var tr='<tr> <td class="text-center">'+id.val()+'</td> <td>'+data.rname+'</td> <td>'+data.note+'</td> <td>'+status_text+'</td> <td class="text-center"> <span class="text-info btn-edit" title="View"><i class="fa fa-eye" style="font-size: 20px;"></i></span>&nbsp;&nbsp;<span class="text-danger btn-disable" title="Disable"><i class="fa fa-trash" style="font-size: 18px;"></i></span> </td></tr>';
                    $('#tblData').find('tr:eq(0)').after(tr);
                    id.val(data.id+1);
                    od.val(data.id+1);
                    rname.val('');
                    note.val(''); 
                }               
            }
          }
      });
    }

    /*View-Edit Data*/
    body.on('click','.btn-edit',function(){
        var eThis=$(this);
        edit_data_to_server(eThis,body);
    });

    function edit_data_to_server(eThis,body){
      if(opt==0){ // user
        get_edit_user(eThis,body);
      }else if(opt==1){ // role
        get_edit_role(eThis,body); 
      }else if(opt==2){ // role assignment

      }else if(opt==3){ // owner
          
      }else if(opt==4){ // setting
          
      }else if(opt==5){ // category
          
      }else if(opt==6){ // unit type 
          
      }else if(opt==7){ // group
          
      }else if(opt==8){ // asset/item 
          
      }else if(opt==9){ // supplier
          
      }else{
        return 0;
      }
    }

    // Get Edit User
    function get_edit_user(eThis,body){
      var tr=eThis.parents('tr');
      ind=tr.index();
      var id=tr.find('td:eq(0)').text();
      var pop='<div class="popup-form"></div>';
      body.append(pop);
      $.ajax({
          url:'form/'+frm[opt]+'.php',
          type:'POST',
          data:{},
          cache:false,
          success:function(data){
              $('.popup-form').append(data);
                  $.ajax({
                      url:'action/user/get-user-edit.php',
                      type:'POST',
                      data:{opt:opt,id:id},
                      cache:false,
                      dataType:'json',
                      success:function(data){
                          $('#txt_id').val(id);
                          $('#txt_edit_id').val(id);
                          $('#txt_od').val(data.od);
                          $('#txt_fname').val(data.fname);
                          $('#txt_lname').val(data.lname);
                          $('#txt_login_name').val(data.login_name);
                          $('#txt_password').val(data.password);
                          $('#txt_note').val(data.note);
                          $('#txt_photo').val(data.photo);
                          $('.img-box').css({'background-image':'url("upl-img/'+data.photo+'")'});
                          $('#txt_status').val(data.status); 
                      }
                  });           
          }       
      });
    }

    // Get Edit Role
    function get_edit_role(eThis,body){
      var tr=eThis.parents('tr');
      ind=tr.index();
      var id=tr.find('td:eq(0)').text();
      var pop='<div class="popup-form"></div>';
      body.append(pop);
      $.ajax({
          url:'form/'+frm[opt]+'.php',
          type:'POST',
          data:{},
          cache:false,
          success:function(data){
              $('.popup-form').append(data);
                  $.ajax({
                      url:'action/user/get-role-edit.php',
                      type:'POST',
                      data:{opt:opt,id:id},
                      cache:false,
                      dataType:'json',
                      success:function(data){
                          $('#txt_id').val(id);
                          $('#txt_edit_id').val(id);
                          $('#txt_od').val(data.od);
                          $('#txt_rname').val(data.rname);
                          $('#txt_note').val(data.note);
                          $('#txt_status').val(data.status); 
                      }
                  });           
          }       
      });
    } 

    // Disable Data
    body.on('click', '.btn-disable', function(){
      var eThis=$(this);
      disable_data(eThis,body);
    });

    // Disable Data
    body.on('click', '.btn-delete', function(){
      var eThis=$(this);
      delete_data(eThis,body)
    });

    // Disable Data
    function disable_data(eThis,body){
      var tr=eThis.parents('tr');
      ind=tr.index();
      var field=id+'='+tr.find('td:eq(0)').text();
      loading();
      $.ajax({
          url:'action/disable-data.php',
          type:'POST',
          data:{opt:opt,id:field},
          cache:false,
          dataType:'json',
          success:function(data){
              if(opt==0){ // user
                num = 6;
              }else if(opt==1){ // role
                num = 3;
              }else if(opt==2){ // role assignment
                
              }else if(opt==3){ // owner
                
              }else if(opt==4){ // setting
                
              }else if(opt==5){ // category
                
              }else if(opt==6){ // unit type
                
              }else if(opt==7){ // group
                
              }else if(opt==8){ // asset
                
              }else if(opt==9){ // supplier
                
              }
              $('#tblData').find('tr:eq('+ind+') td:eq('+num+')').text(data.status);
              $('.popup').remove();
          }
      }); 
    }

    // Delete Data
    function delete_data(eThis,body){
      var tr=eThis.parents('tr');
      ind=tr.index();
      var field=id+'='+tr.find('td:eq(0)').text();
      loading();
      $.ajax({
          url:'action/delete-data.php',
          type:'POST',
          data:{opt:opt,id:field},
          cache:false,
          dataType:'json',
          success:function(data){
              if(opt==0){ // user
                num = 6;
              }else if(opt==1){ // role
                num = 3;
              }else if(opt==2){ // role assignment
                
              }else if(opt==3){ // owner
                
              }else if(opt==4){ // setting
                
              }else if(opt==5){ // category
                
              }else if(opt==6){ // unit type
                
              }else if(opt==7){ // group
                
              }else if(opt==8){ // asset
                
              }else if(opt==9){ // supplier
                
              }
              $('#tblData').find('tr:eq('+ind+') td:eq('+num+')').text(data.status);
              $('.popup').remove();
          }
      });  
    }

    // select menu avaliable for role
    body.on('change','#txt_role',function(){
      $('.permission').find('.systemMenu').html(menuPermission);
      var roleId=$(this).val();
      if (roleId==0){
        $('.permission').find('.systemMenu').html('');
        $('.permission').find('.menuInRole').html(''); 
        return;
      }
      loading();
      $.ajax({
        url:'action/get-permission.php',
        type:'POST',
        data:{rid:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.menuInRole').html(data);
          var li1=$('.systemMenu').find('li');
          var li2=$('.menuInRole').find('li');
          for(i=0;i<li2.length;i++){
            for(x=0;x<li1.length;x++){
              if(li2.eq(i).text()==li1.eq(x).text()){
                li1.eq(x).remove();
              }
            }
          }
          $('.popup').remove(); //remove loading
        }
      });     
    });

    // add menu permission to role
    body.on('click','.permission .systemMenu li',function(){
      var menuInRole=$('.menuInRole');
      var eThis=$(this);
      var menuId=eThis.data('opt');
      var mainId=eThis.data('mid');
      var main=eThis.data('main');
      var menuName=eThis.text().trim();
      var roleId=$('.permission').find('#txt_role').val();
      loading();
      $.ajax({
        url:'action/add-permission.php',
        type:'POST',
        data:{menuId:menuId,roleId:roleId,menuName:menuName,mainId:mainId,main:main},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.menuInRole').append(eThis);
          $('.popup').remove(); //remove loading 
        }
      });
    });

    //remove menu permission from role
    body.on('click','.permission .menuInRole li',function(){
      var systemMenu=$('.systemMenu');
      var eThis=$(this);
      var menuId=eThis.data('opt');
      var mainId=eThis.data('mid');
      var main=eThis.data('main');
      var menuName=eThis.text().trim();
      var roleId=$('.permission').find('#txt_role').val();
      loading();
      $.ajax({
        url:'action/remove-permission.php',
        type:'POST',
        data:{menuId:menuId,roleId:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.systemMenu').append(eThis); 
          $('.popup').remove(); //remove loading
        }
      });
    });

    // select system user by role
    body.on('change', '#txt_role1', function(){
      var roleId=$(this).val();
      if(roleId==0){
        $('.permission').find('.userInRole').html(''); 
        return;
      }
      loading();
      $.ajax({
        url:'action/get-system-user-by-role.php',
        type:'POST',
        data:{rid:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.userInRole').html(data);
          $('.popup').remove(); //remove loading
        }
      }); 
    });

    // assign role to user
    body.on('click','.permission .systemUser li',function(){
      var userInRole=$('.userInRole');
      var eThis=$(this);
      var userId=eThis.data('uid');
      var roleId=$('.permission').find('#txt_role1').val();
      if (roleId==0){
        alert("please select role first if you want to assign.");
        return;
      }
      loading();
      $.ajax({
        url:'action/assign-role-to-user.php',
        type:'POST',
        data:{uid:userId,rid:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.userInRole').append(eThis); 
          $('.popup').remove(); //remove loading
        }
      });
    });

    // remove role from user
    body.on('click','.permission .userInRole li',function(){
      var systemuser=$('.systemUser');
      var eThis=$(this);
      var userId=eThis.data('uid');
      var roleId=$('.permission').find('#txt_role1').val();
      loading();
      $.ajax({
        url:'action/remove-role-from-user.php',
        type:'POST',
        data:{uid:userId,rid:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.systemUser').append(eThis); 
          $('.popup').remove(); //remove loading
        }
      });
    });

  });
</script>
</html>
