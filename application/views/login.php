<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/main.css">
  </head>
  <body>
<div class="home-header">
  <div class="container-fluid">
    <img src="<?php echo base_url() ?>assets/dist/img/icic-1.gif" class="img-responsive">
  </div>
</div>
    <div class = "container">

           <div class="center-block login">
                   <form action="<?php  echo base_url('login/log') ?>" method="post" name="Login_Form" >
                       <h3 class="form-signin-heading" >
                        <i class="fa fa-expeditedssl  fa-fw"></i> Asset Management Login
                      </h3>
                      <hr class="colorgraph"><br>
               <div id="loading" class="error" >
             <center><?php echo validation_errors(); ?> <?php echo $error; ?></center>
             </div>
<ul class="list-unstyled">
  <li>
        <div class="row line1">
          <div class="col-md-5">
            <label class="pull-right">User Name:</label>
          </div>
          <div class="col-md-5">
          <input type="text"  name="username" placeholder="Username" required  />
          </div>
        </div>
</li>
<li>
<div class="row line1">
          <div class="col-md-5">
          <label class="pull-right">Password:</label>
          </div>
          <div class="col-md-5">
             <input type="password"  name="password" placeholder="Password" required />
          </div>
  </div>

</li>
        <div class="row">
          <div class="col-md-5">

          </div>
          <div class="col-md-5">
            <input type="submit" name="Submit" value="Login" />
          </div>
        </div>



                   </form>
                     <hr class="colorgraph">
           </div>

   </div>

  </body>
  <script src="<?php echo base_url() ?>assets/dist/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/bootstrap.min.js"></script>
</html>
