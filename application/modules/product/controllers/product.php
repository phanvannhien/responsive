<?php

class Product extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        // Load model m_category lên
        $this->load->model('m_product');         
        // Gọi hàm trong model
        $data['categories'] = $this->m_product->getProduct(); 
        // Truyền dữ liệu vào view và hiển thị
        $this->load->view('product', $data);        
    }    
    function loadProduct(){
        // Load model m_product lên
        $this->load->model('m_product');         
        // Gọi hàm trong model
        $data['products'] = $this->m_product->getProduct(); 
        // Truyền dữ liệu vào view và hiển thị
        $this->load->view('product', $data);   
    }
}
?>
