<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Template by AdminLTE v2.4</b>
	</div>
	<strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Blog site developed by <a href="https://facebook.com/tawfiquebd" target="_blank">Md Tawfique Hossain</a></strong>
	</footer>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Ckeditor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- script -->
<script>
	$(function () {
		//Date picker
		$('#datepicker').datepicker({
		autoclose: true
		})

		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('editor1')
	})

	// data tables
	$(function () {
      $('#example1').DataTable()

      $('#example2').DataTable()
    })
</script>

</body>
</html>
