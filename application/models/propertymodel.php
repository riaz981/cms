<?php

Class Propertymodel extends CI_Model{

/*
    logincheck. gets the data from controller
    checks if the username and password are
    present in the database. Based on the
    number of rows returned a validation is made
*/
function logincheck($username,$password){
    $this->db->select('ID,username,password');
    $this->db->from('wp_credentials');
    $this->db->where('username',$username);
    $this->db->where('password',MD5($password));
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows()==1){
            $row = $query->row();
            $data = array(
                    'username' => $row->username,
                    'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
    }

    else
        return false;
}

/*
    Insertion of data in the wp_property table
    Takes $data as an array and inserts it
    using the built in codeigniter function insert()
    affected_rows shows the number of rows that were
    affected.
*/
function insertData($data){
    $this->db->insert('wp_property',$data);
    if($this->db->affected_rows()>0){
        return true;
    }
    else{
        return false;
    }
}

function updateById($data,$id){
    $this->db->where('id',$id);
    $this->db->update('wp_property',$data);
    if($this->db->affected_rows()>0){
        return true;
    }
    else{
        return false;
    }
}

function getAllPicById($id){
    $this->db->select('id,photo_url,photo_name');
    $this->db->where('id',$id);
    $query = $this->db->get('wp_property');
    if($query->num_rows()>=1){
        return $query->result();
    }
    else
        echo "Could not fetch records";
}

function getPicNameById($id){
    $this->db->select('photo_name');
    $this->db->where('id',$id);
    $query = $this->db->get('wp_property');
    if($query->num_rows()>=1){
        $photo = array_pop($query->result());
        return $photo->photo_name;
    }
    else
        echo "Could not fetch records";
}

function getPicUrlById($id){
    $this->db->select('photo_url');
    $this->db->where('id',$id);
    $query = $this->db->get('wp_property');
    if($query->num_rows()>=1){
        $photo = array_pop($query->result());
        return $photo->photo_url;
    }
    else
        echo "Could not fetch records";
}

function getUploadUrlById($id){
    $this->db->select('upload_url');
    $this->db->where('id',$id);
    $query = $this->db->get('wp_property');
    if($query->num_rows()>=1){
        $photo = array_pop($query->result());
        return $photo->upload_url;
    }
    else
        echo "Could not fetch records";
}

function uploadPicById($id,$data){
    $this->db->where('id', $id);
    $this->db->update('wp_property', $data);
    if($this->db->affected_rows()>0){
        echo "Done again!";
    }
    else{
        echo "Alas!";
    }
}

/*
    Gets all the information from the database and
    throws information back to home function.
*/
function getAll(){
    $this->db->select('id,name,address,url');
    $query = $this->db->get('wp_property');
    if($query->num_rows()>=1){
        return $query->result();
    }
    else
        echo "Could not fetch records";
}

/*
    Gets data depending on the id passed.
    If successful throws back the data
    to the controller function that called
    it.
*/
function getById($id){
    $query = $this->db->get_where('wp_property',array('id'=>$id));
    if($query->num_rows()==1){
        return $query->result();
    }
    else{
        echo "could not fetch";
    }
}

/*
    Gets information about specific data from
    the table. Depending on the name provided.
    Uses like function for search for any
    string on both sides resembling the search
    result.
*/
function getSpecific($name){
    $this->db->like('name',$name,'both');
    $this->db->select('id,name,address,url');
    $query=$this->db->get('wp_property');
    if($query->num_rows()>=1)
        return $query->result();
    else
        echo "Could not fetch records";
}

function getIdByName($name){
    $this->db->like('name',$name,'both');
    $this->db->select('id');
    $query=$this->db->get('wp_property');
    if($query->num_rows()>=1){
        $propertyId = array_pop($query->result());
        return $propertyId->id;
    }
    else
        echo "Could not fetch records";
}

function deleteRecord($id){
    $this->db->select('postID');
    $this->db->where('id',$id);
    $query = $this->db->get('wp_property');
    $postResult = $query->result();
    $post = array_pop($postResult);

    $this->db->delete('wp_property',array('postID'=>$post->postID));
    $this->db->delete('wp_posts',array('ID'=>$post->postID));
    $this->db->delete('wp_postmeta',array('post_id'=>$post->postID));
    $post->postID = $post->postID + 1;
    $this->db->delete('wp_posts',array('ID'=>$post->postID));
    $this->db->delete('wp_postmeta',array('post_id'=>$post->postID));
    $this->db->delete('wp_term_relationships',array('object_id'=>$post->postID));

    if($this->db->affected_rows()>0){
        return true;
    }
    else{
        return false;
    }
}

}
