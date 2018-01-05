<?php include('inc/header.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> User<small>Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Listing</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <section class="content">
          <div class="row">
              <div class="col-xs-12 text-right">
                  <div class="form-group">
                      <a class="btn" href="<?php echo base_url('Admin/userListing') ?>">View User</a>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Add User</h3>

                  </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <form action="<?php echo base_url('admin/addNewuser'); ?>" method="post">
                      <table class="table table-hover">
                        <tr>
                          <td>First Name</td><td><input type="text" name="fname" required /></td>
                        </tr>
                        <tr>
                          <td>Last Name</td><td><input type="text" name="lname" required /></td>
                        </tr>

                        <tr>
                          <td>Email</td><td><input type="email" name="email" required /></td>
                        </tr>

                        <tr>
                          <td>User Name</td><td><input type="text" name="uname" required /></td>
                        </tr>
                        <tr>
                          <td>Password</td><td><input type="password" name="pname" required /></td>
                        </tr>

                        <tr>
                          <td>Mobile</td><td><input type="text" name="mobile" required /></td>
                        </tr>
                        <tr>
                          <td>Role</td><td><select name="user_role" required>
                            <option value="" selected>Select Role Type</option>
                            <option value="admin">Supper Admin</option>
                            <option value="user">User</option>
                          </select></td>
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
