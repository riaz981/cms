<?php

Class Propertymodel extends CI_Model{

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

    function insertData($data){
        $this->db->insert('wp_property',$data);
        if($this->db->affected_rows()>0){
            echo "Success your data has been entered!";
        }

        else{
            echo "There is something wrong. Could not enter data...";
        }

    }


}
