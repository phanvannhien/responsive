<?php
class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
	}

	/*function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}*/
        
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
}
?>