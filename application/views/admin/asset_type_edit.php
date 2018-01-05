<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn" href="http://localhost/icic/Asset_type">View Asset Type</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Asset Types</h3>
                        <div class="msg" style="color:red;">
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form action="<?php echo base_url('asset_type/update'); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $primary_key ?>"/>
                            <table class="table table-hover">
                                <tbody><tr>
                                        <td>Asset Type ID</td><td><input type="text" name="asset_type_id" value="<?php echo $table_data->asset_type_id ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Asset Type</td><td><input type="text" name="asset_type" value="<?php echo $table_data->asset_type ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Asset Description</td><td><input type="text" name="asset_description" value="<?php echo $table_data->asset_description ?>"></td>
                                    </tr>

                                    <tr>
                                        <td></td><td><input type="submit" name="submit" value="SAVE"></td>
                                    </tr>
                                    <tr>
                                        <td></td><td>
                                            <div class="msg" style="color:red;"></div></td>
                                    </tr>

                                </tbody></table>
                        </form>


                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
        </div>
    </section>

</section>
