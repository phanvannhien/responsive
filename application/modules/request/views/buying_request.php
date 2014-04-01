<?php $this->load->view('inc/header');?>
<style>
        .cpanel{
                display: none;  
        }       
        .per_request:hover .cpanel{
             display: block !important;
        } 
        .tree_cat{
                margin: 20px 0px 20px 20px;
        }
        .center{
                text-align: center;
        }
</style>

<script type="text/javascript">

var _count_gross = 1; 
var _count_net = 1;
var _obj_old = null;
var _obj_copy = null;

$(document).ready(function() {        
        _obj_old = $('.per_request');
        _obj_copy = _obj_old.clone();
        
        bind_event(_obj_old,'1');
        
        //set validate rules
        $.validator.setDefaults({ignore:[]});
            
        $.validator.addClassRules({
                'product_name':{required: true},
                'cat':{required: true}
        });
        
        //datepicker
        $('#expire_date').datepicker({
                dateFormat: 'dd-mm-yy',
                defaultDate: new Date()
        });
                                                     
});//end document.ready

//functions
function bind_event(obj,num){
        //bind remove  
       $('.remove',obj).bind('click',(function(){
               remove(obj);                                      
       })); 

       //bind edit      
       $('.edit',obj).bind('click',(function(){                         
               edit(obj);                                                                                                                                                                           
       }));  
       
       //bind ajax uploader                               
       $(".fileuploader",obj).uploadFile({
               url:'<?php echo base_url() ?>request/multiupload',
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
                       $('#wrapform').append('<input type="hidden" name="relevant_file'+'['+num+']'+'[]"'+ 'value="'+data+'"'+'/>');                                       
               }
       }); 
}


function remove(obj){
        obj.remove();
         _count_net--;

        if(_count_net == 1){
                $('.remove').addClass('hide');
        }   
}

function edit(obj){
       $(".slide").slideUp();//hide the rest
       $('.slide',obj).slideDown();    
}

function selectCat(_this){                                
        var select = $(_this);                
               
        if(select.next().is('.tree_cat')){
                select.next().slideToggle();
        }else{
                var tree_cat = $('<div class = "tree_cat margintop20">');
                select.after(tree_cat);
                
                        tree_cat.fileTree({
                                allowFolder:false,
                                multiFolder:false,
                                root:'0',
                                script:'<?php echo base_url() ?>category/export_tree_category/'
                        },
                        function(cat_id){                  
                                var cat_name = $('a[rel='+cat_id+']:first',$('.tree_cat')).html();
                                var str = '<option selected="selected" value="'+cat_id+'">'+cat_name+'</option>';                         
                                select.html(str);
                                tree_cat.slideUp();    
                        }
                ); 
        }                 
}

function addmore(){
         //validate previous product
        if($(".subform").last().valid()== false){                           
                $(".subform").last().parent().slideDown();
               return false;
        }

        $('.order_title').last().addClass('glyphicon glyphicon-ok');

       _count_gross++;
       _count_net++;
       var num = _count_gross;

       //clone
       var obj_new = _obj_copy.clone();
       //init
       $('.order_title',obj_new).html('Product '+ num);                                                
       $('.product_name',obj_new).attr('name','product_name['+num+']');                                                                        
       $('.cat',obj_new).attr('name','cat['+num+']');                                                                        
       $('.product_des',obj_new).attr('name','product_des['+num+']');                                                                        
       $('.quantities',obj_new).attr('name','quantities['+num+']');
       $('.pieces',obj_new).attr('name','pieces['+num+']');
              
       // hide the rest 
       $(".slide").slideUp();
       
       //append the clone
       $('.per_request').last().after(obj_new); 
              
       bind_event(obj_new,num);
                     
       $('.order_title').removeClass('hide');                                               
       $('.remove').removeClass('hide');                        
       $('.edit').removeClass('hide');
}

