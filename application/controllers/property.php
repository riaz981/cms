<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class property extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('propertymodel');

  }

  //Log-in Page
  public function index(){
    $this->load->helper(array('form'));
    $this->load->view('login');
  }

  //Checking the credentials of initial log in page
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
            //$data['message']="Welcome Admin! You can now add a property!";
            $this->load->helper(array('form'));
            $this->load->view('edit');
        }

        //if username and password incorrect
        else{

            $data['message']="Invalid username or password. Please try again!";
            $this->load->helper(array('form'));
            $this->load->view('login',$data);
        }

    }
  }

  public function addProperty(){

      $data['name'] = $this->input->post('name');
      $data['address'] = $this->input->post('address');
      $data['url'] = $this->input->post('url');

      $icon['typeProperty'] = $this->input->post('typeProperty');
      $icon['guestNumber'] = $this->input->post('guestNumber');
      $icon['bedroomNumber'] = $this->input->post('bedroomNumber');
      $icon['bedsNumber'] = $this->input->post('bedsNumber');

      $data['icon'] = json_encode($icon);

      $data['minimumStay'] = $this->input->post('minimumStay');

      $rates['nightlyRate'] = $this->input->post('nightlyRate');
      $rates['weeklyRate'] = $this->input->post('weeklyRate');
      $rates['monthlyRate'] = $this->input->post('monthlyRate');
      $rates['cleaningRate'] = $this->input->post('cleaningRate');

      $data['rates'] = json_encode($rates);

      $data['overview'] = $this->input->post('overview');

      $data['dining'] = $this->input->post('dining');
      $data['bathroomDescription'] = $this->input->post('bathroomDescription');
      $data['bedroomDescription'] = $this->input->post('bedroomDescription');
      

  }

}
