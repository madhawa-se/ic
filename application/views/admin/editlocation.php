
<?php include('inc/header.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Asset<small>Location</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Location</li>
        </ol>
    </section>

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
                            <h3 class="box-title">Edit Location</h3>
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
                            <form action="<?php echo base_url('Location/locationUpdate'); ?>" method="post">
                                <input type="hidden" name="branch_id"  value="<?php echo $location->id; ?>" />
                                <table class="table table-hover">
                                    <tr>
                                        <td>Branch Name</td><td><input type="text" name="branch_name" required value="<?php echo $location->branch_name; ?>"  /></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td><td><input type="text" name="address" required value="<?php echo $location->address; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>
                                            <select name="country" >
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach ($countries as $country) {
                                                    ?>
                                                    <option value="<?php echo $country->country_id ?>" <?php echo ($location->country == $country->country_id)?"selected":""; ?>><?php echo $country->country ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
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
    <!-- /.content -->
</div>
<?php include('inc/footer.php'); ?>
