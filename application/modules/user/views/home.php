<?php $this->load->view('manager/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-user"></span>
                    <?php echo $user->user_level_name; ?>
                    <a class="text-danger" href="<?php echo base_url();?>user/upgrade">Nâng cấp</a>
                </div>
                <div class="panel-body">

                    <img class="img-thumbnail" src="<?php echo base_url(); ?>template/img/user-avata.png"/>
                    <p class="pull-right"><?= $user->user_firstname.' '.$user->user_lastname;?></p>
                    <hr class="sperator"/>
                    <p class="text-muted">Đăng nhập lần cuối</p>
                    <p class="text-info"><?= $user->user_last_login;?> (GMT +7)</p>
                    
                </div>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    Truy cập nhanh
                </a>
                <a href="#" class="list-group-item">Kiểm tra tin nhắn</a>
                <a href="#" class="list-group-item">Morbi leo risus</a>
                <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                <a href="#" class="list-group-item">Vestibulum at eros</a>
            </div>


            <div class="panel panel-default">
                <div class="panel-body">
                    Basic panel example
                </div>
            </div>


        </div>
        <div class="col-md-9">
            

            <div class="alert alert-success">
                <p>Xin chào bạn: <span class="text-info"><?php echo $user->user_lastname; ?></span> Chúc bạn 1 ngày kinh doanh thành công nhé.</p>

            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dasboard
                </div>
                <div class="panel-body">
                    
                </div>
            </div>
             <div class="panel panel-default">
                <div class="panel-heading">
                    Sản phẩm có thể bạn quan tâm
                </div>
                <div class="panel-body">
                    
                </div>
            </div>
            

        </div>
    </div>

</div>


<?php $this->load->view('manager/footer'); ?>