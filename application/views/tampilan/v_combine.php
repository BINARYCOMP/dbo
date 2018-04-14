<?php
if (!empty($_SESSION['level']))
	header('location:login.php');


include('v_header.php') ;
$this->load->view($content);
include('v_footer.php');

?>
