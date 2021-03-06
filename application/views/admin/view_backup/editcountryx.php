<!-- Main content -->
<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn" href="<?php echo base_url('Country') ?>">View Country</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Country</h3>
                        <div class="msg" style="color:red;">
                            <?php
                            if ($this->session->flashdata('success')) {
                                echo $this->session->flashdata('success');
                            }
                            if ($this->session->flashdata('error')) {
                                echo $this->session->flashdata('error');
                            }
                            ?>
                            <?php echo validation_errors(); ?>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form action="<?php echo base_url('Country/countryUpdate'); ?>" method="post">
                            <input type="hidden" name="id"  value="<?php echo $table_data->id; ?>" />
                            <table class="table table-hover">
                                <tr>
                                    <td>Country ID</td><td><input type="text" name="country_id" value="<?php echo $table_data->country_id ?>" required ></td>
                                </tr>
                                <tr>
                                    <td>Country Name</td><td><input type="text" name="country_name" value="<?php echo $table_data->country ?>" required ></td>
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
