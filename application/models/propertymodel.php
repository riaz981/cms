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
            echo "Success, your data has been entered!";
        }

        else{
            echo "There is something wrong. Could not enter data...";
        }

    }

    function getAll(){
        $this->db->select('id,name,address,url');
        $query = $this->db->get('wp_property');
        if($query->num_rows()>=1){
            return $query->result();
        }
        else
         echo "Could not fetch records";
    }


}
