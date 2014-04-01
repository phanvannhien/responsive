<?php $this->load->view('manager/header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#changepassforgot").validate({
            rules: {
                new_password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                },
                re_new_password: {
                    equalTo: "#new_password"
                }
            },
            messages: {
                new_password: {
                    required: "Vui lòng nhập mật khẩu của bạn.",
                    minlength: "Mật khẩu ít nhất 6 kí tự",
                    maxlength: "Mật khẩu chứa tối đa 20 kí tự",
                },
                re_new_password: {
                    equalTo: "Mật khẩu nhắc lại chưa đúng.",
                }

            },
            submitHandler: function(form) {
                form.submit();
            }

        });
    });
</script>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary ">
            <div class="panel-heading">Thiết lập mật khẩu mới của bạn</div>
            <div class="panel-body">
                 <?php if (isset($message)):?>
                <div class="alert alert-info">
                     <?php echo $message;?>
                </div>
                <?php else:?>
                
                <div class="alert alert-info">
                        Nhập mật khẩu mới của bạn. Và chắc rằng bạn đã nhớ nó.
                </div>
                <form class="form" id="changepassforgot" method="POST" action="<?php echo base_url(); ?>user/changepass">
                    <input type="hidden" name="curent_user_email" value="<?php echo $email_change_pass; ?>"/>
                    <div class="form-group">
                        <label>Email của bạn:</label>
                        <label><?php echo $email_change_pass; ?></label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="new_password" type="password" name="new_password" maxlength="255" placeholder="Mật khẩu mới" />  
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="re_new_password" type="password" name="re_new_password" maxlength="255" placeholder="Nhắc lại mật khẩu mới" />  
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" id="btnChangePassSubmit" name="btnChangePassSubmit" value="Gửi đi"/>
                    </div>

                </form>
                <?php endif;?>
            </div>
        </div>
    </div><!--end row-->
</div>
<?php $this->load->view('manager/footer'); ?>