<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn" href="<?php echo base_url('Model') ?>">View Model</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Models</h3>
                        <div class="msg" style="color:red;">
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form action="<?php echo base_url('model/update'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $primary_key ?>"/>
                            <table class="table table-hover">
                                <tbody><tr>
                                        <td>Model ID</td><td><input type="text" name="model_id" required="" value="<?php echo $table_data->model_id ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Model Name</td><td><input type="text" name="model_name" required="" value="<?php echo $table_data->model_name ?>"></td>
                                    </tr>
                                    zz

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