<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn" href="<?php echo base_url('Suppliers') ?>">View Supplier</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add Suppliers</h3>
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
                        <form action="<?php echo base_url('suppliers/add'); ?>" method="post">
                            <table class="table table-hover">
                                <tbody><tr>
                                        <td>Supplier ID</td><td><input type="text" name="supplier_id" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Supplier Name</td><td><input type="text" name="supplier_name" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td><td><input type="text" name="address" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Telephone</td><td><input type="text" name="telephone" required=""></td>
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