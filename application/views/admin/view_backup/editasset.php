
<?php include('inc/header.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Asset<small>Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Asset</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <section class="content">
          <div class="row">
              <div class="col-xs-12 text-right">
                  <div class="form-group">
                      <a class="btn" href="<?php echo base_url('Asset/') ?>">View assets</a>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Add Asset</h3>
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



                          <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">Descriptions</a></li>
                      <li><a data-toggle="tab" href="#menu1">Descriptions</a></li>
                      <li><a data-toggle="tab" href="#menu2">Descriptions</a></li>


                    </ul>
  <form action="<?php echo base_url('asset/assetUpdate'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $assets->id; ?>">
                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                      <table class="table table-hover">
                      <tr>
                      <td>Asset ID</td><td><input type="text" name="asset_id" value="<?php echo $assets->asset_id; ?>"  /></td>
                      </tr>
                      <tr>
                      <td>Manufacturer</td><td><input type="text" name="brand" value="<?php echo $assets->manufacturer; ?>"  /></td>
                      </tr>
                      <tr>
                      <td>Hostname</td><td><input type="text" name="hostname" value="<?php echo $assets->hostname; ?>"  /></td>
                      </tr>
                      <tr>
                      <td>Serial number</td><td><input type="text" name="serial_number" value="<?php echo $assets->serial_number; ?>"  /></td>
                      </tr>
                      <tr>
                      <td>SAP AssetID</td><td><input type="text" name="sap_asset_id" value="<?php echo $assets->sap_asset_id; ?>"  /></td>
                      </tr>
                      <tr>
                      <td>Model Number</td><td><input type="text" name="model_number" value="<?php echo $assets->model_number; ?>"  /></td>
                      </tr>
                      <tr>
                      <td>Asset Type</td><td><input type="text" name="asset_type" value="<?php echo $assets->asset_type; ?>"  /></td>
                      </tr>
                      <tr>
                      <td>Location</td><td><input type="text" name="location" value="<?php echo $assets->location; ?>" /></td>
                      </tr>
                      <tr>
                      <td>Department</td><td><input type="text" name="department" value="<?php echo $assets->department; ?>"  /></td>
                      </tr>

                      </table>
                      </div>
                      <div id="menu1" class="tab-pane fade">
                        <table class="table table-hover">

                        <tr>
                        <td>Assigned to/Owner</td><td><input type="text" name="assigned_to" value="<?php echo $assets->assigned_to; ?>"  /></td>
                        </tr>
                        <tr>
                        <td>Assigned date</td><td><input type="text" name="assigned_date" value="<?php echo $assets->assigned_date; ?>" /></td>
                        </tr>
                        <tr>
                        <td>Notes</td><td><input type="text" name="notes" value="<?php echo $assets->notes; ?>" /></td>
                        </tr>
                        <tr>
                        <td>Licenses</td><td>
                            <select name="licenses[]" id="example-getting-started" multiple="multiple">
                          <?php
                          $mul_selection = unserialize($assets->licenses);
                          foreach ($mul_selection as $value) {
                            $selected=$value;
                            ?>
                              <option selected value="<?php echo $value;  ?>"><?php echo $value;  ?></option>
                            <?php
}
                           ?>




            </select>
                        </td>
                        </tr>
                        <tr>
                        <td>IP Address</td><td><input type="text" name="ip_address" value="<?php echo $assets->ip_address; ?>"  /></td>
                        </tr>
                        <tr>
                        <td>MAC Address</td><td><input type="text" name="mac_address" value="<?php echo $assets->mac_address; ?>"  /></td>
                        </tr>
                        <tr>
                        <td>Supplier</td><td><input type="text" name="supplier" value="<?php echo $assets->supplier; ?>"  /></td>
                        </tr>
                        <tr>
                        <td>Purchase Date</td><td><input type="text" name="purchase_date" value="<?php echo $assets->purchase_date; ?>"  /></td>
                        </tr>
                        <tr>
                        <td>Warranty Expiry Date</td><td><input type="text" name="warranty_expiry_date" value="<?php echo $assets->warranty_expiry_date; ?>"  /></td>
                        </tr>

                        </table>
                      </div>
                      <div id="menu2" class="tab-pane fade">
                        <table class="table table-hover">




                        <tr>
                        <td>Managed by</td><td><input type="text" name="managed_by" value="<?php echo $assets->managed_by; ?>"  /></td>
                        </tr>
                        <tr>
                        <td>Asset Lifetime</td><td><input type="text" name="asset_lifetime" value="<?php echo $assets->asset_lifetime; ?>"  /></td>
                        </tr>

                        <tr>
                        <td>Last modified date</td><td><input type="text" name="last_modified_date" value="<?php echo $assets->last_modified_date; ?>"  /></td>
                        </tr>
                        <tr>
                        <td>Last modified user</td><td><input type="text" name="last_modified_user" value="<?php echo $assets->last_modified_user; ?>"  /></td>
                        </tr>
                        </table>
                      </div>
                    </div>
                    <table class="table table-hover pull-right">
                      <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td class="center-block"><input type="submit" name="save " value="SAVE"></td>
                      </tr>
                    </table>
                  </form>
                </div><!-- /.box -->
              </div>
          </div>
      </section>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
