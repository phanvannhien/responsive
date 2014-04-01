<!--<div class ="pull-right">
    <div class="btn-group">                                            
    </div> 
</div>-->
<table class="table table-striped">
        <tr>
            <td>Tên danh mục</td>
            <td>Hình</td>
            <td>Mô tả</td>
        </tr> 
        <?php
        foreach($rows as $row){
        ?>
            <tr>                         
                <td><?=$row->category_name?></td>
                <td><img width="200" height="200" src="<?=base_url().'uploads/'.$row->category_img?>"/></td>
                <td><?=$row->category_des?></td>
            </tr>
        <?php      
        }
        ?>        
</table>


                           