<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Auth
 *
 * @author furbox
 */
class M_Auth extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function addUser(){
        return $this->db->insert("users",  $this->input->post());
    }
    
    function get(){
        $query = $this->db->get("users");
        return $query->result();
    }
    
    function getUser($email){
        $query = $this->db->get_where("users",['email_address' => $email]);
        return $query->row();
    }
    
}
