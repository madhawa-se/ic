<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url('Asset_type/add') ?>"><i class="fa fa-plus"></i> Add Asset Type</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Asset Types </h3>
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
                                    <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Asset Type ID</th>
                                    <th>Asset Type</th>
                                    <th>Asset Description</th>
                                </tr>
                                <?php
                                foreach ($data_set as $asset_type) {
                                    ?>
                                    <tr>
                                        <td><?php echo $asset_type->asset_type_id ?></td>
                                        <td><?php echo $asset_type->asset_type ?></td>
                                        <td><?php echo $asset_type->asset_description ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'asset_type/edit/' . $asset_type->id; ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url() . 'asset_type/delete/' . $asset_type->id; ?>" onclick="return confirm_delete()"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
    <?php
}
?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div id="pagination">
                <ul class=" list-inline tsc_pagination">
                    <!-- Show pagination links -->
                    <li></li>
                </ul>
            </div>
        </div>
    </section>
</section>