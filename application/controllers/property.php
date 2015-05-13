<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class property extends CI_Controller{

public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('propertymodel');
}

/* Log-in Page */
public function index(){
    $this->load->helper(array('form'));
    $this->load->view('login');
}

/* Checking the credentials of initial log in page */
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

/* This is for the navigation link that goes to add page */
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

/*
This is for the navigation link that goes to edit page
gets all data from database specific to the id.
*/
public function edit(){
    if($this->session->userdata('validated')){
        $id = $this->input->post('id');
        $queryPhoto= $this->propertymodel->getAllPicById($id);
        $photo_names = $this->propertymodel->getPicNameById($id);
        $data['photo_name'] = json_decode($photo_names);
        $data['id'] = $id;
        foreach($queryPhoto as $row){
            $photo['photo_url']=$row->photo_url;
            $data['photo_url'] = $photo['photo_url'];
        }
        $query = $this->propertymodel->getById($id);

        foreach ($query as $row){
            $data['name'] = $row->name;
            $data['address'] = $row->address;
            $data['url'] = $row->url;

            $icon = json_decode($row->icon);
            $data['typeProperty'] = $icon->typeProperty;
            $data['guestNumber'] = $icon->guestNumber;
            $data['bedroomNumber'] = $icon->bedroomNumber;
            $data['bedsNumber'] = $icon->bedsNumber;

            $data['minimumStay'] = $row->minimumStay;
            $rates = json_decode($row->rates);

            $data['nightlyRate'] = $rates->nightlyRate;
            $data['weeklyRate'] = $rates->weeklyRate;
            $data['monthlyRate'] = $rates->monthlyRate;
            $data['cleaningRate'] = $rates->cleaningRate;

            $data['overview'] = $row->overview;
            $data['dining'] = $row->dining;
            $data['bedroomDescription'] = $row->bedroomDescription;
            $data['bathroomDescription'] = $row->bathroomDescription;
            $data['attractionDescription'] = $row->attractionDescription;
            $data['leisureDescription'] = $row->leisureDescription;
            $data['businessDescription'] = $row->businessDescription;
            $data['sportsDescription'] = $row->sportsDescription;
            $data['id'] = $row->id;

            $map = json_decode($row->map);
            $data['latitude'] = $map->latitude;
            $data['longitude'] = $map->longitude;
        }
        $this->load->helper(array('form'));
        $this->load->view('edit',$data);
    }
    else{
        $data['message']="Invalid username or password. Please try again!";
        $this->load->helper(array('form'));
        $this->load->view('login',$data);
    }
}

