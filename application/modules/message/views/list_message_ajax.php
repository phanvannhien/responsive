<?php
if($total_message<= 0) {
?>
        <div style="float:left;"><b>Bạn chưa có thư nào</b></div>
<?php
}else {
?>
<?php
        foreach($list_message as $row){
?>
                <tr class="<?=$row->is_read=='0'?'unread':'read'?>" id="row_message_<?=$row->message_id;?>">
                        <td><input id="checkbox_<?= $row->message_id ?>" value="<?= $row->message_id ?>" type="checkbox"/></td>
                        <td><a href="<?= base_url() . 'message/message_detail?message_id=' . $row->message_id ?>"><?= $row->message_subject; ?> </a></td>                        
                        <td> <?= $row->message_sender; ?></td> 
                        <td> <?= ( strlen(strip_tags($row->message_content)) < 50 ? strip_tags($row->message_content) : substr(strip_tags($row->message_content), 0, 50) . '...') ?></td>                        
                        <td> <?= date('d-m-Y', strtotime($row->message_create_date)); ?></td>                        
                        <td></td>
                </tr>
<?php           
        }
?>
        <tr class="pagination">
                <td colspan="3"> <?=$pagination;?></td>
        </tr>
<?php                
}
?>