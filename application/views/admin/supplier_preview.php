<section class="content">
      <section class="content">
          <div class="row">
              <div class="col-xs-12 text-right">
                  <div class="form-group">
                      <a class="btn btn-primary" href="http://localhost/icic/Supplier/add"><i class="fa fa-plus"></i> Add Supplier</a>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">All Supplier </h3>
                      <div class="msg" style="color:red;">
                                      </div>
                      <div class="box-tools">
                          <form action="http://localhost/icic/userListing" method="POST" id="searchList">
                              <div class="input-group">
                                <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                                <div class="input-group-btn">
                                  <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                </div>
                              </div>
                          </form>
                      </div>
                  </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>Supplier Name</th>
                        <th>Address</th>
                        <th>Telephone</th>
                      </tr>
                                            <tr>

                        <td>1</td>
                        <td>2</td>

                        <td>3</td>

                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="http://localhost/icic/Supplier/edit/1"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger deleteUser" href="http://localhost/icic/Supplier/delete/1" onclick="return confirm_delete()"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      

                    </tbody></table>

                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>
              <div id="pagination">
                <ul class=" list-inline tsc_pagination">

                <!-- Show pagination links -->
                <li></li>              </ul>
              </div>

          </div>
      </section>

    </section>
