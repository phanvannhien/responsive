<?php $this->load->view('manager/header'); ?>

<!--Multiupload-->      
<!--<link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">-->
<link href="<?php echo base_url(); ?>template/ajax_upload/uploadfile.css" rel="stylesheet">
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<!--<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>-->
<script src="<?php echo base_url(); ?>template/ajax_upload/jquery.uploadfile.min.js"></script>
<script>
        $(document).ready(function(){
                
                $("#mail_info").validate({
                    rules: {                        
                        sent_to: {
                            required: true,
                            email: true
                        },
                        subject: {
                            maxlength: 200
                        }
                    },
                    messages: {                                                
                        sent_to: {
                            required: "Vui lòng nhập email",
                            email: "Email không đúng."
                        },
                        subject: {                            
                            maxlength: "Tối đa 20 kí tự",
                        }
                    }
                });
                
                $("#fileuploader").uploadFile({
                        url:'<?php echo base_url() ?>upload/multiupload',
                        fileName:"myfile",
                        multiple : true,
                        returnType : 'json',
                        dragDrop: false,
                        showDone :false,
                        showDelete: true,
                        deleteCallback: function (data, pd) {
                                pd.statusbar.hide(); //You choice.                                       
                                $('input[value="'+data+'"]').remove();
                    
                        },
                        onSuccess:function(files,data,xhr){                                 
                                $('#wrapform').append('<input type="hidden" name="attach_file[]" value="'+data+'"'+'/>');                                       
                        }
                }); 
        });

        function send(){
                if($('#mail_info').valid()== false){
                        return false;
               } 

                var content = CKEDITOR.instances['message_content'].getData();        
         
                $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() ?>message/create_message',
                        data: $("#wrapform").find("input").serialize()+'&content='+content,
                        dataType: "json",
                        beforeSend:function(){
                                $('#modalbody').html('<p>Message sending..<br/><img src="<?php echo base_url(); ?>template/img/loading_bar.gif"/></p>');
                                $('#myModal').modal();
                        },
                        success: function(data)
                        {
                                if (data.response == 'success') { 
                                        $('#myModal').on('hidden.bs.modal', function () {
                                                window.location = 'inbox';
                                        });
                                        $('#modalbody').html('Tin nhắn của bạn đã được gửi');
                                        $('#myModal').modal();
                                }else if(data.response == 'not_login') {
                                        window.location = 'user/login';	
                                }else {
                                        $(".send_btn").removeAttr("disabled","");                                       
                                }
                        },
                        error:function(xhr){
                                $('#modalbody').html(xhr.responseText);
                                $('#myModal').modal();
                        }
                });
                
                return false;
        }

</script>
<div class="container   ">
        <div class="row">
                <div class="col-md-3">
                        <?php $this->load->view('inc/left'); ?>
                </div>
                <div class="col-md-9">                        
                        <div id="wrapform" class="form-horizontal">
                                <div class="panel panel-default">                                        
                                        <div class="panel-heading">
                                                <div class="btn-group">
                                                        <button href="" class="btn-default btn send_btn" onclick="send();">Gửi</button>
                                                        <button href="#" class="btn-default btn">Lưu nháp</button>
                                                        <button href="#" class="btn-default btn">Hủy</button>
                                                </div>
                                        </div>
                                        <div class="panel-body">
                                                <form id="mail_info" class="subform">
                                                <div class="form-group">
                                                        <label for="sent_to" class="col-sm-2 control-label">Gửi tới: </label>
                                                        <div class="col-sm-10">
                                                                <input name="sent_to" type="text" class="form-control" id="sent_to" placeholder="">
                                                        </div>

                                                </div>
                                                <div class="form-group">
                                                        <label for="subject" class="col-sm-2 control-label">Tiêu đề</label>
                                                        <div class="col-sm-10">
                                                                <input name="subject" type="text" class="form-control" id="subject" placeholder="">
                                                        </div>
                                                </div>
                                                </form>
                                                <div class="form-group">
                                                        <label class="col-sm-2 control-label">Đính kèm File: </label>
                                                        <div class="col-sm-10">
                                                                <span ng-class="{disabled: disabled}" class="btn btn-link fileinput-button">
                                                                        <div id="fileuploader"><span class="glyphicon glyphicon-paperclip"></span><span>Add files...</span></div>
                                                                </span>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <div class="col-sm-12">
                                                                <textarea id="message_content" name="message_content"></textarea>
                                                        </div>
                                                        <?php echo $ckediter; ?>
                                                </div>
                                        </div>
                                        <div class="panel-footer">
                                                <div class="btn-group">
                                                        <button href="" class="btn-default btn send_btn" onclick="send();">Gửi</button>
                                                        <button href="#" class="btn-default btn">Lưu nháp</button>
                                                        <button href="#" class="btn-default btn">Hủy</button>
                                                </div>
                                        </div>
                                </div>                                
                        </div>     
                </div>
                <div class="clearfix"></div>
        </div>
</div>
<?php $this->load->view('manager/footer'); ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Notice</h4>
                        </div>
                        <div id="modalbody" class="modal-body">
                                ...
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  