<?php
if (!isset($_SESSION['level']))
	echo "<script> alert('Sesi anda telah habis, silahkan login kembali'); window.location = '".base_url()."c_login' </script>";
include('v_header.php') ;
if (isset($_SERVER['HTTPS'])) {
	$http = $_SERVER['HTTPS'];
}else{
	$http = "http://";
}
$url = $http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if ($url != base_url() && $url != base_url()."c_dashboard" && $url != base_url()."c_dashboard/") {
	?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
		      <?php if(isset($title)) echo $title ?>
		      <small><i class="fa fa-info"></i></small>
		      <small><?php echo $_SESSION['level'] ?></small>
		    </h1>
		</section>
		<?php
			$this->load->view($content);
		?>
	</div>
	<?php
}else{
	?>
	<!-- <div class="content-wrapper"> -->
		<?php
			$this->load->view($content);
		?>
	<!-- </div> -->
	<?php
}
include('v_footer.php');

?>
