<?php $this->load->view('manager/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">

                <div class="panel-heading">
                    <span class="glyphicon glyphicon-user"></span>
                    Thành viên miễn phí: 30 ngày</div>
                <div class="panel-body">

                    <img src="<?php echo base_url(); ?>template/img/user-avata.png"/>
                    <p>Phan Van Nhien</p>
                </div>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    Cras justo odio
                </a>
                <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
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
                <p>Bạn đã tạo tài khoản thành công tại <a href="#">Golive</a></p>
                <p>Bạn có thể sử dụng Email:<?php echo $email; ?> để đăng nhập và quản lý tài khoản của bạn.</p>

            </div>

        </div>
    </div>

</div>


<?php $this->load->view('manager/footer'); ?>