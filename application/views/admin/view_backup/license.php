
<?php include('inc/header.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Software <small>Licenses</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Software Licenses</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <section class="content">
          <div class="row">
              <div class="col-xs-12 text-right">
                  <div class="form-group">
                      <a class="btn btn-primary" href="<?php echo base_url('License/addLicense') ?>"><i class="fa fa-plus"></i> Add License</a>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">All Licenses </h3>
                      <div class="msg" style="color:red;">
                  <?php
                  if($this->session->flashdata('success')){
                      echo $this->session->flashdata('success');
                    }
                    if($this->session->flashdata('error')){
                        echo $this->session->flashdata('error');
                      }

                      ?>
                    </div>
                      <div class="box-tools">
                          <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                              <div class="input-group">
                                <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                <div class="input-group-btn">
                                  <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                </div>
                              </div>
                          </form>
                      </div>
                  </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tr>
                        <th>Manufacturer</th>
                        <th>License Name</th>
                        <th>Product Key</th>

                        <th>Number of Licenses</th>

                        <th>Actions</th>




                      </tr>
                      <?php
                      if(!empty($assets))
                      {
                          foreach($assets as $record)
                          {
                      ?>
                      <tr>

                        <td><?php echo $record->manufacturer ?></td>
                        <td><?php echo $record->license_name ?></td>

                        <td><?php echo $record->product_key ?></td>
                        <td><?php echo $record->number_of_licenses ?></td>

                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'License/edit/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url().'License/delete/'.$record->id; ?>" onclick="return confirm_delete()"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                          }
                      }
                      ?>


                    </table>

                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>
              <div id="pagination">
                <ul class=" list-inline tsc_pagination">

                <!-- Show pagination links -->
                <?php foreach ($links as $link) {
                echo "<li>". $link."</li>";
                } ?>
              </ul>
              </div>

          </div>
      </section>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
