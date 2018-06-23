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
<!-- <script src="/dbo/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="/dbo/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

<!-- SlimScroll -->
<script src="/dbo/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/dbo/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- <script src="/dbo/assets/dist/js/dataTables.bootstrap.js"></script>
<script src="/dbo/assets/dist/js/jquery.dataTables.min.js"></script> -->
<!-- Datatables -->
<script type="text/javascript">

    $(function () {
        $("#detailStock").dataTable();
        $('#lookup').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel', 'pdf' ]
        } );
        $('#urut').dataTable( {
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel', 'pdf' ]
        } );
        $("#guja").dataTable({
              dom: 'Bfrtip',
              buttons: [
                  'excel', 'pdf'
              ]
          });
        $("#guba").dataTable({
              dom: 'Bfrtip',
              buttons: [
                  'excel', 'pdf'
              ]
          });
        $("#guta").dataTable({
              dom: 'Bfrtip',
              buttons: [
                  'excel', 'pdf'
              ]
          });
        $("#modalParentInventaris").dataTable({
          });
        // gudang
        $("#gujaParent").dataTable();
        $("#gujaKategori").dataTable();
        $("#gutaChild").dataTable();
        $("#gutaParent").dataTable();
        $("#gutaKategori").dataTable();

        // user
        $("#registForm").dataTable();


        //barang
        $("#brgChild").dataTable();
        $("#brgChildIn").dataTable();
        

        // inventaris
        $("#invenChild").dataTable();
        $("#invenChildIn").dataTable();

        //report
        $("#finance").dataTable();

        //material
    });
</script>
<!-- AdminLTE for demo purposes -->
<script src="/dbo/assets/dist/js/demo.js"></script>

<!-- Grafik -->
<!-- Morris.js charts -->
<script src="/dbo/assets/bower_components/raphael/raphael.min.js"></script>
<script src="/dbo/assets/bower_components/morris.js/morris.min.js"></script>
<script type="text/javascript">
  Date.prototype.toDateInputValue = (function() {
      var local = new Date(this);
      local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
      return local.toJSON().slice(0,10);
  });
  document.getElementById('datePicker').value = new Date().toDateInputValue();
</script>
</body>
</html>
