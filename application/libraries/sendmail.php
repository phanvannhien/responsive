<?phpclass CI_sendmail{    function send($config)    {    $CI =& get_instance();//    require_once($_SERVER['DOCUMENT_ROOT'].'/namviet-gl/namviet//phpmailer/class.phpmailer.php');    require_once('././phpmailer/class.phpmailer.php');    $mail = new PHPMailer();                $mail->IsSMTP(); // Gọi đến class xử lý SMTP                $mail->Host = "localhost"; // tên SMTP server                //$mail->SMTPDebug = 2; // enables SMTP debug information (for testing)                // 1 = errors and messages                // 2 = messages only                $mail->SMTPAuth = true; // Sử dụng đăng nhập vào account                $mail->SMTPSecure = "ssl";                $mail->Host = "smtp.gmail.com"; // Thiết lập thông tin của SMPT                $mail->Port = 465; // Thiết lập cổng gửi email của máy                $mail->Username = $config['email_from'] ;// SMTP account username                $mail->Password = $config['email_from_pass'] ;// SMTP account password                                //Thiet lap thong tin nguoi gui va email nguoi gui                $mail->SetFrom($config['email_from'],$config['title']);                                 //Thiết lập thông tin người nhận                $mail->AddAddress($config['email_to1']);                //$mail->AddAddress($config['email_to2']);                //$mail->AddAddress($config['email_to3']);                //Thiết lập email nhận email hồi đáp                //nếu người nhận nhấn nút Reply                $mail->AddReplyTo($config['email_from'],$config['title']);                //Thiết lập tiêu đề                $mail->Subject = $config['title'];                //Thiết lập định dạng font chữ                $mail->CharSet = "utf-8";                //Thiết lập nội dung chính của email                $mail->AltBody = $config['body']; // optional, comment out and test                $mail->MsgHTML($config['body']);                $mail->IsHTML(true);                 //                echo '<pre>';//                print_r($config);exit;                                foreach($config['attachment'] as $value){                        $mail->AddAttachment($value['file_path'], $value['file_name']);                }                if(!$mail->Send()) {                    return "Mailer Error: " . $mail->ErrorInfo;                }                 else{                    return 'Sent Success! Thanks you';                }    }  }?>