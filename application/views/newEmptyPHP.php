<!-- Main content -->
    <section class="content">
      <section class="content">
          <div class="row">
              <div class="col-xs-12 text-right">
                  <div class="form-group">
                      <a class="btn btn-primary" href="<?php echo base_url('Asset/addAsset') ?>"><i class="fa fa-plus"></i> Add Assest</a>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">All Assets </h3>
                      <div class="msg" style="color:red;">
                  <?php
                  if($this->session->flashdata('success')){
                      echo $this->session->flashdata('success');
                    }
                    if($this->session->flashdata('error')){
                        echo $this->session->flashdata('error');
                      }

                      ?></div>
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
                        <th>Asset ID</th>
                        <th>Host Name</th>
                        <th>Serial number</th>

                        <th>Manufacturer</th>
                        <th>Model Number</th>
                        <th>Asset Type</th>
                        <th>Location</th>
                        <th>Department</th>

                        <th>Licenses</th>

                        <th>Actions</th>




                      </tr>
                      <?php
                      if(!empty($assets))
                      {
                          $asset_id='';
                          foreach($assets as $record){
                              if($asset_id!=$record->asset_id){
                            
                          
                      ?>
                      <tr>
                        <td><a href="<?php echo base_url().'asset/detailListing/'.$record->id; ?>"><?php echo $record->asset_id ?></a></td>
                        <td><?php echo $record->hostname ?></td>
                        <td><?php echo $record->serial_number ?></td>

                        <td><?php echo $record->manufacturer ?></td>
                        <td><?php echo $record->model_number ?></td>
                        <td><?php echo $record->asset_type ?></td>
                        <td><?php echo $record->location ?></td>
                        <td><?php echo $record->department ?></td>
                          <?php }?>
                        <?php echo ($asset_id!=$record->asset_id)?"<td>".$record->license_name ."</td>":"<td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td><td>".$record->license_name ."</td><td></td>"?>

<?php  if($asset_id!=$record->asset_id){ ?>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'asset/detailListing/'.$record->id; ?>">
                            <i class="fa fa-eye"> </i> View</a>

                        </td>
                        <?php 
                        
                          $asset_id=$record->asset_id;
                        ?>
                      </tr>
                      <?php
                          }
                          }
                      }
                      ?>

                    </table>

                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>
              <div id="pagination">
                <ul class=" list-inline tsc_pagination">

              </ul>
              </div>

          </div>
      </section>

 </section>


