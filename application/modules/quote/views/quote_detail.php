<?php $this->load->view('inc/header');?>
<link href="<?php echo base_url(); ?>template/css/quote.css" rel="stylesheet">

<script type="text/javascript">
$(document).ready(function() {  
        $('#reply').click(function(){
                $.ajax({
		type: 'post',
		url: '<?php echo base_url() ?>message/create_message',
		data:  $("#form_reply").find("select, textarea, input").serialize(),
		dataType: "json",
                beforeSend:function(){
//                                                       $(".send_btn").attr("disabled","disabled"); 
                                $('#modalbody').html('<p>Message sending..<br/><img src="<?php echo base_url(); ?>template/img/loading_bar.gif"/></p>');
                                $('#myModal').modal();
                        },
		success: function(data){
			if (data.response == 'success') {                     
//				$("#create_btn").attr("value","Success");
				window.location = "<?php echo base_url();?>quote/view/"+ data.quote_id;
			}else if(data.response == 'not_login') {
				window.location = 'user/login';	
			}else {
			}
		},
                error: function(xhr) {
                    $('#modalbody').html(xhr.responseText);
                    $('#myModal').modal();
                }                
	}); 
        });
});
</script>

<div class="container   ">
        <div class="row">
                <div class="col-md-3">
                        <?php $this->load->view('inc/sidebar'); ?>
                </div>
                <div class="col-md-9">
                        <div class="panel panel-default">
                                <div class="panel-heading"><h4>Quote</h4></div>
                                <div class="panel-body">
                                        <div id="request" class="panel panel-default">
                                                <span>Request:</span>
                                                <div class="form-horizontal">                       
                                                        <div class="form-group row">
                                                                <label class="col-sm-2 control-label">Product:</label>
                                                                <div class="col-sm-6">
                                                                        <?= $a_request_detail[0]->product_name ?>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-2 control-label">Expire date:</label>
                                                                <div class="col-sm-6">
                                                                       <?= date('d-m-Y', strtotime($a_request_detail[0]->time_expire)); ?>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-2 control-label">Status:</label>
                                                                <div class="col-sm-6">
                                                                        <?= $a_request_detail[0]->status ?>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-2 control-label">Attach File:</label>
                                                                <div class="col-sm-6">
                                                                        <?php
                                                                                foreach ($a_request_detail as $key => $value) {
                                                                                        ?>
                                                                                        <a href="<?= base_url() . 'request/download_file/?file_id=' . $value->file_id ?>"><?= $value->file_name ?></a>&nbsp;
                                                                                        <?php
                                                                                }
                                                                                ?>
                                                                </div>
                                                        </div>                                                        
                                                        
                                                </div>
                                        </div>
                                        
                                        <div id="quote" class="quote">
                                                <span>Quote:</span>
                                                <?=$quote->quote_desc?>
                                                <?php
                                                foreach ($a_quote_relevant_file as $key => $value) {
                                                        ?>
                                                        <a href="<?= base_url() . 'quote/download_file/?file_id=' . $value->file_id ?>"><?= $value->file_name ?></a>&nbsp;
                                                        <?php
                                                }
                                                ?>
                                        </div>
                                        
                                        <div id="message">
                                                <?php 
                                                $class=  'pull-left';
                                                $tmp = '';
                                                foreach($quote_message as $key =>$message){
                                                        
                                                        if($message->message_user_id==$this->user_id){
                                                                $class = 'pull-left';
                                                        }else{
                                                                $class = 'pull-right';
                                                        }                                                              
                                                ?>
                                                <div class="image_quote <?=$class?>"></div>
                                                <div class="message <?=$class?> box-1"><?=$message->message_content?></div>                                                
                                                <div class="clearfix"></div>
                                                
                                                <?php 
                                                $tmp = $message->message_user_id;
                                                }
                                                ?>
                                        </div>
                                </div>
                                
                                
                                <div class="reply">
                                        <div id="form_reply" action="<?= base_url() ?>message/create_message">
                                                <label>Reply</label>
                                                <textarea name="content"></textarea>
                                                <input type="hidden" name="quote_id" value="<?= $quote->quote_id ?>">
                                                <input type="hidden" name="sent_to" value="<?= $quote->quote_user_id ?>">
                                                <input type="hidden" name="subject" value="Reply: <?= $quote->quote_desc ?>">
                                                <button id="reply">Send</button>
                                        </div>                                
                                </div>                                                 
                </div>
                <div class="clearfix"></div>                       
        </div>
</div>


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
                                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        </div>
                </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  