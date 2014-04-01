<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Mupload extends MY_Model {

        public $file_path;
        public $file_name;
        public $create_date;
        public $file_ext;
        public $desc;
        public $relevant_table;

        public function __construct($config = array()) {
                parent::__construct();

                $this->table          = DBPREFIX . 'file';
                $this->tables['file'] = DBPREFIX . 'file';
                $this->file_path      = 'uploads/';
                $this->quote_id       = 1;
                $this->subject        = '';
                $this->content        = '';

                if (count($config) > 0) {
                        $this->initialize($config);
                }
        }

        public function initialize($config = array()) {//need edit
                $defaults = array(
                    'user_id'       => $this->user_id,                    
                    'file_path'     => $this->file_path,
                    'relevant_table' => 'message'
                );

                foreach ($defaults as $key => $val) {
                        if (isset($config[$key])) {
                                $this->$key = $config[$key];
                        }
                        else {
                                $this->$key = $val;
                        }
                }
        }

        

}

?>
