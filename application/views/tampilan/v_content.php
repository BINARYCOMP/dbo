	<style type="text/css">
		.gambar1 img{
			border : 10px double #d63031;
		}
		.gambar1 img:hover{
			border : 10px solid #d63031;
		}
		.gambar2 img{
			border : 10px double #0984e3;
		}
		.gambar2 img:hover{
			border : 10px solid #0984e3;
		}
		.text-img{
			padding: 10px 0;
			position: absolute;
			display: none;
			margin-left: auto;
			margin-right: auto;
			left: 0;
			right: 0;
		}
		.circle-one {
		    width: 125px;
		    height: 125px;
		    border-radius: 50%;
		    border: 10px #cf000f double;
		    margin: 0 auto;
		    vertical-align: middle;
		    text-align: center;
		}
		.circle-one:hover {
		    width: 125px;
		    height: 125px;
		    border-radius: 50%;
		    border: 10px #cf000f solid;
		    margin: 0 auto;
		    vertical-align: middle;
		    text-align: center;
		}
		.circle-one img {
		    width: 75px;
		    height: 75px;
		    margin-top: 10%;
		    border-radius: 50%;

		}
		.circle-two {
		    width: 125px;
		    height: 125px;
		    border-radius: 50%;
		    border: 10px #3276b1 double;
		    margin: 0 auto;
		    vertical-align: middle;
		    text-align: center;
		}
		.circle-two:hover {
		    width: 125px;
		    height: 125px;
		    border-radius: 50%;
		    border: 10px #3276b1 solid;#3276b1
		    margin: 0 auto;
		    vertical-align: middle;
		    text-align: center;
		}
		.circle-two img {
		    width: 75px;
		    height: 75px;
		    margin-top: 10%;
		    border-radius: 50%;

		}
		.circle-title {
		    text-align: center;
		    margin-left: 10px;
		}
	/*style="position: absolute; float: left"*/
	</style>
<script>
	$(document).ready(function(){
	        $("#gambar1").animate({left: '250px'}, 1000);
	        $("#gambar2").animate({left: '450px'}, 1000);
	        $("#img1").fadeIn(3000);
	        $("#img2").fadeIn(2700);
	        $(".text-img").fadeIn(2700);
	        // $("#div2").fadeIn("slow");
	        // $("#div3").fadeIn(3000);
	});
	$(document).ready(function(){
	});
</script>
<section class="content">
	<div class="callout callout-info">
	  <h4> Grafik </h4>
	</div>
	<!-- /.callout -->	
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">Grafik Barang Jadi [ Gudang Cimuning ] Tahun <?php echo date('Y') ?></h3>
			    <div class="box-tools pull-right">
			      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			      </button>
			      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			    </div>
			  </div>
			  <div class="box-body chart-responsive">
			    <div class="chart" id="stock-chart" style="height: 300px;"></div>
			  </div>
			</div>
		</div>
		<!-- /.col md 6 -->
		<div class="col-md-6">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">Grafik Barang Setengah Jadi [ Gudang Cimuning ] <?php echo date('Y') ?></h3>
			    <div class="box-tools pull-right">
			      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			      </button>
			      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			    </div>
			  </div>
			  <div class="box-body chart-responsive">
			    <div class="chart" id="guta-chart" style="height: 300px;"></div>
			  </div>
			</div>
		</div>
		<!-- /.col md 6 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">Grafik Barang Jadi [ Gudang Bawang ] Tahun <?php echo date('Y') ?></h3>
			    <div class="box-tools pull-right">
			      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			      </button>
			      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			    </div>
			  </div>
			  <div class="box-body chart-responsive">
			    <div class="chart" id="guba-chart" style="height: 300px;"></div>
			  </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">Grafik Keuangan Tahun <?php echo date('Y') ?></h3>

			    <div class="box-tools pull-right">
			      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			      </button>
			      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			    </div>
			  </div>
			  <div class="box-body chart-responsive">
			    <div class="chart" id="keuangan-chart" style="height: 300px;"></div>
			  </div>
			</div>
		</div>
		<!-- /.col md 12 -->
	</div>
	<!-- /.row -->
</section>





