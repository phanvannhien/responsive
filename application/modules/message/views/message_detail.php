<?php $this->load->view('inc/header'); ?>
<style>
        .form-group {
                border-bottom: 1px solid #EEE;
        }
</style>
<div class="container   ">
        <div class="row">
                <div class="col-md-3">
                        <?php $this->load->view('inc/left'); ?>
                </div>
                <div class="col-md-9">
                        <div class="panel panel-default">
                                <div class="panel-heading"><h4>Message</h4></div>
                                <div class="panel-body">                
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                                <li class="active"><a href="#detail" data-toggle="tab">Message Detail</a></li>                                           
                                                <li><a href="#other_info" data-toggle="tab">Quote Information</a></li>                                           
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                                <div class="form-horizontal tab-pane active padding10" id="detail">                       
                                                        
                                                        <div class="form-group row">
                                                                <label class="col-sm-2 control-label">Quotation for...</label>
                                                                <div class="col-sm-6">
                                                                        
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-2 control-label">Date</label>
                                                                <div class="col-sm-6">
                                                                       <?= date('d-m-Y', strtotime($message[0]->create_date)); ?>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-2 control-label">From</label>
                                                                <div class="col-sm-6">
                                                                        <?= $message[0]->sender ?>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-2 control-label">Attach File:</label>
                                                                <div class="col-sm-6">
                                                                        <?php
                                                                                foreach ($message as $key => $value) {
                                                                                        ?>
                                                                                        <a href="<?= base_url() . 'request/download_file/?file_id=' . $value->file_id ?>"><?= $value->file_name ?></a>&nbsp;
                                                                                        <?php
                                                                                }
                                                                                ?>
                                                                </div>
                                                        </div>                                                        
                                                        <div id="message_content">
                                                                <?= $value->content ?>
                                                        </div>
                                                        
                                                </div>
                                                <div class="tab-pane" id="other_info">
                                                        <?=$message[0]->quote_desc?>
                                                        <br/>
                                                        <a class="btn btn-default" href="<?=  base_url().'quote/view/'.$message[0]->quote_id?>">View quote detail</a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="clearfix"></div>
        </div>
</div>
