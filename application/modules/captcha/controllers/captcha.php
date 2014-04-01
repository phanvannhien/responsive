<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Captcha extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('captcha'));
        $this->load->library('session');
    }

    public function index() {
        $vals = array(
            'img_path' => APPPATH . '../uploads/captcha/images/',
            'img_url' => APPLICATION_URL . '/uploads/captcha/images/',
            'font_path' => APPPATH . '../uploads/captcha/fonts/texb.ttf',
            'img_width' => '200',
            'img_height' => '50',
            'expiration' => 7200
        );
//        echo '<pre>';
//                print_r($vals);exit;
        $cap = create_captcha($vals);
        $this->session->set_userdata(array(
            'captchasecurity' => $cap['word']
        ));
        echo $cap['image'];
    }

    function validate() {
        /*$captcha = trim($this->input->get_post('captcha'));
//        echo $this->session->userdata('captchasecurity');exit;
        if($captcha == $this->session->userdata('captchasecurity')){
                echo 'true';                
        }else{
                echo 'false';
        }*/
        echo $this->session->userdata('captchasecurity'); 
    }

}