<!-- Grafik / chart -->
<script>
  // Stock
  $(function () {
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var data = [
    <?php for ($i=1; $i <= 12; $i++) {  
    	if ($i < 10) {
    		$month = "0".$i;
    	}else{
    		$month = $i;
    	}
    	$dataReport = $this->m_dashboard->getReportStock($month);
    	if ($dataReport[0]['masuk'] == null) {
    		$dataReport[0]['masuk'] = 0;
    	}
    	if ($dataReport[0]['keluar'] == null) {
    		$dataReport[0]['keluar'] = 0;
    	}
    	if ($i != 12) {
    		?>
    		{ y: '1998-<?php echo $month ?>', a: <?php echo $dataReport[0]['masuk'] ?>, b: <?php echo $dataReport[0]['keluar'] ?>},
    		<?php
    	}else{
    		?>
    		{ y: '1998-<?php echo $month ?>', a: <?php echo $dataReport[0]['masuk'] ?>, b: <?php echo $dataReport[0]['keluar'] ?>}
    		<?php
    	}
    }
    ?>
    ],
    config = {
        data: data,
        xkey: 'y',
        lineColors: ['#2ecc71','#e74c3c'],
        ykeys: ['a', 'b'],
        labels: ['Total Barang Masuk', 'Total Barang Keluar'],
        xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
          var month = months[x.getMonth()];
          return month;
        },
        dateFormat: function(x) {
          var month = months[new Date(x).getMonth()];
          return month;
        },
    };
    config.element = 'stock-chart';
    Morris.Line(config);
  });

  // Stock Tak Jadi
  $(function () {
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var data = [
    <?php for ($i=1; $i <= 12; $i++) {  
    	if ($i < 10) {
    		$month = "0".$i;
    	}else{
    		$month = $i;
    	}
    	$dataReport = $this->m_dashboard->getReportStockSetengahJadi($month);
    	if ($dataReport[0]['masuk'] == null) {
    		$dataReport[0]['masuk'] = 0;
    	}
    	if ($dataReport[0]['keluar'] == null) {
    		$dataReport[0]['keluar'] = 0;
    	}
    	if ($i != 12) {
    		?>
    		{ y: '1998-<?php echo $month ?>', a: <?php echo $dataReport[0]['masuk'] ?>, b: <?php echo $dataReport[0]['keluar'] ?>},
    		<?php
    	}else{
    		?>
    		{ y: '1998-<?php echo $month ?>', a: <?php echo $dataReport[0]['masuk'] ?>, b: <?php echo $dataReport[0]['keluar'] ?>}
    		<?php
    	}
    }
    ?>
    ],
    config = {
        data: data,
        xkey: 'y',
        lineColors: ['#f39c12','#3498db'],
        ykeys: ['a', 'b'],
        labels: ['Total Barang Masuk', 'Total Barang Keluar'],
        xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
          var month = months[x.getMonth()];
          return month;
        },
        dateFormat: function(x) {
          var month = months[new Date(x).getMonth()];
          return month;
        },
    };
    config.element = 'guta-chart';
    Morris.Line(config);
  });

  // Keuangan
  $(function () {
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var data = [
    <?php for ($i=1; $i <= 12; $i++) {  
    	if ($i < 10) {
    		$month = "0".$i;
    	}else{
    		$month = $i;
    	}
    	$dataReport = $this->m_dashboard->getReportKeuangan($month);
    	if ($dataReport[0]['masuk'] == null) {
    		$dataReport[0]['masuk'] = 0;
    	}
    	if ($dataReport[0]['keluar'] == null) {
    		$dataReport[0]['keluar'] = 0;
    	}
    	if ($i != 12) {
    		?>
    		{ y: '1998-<?php echo $month ?>', a: <?php echo $dataReport[0]['masuk'] ?>, b: <?php echo $dataReport[0]['keluar'] ?>},
    		<?php
    	}else{
    		?>
    		{ y: '1998-<?php echo $month ?>', a: <?php echo $dataReport[0]['masuk'] ?>, b: <?php echo $dataReport[0]['keluar'] ?>}
    		<?php
    	}
    }
    ?>
    ],
    config = {
        data: data,
        xkey: 'y',
        lineColors: ['#f39c12','#3498db'],
        ykeys: ['a', 'b'],
        labels: ['Total Debet', 'Total Kredit'],
        xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
          var month = months[x.getMonth()];
          return month;
        },
        dateFormat: function(x) {
          var month = months[new Date(x).getMonth()];
          return month;
        },
    };
    config.element = 'keuangan-chart';
    Morris.Line(config);
  });
</script>

<script>
  // Stock
  $(function () {
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var data = [
    <?php for ($i=1; $i <= 12; $i++) {  
    	if ($i < 10) {
    		$month = "0".$i;
    	}else{
    		$month = $i;
    	}
    	$dataReport = $this->m_dashboard->getReportStockBawang($month);
    	if ($dataReport[0]['masuk'] == null) {
    		$dataReport[0]['masuk'] = 0;
    	}
    	if ($dataReport[0]['keluar'] == null) {
    		$dataReport[0]['keluar'] = 0;
    	}
    	if ($i != 12) {
    		?>
    		{ y: '1998-<?php echo $month ?>', a: <?php echo $dataReport[0]['masuk'] ?>, b: <?php echo $dataReport[0]['keluar'] ?>},
    		<?php
    	}else{
    		?>
    		{ y: '1998-<?php echo $month ?>', a: <?php echo $dataReport[0]['masuk'] ?>, b: <?php echo $dataReport[0]['keluar'] ?>}
    		<?php
    	}
    }
    ?>
    ],
    config = {
        data: data,
        xkey: 'y',
        lineColors: ['#2ecc71','#e74c3c'],
        ykeys: ['a', 'b'],
        labels: ['Total Barang Masuk', 'Total Barang Keluar'],
        xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
          var month = months[x.getMonth()];
          return month;
        },
        dateFormat: function(x) {
          var month = months[new Date(x).getMonth()];
          return month;
        },
    };
    config.element = 'guba-chart';
    Morris.Line(config);
  });
</script>














<!-- <div class="content" style="min-height: 720px">
	<div class="container">
		<div class="row text-center center-block">
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="gambar1">
					 <a href="https://emas.telkom.co.id/MIG/">
				        <div class="circle-one">
							  <a href="">
							  	<img id="img1" src="<?php echo base_url()?>assets/img/Bawang.jpg" style="display: none">
							  </a>
				        </div>
				        <div class="circle-title">
				            <p> [ Gudang Bawang ] </p>
				        </div>
				    </a>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="gambar2">
					 <a href="https://emas.telkom.co.id/MIG/">
				        <div class="circle-two">
							  <a href="">
							  	<img id="img2" src="<?php echo base_url()?>assets/img/Cimuning.jpg" style="display: none">
							  </a>
				        </div>
				        <div class="circle-title">
				           <center> <p> [ Gudang Cimuning ] </p> </center>
				        </div>
				    </a>
				</div>
		</div>
	</div>
</div> -->