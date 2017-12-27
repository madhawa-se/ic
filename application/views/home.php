<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/main.css">
  </head>
  <body>

    <div class = "container">
           <div class="wrapper">
                   <form action="<?php  echo base_url('login') ?>" method="post" name="Login_Form" class="form-signin">
                       <h3 class="form-signin-heading" style="color: #fff;">
                           <i class="fa fa-expeditedssl  fa-fw"></i> Sign In!

                       </h3>

                           <hr class="colorgraph"><br>

               <div id="loading" style="display:none;">
             <center><img src='http://richytea.erpcl.com/assets/img/loading2.gif'/></center>
             </div>
                                     <div id="loading2">
                           <div class=" input-group">
                               <div class="input-group-addon">
                               <i class="fa fa-user"></i>
                               </div>
                             <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="" autofocus="" />
                           </div>

                                                           <br>
                             <div class=" input-group">
                               <div class="input-group-addon">
                               <i class="fa fa-key"></i>
                               </div>
                             <input type="password" class="form-control" id="password" name="password" placeholder="Password" required=""/>
</div>
                                                           <br>
                             <button class="btn btn-lg btn-info  btn-block"  name="Submit" value="Login" type="Submit" onclick="setLogo();">
                                 <i class="fa fa-key fa-2x- fa-fw"></i> Login
                             </button>
</div>
                   </form>
           </div>
   </div>

  </body>
  <script src="<?php echo base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>
