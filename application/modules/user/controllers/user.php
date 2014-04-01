<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MUser');
        $this->data['menu'] = 'home';
        $this->data['email'] = $this->session->userdata('user_email');
    }

    public function index() {
        $is_login = $this->session->userdata('is_login');
        if (!isset($is_login) || $is_login != true) {
            redirect(base_url() . 'user/login');
        }

        $this->data['email'] = $this->session->userdata('user_email');
        $this->data['user'] = $this->MUser->getInfoByID('*',DBPREFIX.'user',array('user_email'=>$this->data['email']),array(DBPREFIX.'user_level'=>DBPREFIX.'user_level.user_level_id ='.DBPREFIX.'user.user_level_id'));

        $this->load->view('home', $this->data);
    }

    function update_user_pass() {

        $user_key = $this->uri->segment(3);
        if ($user_key != $this->MUser->getinfoUser('user', $user_key, 'user_key', 'user_key'))
            show_404();
        else {
            $this->data['email_change_pass'] = $this->MUser->getinfoUser('user', $user_key, 'user_key', 'user_email');
            $this->load->view('update_user_pass', $this->data);
        }
    }

    public function changepass() {
        if (isset($_POST['btnChangePass'])) {
            //load thư viện
            $this->load->library('sendmail');
            $generate_key = random_string('alnum', 255);
            $email_to = $this->input->post('forgot_email', TRUE);
            //Cập nhật user key code
            $array_update_key = array('user_key' => $generate_key);
            //echo $generate_key;
            $this->MUser->update_field('user', $email_to, 'user_email', $array_update_key);

            //Lấy link
            $link_active = base_url() . 'user/update_user_pass/' . $generate_key;
            $body = '
                <table>
                    <tr>
                        <td><h2>Đặt mật khẩu mới của bạn trên Golive</h2></td>
                        <td>
                            <p>Email này được gửi tới bạn vì bạn quên mật khẩu của mình.</p>
                            <p>Vui lòng <a href="' . $link_active . '"> nhấn vào đây</a>.</p>
                            <p>Nếu đường link trên không hoạt động bạn có thể sao chép đường link sau và dán vào trình duyệt.</p>
                            <p><a href="' . $link_active . '" target="_blank">' . $link_active . '</a></p>
                            <p>Chúc bạn mọi điều tốt đẹp nhất trong kinh doanh.</p>   

                        </td>
                    </tr>
                </table>
            ';

            $config = array(
                'email_from' => SMTP_USER,
                'email_from_pass' => SMTP_PASS,
                'title' => 'Change Pass',
                'email_to1' => $email_to,
                'body' => $body
            );
            $this->sendmail->send($config);
            $this->load->view('change_pass_success');
        } elseif (isset($_POST['btnChangePassSubmit'])) {
            $curent_user_email = $this->input->post('curent_user_email', TRUE);
            $new_user_pass = $this->input->post('new_password', TRUE);
            $array_update_pass = array('user_pass' => md5($new_user_pass));
            $this->MUser->update_field('user', $curent_user_email, 'user_email', $array_update_pass);
            $array_update_key = array('user_key' => '');
            //echo $generate_key;
            $this->MUser->update_field('user', $curent_user_email, 'user_email', $array_update_key);
            $this->data['message'] = 'Khôi phục mật khẩu thành công. Bạn có thể nhấn <a href="' . base_url() . 'user/login">Đăng nhập</a>';
            $this->load->view('update_user_pass', $this->data);
        } else {
            $this->load->view('changepass');
        }
    }

    public function register() {
        if (isset($_POST['btnSignIn'])) {
            $user_firstname = $this->input->post('user_firstname', TRUE);
            $user_lastname = $this->input->post('user_lastname', TRUE);
            $user_email = $this->input->post('user_email', TRUE);
            $user_phone = $this->input->post('user_phone', TRUE);
            $user_password = md5($this->input->post('user_password', TRUE));
            $user_sex = $this->input->post('user_sex', TRUE);
            $user_birthday = $this->input->post('user_birthday', TRUE);
            $user_type = $this->input->post('user_type', TRUE);
            $published = 0; //disable
            $arrayInser = array(
                'user_firstname' => $user_firstname,
                'user_lastname' => $user_lastname,
                'user_pass' => $user_password,
                'type_id' => $user_type,
                'user_email' => $user_email,
                'user_phone' => $user_phone,
                'user_sex' => $user_sex,
                'user_birthday' => $user_birthday,
                'published' => $published,
                'user_level_id' => '1',
            );

            $this->MUser->insert($arrayInser);
            $this->load->view('login');
        } else {
            $this->data['user_type'] = $this->MUser->getAll(DBPREFIX . 'user_type');
            $this->load->view('register', $this->data);
        }
        //$this->data['email']= '123';
    }

    public function login() {
        $return_url = substr($this->uri->uri_string(), 11);        
        $this->data['return_url'] = $return_url;
        $is_login = $this->session->userdata('is_login');
        if (isset($is_login) && $is_login == true) {
                redirect(base_url() . 'user');
        }
        if (isset($_POST['btnSignIn'])) {
            $email = $this->input->post('user_email', TRUE);
            $pass = $this->input->post('user_password', TRUE);
            if ($this->MUser->login($email, $pass)) {
                //Set session user login
                $data_session = array(
                    'user_email' => $email,
                    'is_login' => true
                );
                $this->session->set_userdata($data_session);
                //update last login
                date_default_timezone_set('Asia/Bangkok');
                $this->MUser->update_field('user', $email, 'user_email', array('user_last_login'=>  date('Y-m-d h:s:i')));
                
                if(empty($return_url)){
                        redirect(base_url() . 'user');  
                }else{
                        redirect(base_url().$return_url);                      
                }
                 
            } else {
                $this->data['message'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
                $this->load->view('login', $this->data);
            }
        }//
        else
            $this->load->view('login',$this->data);
    }

//end login

    function logout() {
        $array_items = array('user_email' => '', 'is_login' => '');                
        $this->session->unset_userdata($array_items);
        $this->data['return_url'] = '';
        $this->load->view('login',$this->data);
    }

    function update_pass() {
        if ($this->input->post('submit_update_pass')) {
            $user_current = $this->session->userdata('user_email');
            $array = array('user_pass' => md5($this->input->post('new_pass', TRUE)));
            if ($this->MUser->update_field('user', $user_current, 'user_email', $array) > 0) {
                $this->data['message'] = 'Thay đổi mật khẩu thành công';
            }
            $this->load->view('update_pass', $this->data);
        }
        else
            $this->load->view('update_pass');
    }

    //validate user update password forget pass
    function validate_pass() {
        $user_current = $this->session->userdata('user_email');
        $user_current_pass = $_POST['user_current_pass'];
        if (md5($user_current_pass) == $this->MUser->getinfoUser('user', $user_current, 'user_email', 'user_pass'))
            echo 'true';
        else {
            echo 'false';
        }
    }

    //ajax valida email
    function validate_email() {
        $email_check = $_POST['email'];
        if ($email_check == $this->MUser->getinfoUser('user', $email_check, 'user_email', 'user_email'))
            echo 'false';
        else {
            echo 'true';
        }
    }

//end check validate_email
}

?>