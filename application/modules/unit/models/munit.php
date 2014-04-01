<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Munit extends MY_Model {
        
        public function __construct() {
                parent::__construct();
                
                $this->table                  = DBPREFIX . 'unit';                                                
                $this->pager_segment = 4;//overload
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
                $this->load_all_db_columns_name();
        }

        public function get_all(){
                $this->db->select('id,name')->from($this->table)->where(array('status'=>''));
                $result =  $this->db->get()->result();
                $a_return = array();
                foreach($result as $key => $row){
                        $a_return[$row->id] = $row->name;
                }
                
                return $a_return;
        }
        
}
?>
