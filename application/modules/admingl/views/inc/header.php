<!DOCTYPE HTML><html>    <head>        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/manage.css" type="text/css"  media="all"  />        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/jquery.ui.datepicker.validation.js"></script>        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/jquery.watermark.js"></script>        <script src="<?php echo base_url(); ?>template/js/jquery.validate.min.js"></script>        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>        <!--Tree View-->        <script type="text/javascript" src="<?php echo base_url(); ?>template/jqueryFileTree/jquery.easing.js"></script>        <script type="text/javascript" src="<?php echo base_url(); ?>template/jqueryFileTree/jqueryFileTree.js"></script>        <link rel="stylesheet" href="<?php echo base_url(); ?>template/jqueryFileTree/jqueryFileTree.css" type="text/css"/>                        <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->        <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>                <!--[if lt IE 8]><link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-ie7buttonfix.css"><![endif]--><!--[if IE 8]><link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-ie8buttonfix.css"><![endif]-->         <!--[if lt IE 8]>            <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-ie7.css" rel="stylesheet">        <![endif]-->        <title><?php //echo $title;               ?></title>    </head>    <body>         <header>            <?php if (isset($email)): ?>                <div id="golive-logo" class="col-lg-12">                    <a href="<?php echo base_url(); ?>">Golive</a>                </div>                <div id="" class="col-lg-12">                    <!-- Single button -->                    <!-- Split button -->                    <nav class="navbar navbar-default" role="navigation">                        <!-- Brand and toggle get grouped for better mobile display -->                        <div class="navbar-header">                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">                                <span class="sr-only">Toggle navigation</span>                                <span class="icon-bar"></span>                                <span class="icon-bar"></span>                                <span class="icon-bar"></span>                            </button>                            <a class="navbar-brand" href="#">Brand</a>                        </div>                        <!-- Collect the nav links, forms, and other content for toggling -->                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">                            <ul class="nav navbar-nav">                                <li class="active"><a href="#">Link</a></li>                                <li><a href="#">Link</a></li>                                <li class="dropdown">                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh mục<b class="caret"></b></a>                                    <ul class="dropdown-menu">                                        <li role="presentation" class="dropdown-header">Nhóm Sản phẩm</li>                                        <li><a href="<?php echo base_url();?>admingl/category">Chuyên mục</a></li>                                        <li><a href="#">Another action</a></li>                                        <li><a href="#">Something else here</a></li>                                        <li class="divider"></li>                                        <li><a href="#">Separated link</a></li>                                        <li class="divider"></li>                                        <li><a href="#">One more separated link</a></li>                                    </ul>                                </li>                                <li class="dropdown">                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Khách hàng<b class="caret"></b></a>                                    <ul class="dropdown-menu">                                        <li role="presentation" class="dropdown-header">Thông tin</li>                                        <li><a href="<?php echo base_url();?>admingl/customer">Khách hàng</a></li>                                        <li><a href="#">Another action</a></li>                                        <li><a href="#">Something else here</a></li>                                        <li class="divider"></li>                                        <li><a href="#">Separated link</a></li>                                        <li class="divider"></li>                                        <li><a href="#">One more separated link</a></li>                                    </ul>                                </li>                            </ul>                                                       <ul class="nav navbar-nav navbar-right">                                                               <li class="dropdown">                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>                                    <ul class="dropdown-menu">                                        <li><a href="<?php echo base_url();?>admingl/user">Quản lý người dùng</a></li>                                        <li><a href="#">Đổi mật khẩu</a></li>                                        <li class="divider"></li>                                        <li><a href="#">Thoát</a></li>                                    </ul>                                </li>                            </ul>                        </div><!-- /.navbar-collapse -->                    </nav>                </div><!--end top-->            <?php endif; ?>        </header>