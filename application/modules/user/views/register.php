<?php $this->load->view('manager/header'); ?>
<script>
    function get_captcha() {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>captcha',
            success: function(data) {
                $('#captcha').html(data)
            }

        });
    }
    //ready function
    $(document).ready(function() {
        //load captcha
        get_captcha();

        // Handler for .ready() called.
        jQuery("#user_birthday").datepicker(
                {
                    altFormat: "dd/mm/yyyy",
                    dateFormat: 'dd/mm/yy',
                    numberOfMonths: 1,
                    changeMonth: true,
                    yearRange: '1960:2000',
                    changeYear: true,
                    minYear: 1960
                }
        );

        $('#user_email').popover({
            content: 'Email dạng abc@abc.com. Không chứa các kí tự đặc biệt',
            trigger: 'click',
            placement: 'right'

        });
        //form validation rules
        $("#signUp").validate({
            rules: {
                user_firstname: "required",
                user_lastname: "required",
                user_birthday: {
                    required: true,
                    vdate: true

                },
                user_sex: "required",
                user_phone: {
                    required: true,
                    vphone: true
                },
                user_email: {
                    required: true,
                    email: true,
                    validateEmail: true
                },
                user_password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                },
                user_password_re: {
                    equalTo: "#user_password"
                },
                user_captcha: {
                    required: true,
                    validateCaptcha: true,
                }
            },
            messages: {
                user_firstname: "Vui lòng nhập họ",
                user_lastname: "Vui lòng nhập tên",
                user_password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải lớn hơn 6 kí tự",
                    maxlength: "Mật khẩu tối đa 20 kí tự",
                },
                user_email: {
                    email: "Email không đúng.",
                    validateEmail: "Email đã được đăng kí",
                },
                user_birthday: {
                    required: "Vui lòng nhập ngày sinh của bạn",
                    vdate: "Ngày sinh không đúng định dạng"

                },
                user_phone: {
                    required: "Vui lòng nhập số điện thoại",
                    vphone: "Số điện thoại không đúng"
                            // date:"Ngày tháng không đúng định dạng"
                },
                user_password_re: {
                    equalTo: "Mật khẩu lập lại không đúng"
                },
                user_sex: "Vui lòng chọn giới tính",
                user_captcha: {
                    required: "Vui lòng nhập mã bảo vệ",
                    validateCaptcha: "Mã bảo vệ không đúng"
                }


            },
            submitHandler: function(form) {
                form.submit();
            }

        });

        $.validator.addMethod(
                "vdate",
                function(value, element) {
                    // put your own logic here, this is just a (crappy) example
                    return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
                },
                "Please enter a date in the format dd/mm/yyyy."
                );
        $.validator.addMethod(
                "vphone",
                function(value, element) {
                    // put your own logic here, this is just a (crappy) example
                    return value.match(/^0\d{3,4}\d{6}/);
                },
                "Please enter a number phone."
                );

        $.validator.addMethod(
                "validateCaptcha",
                function(value, element)
                {
                    var check_validate = false;
                    $.ajax(
                            {
                                type: "POST",
                                //dataType:"html",
                                async: false,
                                data: "captcha=" + value,
                                url: "<?php echo base_url(); ?>captcha/validate",
                                success: function(data)
                                {

                                    if ($.trim(value) == $.trim(data))
                                        check_validate = true;
                                    else
                                        check_validate = false;
                                }

                            });
                    //alert(check_validate);
                    return check_validate;

                    //return check_validate;

                }, 'Captcha not match'

                );
        //end validate captcha
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

                                    if ($.trim(data) == "true"){
                                        check_validate = true;
                                    }
                                    else{
                                        check_validate = false;
                                    }
//                                    alert(check_validate);
                                }

                            });
//                    alert(check_validate);
                    return check_validate;

                    //return check_validate;

                }, 'Email da dc dk'

                );//end validate email

    });//ready function


</script>
<div class="container">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="row-fluid">
                <h2>Đăng ký tài khoản</h2>
                <div class="product-header">
                    <img src="" alt=""/>
                </div>

            </div>
            <div class="row-fluid login-other-acc">
                <p>
                    <strong><a href="<?php echo base_url(); ?>user/login">Đăng nhập ngay</a></strong>
                </p>
            </div>
        </div>
        <div class="col-md-8">

            <p class="wiid">Tài khoản <a href="#">Golive</a> là gì ?</p>
            <form role="form" class="form" id="signUp" action="<?php echo base_url(); ?>user/register" method="post">                        
                <div class="col-md-12">
                    <div class="form-group col-md-6">
                        <input  placeholder="Họ đệm" class="form-control " id="user_firstname" name="user_firstname" type="text">   
                    </div>      
                    <div class="form-group col-md-6">
                        <input placeholder="Tên" class="form-control" id="user_lastname" name="user_lastname" type="text">            
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <input class="form-control" maxlength="255" placeholder="Email của bạn" name="user_email" id="user_email" type="text"/>        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <input class="form-control" maxlength="255" placeholder="Số điện thoại di động của bạn" name="user_phone" id="user_phone" type="text" />        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <input id="user_password" class="form-control" autocomplete="Off" class="" maxlength="255" placeholder="Mật khẩu" name="user_password" type="password">        
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <input class="form-control" maxlength="255" placeholder="Gõ lại mật khẩu" name="user_password_re" id="user_password_re" type="password">        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label class="inline">Giới tính</label>
                        <label class="checkbox-inline">
                            <input type="radio" name="user_sex" id="user_sex" checked="" value="Nam">Nam
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="user_sex" id="user_sex" value="Nữ">Nữ
                        </label>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label class="inline">Bạn muốn là:</label>
                        <?php
                        foreach ($user_type as $type) {
                            ?>
                            <label class="checkbox-inline">
                                <input type="radio" name="user_type" id="user_sex" checked="" value="<?php echo $type->user_type_id ?>"><?php echo $type->user_type_name; ?>

                            </label>

                            <?php
                        }
                        ?>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <input class="form-control" placeholder="Ngày sinh" name="user_birthday" id="user_birthday" type="text"/>  
                    </div>  
                </div>

                <div class="col-md-12">

                    <div id="captcha" class="col-md-6 form-group"></div>
                    <div class="col-md-6 form-group">

                        <img src="<?php echo base_url(); ?>/template/img/reload.png" onclick="get_captcha();"/>
                    </div>
                    <div class="clearfix"></div>


                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <input class="form-control" placeholder="Mã bảo vệ" name="user_captcha" id="user_captcha" type="text"/> 
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-sm-2">

                        <button type="submit" name="btnSignIn" class="btn btn-primary">Đăng kí</button>

                    </div>
                </div>

            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $this->load->view('manager/footer'); ?>