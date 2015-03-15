<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class property extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');

  }

  public function index(){
    $this->load->helper(array('form'));
    $this->load->view('login');
  }

  public function logincheck(){
    $firstName= $this->input->post('username');

    if($firstName=="Riaz"){
      echo "Hello";
    }

    else{
      $this->load->helper(array('form'));
      $this->load->view('login');

    }
  }

}
