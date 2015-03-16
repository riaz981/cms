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


}
