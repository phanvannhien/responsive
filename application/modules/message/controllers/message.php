<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Message extends MY_Controller {
        
        public function __construct() {
                parent::__construct();
                $this->load->model('Mmessage');
                
                $this->data['menu']  = 'message';
                $this->data['email'] = $this->session->userdata('user_email');
        }

        function index() {
                $this->list_message('inbox');
        }

        function newmesage() {
                $this->load->helper(array('editor_helper'));
                $this->data['ckediter'] = $this->ckeditor->replace("message_content", editerGetDefaultConfig());
                $this->data['email']    = $this->session->userdata('user_email');
                $this->data['user']     = $this->Mmessage->getInfoByID('*', DBPREFIX . 'user', array('user_email' => $this->data['email']), array('user_level' => 'user_level.user_level_id = user.user_level_id'));
                $this->load->view('new', $this->data);
        }

        function create_message() {
                $a_init = array(
                    'send_to'       => $this->input->get_post('sent_to'),
                    'content'       => $this->input->get_post('content'),
                    'subject'       => $this->input->get_post('subject'),
                    'attach_file' => $this->input->get_post('attach_file'),
                    'quote_id'    => $this->input->get_post('quote_id'),
                );

                $this->Mmessage->initialize($a_init);
                $this->Mmessage->insert();

                $this->load->library('sendmail');
                $config = array(
                    'email_from'      => SMTP_USER,
                    'email_from_pass' => SMTP_PASS,
                    'title'           => $a_init['subject'],
                    'email_to1'       => $a_init['send_to'],
                    'body'            => $a_init['content'],
                    'attachment'    => array()
                );
                                               
                $file_path =  $_SERVER['DOCUMENT_ROOT'].'/namviet-gl/namviet/uploads/';
                
                if(!empty($a_init['attach_file'])){
                        foreach($a_init['attach_file'] as $key => $file_name){
                                $config['attachment'][] = array(
                                   'file_path'=> $file_path.$file_name,
                                    'file_name'=>$file_name);
                        }
                }
                
                $this->sendmail->send($config);
                
                $this->o_response->quote_id = $this->Mmessage->quote_id;
                echo json_encode($this->o_response);
        }
        
        
        function list_message($mode = ''){
                $mode = $mode!=''?$mode: $this->uri->segment(3);
                $this->Mmessage->mode = $mode;
                                
                $this->data['list_message']  = $this->Mmessage->get_list();
                $this->data['total_message'][$mode] = $this->Mmessage->get_total_count();                
                $this->data['pagination'] = $this->Mmessage->create_links();
                $this->data['mode'] = $mode;
                
                $this->load->view('list_message', $this->data);                
        }

        function list_message_ajax($mode = ''){
                $mode = $mode!=''?$mode: $this->uri->segment(3);
                $this->Mmessage->mode = $mode;
                                
                $this->data['list_message']  = $this->Mmessage->get_list();
                $this->data['total_message'][$mode] = $this->Mmessage->get_total_count();                 
                $this->data['pagination'] = $this->Mmessage->create_links();
                $this->data['mode'] = $mode;
                                                
                $this->o_response->content = $this->load->view('list_message_ajax', $this->data, TRUE);
                echo json_encode($this->o_response);                
        }
        
        function  delete(){ 
                $mode = $this->uri->segment(3);
                $a_message_id = $this->input->get_post('list_message_id');                
                switch ($mode){
                        case 'inbox':
                                $this->Mmessage->delete($a_message_id,'TRASH');
                                break;
                        case 'trash':
                                $this->Mmessage->delete($a_message_id,'DELETE');
                                break;
                        default : 
                                $this->Mmessage->delete($a_message_id,'TRASH');
                                break;
                }
                
                echo json_encode($this->o_response);
        }
        
        function report_spam(){
                $a_message_id = $this->input->get_post('list_message_id');
                $this->Mmessage->report_spam($a_message_id);
                echo json_encode($this->o_response);
        }
        
        function mark_read(){
                $is_read = $this->input->get_post('is_read');                
                $a_message_id = $this->input->get_post('list_message_id');
                
                if($is_read == '0'){
                        $this->Mmessage->mark_read($a_message_id,0);
                }else{
                        $this->Mmessage->mark_read($a_message_id,1);
                }
                
                echo json_encode($this->o_response);
        }
                
        function message_detail(){
                $message_id = $this->input->get_post('message_id');
                $this->data['message'] = $this->Mmessage->getInfo($message_id);
                $this->Mmessage->mark_read(array($message_id),1);
                $this->load->view('message_detail',  $this->data);
        }
                
}

?>
