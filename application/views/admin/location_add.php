
<!-- Main content -->
<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn" href="<?php echo base_url('Location') ?>">View Location</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add Location</h3>
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
                        <form action="<?php echo base_url('location/add'); ?>" method="post" <?php if(isset($ajax) && $ajax=='true'){echo 'id=\'ajax-form\'';}?>>
                                  <table class="table table-hover">
                                    <tr>
                                        <td>Branch ID</td><td><input type="text" name="branch_id" required ></td>
                                    </tr>
                                    <tr>
                                        <td>Branch Name</td><td><input type="text" name="branch_name" required ></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td><td><input type="text" name="address" required  /></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>
                                            <select name="country" >
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach ($country_list as $country) {
                                                    ?>
                                                    <option value="<?php echo $country->id ?>"><?php echo $country->country ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                              <button type="button" class="btn btn-default btn-sm model-trigger" data-form_target="country/add" data-xtarget="#myModal">Add Country</button>
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
