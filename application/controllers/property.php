<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class property extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('propertymodel');

  }

  public function index(){
    $this->load->helper(array('form'));
    $this->load->view('login');
  }

  public function logincheck(){
    $username= $this->input->post('username');
    $password= $this->input->post('password');


    //very basic validation if front end fails
    if($username=="" || $password==""){
        $data['message'] = "Please enter username and password!";
        $this->load->helper(array('form'));
        $this->load->view('login',$data);
    }

    //validation of username and password
    else{

        $check=$this->propertymodel->logincheck($username,$password);

        //if username and password is correct
        if($check==true){
            echo "Welcome admin!";
        }

        //if username and password incorrect
        else{

            $data['message']="Invalid username or password. Please try again!";
            $this->load->helper(array('form'));
            $this->load->view('login',$data);
        }

    }
  }

}
