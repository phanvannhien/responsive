<?php
class Mquote extends MY_Model{        
        public $quote_id;
        public $create_date;
        public $a_attach_file;
        public $content;
        public $subject;
        public $file_path;
        public $mode;

        public function __construct() {
                parent::__construct();

                $this->table                  = DBPREFIX . 'quote';
                $this->tables['quote']        = DBPREFIX . 'quote';
                $this->tables['quote_file']   = DBPREFIX . 'quote_file';
                $this->tables['quote_detail'] = DBPREFIX . 'quote_detail';
                $this->tables['message']      = DBPREFIX . 'message';
                $this->file_path              = 'uploads/';
                $this->quote_id               = 1;
                $this->subject                = '';
                $this->content                = '';

                $this->pager_segment = 4; //overload
        }
                       
        public function initialize($config = array()) {
                $defaults = array();
                
                $a_merge = array_replace_recursive($defaults,$config);
                foreach ($a_merge as $key => $val) {
                        if(isset($this->$key)&&is_array($this->$key)){
                                $this->$key = array_replace_recursive($this->$key,$val);
                        }else{
                                $this->$key = $val;
                        }
                }
//                $this->load_all_db_columns_name();
        }
        
        function get_quote_info($quote_id){               
               $where[$this->tables['quote'] .'.id ='] = $quote_id;
               
                $this->db->select(                                                              
                                $this->tables['quote'].'.id as quote_id,'.                                                                                                
                                $this->tables['quote'].'.description as quote_desc,'.                                                                                                
                                $this->tables['quote'].'.user_id as quote_user_id')
                        ->from(
                                $this->tables['quote'])                                             
                        ->where($where); 
//                       echo '<pre>';
//                       print_r($this->db->get()->result());exit;
                
                return $this->db->get()->row(); 
        }
        
        function get_relevant_file($quote_id){
               $where[$this->tables['quote'] .'.id ='] = $quote_id;
               $where[$this->tables['quote_file'] .'.relevant_type ='] = 'QUOTE_RELEVANT_FILE';
                
                $this->db->select(
                                $this->tables['quote_file'].'.name as file_name,'.                                
                                $this->tables['quote_file'].'.path as file_path,'.                                
                                $this->tables['quote_file'].'.id as file_id')                                                                
                        ->from(
                                $this->tables['quote'])
                        ->join(
                                $this->tables['quote_file'], 
                                $this->tables['quote_file'].'.relevant_id ='.$this->tables['quote'].'.id',
                                'left')                        
                        ->where($where) 
                        ->order_by($this->tables['quote_file'].'.create_date', "asc");                
//                       echo '<pre>';
//                       print_r($this->db->get()->result());exit;
                
                return $this->db->get()->result(); 
        }
        
        function get_quote_message($quote_id){
               $where[$this->tables['message'] .'.status ='] = '';
               $where[$this->tables['message'] .'.quote_id ='] = $quote_id;
                
                $this->db->select(
                                $this->tables['message'].'.id as message_id,'.                                
                                $this->tables['message'].'.user_id as message_user_id,'.                                
                                $this->tables['message'].'.content as message_content,'.                                
                                $this->tables['quote'].'.id as quote_id,'.                                                                                                
                                $this->tables['quote'].'.description as quote_desc,'.                                                                                                
                                $this->tables['quote'].'.user_id as quote_user_id')
                        ->from(
                                $this->tables['quote'])
                        ->join(
                                $this->tables['message'], 
                                $this->tables['message'].'.quote_id ='.$this->tables['quote'].'.id',
                                'left')                        
                        ->where($where) 
                        ->order_by($this->tables['message'].'.create_date', "asc");                
                return $this->db->get()->result();                
        }
        
        function get_request_detail_id($quote_id){
                $this->db->select($this->tables['quote'].'.request_detail_id as request_detail_id')
                        ->from($this->tables['quote'])
                        ->where(array(
                        $this->tables['quote'].'.id' => $quote_id
                        ));
                return $this->db->get()->row()->request_detail_id;
        }


        public function insert($a_options){
                $array = array(
                    'user_id'               => $this->user_id,
                    'valid_till'           => $a_options['valid_till'],
                    'description'         => $a_options['question']
                );
                
                $this->db->insert($this->tables['quote'], $array);
                $quote_id = $this->db->insert_id();
                
                if (!empty($a_options['a_relevant_file'])) {
                        foreach ($a_options['a_relevant_file'] as $key => $file_name) {
                                $array = array(
                                    'relevant_id' => $quote_id,
                                    'relevant_type' => 'QUOTE_RELEVANT_FILE',
                                    'name'              => $file_name,
                                    'description'       => '',
                                    'path'         => $file_name //
                                );
                                
//                                echo '<pre>';
//                                                                print_r($a_options);exit;
                                $this->db->insert($this->tables['quote_file'], $array);
                        }
                }
                
                foreach ($a_options['a_product_name'] as $key => $value) {
                        $array = array(
                            'quote_id'     => $quote_id,
                            'product_name' => $a_options['a_product_name'][$key],
                            'model_number' => $a_options['a_model_number'][$key],
                            'price'        => $a_options['a_price'][$key],
                            'description'  => $a_options['a_product_desc'][$key],
                            'quantity'     => $a_options['a_quantity'][$key],
                            'shipping_id'  => $a_options['a_shipping_term'][$key],
                            'port'         => $a_options['a_port'][$key],
                            'currency'     => $a_options['a_currency'][$key],
                            'unit_id'      => $a_options['a_unit'][$key],
                            'status'       => '',
                        );
                        
                        $this->db->insert($this->tables['quote_detail'], $array);                        
                        $quote_detail_id = $this->db->insert_id();
                        
                        if(!empty($a_options['a_product_photo'][$key])){
                                foreach ($a_options['a_product_photo'][$key] as $key => $file_name) {
                                        $array = array(
                                            'relevant_id'   => $quote_detail_id,
                                            'relevant_type' => 'QUOTE_PRODUCT_PHOTO',
                                            'name'          => $file_name,
                                            'path'          => $file_name, //
                                            'description'   => '',
                                        );
                                        $this->db->insert($this->tables['quote_file'], $array);
                                }
                        }
                }
                
                return $quote_id;
        }
                                                      
}
?>