/* Link for home page */
public function home(){
    if($this->session->userdata('validated')){
        //$this->wordP();
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

public function photo(){
    if($this->session->userdata('validated')){
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $query= $this->propertymodel->getAllPicById($id);
        $photo_names = $this->propertymodel->getPicNameById($id);
        $data['photo_name'] = json_decode($photo_names);
        $data['id'] = $id;
        foreach($query as $row){
            $photo['photo_url']=$row->photo_url;
            $data['photo_url'] = $photo['photo_url'];
        }
        $data['name'] = $name;
        $this->load->helper(array('form'));
        $this->load->view('photo',$data);
    }
    else{
        $data['message']="Invalid username or password. Please try again!";
        $this->load->helper(array('form'));
        $this->load->view('login',$data);
    }
}

public function photoUpload(){
    $count = count($_FILES['userfile']['name']);
    $id=$this->input->post('id');
    $files = $_FILES;
    for($i=0;$i<$count;$i++){
        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

        $config = $this->configEdit();
        $this->load->library('upload', $config);

        if($this->upload->do_upload()){
            $config = $this->imageConfig($_FILES['userfile']['name']);
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->insertImage($_FILES['userfile']['name']);
        }
        else
            echo "Alas!";
    }
    $this->photo();
}

public function photoAdd(){
    $count = count($_FILES['userfile']['name']);
    $name = $this->input->post('name');
    $this->load->library('image_lib');

    $files = $_FILES;
    for($i=0;$i<$count;$i++){
        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

        $config = $this->configEditAdd($name);


        $this->load->library('upload', $config);
        if($this->upload->do_upload()){
            $config = $this->imageConfigAdd($_FILES['userfile']['name'],$name);
            $this->image_lib->initialize($config);
            if ( ! $this->image_lib->resize())
            {
                echo $this->image_lib->display_errors();
            }
            else
                $this->insertImageAdd($_FILES['userfile']['name'],$name);
            }
        else
            echo "Alas!";
    }

    $this->image_lib->clear();

    $queryId = $this->propertymodel->getIdByName($name);
    $query= $this->propertymodel->getAllPicById($queryId);
    $photo_names = $this->propertymodel->getPicNameById($queryId);
    $data['photo_name'] = json_decode($photo_names);
    $data['id'] = $queryId;
    foreach($query as $row){
        $photo['photo_url']=$row->photo_url;
        $data['photo_url'] = $photo['photo_url'];
    }
    $data['name'] = $name;
    return true;
}

public function insertImage($name){
    $id=$this->input->post('id');
    $photo_names = $this->propertymodel->getPicNameById($id);
    $pictures = json_decode($photo_names);
    $i=0;
    foreach($pictures as $photos){
        $photo[$i] = $photos;
        $i++;
    }
    $count = count($photo);
    $photo[$count] = $name;
    $data['photo_name'] = json_encode($photo);

    $this->propertymodel->propertymodel->uploadPicById($id,$data);
}

public function configEdit(){
    $id = $this->input->post('id');
    $url = $this->propertymodel->getUploadUrlById($id);

    $config['upload_path'] = $url;
    $config['allowed_types'] = 'jpg';
    $config['max_size']	= '0';
    $config['max_width']  = '0';
    $config['max_height']  = '0';
    return $config;
}

public function configEditAdd($name){
    $query=$this->propertymodel->getSpecific($name);
    $i=0;
    if(isset($query)){
        foreach ($query as $row){
            $id = $row->id;
            $i++;
        }
    }
    $url = $this->propertymodel->getUploadUrlById($id);

    $config['upload_path'] = $url;
    $config['allowed_types'] = 'jpg';
    $config['max_size']	= '0';
    $config['max_width']  = '0';
    $config['max_height']  = '0';
    return $config;
}

public function insertImageAdd($name,$recordName){
    $query=$this->propertymodel->getSpecific($recordName);
    $i=0;
    if(isset($query)){
        foreach ($query as $row){
            $id = $row->id;
            $i++;
        }
    }
    $photo_names = $this->propertymodel->getPicNameById($id);
    if($photo_names == NULL){
        $i = 0;
        $photo[$i] = $name;
        $data['photo_name'] = json_encode($photo);
        $this->propertymodel->propertymodel->uploadPicById($id,$data);
    }
    else{
        $pictures = json_decode($photo_names);
        $i=0;
        foreach($pictures as $photos){
            $photo[$i] = $photos;
            $i++;
        }
        $count = count($photo);
        $photo[$count] = $name;
        $data['photo_name'] = json_encode($photo);
        $this->propertymodel->uploadPicById($id,$data);
    }
}

public function imageConfigAdd($name,$recordName){
    $query=$this->propertymodel->getSpecific($recordName);
    $i=0;
    if(isset($query)){
        foreach ($query as $row){
            $id = $row->id;
            $i++;
        }
    }
    $url = $this->propertymodel->getUploadUrlById($id);
    $sourceImage = $url.$name;
    $config['image_library'] = 'gd2';
    $config['source_image'] = $sourceImage;
    $config['create_thumb'] = FALSE;
    $config['maintain_ratio'] = FALSE;
    $config['width'] = 1250;
    $config['height'] = 596;
    return $config;
}

public function imageConfig($name){
    $id = $this->input->post('id');
    $url = $this->propertymodel->getUploadUrlById($id);
    $sourceImage = $url.$name;
    $config['image_library'] = 'gd2';
    $config['source_image'] = $sourceImage;
    $config['create_thumb'] = FALSE;
    $config['maintain_ratio'] = FALSE;
    $config['width'] = 1250;
    $config['height'] = 596;
    return $config;
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
    $path= $this->propertymodel->getUploadUrlById($id);
    if (! is_dir($path)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($path, strlen($path) - 1, 1) != '/') {
        $path .= '/';
    }
    $files = glob($path . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        }
        else {
            unlink($file);
        }
    }
    rmdir($path);
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

/*
Adds a property. If successful calls the property model
property model then inserts the data in mySql.
passes $data to the model's function.
*/
public function addProperty(){
    $this->load->helper(array('form'));
    $this->load->library('form_validation');

    //setting the rules for form validation.
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('address','Address','required');
    //$this->form_validation->set_rules('url', 'Url', 'required');
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
    $this->form_validation->set_rules('upload_url','Photo Upload Url', 'required');

    //if there is any validation failure redirect
    //back to the form.
    if($this->form_validation->run()==FALSE){
        $this->load->view('add');
    }
    //else call the model function to insert data
    else{
        $data['name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $urlform=$this->input->post('url');
        if(isset($urlform))
            $data['url'] = $this->input->post('url');

        /////////////////////Test///////////////////////////////

        $this->db->select_max('ID');
        $query = $this->db->get('wp_posts');
        $result=array_pop($query->result());
        $postID=$result->ID + 1;
        $date = date('Y-m-d H:i:s');
        $postUrl = "http://apartmentclub.localhost/?p=".$postID;
        $insertData = array(
            'post_author' => 1,
            'post_date' => $date,
            'post_content' => "",
            'post_title' => $data['name'],
            'post_excerpt' => "",
            'post_status' => "publish",
            'comment_status' => "open",
            'ping_status' => "open",
            'post_password' => "",
            'post_name' => $postID,
            'to_ping' => "",
            'pinged' => "",
            'post_content_filtered' => "",
            'guid' => $postUrl,
            'post_type' => "page",
            'comment_count' => 0
        );
        $data['url'] = "http://apartmentclub.localhost/?page_id=".$postID;
        $this->db->insert('wp_posts',$insertData);


        $insertData = array(
            array(
                'post_id' => $postID ,
                'meta_key' => '_wp_page_template' ,
                'meta_value' => 'my-custom-page.php'
            ),
            array(
                'post_id' => $postID ,
                'meta_key' => 'accesspress_ray_sidebar_layout' ,
                'meta_value' => 'right-sidebar'
            )
        );
        $this->db->insert_batch('wp_postmeta',$insertData);
        $postID = $postID+1;
        $date = date('Y-m-d H:i:s');
        $postUrl = "http://apartmentclub.localhost/?p=".$postID;
        $insertData = array(
            'post_author' => 1,
            'post_date' => $date,
            'post_content' => "",
            'post_title' => "",
            'post_excerpt' => "",
            'post_status' => "publish",
            'comment_status' => "open",
            'ping_status' => "open",
            'post_password' => "",
            'post_name' => $postID,
            'to_ping' => "",
            'pinged' => "",
            'post_content_filtered' => "",
            'guid' => $postUrl,
            'post_type' => "nav_menu_item",
            'comment_count' => 0
        );
        $this->db->insert('wp_posts',$insertData);

        $menuItemClasses="a:1:{i:0;s:0:\"\";}";
        $insertData = array(
          array(
              'post_id' => $postID ,
              'meta_key' => '_menu_item_type' ,
              'meta_value' => 'post_type'
          ),
          array(
              'post_id' => $postID ,
              'meta_key' => '_menu_item_menu_item_parent' ,
              'meta_value' => '45'
          ),
          array(
              'post_id' => $postID ,
              'meta_key' => '_menu_item_object_id' ,
              'meta_value' => '47'
          ),
          array(
              'post_id' => $postID ,
              'meta_key' => '_menu_item_object' ,
              'meta_value' => 'page'
           ),
           array(
                'post_id' => $postID ,
                'meta_key' => '_menu_item_target' ,
                'meta_value' => ''
            ),
            array(
                 'post_id' => $postID ,
                 'meta_key' => '_menu_item_classes' ,
                 'meta_value' => $menuItemClasses
            ),
            array(
                'post_id' => $postID ,
                'meta_key' => '_menu_item_xfn' ,
                'meta_value' => ''
            ),
            array(
                'post_id' => $postID ,
                'meta_key' => '_menu_item_url' ,
                'meta_value' => ''
            )
        );

        $this->db->insert_batch('wp_postmeta',$insertData);

        $insertData = array(
            array(
                'object_id' => $postID,
                'term_taxonomy_id' => 2,
                'term_order' => 0
            )
        );

        $this->db->insert('wp_term_relationships',$insertData);

        ////////////////////////////////////////////////////////

        $oldmask = umask(0);
        $photoUrl = "/var/www/html/apartmentclub/wp-content/themes/accesspress-ray/images/demo/";
        $data['upload_url'] = strtolower($this->input->post('upload_url'));
        $data['upload_url'] = $photoUrl.$data['upload_url']."/";

        $foldername = strtolower($this->input->post('upload_url'));
        $data['photo_url'] = "http://apartmentclub.localhost/wp-content/themes/accesspress-ray/images/demo/".$foldername."/";
        mkdir($data['upload_url'], 0777);
        umask($oldmask);

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

        $map['latitude'] = $this->input->post('latitude');
        $map['longitude'] = $this->input->post('longitude');

        $data['map'] = json_encode($map);

        $check = $this->propertymodel->insertData($data);
        $checkpic=$this->photoAdd();
        if($checkpic & $check){

            $data = $this->getEverything();
            $data['message']="success";

            $this->load->helper(array('form'));
            $this->load->view('home',$data);
        }
        else{
            $data['message']="fail";
            $this->load->helper(array('form'));
            $this->load->view('home',$data);
        }
    }
}

/*
Edits a property. If successful calls the property model
property model then inserts the data in mySql.
passes $data to the model's function.
*/
public function editProperty(){
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
    //back to home.
    if($this->form_validation->run()==FALSE){
        $data['message'] = "fail edit";
        $this->load->view('home',$data);
    }
    //else call the model function to insert data
    else{
        $id = $this->input->post('id');
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

        $map['latitude'] = $this->input->post('latitude');
        $map['longitude']= $this->input->post('longitude');
        $data['map'] = json_encode($map);

        $check = $this->propertymodel->updateById($data,$id);
        if($check){

            $data = $this->getEverything();
            $data['message']="success edit";

            $this->load->helper(array('form'));
            $this->load->view('home',$data);
        }
        else{
            $data['message']="fail";
            $this->load->helper(array('form'));
            $this->load->view('home',$data);
        }
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

public function wordP(){


    /*
    $date = date('Y-m-d H:i:s');
    echo $date;
    $menuItemClasses="a:1:{i:0;s:0:\"\";}";
    echo "<br>".$menuItemClasses;
    $objectId = 0; //this will change to what the value will be in the post table
    */
    /*
    $this->db->select_max('post_id');
    $query = $this->db->get('wp_postmeta');
    $result=array_pop($query->result());
    $count=$result->post_id + 1;
    //echo $count;

    $data = array(
       array(
          'post_id' => $count,
          'meta_key' => '_menu_item_type' ,
          'meta_value' => 'post_type'
       ),
       array(
          'post_id' => $count,
          'meta_key' => '_menu_item_menu_item_parent' ,
          'meta_value' => '45'
      ),
      array(
         'post_id' => $count,
         'meta_key' => '_menu_itemn_object_id'
         'meta_value' => ''
      )
    );

    $this->db->insert_batch('wp_postmeta',$data);
    if($this->db->affected_rows()>0)
        echo "Success!";
    else
        echo "Alas";

    */

}

public function logout(){
    $this->session->sess_destroy();
    $data['message']="You have been logged out! Please log in.";
    $this->load->helper(array('form'));
    $this->load->view('login',$data);
}

}
