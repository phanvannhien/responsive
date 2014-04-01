   
<?php $this->load->view('manager/header'); ?>
<style>
        .center{
                text-align: center;
        }
        
        tr.unread{
                font-weight: bold;
        }
</style>
<script>
<?php // <editor-fold defaultstate="collapsed" desc="list_message js">?>
var  list_message = {
        url : '<?=  base_url()."message/list_message_ajax/$mode"?>',
        current_page:1,
        checked_list : new Array(),
        reloadList:function () {                        
                $.ajax({
                        type: 'GET',
                        url:list_message.url+'/'+list_message.current_page,
                        data: {
                        },
                        dataType: "json",                        
                        success: function(data){
                                if (data.response == 'success') {                                     
                                        $('tbody').html(data.content);                                     
                                        $('tbody').show();                                 
                                }else if(data.response == 'not_login'){
                                        window.location = 'user/login';   
                                }
                        },
                        error: function(xhr) {
                            $('#modalbody').html(xhr.responseText);
                            $('#myModal').modal();
                        }  
                });
        },

        /*saveCheckedStatus:function () {
                var statuses = new Array();
                $(':checkbox').each(function(){
                        // Store the checkbox ID and checked status in an array
                        var cbox = {id:$(this).attr('id'),checked:$(this).is(':checked') };
                        statuses.push(cbox);
                });
                return statuses;
        },

        restoreCheckedStatus:function (statuses) {
                for(var cbox in statuses) {
                        // Set a checkbox checked or unchecked based on ID
                        $('#'+cbox['id']).attr('checked', cbox['checked']);
                }
        },*/

        checkAll:function(_checkAll){                         
                $('input:checkbox').not(_checkAll).prop('checked', _checkAll.checked);                        
                return false;                                               
        },

        deleteMessage:function(){                        
                var list_message_id = list_message.getCheckedListId();                                
                if(list_message_id.length === 0){
                        alert('please select message');
                        return false;
                }
                
                $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url() ?>message/delete/'+'<?=$mode?>',
                        data:  {list_message_id:list_message_id},
                        dataType: "json",
                        beforeSend:function(){},
                        success: function(data){
                                if (data.response == 'success') {                     
                                        $('#modalbody').html('message have been move to trash box.');
                                        $('#myModal').modal();
                                        list_message.reloadList();
                                }else if(data.response == 'not_login') {
                                        window.location = 'user/login';	
                                }
                        },
                        error: function(xhr) {
                            $('#modalbody').html(xhr.responseText);
                            $('#myModal').modal();
                        }                
                }); 
        },
        reportSpam:function(){
                var list_message_id = list_message.getCheckedListId();                                
                if(list_message_id.length === 0){
                        alert('please select message');
                        return false;
                }

                $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url() ?>message/report_spam/'+'<?=$mode?>',
                        data:  {list_message_id:list_message_id},
                        dataType: "json",
                        beforeSend:function(){},
                        success: function(data){
                                if (data.response == 'success') {
                                        $('#modalbody').html('message have been moved to spam box.');
                                        $('#myModal').modal();
                                        list_message.reloadList();
                                }else if(data.response == 'not_login') {
                                        window.location = 'user/login';	
                                }
                        },
                        error: function(xhr) {
                            $('#modalbody').html(xhr.responseText);
                            $('#myModal').modal();
                        }                
                });  
        },
        markRead:function(is_read){
               
                var list_message_id = list_message.getCheckedListId();                                
                if(list_message_id.length === 0){
                        alert('please select message');
                        return false;
                }
                $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url() ?>message/mark_read/'+'<?=$mode?>'+'?is_read='+is_read,
                        data:  {list_message_id:list_message_id},
                        dataType: "json",
                        beforeSend:function(){},
                        success: function(data){
                                if (data.response == 'success') {
                                        $('#modalbody').html('message have been marked successfully');
                                        $('#myModal').modal();
                                        list_message.reloadList();
                                }else if(data.response == 'not_login') {
                                        window.location = 'user/login';	
                                }
                        },
                        error: function(xhr) {
                            $('#modalbody').html(xhr.responseText);
                            $('#myModal').modal();
                        }                
                }); 
        },
        getCheckedListId:function(){
                var list_message_id = [];
                var _count = 0;
                $(':checkbox:checked').not('#checkAll').each(function(){                                                               
                        var message_id = $(this).attr('value');
                         list_message_id[_count] = message_id;
                         _count++;
                });
                                                
                return list_message_id;
        }
}         

<?php // </editor-fold> ?>

<?php // <editor-fold defaultstate="collapsed" desc="document.ready js">?>
$(document).ready(function(){
        var a_split = document.URL.split('/');
        list_message.current_page = a_split[a_split.length-1];
});    
<?php // </editor-fold> ?>
</script>
<div class="container   ">
        <div class="row">
                <div class="col-md-3">
                        <?php $this->load->view('inc/left'); ?>
                </div>
                <div class="col-md-9">
                        <div class="panel panel-default">
                                <div class="panel-heading">                                       
                                        <h4 class="center"><?=$mode?></h4>
                                </div>
                                <div class="panel-body">                
                                        <div class="cpanel">
                                                <div class="btn-group">
                                                        <button href="" class="btn-default btn" onclick="list_message.deleteMessage()">Delete</button>
                                                        <button href="#" class="btn-default btn dropdown">
                                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                                                Mark as <span class="caret"></span>
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                                <li><a onclick="list_message.markRead(1)">Read</a></li>
                                                                                <li><a onclick="list_message.markRead(0)">Unread</a></li>
                                                                        </ul>
                                                        </button>
                                                        <button href="#" class="btn-default btn" onclick="list_message.reportSpam()">Report Spam</button>
                                                        
                                                </div>
                                        </div>
                                        <table id="list_message" class="table table-striped">
                                                <thead>
                                                <td><input name="checkAll" id="checkAll" type="checkbox" onclick="list_message.checkAll(this);"/></td>
                                                        <td>Subject</td>
                                                        <td>Sender</td>
                                                        <td>Content</td>                                                        
                                                        <td>Date</td>
                                                        <td>Attach</td>
                                                </thead>
                                                <tbody>
                                                        <?php $this->load->view('list_message_ajax') ?>
                                                </tbody>        
                                        </table>        
                                </div>
                
                        </div>
                </div>
                <div class="clearfix"></div>
        </div>
</div>

<?php $this->load->view('inc/footer');?>


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