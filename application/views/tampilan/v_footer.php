<footer class="main-footer">
    <div class="container">
      <div class=" pull-right">
        <strong>Copyright &copy; BINARY CORPORATE 2018.</strong> All rights
        reserved.
      </div>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/dbo/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/dbo/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<!-- <script src="/dbo/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/dbo/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<!-- SlimScroll -->
<script src="/dbo/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/dbo/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dbo/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dbo/assets/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