function submit() { 
        var _valid = true;
        $(".subform").each(function(){     
               if($(this).valid()== false){                       
                        _valid = false;
                       $(this).parent().slideDown();                       
                        return false;//break
               }    
        });
        
        if(_valid == false){                
                return false;
        }

	$.ajax({
		type: 'post',
		url: '<?php echo base_url() ?>request/create_buying_request',
		data:  $("#wrapform").find("select, textarea, input").serialize(),
		dataType: "json",
                beforeSend:function(){
//                       $("#create_btn").attr("disabled","disabled"); 
                },
		success: function(data){
			if (data.response == 'success') {                     
				$("#create_btn").attr("value","Success");
				window.location = "<?php echo base_url();?>request/list_request/";
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
}
</script>

<div class="container">
        <div class="row">
                <div class="col-md-3">
                        <?php $this->load->view('inc/sidebar', array('sidebar' => $sidebar)); ?>
                </div>
                <div class="col-md-9">
                        <div class="panel panel-default">
                                <div class="panel-heading">                                        
                                        <h4 class="center">Request Buying</h4>                                                                 
                                </div>
                                <div id="wrapform" class="panel-body">
                                        <!--wrap form contain subforms-->                                                                     
                                        <?= $this->formkey->render_field(); ?>
                                        <div class="panel panel-default per_request"> 
                                                <div class="cpanel">      
                                                        <a class="pull-right btn  btn-group-xs remove hide">Remove</a>
                                                        <a class="pull-right btn  btn-group-xs edit hide">Edit</a>                                                        
                                                </div>  
                                                <h4 class="order_title hide">Product 1</h4>                                                                
                                                <div class="panel-body slide">
                                                        <form class="form-horizontal subform">
                                                                <!--Sub form for per one product request, in order to validate-->
                                                                <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Product name</label>
                                                                        <div class="col-sm-6">
                                                                                <input name="product_name[1]" type="text" class="form-control product_name" placeholder="..." value="" />                                        
                                                                        </div>
                                                                </div> 
                                                                <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Category</label>
                                                                        <div class="col-sm-6">
                                                                                <select  name="cat[1]" class="form-control cat" onclick="selectCat(this)" placeholder="..."></select>
                                                                        </div>
                                                                </div>                                                 
                                                                <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Quantities</label>
                                                                        <div class="col-sm-2">
                                                                                <input name="quantities[1]" type="text" class="pull-left quantities form-control" placeholder="Quantities" value="" /> 
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                                <select  name="pieces[1]" class=" pull-left pieces form-control" onclick="" placeholder="pieces">
                                                                                        <option>pieces</option>
                                                                                </select> 
                                                                        </div>
                                                                </div>                                                 
                                                        
                                                                <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Description</label>
                                                                        <div class="col-sm-6">
                                                                                <textarea name="product_des[1]" class="form-control product_des" rows="3" placeholder="..."></textarea>
                                                                        </div>
                                                                </div>                                                                                                                                                       
                                                        </form>
                                                        <!--end sub form-->
                                                        <!-- Upload ajax use another form , so it's outside of subform-->                                                        
                                                        <div class="form-horizontal form-group">                                                                
                                                                <div class="col-sm-10">
                                                                        <div  class="fileuploader"><span class="glyphicon glyphicon-paperclip"></span>Attach files</div>
                                                                </div>
                                                        </div>                                                          
                                                </div>                                                 
                                        </div>                                                                                                                      
                                        <!--</div>-->                                                                                            
                                
                                        <div>
                                                <button id="addmore" class="btn btn-default pull-right" onclick="addmore()"><span class="glyphicon glyphicon-plus" title="more product"></span></button>                    
                                        </div>
                                        <div>
                                                <p>Expired Date</p>
                                                <input name="expire_date" id="expire_date" readonly="true" value="<?= date('d-m-Y', strtotime('+1 year')) ?>"/>
                                        </div>
                                </div>
                        <div class="panel-footer center">
                               <button id="create_btn" class="pull-right btn btn-primary" onclick="submit()">OK</button>
                               <div class="clearfix"></div>
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