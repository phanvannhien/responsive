<?php
class M_product extends CI_Model{
     
    // Constructor model
    function __construct(){
        parent::__construct();
         
        // Load database
        $this->load->database();
    }
     
    // Lấy dữ liệu từ database
    function getProduct(){         
        // Lấy tất cả dữ liệu trong bảng product
        $sql = $this->db->get('gl_product');
        $result = $sql->result();
         
        // Trả kết quả về cho Controller
        return $result;
    }
}
?>
