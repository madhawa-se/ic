<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn" href="<?php echo base_url('department'); ?>">View Departments</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Department</h3>
                        <div class="msg" style="color:red;">
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form action="<?php echo base_url('department/update'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $primary_key ?>"/>
                            <table class="table table-hover">
                                <tr>
                                    <td>Department ID</td><td><input type="text" name="dept_id" value="<?php echo $table_data->dept_id ?>" required ></td>
                                </tr>
                                <tr>
                                    <td>Department Name</td><td><input type="text" name="dept_name" value="<?php echo $table_data->dept_name ?>" required ></td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>
                                            <select name="location" required>
                                                <option value="">Select Location</option>
                                                <?php
                                                foreach ($location_list as $location) {
                                                    ?>
                                                    <option value="<?php echo $location->id ?>" <?php echo ($table_data->location ==$location->branch_id)?"selected":""; ?>><?php echo $location->branch_name  ?></option>
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
