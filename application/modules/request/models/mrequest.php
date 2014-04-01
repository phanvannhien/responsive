<?php
class MRequest extends MY_Model{        
        public $status;
        
        public $last_insert_id;
        public $last_insert_detail_id;


        function __construct() {
                parent::__construct();
                
                $this->tables['user_request']        = DBPREFIX . 'user_request';
                $this->tables['user_request_detail'] = DBPREFIX . 'user_request_detail';
                $this->tables['user_request_file']   = DBPREFIX . 'user_request_file';
                $this->tables['request_status']   = DBPREFIX . 'request_status';
                                
                $this->status = '';
                $this->pager_segment = 3;
        }

        public function initialize($config = array())
	{
		$defaults = array(
                );
                
                $a_merge = array_replace_recursive($defaults,$config);
                
                foreach ($a_merge as $key => $val) {
                        if(isset($this->$key)&&is_array($this->$key)){
                                $this->$key = array_replace_recursive($this->$key,$val);
                        }else{
                                $this->$key = $val;
                        }
                }
	}


        function get_list($a_options = array()){       
                $a_default_options = array(
                        'get_total_count' => false,
                );
                
                $a_options = array_merge($a_default_options, $a_options);
                
                $where = array(	
                        'user_id' => $this->user_id,                                
                );
                
                if($this->status != ''){
                        $where [$this->tables['user_request_detail'].'.request_status_id'] =  $this->status;
                }
                
		$this->db->select(
                                $this->tables['user_request'].'.id as request_id,'.
                                $this->tables['user_request'].'.user_id as user_id,'.
                                $this->tables['user_request'].'.time_expire as time_expire,'.
                                $this->tables['user_request_detail'].'.request_status_id as status_id,'.
                                $this->tables['request_status'].'.name as status_name,'.
                                $this->tables['user_request_detail'].'.id as request_detail_id,'.
                                $this->tables['user_request_detail'].'.product_name as product_name')
                        ->from(
                                $this->tables['user_request'])
                        ->join(
                                $this->tables['user_request_detail'], 
                                $this->tables['user_request'].'.id ='.$this->tables['user_request_detail'].'.request_id',
                                'left')
                        ->join(
                                $this->tables['request_status'], 
                                $this->tables['user_request_detail'].'.request_status_id ='.$this->tables['request_status'].'.id',
                                'left')
                        
                        ->where($where);		
		
                if($a_options['get_total_count'] == false){                         
                        $this->db->limit((int)  $this->a_pager['limit'],(int)$this->a_pager['offset']);
                        $this->db->order_by($this->tables['user_request_detail'].'.create_date', "desc");
                        $results = $this->db->get();
                        $this->db->close();
                        return $results->result();		
                }else{
                        $this->a_pager['total_rows'] = $this->db->count_all_results();                        
			$this->db->close();
                        
			return $this->a_pager['total_rows'];
                }
	}
        
        function get_request_info_detail($request_detail_id){
                $where = array(	
                        $this->tables['user_request_detail'].'.id' => $request_detail_id,                                
                );
                
                $this->db->select(
                                $this->tables['user_request'].'.id as request_id,'.
                                $this->tables['user_request'].'.user_id as user_id,'.
                                $this->tables['user_request'].'.time_expire as time_expire,'.
                                $this->tables['user_request_detail'].'.status as status,'.
                                $this->tables['user_request_detail'].'.id as request_detail_id,'.
                                $this->tables['user_request_detail'].'.product_name as product_name,'.
                                $this->tables['user_request_file'].'.name as file_name,'.
                                $this->tables['user_request_file'].'.file_id as file_id')
                        ->from(
                                $this->tables['user_request'])
                        ->join(
                                $this->tables['user_request_detail'], 
                                $this->tables['user_request'].'.id ='.$this->tables['user_request_detail'].'.request_id',
                                'right')
                        ->join(
                                $this->tables['user_request_file'], 
                                $this->tables['user_request_detail'].'.id ='.$this->tables['user_request_file'].'.request_detail_id',
                                'left'
                                )
                        ->where($where);
                
                return $this->db->get()->result();
        }
        
        public function insert_requests($a_options){                                                
                $array = array(
                    'user_id'               => $this->user_id,
                    'time_expire'           => $a_options['expire_date'],
                );
                
                $this->db->insert($this->tables['user_request'], $array);
                $request_id = $this->db->insert_id();
                
                foreach ($a_options['a_product_name'] as $key => $value) {
                        $array = array(
                                'request_id'                 => $request_id,
                                'product_name'               => $a_options['a_product_name'][$key],
                                'product_request_cate_id'    => $a_options['a_cat'][$key],
                                'product_request_info'       => $a_options['a_product_des'][$key],
                                'request_quantity_estimated' => $a_options['a_quantity'][$key],
                                'request_quantity_annual'    => '',
                                'request_status_id'    => '1',
                        );
                        
                        $this->db->insert($this->tables['user_request_detail'], $array);                        
                        $request_detail_id = $this->db->insert_id();
                        
                        if(!empty($a_options['a_relevant_file'][$key])){
                                foreach ($a_options['a_relevant_file'][$key] as $key_file => $relevant_file) {
                                        $array = array(
                                            'request_detail_id' => $request_detail_id,
                                            'name'              => $relevant_file,
                                            'desc'=>'',
                                            'file_path' => $relevant_file //
                                        );
                                        $this->db->insert($this->tables['user_request_file'], $array);
                                }
                        }
                }
                
        }
       
        function  get_file_path($file_id){ 
                $where = array(	
                        $this->tables['user_request'].'.user_id' => $this->user_id,                                
                        $this->tables['user_request_file'].'.file_id' => $file_id,                                
                );
                
                $this->db->select(                                
                                $this->tables['user_request_file'].'.name as file_name')
                        ->from(
                                $this->tables['user_request'])
                        ->join(
                                $this->tables['user_request_detail'], 
                                $this->tables['user_request'].'.id ='.$this->tables['user_request_detail'].'.request_id',
                                'right')
                        ->join(
                                $this->tables['user_request_file'], 
                                $this->tables['user_request_detail'].'.id ='.$this->tables['user_request_file'].'.request_detail_id',
                                'left'
                                )
                        ->where($where);
                
                 $query =  $this->db->get();
                 
                 if($query->num_rows() > 0){
                        return $query->row('file_name');
                 }else{
                        return NULL;
                 }
        }
        
        function get_all_status(){
                $this->db->select('id,name')
                        ->from($this->tables['request_status']);
                $result = $this->db->get()->result('array');
                
                foreach ($result as $key =>$value){
                        $a_return[$value['id']] = $value['name'];
                }
                
                return $a_return;
        }
        
        function get_attachment($request_detail_id){
            $this->db->select('file_path as file_path,name as file_name')
                    ->from($this->tables['user_request_file'])
                    ->where(
                            array(
                                'request_detail_id' =>$request_detail_id
                            ));
            $query = $this->db->get();
            return $query->result_array();
        }
                                                      
}
?>
