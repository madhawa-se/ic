<!-- Main content -->
<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url($table_name.'/add') ?>"><i class="fa fa-plus"></i> Add <?php echo $table_name ?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Employees </h3>
                        <div class="msg" style="color:red;">
                            <?php
                            if ($this->session->flashdata('success')) {
                                echo $this->session->flashdata('success');
                            }
                            if ($this->session->flashdata('error')) {
                                echo $this->session->flashdata('error');
                            }
                            ?>
                        </div>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                                <div class="input-group">
                                    <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <?php
                                foreach ($column_names as $column) {
                                    print "<th>$column</th>";
                                }
                                ?>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($data_set as $record) { ?>

                                <tr>
                                    <?php
                                    for ($i = 0; $i < sizeof($column_names); $i++) {
                                        $column_name = $column_names[$i];
                                        echo "<td>{$record->$column_name}</td>";
                                    }
                                    ?>     

                                    <td class="">
                                        <a class="btn btn-sm btn-info" href="<?php echo base_url($controller_name) . "/edit/{$record->$primary_key}" ?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url() . 'notimplemented/' ?>" onclick="return confirm_delete()"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td><?php //echo  $record->hostname  ?></td>
                                </tr>

<?php } ?>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div id="pagination">
                <ul class=" list-inline tsc_pagination">

                    <!-- Show pagination links -->

                </ul>
            </div>

        </div>
    </section>

</section>
<!-- /.content -->