<?php
if (empty($_SESSION['level']))
	header('location:'.base_url().'c_login');
else
	echo "udah ada session";

include('v_header.php') ;
$this->load->view($content);
include('v_footer.php');

?>
