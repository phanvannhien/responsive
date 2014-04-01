<?php $this->load->view('inc/header'); ?>
<style>
        .center{
                text-align: center;
        }
</style>
<script>
        $(document).ready(function(){        
                $(document).on("click",'p.pagination a',function(){               
               
                        var this_url=$(this).attr("href");
                        var _status = $('select[name="status"]').val();

                        $.ajax({
                                type: 'POST',
                                url: this_url,
                                data: {
                                        status:_status
                                },
                                dataType: "json",
                                beforeSend:function(){	
                                        $('tbody').hide();
                                },
                                success: function(data)
                                {
                                        if (data.response == 'success') {                                     
                                                $('tbody').html(data.content);                                     
                                                $('tbody').show();                                 
                                        }else if(data.response == 'error') {
                                                $('#modalbody').html(data.content);
                                                $('#myModal').modal();
                                        }else if(data.response == 'not_login'){
                                                window.location = 'user/login';   
                                        }
                                },
                                        error: function(xhr) {
                                            $('#modalbody').html(xhr.responseText);
                                            $('#myModal').modal();
                                        }   
                        });

                        return false;
                }); 
        
                $('select[name="status"]').change(function(){                
                        var _status = $(this).val();                
                        $.ajax({
                                type: 'GET',
                                url: '<?php echo base_url() . "request/list_request_ajax"; ?>',
                                data: {
                                        status:_status
                                },
                                dataType: "json",
                                beforeSend:function(){
                                        $('tbody').hide();
                                },
                                success: function(data)
                                {
                                        if (data.response == 'success') {                                    
                                                $('tbody').html(data.content);                                    
                                                $('tbody').show();                                                                          
                                        }else if(data.response == 'error') {
                                                $('#modalbody').html(data.content);
                                                $('#myModal').modal();
                                        }else if(data.response == 'not_login'){
                                                window.location = 'user/login';   
                                        }
                                }
                        });
                });
        
        });    
</script>
<div class="container   ">
        <div class="row">
                <div class="col-md-3">
                        <?php $this->load->view('inc/sidebar', array('sidebar' => $sidebar)); ?>
                </div>
                <div class="col-md-9">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h4 class="center">Manage Buying Request</h4>
                                </div>

                                <div id="list_request" class="panel-body">                
                                        <table class="table table-striped">
                                                <thead>
                                                <td>Subject</td>
                                                <td>
                                                        <?= form_dropdown('status', $a_status, array('')) ?>
                                                </td>
                                                <td>Expire Date</td>
                                                </thead>
                                                <tbody>
                                                        <?php $this->load->view('list_request_of_user_ajax') ?>
                                                </tbody>        
                                        </table>        
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


