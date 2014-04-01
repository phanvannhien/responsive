<style>        
.tree_cat{
        margin: 20px 0px 20px 20px;                
}
</style>
<script type="text/javascript">
$(document).ready(function() {

        $("#category").validate({
                rules: {               
                    cat_name: {
                        required: true                  
                    }/*,
                    image :{
                        required: true    
                    }*/
                },

                messages: {                
                    cat_name: {
                        required: "Vui lòng nhập tên danh mục."                   
                    }/*,
                    image: {
                        required: "Vui lòng chọn hình ảnh."                   
                    }*/
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });

});//end document.ready

function selectCat(_this){                                
        var select = $(_this);                
               
        if(select.next().is('.tree_cat')){
                select.next().remove();
        }else{
                var tree_cat = $('<div class = "tree_cat">');
                select.after(tree_cat);
        }
         
        tree_cat.fileTree( {forbidNode:'<?=$task=='load_form_edit'?$category->category_id:'-1'?>',multiFolder:false,root:'-1',script:'<?php echo base_url() ?>category/export_tree_category/'},function(cat_id){                  
                var cat_name = $('a[rel='+cat_id+']:first',$('.tree_cat')).html();
                var str = '<option selected="selected" value="'+cat_id+'">'+cat_name+'</option>';                         
                select.html(str);
//                tree_cat.remove();    
        }); 
}
</script>
<form id="category" class="form-horizontal" method="POST" action="<?php echo base_url(); ?>admingl/category" enctype="multipart/form-data">                             
        <div class="pull-right">
                <?php if ($task == 'load_form_add') { ?>
                        <button name="task" id="task" value="add" type="submit" class="btn btn-primary">Add</button>                        
                <?php }
                else if ($task == "load_form_edit") { ?>
                        <button name="task" id="btnsave" value="update" type="submit" class="btn btn-primary">Save</button>                                              
                <?php } ?>                        
        </div>
        <div class="page-header">
                <h3><?= $task == 'load_form_add' ? 'Add new category' : 'Category: ' . $category->category_name ?></h3>                
        </div>                        
        <div class="panel panel-default padding10">                                            
                <div>
                        <p>Category name</p>
                        <input name="cat_name" id="cat_name" type="text" class="form-control" placeholder="..." value="<?= $task == 'load_form_add' ? '' : $category->category_name ?>" />
                        <input name="category_id" id="category_id" type="hidden" value="<?= $task == 'load_form_add' ? '' : $category->category_id ?>">
                </div> 
                <p>Parent</p>                                           
                <select name="cat_parent" class="form-control" onclick="selectCat(this)">
                        <option value="<?= $parent_category->category_id ?>">
                                <?= $parent_category->category_name ?>
                        </option>                                                          
                </select>                            
                <p>Category description</p>
                <textarea name="cat_des" id="cat_des" class="form-control" rows="3" placeholder="..."><?= $task == 'load_form_add' ? '' : $category->category_name ?></textarea>
                <p>Category image</p>
                <?php
                if ($task == 'load_form_edit') {
                ?>
                        <img width="200" height="200" src="<?= base_url() . 'uploads/' . $category->category_img ?>"/>
                <?php
                }
                ?>
                <input name="image" type="file" id="exampleInputFile"/>
                <label class="help-block">Chọn file hình.</label>                                                                             
        </div>                
</form>