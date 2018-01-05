
<?php include('inc/header.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Asset<small>License</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit License</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <section class="content">
          <div class="row">
              <div class="col-xs-12 text-right">
                  <div class="form-group">
                      <a class="btn" href="<?php echo base_url('License') ?>">View License</a>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Edit License</h3>
                      <div class="msg" style="color:red;">
                    <?php
                    if($this->session->flashdata('success')){
                      echo $this->session->flashdata('success');
                    }
                    if($this->session->flashdata('error')){
                        echo $this->session->flashdata('error');
                      }

                      ?>
                     <?php echo validation_errors(); ?>
                   </div>
                  </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <form action="<?php echo base_url('License/licenseUpdate'); ?>" method="post">
                      <input type="hidden" name="license_id"  value="<?php echo $license->id; ?>" />
                      <table class="table table-hover">

                        <tr>
                          <td>Manufacturer</td><td><input type="text" name="manufacturer" required value="<?php echo $license->manufacturer; ?>"  /></td>
                        </tr>
                        <tr>
                          <td>License Name</td><td><input type="text" name="license_name" required value="<?php echo $license->license_name; ?>" /></td>
                        </tr>

                        <tr>
                          <td>Product Key</td><td><input type="text" name="product_key" required value="<?php echo $license->product_key; ?>" /></td>
                        </tr>

                        <tr>
                          <td>Number of Licenses</td><td><input type="text" name="number_of_licenses" required value="<?php echo $license->number_of_licenses; ?>" /></td>
                        </tr>


                        <tr>
                          <td></td><td><input type="submit" name="submit" value="SAVE" /></td>
                        </tr>
                        <tr>
                          <td></td><td>
                            <div class="msg" style="color:red;"></div></td>
                        </tr>


                      </table>
                    </form>


                  </div><!-- /.box-body -->

                </div><!-- /.box -->
              </div>
          </div>
      </section>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
