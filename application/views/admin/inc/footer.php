  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        </div>
      </div>
      
    </div>
  </div>

<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.0.1
  </div>
  <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="">ICIC BANK</a>.</strong> All rights
  reserved.
</footer>


<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url() ?>assets/dist/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/multiselect.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/app.js"></script>

<script>
function confirm_delete(){
  if(confirm("Are you sure, you want to delete this user!")){
    return true;
  }
  else{
    return false;
  }
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>
</body>
</html>
