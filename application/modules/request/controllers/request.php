<?php

class Request extends MY_Controller {

        function __construct() {
                parent::__construct();
                $this->load->model('Mrequest');
                $this->load->model('user/Muser');
                $this->load->library('formkey');
                $is_login = $this->session->userdata('is_login');

                if (!isset($is_login) || $is_login != true) {
                        if ($this->input->is_ajax_request()) {
                                $this->o_response->response = 'not_login';
                                echo json_encode($this->o_response);
                                exit;
                        }
                        else {
                                redirect(base_url() . 'user/login');
                        }
                }
                $this->data['email'] = $this->session->userdata('user_email');
                $this->data['menu']  = 'buying_request';
        }

        function index() {
                list_request();
        }

        function post_buying_request() {
                $this->data['sidebar'] = 'post_request';
                $this->load->view('buying_request', $this->data);
                $this->load->view('inc/footer');
        }

        function create_buying_request() {
                /* if($this->formkey->validate()==false){
                  echo 'you have just submited';
                  echo '<pre>';
                  print_r($this->session->all_userdata());
                  exit;
                  } */

                $a_product_name  = $this->input->get_post('product_name', TRUE);
                $a_cat           = $this->input->get_post('cat', TRUE);
                $a_quantity      = $this->input->get_post('quantities', TRUE);
                $a_product_des   = $this->input->get_post('product_des', TRUE);
                $a_relevant_file = $this->input->get_post('relevant_file', TRUE);

                $expire_date = $this->input->get_post('expire_date', TRUE);
                $tmp         = explode('-', $expire_date);
                $expire_date = date('Y-m-d', mktime(0, 0, 0, $tmp[1], $tmp[0], $tmp[2]));

                $this->Mrequest->insert_requests(
                        array(
                            'a_product_name'  => $a_product_name,
                            'a_cat'           => $a_cat,
                            'a_quantity'      => $a_quantity,
                            'a_product_des'   => $a_product_des,
                            'a_relevant_file' => $a_relevant_file,
                            'expire_date'     => $expire_date
                        )
                );
                
                
                $this->load->library('sendmail');
                $request_detail_id =22;
                $this->data['a_request_detail'] = $this->Mrequest->get_request_info_detail($request_detail_id);
                
                $a_suplier = $this->Muser->get_supplier();
                $suppliers = implode(',',$a_suplier) ;
                $mail_body = $this->load->view('tpl_mail_request_buying',  $this->data,TRUE);
                $a_attachment = $this->Mrequest->get_attachment($request_detail_id);
                
                foreach ($a_suplier as $email){

                        $config = array(
                            'email_from'      => SMTP_USER,
                            'email_from_pass' => SMTP_PASS,
                            'title'           => 'test send request buying',
                            'email_to1'       => $email,
                            'body'            => $mail_body,
                            'attachment'      => array()
                        );

                        if (!empty($a_attachment)) {
                                foreach ($a_attachment as $key => $attachment) {
                                        $config['attachment'][] = array(
                                            'file_path' => $this->upload_path . $attachment['file_path'],
                                            'file_name' => $attachment['file_name']
                                        );
                                }
                        }

                        $this->sendmail->send($config);
                }

                echo json_encode($this->o_response);
        }

        function multiupload() {
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|txt';
                $config['max_size']      = '300';
                $config['max_width']     = '1024';
                $config['max_height']    = '768';

                $this->load->library('upload', $config);

                $ret = array();
                foreach ($_FILES as $fieldname => $fileObject) {  //fieldname is the form field name
                        if (!empty($fileObject['name'])) {
                                $this->upload->initialize($config);
                                if (!$this->upload->do_upload($fieldname)) {
                                        $errors                     = $this->upload->display_errors();
                                        $this->o_response->response = 'error';
                                        $this->o_response->content  = $errors;
                                }
                                else {
                                        // Code After Files Upload Success 
                                        $upload_data = $this->upload->data();
                                        $ret[]       = $upload_data['file_name'];
                                }
                        }
                }

                echo json_encode($ret);
        }

        function list_request() {
                $this->Mrequest->status = $this->input->get_post('status');
                $this->Mrequest->a_pager['base_url'] = base_url() . 'request/list_request_ajax/';
                $this->Mrequest->a_pager['full_tag_open'] = '<p class="pagination" id="ajax_pagination_request">';
                
                $this->data['list_request_of_user']  = $this->Mrequest->get_list();
                $this->data['total_request_of_user'] = $this->Mrequest->get_total_count();
                $this->data['pagination'] = $this->Mrequest->create_links();
                $a_status                 = $this->Mrequest->get_all_status();
                $a_status['']             = 'All';
                $this->data['a_status']   = $a_status;
                $this->data['sidebar']    = 'list_request';
                $this->load->view('list_request_of_user', $this->data);
                $this->load->view('inc/footer');
        }

        function list_request_ajax() {
                $this->Mrequest->status = $this->input->get_post('status');
                $this->Mrequest->a_pager['base_url'] = base_url() . 'request/list_request_ajax/';
                $this->Mrequest->a_pager['full_tag_open'] = '<p class="pagination" id="ajax_pagination_request">';

                $this->data['list_request_of_user']  = $this->Mrequest->get_list();
                $this->data['total_request_of_user'] = $this->Mrequest->get_total_count();                
                $this->data['pagination'] = $this->Mrequest->create_links();

                $this->o_response->content = $this->load->view('list_request_of_user_ajax', $this->data, TRUE);
                echo json_encode($this->o_response);
        }

        function my_request_detail() {
                $request_detail_id = $this->input->get_post('request_detail_id');
                $a_where           = array('id'=> $request_detail_id);
                $o_request_detail               = $this->Mrequest->get_request_info_detail($request_detail_id);
                $this->data['a_request_detail'] = $o_request_detail;
                $this->data['sidebar'] = 'list_request';
                $this->load->view('my_request_detail', $this->data);
                $this->load->view('inc/footer');
        }

        function download_file() {
                $file_id   = $this->input->get_post('file_id');
                $file_path = $this->Mrequest->get_file_path($file_id);

                if (!empty($file_path)) {
                        $name      = $file_path;
                        $file_path = './uploads/' . $file_path;
                        $data      = file_get_contents($file_path); // Read the file's contents                        
                        $this->load->helper('download');
                        ob_clean();
                        force_download($name, $data);
                }
                else {
                        echo 'There are no file to download';
                }
        }
        
        function view(){
                $request_detail_id = $this->uri->segment(3);
                $a_where           = array('id'=> $request_detail_id);
                $o_request_detail               = $this->Mrequest->get_request_info_detail($request_detail_id);
                $this->data['a_request_detail'] = $o_request_detail;
                $this->data['sidebar'] = 'list_request';
                $this->load->view('view_request_detail', $this->data);
                $this->load->view('inc/footer');
        }

}

?>
