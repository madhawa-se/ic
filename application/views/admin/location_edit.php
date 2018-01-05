<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn" href="<?php echo base_url('location'); ?>">View Locations</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Location</h3>
                        <div class="msg" style="color:red;">
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form action="<?php echo base_url('location/update'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $primary_key ?>"/>
                            <table class="table table-hover">
                                <tr>
                                    <td>Country ID</td><td><input type="text" name="branch_id" value="<?php echo $table_data->branch_id ?>" required ></td>
                                </tr>
                                <tr>
                                    <td>Branch Name</td><td><input type="text" name="branch_name" value="<?php echo $table_data->branch_name ?>" required ></td>
                                </tr>
                                <tr>
                                    <td>Address</td><td><input type="text" name="address" value="<?php echo $table_data->address ?>" required ></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>
                                            <select name="country" required>
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach ($country_list as $country) {
                                                    ?>
                                                    <option value="<?php echo $country->country_id ?>" <?php echo ($table_data->country == $country->country_id)?"selected":""; ?>><?php echo $country->country ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </td>
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
