<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author furbox
 */
class Template extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function call_template($data){
        $this->load->view('Template/Template',$data);
    }
}
