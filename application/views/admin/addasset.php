<?php include('inc/header.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Asset<small>Management</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Asset</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <section class="content">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
                        <a class="btn" href="<?php echo base_url('Asset/') ?>">View assets</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Add Asset</h3>
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



                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Descriptions</a></li>
                            <li><a data-toggle="tab" href="#menu1">Descriptions</a></li>
                            <li><a data-toggle="tab" href="#menu2">Descriptions</a></li>


                        </ul>
                        <form action="<?php echo base_url('asset/addAsset'); ?>" method="post">

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <table class="table table-hover">
                                        <tr>
                                            <td>Asset ID</td><td><input type="text" name="asset_id"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Manufacturer</td>
                                            <td>
                                                <select name="manufacturer" >
                                                    <option value="">Select Manufacturer</option>
                                                    <?php
                                                    foreach ($manufacturers as $manufacturer) {
                                                        ?>
                                                        <option value="<?php echo $manufacturer->manu_id ?>"><?php echo $manufacturer->manufacturer ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hostname</td>
                                            <td><input type="text" name="hostname"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Serial number</td><td><input type="text" name="serial_number"  /></td>
                                        </tr>
                                        <tr>
                                            <td>SAP AssetID</td><td><input type="text" name="sap_asset_id"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Model Number</td>
                                            <td>
                                                <select name="model_number" >
                                                    <option value="">Select Model</option>

                                                    <?php
                                                    foreach ($models as $model) {
                                                        ?>
                                                        <option value="<?php echo $model->model_id ?>"><?php echo $model->model_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Asset Type</td>
                                            <td>
                                                <select name="asset_type" >
                                                    <option value="">Select Asset Type</option>
                                                    <?php
                                                    foreach ($asset_types as $asset_type) {
                                                        ?>
                                                        <option value="<?php echo $asset_type->asset_type_id ?>"><?php echo $asset_type->asset_type ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Location</td><td><input type="text" name="location" /></td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td>
                                                <select name="department" >
                                                    <option value="">Select Department</option>
                                                    <?php
                                                    foreach ($departments as $department) {
                                                        ?>
                                                        <option value="<?php echo $department->dept_id ?>"><?php echo $department->dept_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <table class="table table-hover">

                                        <tr>
                                            <td>Assigned to/Owner</td>
                                            <td>
                                                <select name="assigned_to" >
                                                    <option value="">Select Owner</option>
                                                    <?php
                                                    foreach ($employees as $employee) {
                                                        ?>
                                                        <option value="<?php echo $employee->emp_id ?>"><?php echo $employee->emp_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Assigned date</td><td><input type="text" name="assigned_date"  class="form_datetime" /></td>
                                        </tr>
                                        <tr>
                                            <td>Notes</td><td><input type="text" name="notes" /></td>
                                        </tr>
                                        <tr>
                                            <td>Licenses</td><td>
                                                <select name="licenses[]" id="example-getting-started" multiple="multiple">
                                                    <?php
                                                    foreach ($licenses as $license) {
                                                        ?>
                                                        <option value="<?php echo $license->license_id ?>"><?php echo $license->license_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>IP Address</td><td><input type="text" name="ip_address"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Secondary IP Address</td><td><input type="text" name="secondary_ip_address"  /></td>
                                        </tr>
                                        <tr>
                                            <td>MAC Address</td><td><input type="text" name="mac_address"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Supplier</td>
                                            <td>
                                                <select name="supplier" >
                                                    <option value="">Select Supplier</option>  
                                                    <?php
                                                    foreach ($suppliers as $supplier) {
                                                        ?>
                                                        <option value="<?php echo $supplier->supplier_id ?>"><?php echo $supplier->supplier_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <a class="btn btn-sm btn-default">New</a>

                                        </tr>
                                        <tr>
                                            <td>Purchase Date</td><td><input type="text" name="purchase_date"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Warranty Expiry Date</td><td><input type="text" name="warranty_expiry_date"  /></td>
                                        </tr>

                                    </table>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <table class="table table-hover">

                                        <tr>
                                            <td>Managed by</td>
                                            <td>
                                                <select name="managed_by" >
                                                    <option value="">Select Department</option>
                                                    <?php
                                                    foreach ($departments as $department) {
                                                        ?>
                                                        <option value="<?php echo $department->dept_id ?>"><?php echo $department->dept_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Asset Lifetime</td><td><input type="text" name="asset_lifetime"  /></td>
                                        </tr>

                                        <tr>
                                            <td>Last modified date</td><td><input type="text" name="last_modified_date"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Last modified user</td><td><input type="text" name="last_modified_user"  /></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <table class="table table-hover pull-right">
                                <tr>
                                    <td></td><td></td><td></td><td></td><td></td><td></td>
                                    <td class="center-block"><input type="submit" name="save " value="SAVE"><input type="reset" value="Reset"></td>
                                </tr>
                            </table>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div>
        </section>

    </section>
    <!-- /.content -->
</div>

<?php include('inc/footer.php'); ?>
