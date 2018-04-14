<?php
  /**
   *
   */
  class C_satuan extends CI_Controller
  {

    function __construct(){
  			parent::__construct();

  		}
    public function index()
    {
      $this->load->view('v_satuan');
    }
  }

 ?>
