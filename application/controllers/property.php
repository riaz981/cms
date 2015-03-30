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
        if($check){

            //$data['message']="Welcome Admin! You can now add a property!";
            $this->load->helper(array('form'));
            $this->home();
        }

        //if username and password incorrect
        else{

            $data['message']="Invalid username or password. Please try again!";
            $this->load->helper(array('form'));
            $this->load->view('login',$data);
        }

    }
  }

  //this is for the navigation link that goes to add page
  public function add(){

      if($this->session->userdata('validated')){
          $this->load->helper(array('form'));
          $this->load->view('add');
      }

      else{
          $data['message']="Invalid username or password. Please try again!";
          $this->load->helper(array('form'));
          $this->load->view('login',$data);
      }
  }

  //this is for the navigation link that goes to add page
  public function edit(){

      if($this->session->userdata('validated')){
          $id = $this->input->post('id');
          $data = $this->propertymodel->getById($id);
          //$this->load->helper(array('form'));
          //$this->load->view('edit');
      }

      else{
          $data['message']="Invalid username or password. Please try again!";
          $this->load->helper(array('form'));
          $this->load->view('login',$data);
      }
  }

  //link for home page
  public function home(){

      if($this->session->userdata('validated')){

         $data=$this->getEverything();
         $this->load->helper(array('form'));
         $this->load->view('home',$data);
     }

     else{

         $data['message']="Invalid username or password. Please try again!";
         $this->load->helper(array('form'));
         $this->load->view('login',$data);
     }
  }

  /*
    calls the propertymodel function getAll to
    fetch all the data of the table. Returs
    that data to whichever function had called it.
  */
  public function getEverything(){
      $query= $this->propertymodel->getAll();
      $i=0;
      foreach ($query as $row){
          $data['property'][$i]['id'] = $row->id;
          $data['property'][$i]['name'] = $row->name;
          $data['property'][$i]['address'] = $row->address;
          $data['property'][$i]['url'] = $row->url;
          $i++;
      }

      return $data;
  }

  public function deleteProperty(){
      $id = $this->input->post('id');
      $check = $this->propertymodel->deleteRecord($id);
      if($check){

          $data=$this->getEverything();
          $data['message']="deleted";
          $this->load->helper(array('form'));
          $this->load->view('home',$data);
      }

      else{
          $data=$this->getEverything();
          $data['message']="undeleted";
          $this->load->helper(array('form'));
          $this->load->view('home',$data);
      }
  }

  //Adds a property. If successful calls the property model
  //property model then inserts the data in mySql.
  //passes $data to the model's function.
  public function addProperty(){
      $this->load->helper(array('form'));
      $this->load->library('form_validation');

      //setting the rules for form validation.
      $this->form_validation->set_rules('name','Name','required');
      $this->form_validation->set_rules('address','Address','required');
      $this->form_validation->set_rules('url', 'Url', 'required');
      $this->form_validation->set_rules('typeProperty','Property Type','required');
      $this->form_validation->set_rules('guestNumber', 'Number of Guests','required');
      $this->form_validation->set_rules('bedroomNumber', 'Number of Bedrooms','required');
      $this->form_validation->set_rules('bedsNumber','Number of Beds','required');
      $this->form_validation->set_rules('minimumStay','Minimum Stay','required');
      $this->form_validation->set_rules('nightlyRate','Nightly Rate','required');
      $this->form_validation->set_rules('weeklyRate','Weekly Rate','required');
      $this->form_validation->set_rules('monthlyRate','Monthly Rate','required');
      $this->form_validation->set_rules('cleaningRate','Cleaning Rate','required');
      $this->form_validation->set_rules('bathroomDescription', 'Bathroom Description','required');
      $this->form_validation->set_rules('bedroomDescription','Bedroom Description','required');
      $this->form_validation->set_rules('attractionDescription','Description of Attractions','required');
      $this->form_validation->set_rules('leisureDescription','Leisure Description','required');
      $this->form_validation->set_rules('businessDescription','Business Description', 'required');
      $this->form_validation->set_rules('sportsDescription','Sports Description','required');


      //if there is any validation failure redirect
      //back to the form.
      if($this->form_validation->run()==FALSE){
          $this->load->view('add');
      }

      //else call the model function to insert data
      else{
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
            $data['attractionDescription'] = $this->input->post('attractionDescription');
            $data['leisureDescription'] = $this->input->post('leisureDescription');
            $data['businessDescription'] = $this->input->post('businessDescription');
            $data['sportsDescription'] = $this->input->post('sportsDescription');

            $check = $this->propertymodel->insertData($data);
            if($check){

                $data = $this->getEverything();
                $data['message']="success";

                $this->load->helper(array('form'));
                $this->load->view('home',$data);
            }
            else
                $data['message']="fail";
                $this->load->helper(array('form'));
                $this->load->view('home',$data);
        }

  }

  public function search(){

      $this->load->helper(array('form'));
      $name = $this->input->post('search');
      $name = strtolower($name);
      $query=$this->propertymodel->getSpecific($name);
      $i=0;
      if(isset($query)){
          foreach ($query as $row){
              $data['property'][$i]['id'] = $row->id;
              $data['property'][$i]['name'] = $row->name;
              $data['property'][$i]['address'] = $row->address;
              $data['property'][$i]['url'] = $row->url;
              $i++;
          }
      }

     $this->load->helper(array('form'));
     if(isset($data))
        $this->load->view('home',$data);
     else
     {
        $error['message']="nope";
        $this->load->view('home',$error);
     }

  }

  public function logout(){

      $this->session->sess_destroy();
      $data['message']="You have been logged out! Please log in.";
      $this->load->helper(array('form'));
      $this->load->view('login',$data);
  }

}
