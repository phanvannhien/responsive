<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    

    public function index() {
        $is_login = $this->session->userdata('is_login');
        if (!isset($is_login) || $is_login != true) {
            redirect(base_url().'user');
           
        }
     
        $data['email']=$this->session->userdata('user_email');
        $this->load->view('home',$data);
    }
    

}

