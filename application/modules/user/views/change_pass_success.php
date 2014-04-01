<?php $this->load->view('manager/header'); ?>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <?php echo (isset($link))? $link:'';?>
        <div class="panel panel-success">
            
            <div class="panel-heading">
                <span class="glyphicon glyphicon-ok-circle"></span>
                Kiểm tra email của bạn!</div>
            <div class="panel-body">
                <div class="alert alert-success">
                    Một email đã được gửi tới email của bạn. Vui lòng kiểm tra email.
                </div>
            </div>
        </div>

    </div><!--end row-->
</div>
<?php $this->load->view('manager/footer'); ?>