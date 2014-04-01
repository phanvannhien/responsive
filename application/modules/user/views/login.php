<?php $this->load->view('manager/header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#login").validate({
            rules: {
                user_email: {
                    required: true,
                    email: true
                },
                user_password: {
                    required: true,
                    min: 6
                }
            },
            messages: {
                user_email: {
                    required: "Vui lòng nhập email của bạn.",
                    email: "Email không đúng định dạng",
                },
                user_password: {
                    required: "Vui lòng nhập mật khẩu của bạn.",
                    min: "Mật khẩu ít nhất là 6 kí tự",
                }

            },
            submitHandler: function(form) {
                form.submit();
            }

        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="max-width" >  
            </div>
            <p class="info_id"> Bạn đang đăng nhập GoliveID. Với GoliveID, chỉ cần một lần đăng ký từ bất kỳ website nào, bạn có thể đăng nhập tất cả các website còn lại trong hệ thống của chúng tôi.    <br/>
            </p> 
        </div>
        <div class="col-md-6">

            <p class="wiid">Tài khoản <a href="#">Golive</a> là gì ?</p>
            <?php if(isset($message)):?>
                <div class="alert alert-danger">
                    <?php echo $message;?>
                </div>
            <?php endif;?>
            <form class="form" id="login" method="POST" action="<?=base_url().'user/login/'.$return_url?>">
                <div class="form-group">
                    <input class="form-control" id="user_email" type="text" name="user_email" maxlength="255" placeholder="Email / Tên tài khoản" />  
                </div>
                <div class="form-group">                     
                    <input class="form-control" id="user_password" type="password" name="user_password" maxlength="255" placeholder="Mật khẩu" />                    
                </div>
                <div class="form-group">
                    <input name="remember" id="remember" value="1" type="checkbox"/>
                    <label>Nhớ đăng nhập</label>
                    <a href="<?php echo base_url(); ?>user/changepass">Quên mật khẩu</a>
                </div>                      
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" id="btnSignIn" name="btnSignIn" value="Đăng nhập"/>
                    
                </div>
                <div class="form-group">
                    <a href="<?php echo base_url(); ?>user/register">Đăng kí miễn phí</a>
                </div>
                
            </form>
            
            
        </div>
    </div><!--end row-->
</div>
<?php $this->load->view('manager/footer'); ?>