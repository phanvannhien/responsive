<?php
if($total_request_of_user <= 0) {
?>
        <div style="float:left;"><b>Bạn chưa có request nào</b></div>
<?php
}else {
?>
<?php
        foreach($list_request_of_user as $row){
?>
        <tr id="request_detail_<?=$row->request_detail_id;?>">				
                <td><a target="_blank" href="<?=base_url().'request/my_request_detail?request_detail_id='.$row->request_detail_id?>"> <?=$row->product_name;?></a></td>                        
                <td> <?=$row->status_name;?></td>                        
                <td> <?=date('d-m-Y',  strtotime($row->time_expire));?></td>                        
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

