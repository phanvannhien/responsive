<div class="container   ">
        <div class="row">
                <div class="col-md-3">                      
                </div>
                <div class="col-md-9">
                        <div class="panel panel-default">
                                <div class="panel-heading"><h4>Request Detail</h4></div>
                                <div class="panel-body">                
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                                <li class="active"><a href="#detail" data-toggle="tab">Request Detail</a></li>                                           
                                                <li><a href="#other_info" data-toggle="tab">Other Information</a></li>                                           
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                                <div class="form-horizontal tab-pane active padding10" id="detail">                       
                                                        
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
                                                        
                                                        <a href="<?=  base_url()?>">Quote now</a>
                                                        
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
                                                <div class="tab-pane" id="other_info">
                                                        ...
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="clearfix"></div>
        </div>
</div>
