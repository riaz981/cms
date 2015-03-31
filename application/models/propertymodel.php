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

    function deleteRecord($id){
        $this->db->delete('wp_property',array('id'=>$id));
        if($this->db->affected_rows()>0){
            return true;
        }

        else{
            return false;
        }

    }


}
