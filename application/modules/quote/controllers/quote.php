<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class quote extends MY_Controller {
        
        public function __construct() {
                parent::__construct();
                $this->load->model('Mquote');
                $this->load->model('request/Mrequest');
                $this->load->model('unit/Munit');
                
                $this->data['menu']  = 'quote';
                $this->data['email'] = $this->session->userdata('user_email');
        }

        function index() {
                $this->list_message('inbox');
        }

        function load_quotation_form (){
                $this->load->helper('form_helper');
                $request_detail_id = $this->uri->segment(3);
                $this->data['request_detail_id'] = $request_detail_id;
                $this->data['a_unit'] = $this->Munit->get_all();
                $this->data['sidebar'] = 'quotation_form';
                $this->load->view('quotation_form',  $this->data);
        }
        
        function view(){  
                
                
                
                $quote_id = $this->uri->segment(3);
                $this->data['sidebar'] = 'post_request';
                
                $this->data['quote'] = $this->Mquote->get_quote_info($quote_id);
                $this->data['a_quote_relevant_file'] = $this->Mquote->get_relevant_file($quote_id);
                $this->data['quote_message'] = $this->Mquote->get_quote_message($quote_id);
                                                
                $request_detail_id = $this->Mquote->get_request_detail_id($quote_id);
                $a_request_detail               = $this->Mrequest->get_request_info_detail($request_detail_id);
                $this->data['a_request_detail'] = $a_request_detail;
                $this->load->view('quote_detail',$this->data);
        }
        
        function download_image() {
                $file_path   = $this->uri->segment(3);

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
        
        function create_quote(){
                $a_product_name  = $this->input->get_post('product_name', TRUE);
                $a_model_number  = $this->input->get_post('model_number', TRUE);
                $a_shipping_term  = $this->input->get_post('shipping_term', TRUE);
                $a_port          = $this->input->get_post('port', TRUE);
                $a_currency      = $this->input->get_post('currency', TRUE);
                $a_price    = $this->input->get_post('price', TRUE);
                $a_unit          = $this->input->get_post('unit', TRUE);
                $a_quantity      = $this->input->get_post('quantity', TRUE);
                $a_product_desc  = $this->input->get_post('product_desc', TRUE);
                $a_product_photo = $this->input->get_post('product_photo', TRUE);
                $question = $this->input->get_post('question_for_buyer', TRUE);

                $a_relevant_file      = $this->input->get_post('relevant_file', TRUE);
                $valid_till = $this->input->get_post('valid_till', TRUE);
                $tmp                  = explode('-', $valid_till);
                $valid_till = date('Y-m-d', mktime(0, 0, 0, $tmp[1], $tmp[0], $tmp[2]));

                $quote_insert_id = $this->Mquote->insert(
                        array(
                            'a_product_name'       => $a_product_name,
                            'a_model_number'       => $a_model_number,
                            'a_shipping_term'       => $a_shipping_term,
                            'a_port'               => $a_port,
                            'a_currency'           => $a_currency,
                            'a_price'         => $a_price,
                            'a_unit'               => $a_unit,
                            'a_quantity'           => $a_quantity,
                            'a_product_desc'       => $a_product_desc,
                            'a_product_photo'      => $a_product_photo,
                            'valid_till' => $valid_till,
                            'a_relevant_file'      => $a_relevant_file,
                            'question' => $question
                        )
                );
                
                $this->o_response->quote_insert_id = $quote_insert_id;
                
                echo json_encode($this->o_response);
        }
}

?>
