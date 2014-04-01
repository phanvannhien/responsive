<?php $this->load->view('manager/header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#current_pass').popover({
            content: 'Mật khẩu từ 6-20 kí tự (a-z, 0-9). Không chứa kí tự đặc biệt và khoảng trắng',
            trigger: 'click',
            placement: 'bottom'

        });

        $("#update_pass").validate({
            rules: {
                current_pass: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                    validatePass: true
                },
                re_new_pass: {
                    equalTo: "#new_pass"
                }
                , new_pass: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                }
            },
            messages: {
                current_pass: {
                    required: "Vui lòng nhập mật khẩu của bạn.",
                    minlength: "Mật khẩu chứa ít nhất 6 kí tự",
                    maxlength: "Mật khẩu chứa tối đa 20 kí tự",
                    validatePass: 'Mật khẩu không đúng'
                },
                new_pass: {
                    required: "Vui lòng nhập mật khẩu mới của bạn.",
                    minlength: "Mật khẩu chứa ít nhất 6 kí tự",
                    maxlength: "Mật khẩu chứa tối đa 20 kí tự",
                },
                re_new_pass: {
                    equalTo: "Mật khẩu nhắc lại chưa đúng.",
                }

            },
            submitHandler: function(form) {
                form.submit();
            }

        });
        $.validator.addMethod(
                "validatePass",
                function(value, element)
                {
                    var check_validate = false;
                    $.ajax(
                            {
                                type: "POST",
                                //dataType:"html",
                                data: 'user_current_pass=' + value,
                                async: false,
                                url: "<?php echo base_url(); ?>user/validate_pass",
                                success: function(data)
                                {
                                    if ($.trim(data) === "true")
                                        check_validate = true;
                                    else
                                        check_validate = false;
                                }

                            });
                    //alert(check_validate);
                    return check_validate;

                    //return check_validate;

                }, 'Password not correct'

                );


    });
</script>

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <?php if (isset($message)): ?>
            <div class="alert alert-danger">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form class="form-horizontal" role="form" id="update_pass" method="POST" action="<?php echo base_url(); ?>user/update_pass">
            <div class="form-group">
                <label for="current_pass" class="col-md-4 control-label">Mật khẩu cũ</label>
                <div class="col-md-8">
                    <input class="form-control" id="current_pass" type="password" name="current_pass" maxlength="255" placeholder="" />  
                </div>

            </div>
            <div class="form-group">
                <label for="new_pass" class="col-md-4 control-label">Mật khẩu mới</label>
                <div class="col-md-8">
                    <input class="form-control" id="new_pass" type="password" name="new_pass" maxlength="255" placeholder="" />  
                </div>

            </div>
            <div class="form-group">
                <label for="re_new_pass" class="col-md-4 control-label">Nhắc lại mật khẩu mới</label>
                <div class="col-md-8">
                    <input class="form-control" id="re_new_pass" type="password" name="re_new_pass" maxlength="255" placeholder="" />  
                </div>

            </div>

            <div class="form-group">
                <input class="btn btn-primary col-md-offset-4" type="submit" id="submit_update_pass" name="submit_update_pass" value="Gửi đi"/>
            </div>

        </form>


    </div><!--end row-->
</div>
<?php $this->load->view('manager/footer'); ?>