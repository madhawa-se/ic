<!-- Main content -->
<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url('Asset/add') ?>"><i class="fa fa-plus"></i> Add Asset</a>
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
                            if ($this->session->flashdata('success')) {
                                echo $this->session->flashdata('success');
                            }
                            if ($this->session->flashdata('error')) {
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
                                <th>Asset ID</th>
                                <th>Host Name</th>
                                <th>Serial number</th>
                                <th>Manufacturer</th>
                                <th>Model Number</th>
                                <th>Asset Type</th>
                                <th>Location</th>
                                <th>Department</th>
                                <th>Licenses</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            <?php
                            foreach ($data_set as $asset) {
                                ?>
                                <tr>
                                    <td><?php echo $asset->asset_id ?></td>
                                    <td><?php echo $asset->hostname ?></td>
                                    <td><?php echo $asset->serial_number ?></td>
                                    <td><?php echo $asset->manufacturer ?></td>
                                    <td><?php echo $asset->model_name ?></td>
                                    <td><?php echo $asset->asset_type ?></td>
                                    <td><?php echo $asset->country ?></td>
                                    <td><?php echo $asset->dept_name ?></td>
                                    <td><?php echo $asset->license_name ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="<?php echo base_url() . '/asset/preview/' . $asset->id; ?>"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                    </td>
                                </tr>
    <?php
}
?>

                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>

</section>

