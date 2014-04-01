<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formkey
{
    private $formkey;
    private $old_formkey;
    
    function __construct()
    {
        $this->ci = & get_instance();
//        $this->ci->load->library('session');
        $this->ci->load->library('form_validation');
        
        
        if($this->ci->session->userdata('formkey'))
        {            
            $this->old_formkey = $this->ci->session->userdata('formkey');
            
        }
        
    }

    private function generate_key()
    {
        $ip = $this->ci->input->ip_address();
        $uniqid = uniqid(mt_rand(), true);         
        return md5($ip . $uniqid);
//        if ($this->ci->session->userdata('formkey')=='test3')
//                { 
//                echo 'sdsdsdsdsdsdsdsdsdsdsdsdsds';
////                exit;
//                
//                }
//          return $this->ci->session->userdata('formkey')=='test3'?'conme6':'test3';
//          $this->formkey = $this->ci->session->userdata('formkey')=='test3'?'conme10':'test3';
//        return 'test'.date('h:i:s');
    }

    
    public function render_field()
    {   
//            $this->generate_key();
        $this->formkey = $this->generate_key();
//        $this->ci->session->set_userdata('formkey', '');
        $this->ci->session->set_userdata('formkey', $this->formkey);
//         echo '<pre>';
//                        print_r($this->ci->session->all_userdata());
//         echo '</pre>';               

        return form_hidden('formkey', $this->formkey);
    }

    public function validate()
    {
        if($this->ci->input->post('formkey') == $this->old_formkey)
        {                   
            return TRUE;
        } 
        else
        {                   
            $this->ci->form_validation->set_message('_check_formkey', '%s is wrong!');
            return FALSE;
        }
    }
    
}
?>