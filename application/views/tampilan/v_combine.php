<?php
if (!empty($_SESSION['level']))
	header('location:login.php');


include('v_header') 
$this->load->view($content);
include('v_footer')

?>