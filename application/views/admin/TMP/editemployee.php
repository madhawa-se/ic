
<?php include('inc/header.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Asset<small>Employee</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Employee</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <section class="content">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
                        <a class="btn" href="<?php echo base_url('Employee') ?>">View Employee</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Edit Employee</h3>
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
                            <form action="<?php echo base_url('Employee/employeeUpdate'); ?>" method="post">
                                <input type="hidden" name="id"  value="<?php echo $employee->id; ?>" />
                                <table class="table table-hover">
                                    <tr>
                                        <td>Employee Name</td><td><input type="text" name="country_name" value="<?php echo $employee->country?>" required ></td>
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
