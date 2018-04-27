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
<script src="/dbo/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
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
        $("#lookup").dataTable();
        $("#guja").dataTable({
              dom: 'Bfrtip',
              buttons: [
                  'excel'
              ]
          });

        // gudang
        $("#guta").dataTable();
        $("#gujaParent").dataTable();
        $("#gujaChild").dataTable();
        $("#gutaChild").dataTable();
        $("#gutaParent").dataTable();

        // user
        $("#registForm").dataTable();


    });
</script>
<!-- AdminLTE for demo purposes -->
<script src="/dbo/assets/dist/js/demo.js"></script>

<!-- Grafik -->
<!-- Morris.js charts -->
<script src="/dbo/assets/bower_components/raphael/raphael.min.js"></script>
<script src="/dbo/assets/bower_components/morris.js/morris.min.js"></script>
<<!-- script>
  $(function () {
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    Morris.Area({
      element: 'area-chart',
      data: [{
        m: '2015-01', // <-- valid timestamp strings
        a: 0,
        b: 270
      }, {
        m: '2015-02',
        a: 54,
        b: 256
      }, {
        m: '2015-03',
        a: 243,
        b: 334
      }, {
        m: '2015-04',
        a: 206,
        b: 282
      }, {
        m: '2015-05',
        a: 161,
        b: 58
      }, {
        m: '2015-06',
        a: 187,
        b: 0
      }, {
        m: '2015-07',
        a: 210,
        b: 0
      }, {
        m: '2015-08',
        a: 204,
        b: 0
      }, {
        m: '2015-09',
        a: 224,
        b: 0
      }, {
        m: '2015-10',
        a: 301,
        b: 0
      }, {
        m: '2015-11',
        a: 262,
        b: 0
      }, {
        m: '2015-12',
        a: 199,
        b: 0
      }, ],
      xkey: 'm',
      ykeys: ['a', 'b'],
      labels: ['2014', '2015'],
      xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
        var month = months[x.getMonth()];
        return month;
      },
      dateFormat: function(x) {
        var month = months[new Date(x).getMonth()];
        return month;
      },
    });
  });
</script> -->

<script>
  $(function () {
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var data = [
      { y: '1998-01', a: 50, b: 90},
      { y: '1998-02', a: 65,  b: 75},
      { y: '1998-03', a: 50,  b: 50},
      { y: '1998-04', a: 75,  b: 60},
      { y: '1998-05', a: 80,  b: 65},
      { y: '1998-06', a: 90,  b: 70},
      { y: '1998-07', a: 100, b: 75},
      { y: '1998-08', a: 115, b: 75},
      { y: '1998-09', a: 120, b: 85},
      { y: '1998-10', a: 145, b: 85},
      { y: '1998-11', a: 160, b: 95},
      { y: '1998-12', a: 1000, b: 95}
    ],
    config = {
        data: data,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Total Income', 'Total Outcome'],
        xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
          var month = months[x.getMonth()];
          return month;
        },
        dateFormat: function(x) {
          var month = months[new Date(x).getMonth()];
          return month;
        },
    };
    config.element = 'area-chart';
    Morris.Line(config);
  });
</script>

</body>
</html>
