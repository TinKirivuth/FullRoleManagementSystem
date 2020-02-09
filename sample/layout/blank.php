<!-- Content Header (Page header) -->
    <section class="content-header" style="display: none;">
      <h1 style="padding-top: 10px;">
        Dashboard | 
        <small class="navigate"></small>
      </h1>
      <ol class="breadcrumb" >
          <a href="#" class="btn btn-default pull-right" id="btn-add-new"><i class="fa fa-plus"></i> Add New</a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="display: none;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Items Listing</h3>
              <div class="box-tools searchBox">
                <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
                  <input type="text" name="txt_find_text" id="txt_find_text" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <span class="btn btn-default" id="btn_find"><i class="fa fa-search"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover table-bordered table-striped" id="tblData"></table>
              <!--  -->


              



            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <div class="box-tools mainNavigation">
                <label>
                  Display: 
                  <select name="my-select" id="my-select" class="my-select">
                    <option value="1">1</option>
                    <option value="100">100</option>
                    <option value="all">ALL</option>
                  </select>
                </label> 
                <b> | </b> 
                <label>Total Records: <span name="txt_total_record" id="txt_total_record"></span></label>

                <ul class="pagination pagination-sm no-margin pull-right">
                  <li id="btn_back" name="btn_back"><a href="#">❮</a></li>
                  <!-- &laquo; -->
                  <!-- &raquo; -->
                  <li id="btn_next" name="btn_next"><a href="#">❯</a></li>
                </ul>
              </div>
            </div>

          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
<!-- /.content -->