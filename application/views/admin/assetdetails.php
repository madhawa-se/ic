
<?php include('inc/header.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Assets<small>Detail View</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Assets</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="row">
              <div class="col-xs-12 text-right">
                  <div class="form-group">
                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'asset/assetEdit/'.$assets->id; ?>"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url().'asset/assetDelete/'.$assets->id; ?>" onclick="return confirm_delete()"><i class="fa fa-trash"></i></a>
                  </div>
              </div>
          </div>



      <section class="main-content">
        <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Asset Description</a></li>
    <li><a data-toggle="tab" href="#menu1">Asset Description</a></li>
    <li><a data-toggle="tab" href="#menu2">Asset Description</a></li>


  </ul>

  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">
    <table class="table table-hover">
      <tr>
        <th>Asset ID</th>
        <th>Host Name</th>
        <th>Serial number</th>
        <th>SAP AssetID</th>
<th>Manufacturer</th>
<th>Model Number</th>
<th>Asset Type</th>
  <th>Location</th>

      </tr>
      <?php
      if(!empty($assets))
      {

      ?>
      <tr>
        <td><?php  echo $assets->asset_id ?></td>
          <td><?php  echo $assets->hostname ?></td>
        <td><?php  echo $assets->serial_number ?></td>
          <td><?php  echo $assets->sap_asset_id ?></td>
<td><?php  echo $assets->manufacturer ?></td>
<td><?php  echo $assets->model_number ?></td>
<td><?php  echo $assets->asset_type ?></td>
  <td><?php  echo $assets->location ?></td>
      </tr>
      <?php

      }
      ?>
    </table>


    </div>
    <div id="menu1" class="tab-pane fade">
      <table class="table table-hover">

        <tr>

          <th>Department</th>
          <th>Assigned to/Owner</th>
          <th>Assigned date</th>
    <th>Licenses</th>
    <th>IP Address</th>
    <th>MAC Address</th>
  <th>Supplier</th>
  <th>Purchase Date</th>
        </tr>
        <?php
        if(!empty($assets))
        {

        ?>
        <tr>

            <td><?php  echo $assets->department ?></td>
          <td><?php  echo $assets->assigned_to ?></td>
            <td><?php  echo $assets->assigned_date ?></td>
    <td><?php  echo $assets->licenses ?></td>
    <td><?php  echo $assets->ip_address ?></td>
    <td><?php  echo $assets->mac_address ?></td>
<td><?php  echo $assets->supplier ?></td>
    <td><?php  echo $assets->purchase_date  ?></td>
        </tr>
        <?php

        }
        ?>
      </table>

    </div>
    <div id="menu2" class="tab-pane fade">
      <table class="table table-hover">
        <tr>


          <th>Warranty Expiry Date</th>
          <th>Managed by</th>
    <th>Asset Lifetime</th>
    <th>Last modified date</th>
    <th>Last modified user</th>
    <th>Notes</th>

        </tr>
        <?php
        if(!empty($assets))
        {

        ?>
        <tr>


          <td><?php  echo $assets->warranty_expiry_date ?></td>
            <td><?php  echo $assets->managed_by ?></td>
    <td><?php  echo $assets->asset_lifetime ?></td>
    <td><?php  echo $assets->last_modified_date  ?></td>
    <td><?php  echo $assets->last_modified_user ?></td>
  <td><?php  echo $assets->notes ?></td>
        </tr>
        <?php

        }
        ?>
      </table>
    </div>



  </div>
      </section><!--main content -->

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
