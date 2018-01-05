<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn" href="http://localhost/icic/Asset_type">View Asset Types</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add Asset Types</h3>
                        <div class="msg" style="color:red;">
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form action="http://localhost/icic/Asset_type/add" method="post">
                            <table class="table table-hover">
                                <tbody><tr>
                                        <td>Asset Type ID</td><td><input type="text" name="asset_type_id" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Asset Type</td><td><input type="text" name="asset_type" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Asset Description</td><td><input type="text" name="asset_description" required=""></td>
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
