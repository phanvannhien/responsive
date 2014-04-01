<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/manage.css" type="text/css"  media="all"  />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/jquery.ui.datepicker.validation.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/jquery.watermark.js"></script>
        <script src="<?php echo base_url(); ?>template/js/jquery.validate.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <!--[if lt IE 8]><link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-ie7buttonfix.css"><![endif]-->
        <!--[if IE 8]><link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-ie8buttonfix.css"><![endif]--> 
        <!--[if lt IE 8]>
            <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-ie7.css" rel="stylesheet">
        <![endif]-->


        <title><?php //echo $title;?></title>
        <script>

        </script>
        <script type="text/javascript">
            var LHCChatOptions = {};
            LHCChatOptions.opt = {widget_height: 340, widget_width: 300, popup_height: 520, popup_width: 500};
            (function() {
                var po = document.createElement('script');
                po.type = 'text/javascript';
                po.async = true;
                var refferer = (document.referrer) ? encodeURIComponent(document.referrer) : '';
                var location = (document.location) ? encodeURIComponent(document.location) : '';
                po.src = '//localhost/lhc_web/index.php/chat/getstatus/(click)/internal/(position)/middle_right/(check_operator_messages)/true/(top)/350/(units)/pixels/(leaveamessage)/true/(disable_pro_active)/true?r=' + refferer + '&l=' + location;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(po, s);
            })();
        </script>

    </head>
    <body> 
        <header>
            <?php if (isset($email)): ?>
                <div id="top" class="container">
                    <!-- Single button -->
                    <!-- Split button -->
                    <div class="col-lg-4">
                        <div class="btn-group">
                            <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">Xin chào:<?php echo $email; ?></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Thiết lập tài khoản</a></li>
                                <li><a href="<?php echo base_url() ?>user/update_pass">Đổi mật khẩu</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>user/logout">Thoát</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-8 pull-right">


                        <ul class="nav nav-pills pull-right">

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Golive</a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                                    <li role="presentation" class="dropdown-header">Người mua hàng</li>
                                    <li role="presentation" class="">
                                            <a href="<?=  base_url()."request/post_buying_request"?>">Gửi yêu cầu mua hàng</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#">Quản lý đơn hàng</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#">Quản lý hóa đơn</a>
                                    </li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation" class="dropdown-header">Người bán hàng</li>
                                    <li role="presentation" class="">
                                        <a href="#">Đăng sản phẩm mới</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#">Quản lý sản phẩm</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Bảo mật</a></li>
                                    <li><a href="#">Đăng sản phẩm</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div><!--end top-->
            <?php endif; ?>
            <div id="golive-logo" class="container">
                <a href="<?php echo base_url(); ?>">Golive</a>
            </div>
            <?php if (isset($email)): ?>
                <div class="container">
                    <ul class="nav nav-tabs" >
                        <li class="<?=$menu=='home'?'active':''?>"><a href="<?=base_url()."user/"?>">Home</a></li>
                        <li class="<?=$menu=='buying_request'?'active':''?>"><a href="<?=base_url()."request/post_buying_request"?>">Yêu cầu mua hàng</a></li>
                        <li class="<?=$menu=='trading'?'active':''?>"><a href="#">Giao dịch</a></li>
                        <li class="<?=$menu=='message'?'active':''?>"><a href="<?= base_url()?>message/list_message/inbox">Tin nhắn và liên hệ</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Thiết lập tài khoản <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() ?>user/update_pass">Đổi mật khẩu</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <hr class="sperator"/>
            <?php endif; ?>
        </header>
