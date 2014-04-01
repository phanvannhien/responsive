<?php $this->load->view('manager/header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#changepass").validate({
            rules: {
                forgot_email: {
                    required: true,
                    email: true,
                    validateEmail:true
                }
            },
            messages: {
                forgot_email: {
                    required: "Vui lòng nhập email của bạn.",
                    email: "Email không đúng định dạng",
                    validateEmail:"Email không tồn tại"
                }

            },
            submitHandler: function(form) {
                form.submit();
            }

        });
        $.validator.addMethod(
                "validateEmail",
                function(value, element)
                {
                    var check_validate = false;
                    $.ajax(
                            {
                                type: "POST",
                                data: "email=" + value,
                                async: false,
                                url: "<?php echo base_url(); ?>user/validate_email",
                                success: function(data)
                                {

                                    if (data === "true")
                                        check_validate = false;
                                    else
                                        check_validate = true;
                                }

                            });
                    //alert(check_validate);
                    return check_validate;

                    //return check_validate;

                }, 'Captcha not match'

                );//end validate email

    });
</script>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary ">



            <div class="panel-heading">Bạn quên mật khẩu?</div>
            <div class="panel-body">
                <div class="alert alert-info">
                    Để yêu cầu một mật khẩu mới, vui lòng nhập email đã đăng ký mới nhất của bạn trong <a href="<?php echo base_url(); ?>">golive</a> dưới đây:
                </div>
                <form class="form" id="changepass" method="POST" action="<?php echo base_url(); ?>user/changepass">
                    <div class="form-group">
                        <input class="form-control" id="forgot_email" type="text" name="forgot_email" maxlength="255" placeholder="Email của bạn" />  
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" id="btnChangePass" name="btnChangePass" value="Gửi đi"/>
                    </div>

                </form>
            </div>
        </div>
    </div><!--end row-->
</div>
<?php $this->load->view('manager/footer'); ?>