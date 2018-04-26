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

<div class="content" style="min-height: 720px">
	<!-- <div class="container">
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
	</d -->iv>
</div>