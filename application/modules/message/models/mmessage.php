<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Mmessage extends MY_Model {

        public $quote_id;
        public $create_date;
        public $a_attach_file;
        public $content;
        public $subject;
        public $file_path;
        public $mode;

        public function __construct() {
                parent::__construct();

                $this->table                  = DBPREFIX . 'message';
                $this->tables['message']      = DBPREFIX . 'message';
                $this->tables['message_file'] = DBPREFIX . 'message_file';
                $this->tables['quote']        = DBPREFIX . 'quote';
                $this->file_path              = 'uploads/';
                $this->quote_id               = '';
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

        function insert() {
                $a_insert = array(
                    'user_id'     => $this->user_id,
                    'quote_id'    => $this->quote_id,
                    'content'     => $this->content,
                    'subject'     => $this->subject,
                    'create_date' => $this->create_date
                );

                $this->db->insert($this->tables['message'], $a_insert);
                $message_id = $this->db->insert_id();

                if (!empty($this->a_attach_file)) {
                        foreach ($this->a_attach_file as $key => $file_name) {
                                $a_insert = array(
                                    'message_id'  => $message_id,
                                    'name'        => $file_name,
                                    'description' => '',
                                    'file_path'   => $this->file_path . $file_name
                                );
                                $this->db->insert($this->tables['message_file'], $a_insert);
                        }
                }
        }
        
        function get_list($a_options = array('get_total_count' => false)){ 
                $where = array(	                                                       
                        $this->tables['message'].'.status !=' => 'DELETE',
                );
                
                switch ($this->mode){
                        case 'inbox':
                                $where[$this->tables['quote'] . '.user_id'] = $this->user_id;
                                $where[$this->tables['message'] .'.status ='] = '';
                                break;
                        case 'sentbox':
                                $where[$this->tables['message'] . '.user_id'] = $this->user_id;
                                break;
                        case 'trash':
                                $where[$this->tables['quote'] . '.user_id'] = $this->user_id;
                                $where[$this->tables['message'] .'.status'] = 'TRASH'; 
                                break;
                        case 'spam':
                                $where[$this->tables['quote'] . '.user_id'] = $this->user_id;
                                $where[$this->tables['message'] .'.status'] = 'SPAM'; 
                                break;
                        default :
                                $where[$this->tables['quote'] . '.user_id'] = $this->user_id;
                                $where[$this->tables['message'] .'.status ='] = '';
                                break;
                }
                                                
                $this->db->select(
                                $this->tables['message'].'.id as message_id,'.
                                $this->tables['message'].'.user_id as message_sender,'.
                                $this->tables['message'].'.subject as message_subject,'.                                                                                                
                                $this->tables['message'].'.content as message_content,'.                                                                                                
                                $this->tables['message'].'.is_read as is_read,'.                                                                                                
                                $this->tables['message'].'.create_date as message_create_date,'.                                                                                                
                                $this->tables['quote'].'.user_id as user_id')
                        ->from(
                                $this->tables['message'])
                        ->join(
                                $this->tables['quote'], 
                                $this->tables['message'].'.quote_id ='.$this->tables['quote'].'.id',
                                'left')                        
                        ->where($where);
                
		
                if($a_options['get_total_count'] == false){                         
                        if(!isset($this->a_pager['offset'])){
				$this->a_pager['offset'] = '';
                        }
                        
                        $this->db->limit((int)  $this->a_pager['limit'],(int)$this->a_pager['offset']);
                        $this->db->order_by($this->tables['message'].'.create_date', "desc");
                        $results = $this->db->get();
                        $this->db->close();
                        
                        return $results->result();		
                }else{
                        $this->a_pager['total_rows'] = $this->db->count_all_results();                        
			$this->db->close();
			return $this->a_pager['total_rows'];
                }
        }
                
        function delete($a_message_id,$mode = 'TRASH'){
                switch ($mode){
                        case 'TRASH':
                                $a_update = array(
                                        'status'               => 'TRASH',                    
                                );
                                break;
                        case 'DELETE':
                                $a_update = array(
                                        'status'               => 'DELETE',                    
                                );
                                break;
                        default :
                                $a_update = array(
                                        'status'               => 'TRASH',                    
                                );
                }
                                                
                foreach ($a_message_id as $key =>$message_id){
                        $this->db->where('id',$message_id);
                        $this->db->update($this->tables['message'], $a_update);
                        
                        $this->db->where('message_id',$message_id);
                        $this->db->update($this->tables['message_file'], $a_update);                      
                }                                
        }
        
        function report_spam($a_message_id){
                $a_update = array('status'=> 'SPAM');
                
                foreach ($a_message_id as $key =>$message_id){
                        $this->db->where('id',$message_id);
                        $this->db->update($this->tables['message'], $a_update);                                                                     
                } 
        }
        
        function getInfo($message_id){
                $where = array(	
                        $this->tables['message'].'.id' => $message_id,                                
                );
                
                $this->db->select(
                                $this->tables['message'].'.id as message_id,'.
                                $this->tables['message'].'.subject as subject,'.
                                $this->tables['message'].'.content as content,'.                                
                                $this->tables['message'].'.create_date as create_date,'.                                
                                $this->tables['message'].'.user_id as sender,'.                                
                                $this->tables['quote'].'.id as quote_id,'.                                
                                $this->tables['quote'].'.description as quote_desc,'.                                
                                $this->tables['message_file'].'.name as file_name,'.                                
                                $this->tables['message_file'].'.id as file_id')
                        ->from(
                                $this->tables['message'])
                        ->join(
                                $this->tables['message_file'], 
                                $this->tables['message'].'.id ='.$this->tables['message_file'].'.message_id',
                                'left')                        
                        ->join(
                                $this->tables['quote'], 
                                $this->tables['message'].'.quote_id ='.$this->tables['quote'].'.id',
                                'left')                        
                        ->where($where);
                
                return $this->db->get()->result();
        }
        
        function mark_read($a_message_id,$is_read = 1){
                $a_update = array('is_read'=> $is_read);
                
                foreach ($a_message_id as $key =>$message_id){
                        $this->db->where('id',$message_id);
                        $this->db->update($this->tables['message'], $a_update);                                                                     
                } 
        }
        
        function get_quote_info($message_id){
                switch ($this->mode){
                        case 'inbox':
                                $where[$this->tables['quote'] . '.user_id'] = $this->user_id;
                                $where[$this->tables['message'] .'.status ='] = '';
                                break;
                        case 'sentbox':
                                $where[$this->tables['message'] . '.user_id'] = $this->user_id;
                                break;
                        case 'trash':
                                $where[$this->tables['quote'] . '.user_id'] = $this->user_id;
                                $where[$this->tables['message'] .'.status'] = 'TRASH'; 
                                break;
                        case 'spam':
                                $where[$this->tables['quote'] . '.user_id'] = $this->user_id;
                                $where[$this->tables['message'] .'.status'] = 'SPAM'; 
                                break;
                        default :
                                $where[$this->tables['quote'] . '.user_id'] = $this->user_id;
                                $where[$this->tables['message'] .'.status ='] = '';
                                break;
                }
                                                
                $this->db->select(
                                $this->tables['message'].'.id as message_id,'.                                
                                $this->tables['quote'].'.id as quote_id,'.                                                                                                
                                $this->tables['quote'].'.description as quote_des,'.                                                                                                
                                $this->tables['quote'].'.user_id as user_id')
                        ->from(
                                $this->tables['message'])
                        ->join(
                                $this->tables['quote'], 
                                $this->tables['message'].'.quote_id ='.$this->tables['quote'].'.id',
                                'left')                        
                        ->where($where);
        }
        
}
?>
