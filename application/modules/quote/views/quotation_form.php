<?php $this->load->view('inc/header');?>
<style>
        .cpanel{
                display: none;  
        }       
        .per_price:hover .cpanel{
             display: block !important;
        } 
        .tree_cat{
                margin: 20px 0px 20px 20px;
                
        }
        .center{
                text-align: center;
        }
        
        img.image_quote{
                width: 100px;
                height: 100px;
                display: inline;
                margin-left: 10px;
        }
        
        .margintop10{
                margin-top: 10px;
        }
</style>

<script type="text/javascript">

var _count_gross = 1; 
var _count_net = 1;
var _obj_old = null;
var _obj_copy = null;

$(document).ready(function() {        
        _obj_old = $('.per_price');
        _obj_copy = _obj_old.clone();
        
        bind_event(_obj_old,'1');
        
        //set validate rules
        $.validator.setDefaults({ignore:[]});//allow hiden input
            
        $.validator.addClassRules({
                'product_name':{required: true},
                'cat':{required: true}
        });
        
        //datepicker
        $('#valid_till').datepicker({
                dateFormat: 'dd-mm-yy',
                defaultDate: new Date()
        });
        
        //bind ajax uploader                               
       $("#relevant_file").uploadFile({
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
                       $('#wrapform').append('<input type="hidden" name="relevant_file[]" value="'+data+'"'+'/>');                                       
               }
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
                    $('img[value="'+data+'"]',obj).remove();                    
               },
               onSuccess:function(files,data,xhr){                                         
                       $('#wrapform').append('<input type="hidden" name="product_photo'+'['+num+']'+'[]"'+ 'value="'+data+'"'+'/>');                                       
                       var src = '<?=  base_url().'quote/download_image/'?>'+ data;
                        $('.image_list',obj).append('<img  class="image_quote" src="'+src+ '" value="'+data+'"'+'/>');                                       
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
       $('.order_title',obj_new).html('Price '+ num);                                                
       $('.product_name',obj_new).attr('name','product_name['+num+']');                                                                        
       $('.model_number',obj_new).attr('name','model_number['+num+']');                                                                        
       $('.shipping_term',obj_new).attr('name','shipping_term['+num+']');                                                                        
       $('.port',obj_new).attr('name','port['+num+']');                                                                        
       $('.currency',obj_new).attr('name','currency['+num+']');                                                                        
       $('.price',obj_new).attr('name','price['+num+']');                                                                        
       $('.product_desc',obj_new).attr('name','product_desc['+num+']');                                                                        
       $('.quantity',obj_new).attr('name','quantity['+num+']');
       $('.unit',obj_new).attr('name','unit['+num+']');
              
       // hide the rest 
       $(".slide").slideUp();
       
       //append the clone
       $('.per_price').last().after(obj_new); 
              
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
		url: '<?php echo base_url() ?>quote/create_quote',
		data:  $("#wrapform").find("select, textarea, input").serialize(),
		dataType: "json",
                beforeSend:function(){
//                       $("#create_btn").attr("disabled","disabled"); 
                },
		success: function(data){
			if (data.response == 'success') {                     
				$("#create_btn").attr("value","Success");
				window.location = "<?php echo base_url();?>quote/view/"+ data.quote_insert_id;
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
                                        <h4 class="center">Quotation Form</h4>                                                                 
                                </div>
                                <div id="wrapform" class="panel-body">
                                        <?=  form_hidden('request_detail_id', $request_detail_id)?>
                                        <!--wrap form contain subforms-->                                                                                                            
                                        <div class="panel panel-default per_price"> 
                                                <div class="cpanel">      
                                                        <a class="pull-right btn  btn-group-xs remove hide">Remove</a>
                                                        <a class="pull-right btn  btn-group-xs edit hide">Edit</a>                                                        
                                                </div>  
                                                <h4 class="order_title hide">Price 1</h4>                                                                
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
                                                                        <label class="col-sm-4 control-label">Model number</label>
                                                                        <div class="col-sm-6">
                                                                                <input name="model_number[1]" type="text" class="form-control model_number" placeholder="..." value="" />                                        
                                                                        </div>
                                                                </div> 
                                                                <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Shipping Term</label>
                                                                        <div class="col-sm-6">
                                                                                <input name="shipping_term[1]" type="text" class="form-control shipping_term" placeholder="..." value="" />                                        
                                                                        </div>
                                                                </div> 
                                                                <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Port</label>
                                                                        <div class="col-sm-6">
                                                                                <input name="port[1]" type="text" class="form-control port" placeholder="..." value="" />                                        
                                                                        </div>
                                                                </div> 
                                                                                                               
                                                                <div class="form-group"> 
                                                                        <label class="col-sm-4 control-label">FOB Unit Price</label>
                                                                        <div class="col-sm-2">
                                                                                <input name="currency[1]" type="text" class="pull-left currency form-control" placeholder="USD" value="USD" /> 
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                                <input name="price[1]" type="text" class="pull-left price form-control" placeholder="..." value="" /> 
                                                                        </div>
                                                                        <span class="pull-left margintop10">/</span>
                                                                        <div class="col-sm-2">
                                                                                
                                                                                <select  name="unit[1]" class=" pull-left unit form-control" onclick="" placeholder="pieces">
                                                                                        <?php
                                                                                                foreach ($a_unit as $key => $value){
                                                                                        ?>
                                                                                                <option><?=$value?></option>
                                                                                        <?php
                                                                                                }
                                                                                        ?>                                                                                        
                                                                                </select> 
                                                                        </div>
                                                                </div>                                                 
                                                                <div class="form-group"> 
                                                                        <label class="col-sm-4 control-label">Quantity based on:</label>
                                                                        <div class="col-sm-2">
                                                                                <input name="quantity[1]" type="text" class="pull-left quantity form-control" placeholder="Quantities" value="" />                                                                                 
                                                                        </div>
                                                                        <span class="pull-left margintop10">/</span>
                                                                        <div class="col-sm-4">
                                                                                <select  name="unit2[1]" class=" pull-left col-sm-2 unit2 form-control" onclick="" placeholder="pieces">
                                                                                        <?php
                                                                                                foreach ($a_unit as $key => $value){
                                                                                        ?>
                                                                                                <option><?=$value?></option>
                                                                                        <?php
                                                                                                }
                                                                                        ?> 
                                                                                </select> 
                                                                        </div>
                                                                </div>                                                 
                                                        
                                                                <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Product detail</label>
                                                                        <div class="col-sm-6">
                                                                                <textarea name="product_desc[1]" class="form-control product_desc" rows="3" placeholder="..."></textarea>
                                                                        </div>
                                                                </div>                                                                                                                                                       
                                                        </form>
                                                        <!--end sub form-->
                                                        <!-- Upload ajax use another form , so it's outside of subform-->                                                        
                                                                                                             
                                                        
                                                        <div class="form-horizontal form-group">                                                                
                                                                <label class="col-sm-4 control-label">Upload Files</label>
                                                                <div class="col-sm-6">
                                                                        <div  class="fileuploader"><span class="glyphicon glyphicon-paperclip"></span>Product Photo</div>
                                                                </div>
                                                        </div> 
                                                        
                                                        <div class="form-horizontal form-group image_list">
                                                                <div class="col-sm-4"></div>                                                                                                                                        
                                                        </div>
                                                        
                                                </div>                                                 
                                        </div>                                                                                                                                                      
                                        <div>
                                                <button id="addmore" class="btn btn-default pull-right" onclick="addmore()"><span class="glyphicon glyphicon-plus" title="more product"></span></button>                    
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-horizontal"> 
                                                <div class="form-group">  
                                                        <label class="col-sm-4 control-label">Quotation Valid Till</label>
                                                        <div class="col-sm-6">
                                                                <input name="valid_till" id="valid_till" readonly="true" value="<?= date('d-m-Y', strtotime('+1 year')) ?>"/>
                                                        </div>
                                                </div>
                                                <div class="form-group">  
                                                        <label class="col-sm-4 control-label">Question for the Buyer</label>
                                                        <div class="col-sm-6">
                                                                <textarea name="question_for_buyer" class="form-control question_for_buyer" rows="2" placeholder="Question..."></textarea>
                                                        </div>   
                                                </div>
                                                <div class="form-group">  
                                                        <label class="col-sm-4 control-label">Relevant Files</label>
                                                        <div class="col-sm-6">
                                                                <div id="relevant_file"  class="fileuploader"><span class="glyphicon glyphicon-paperclip"></span>Upload</div>
                                                        </div>   
                                                </div>
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