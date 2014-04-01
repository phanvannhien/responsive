<?php $this->load->view('inc/header'); ?>
<style>
        .form-group {
                border-bottom: 1px solid #EEE;
        }
        
        .btn-quote{
                color: white;
                font-size: large;
                font-weight: bold;
                width: 200px;
                background: rgb(252,234,187); /* Old browsers */
                background: -moz-linear-gradient(top,  rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%); /* FF3.6+ */
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,234,187,1)), color-stop(50%,rgba(252,205,77,1)), color-stop(51%,rgba(248,181,0,1)), color-stop(100%,rgba(251,223,147,1))); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(top,  rgba(252,234,187,1) 0%,rgba(252,205,77,1) 50%,rgba(248,181,0,1) 51%,rgba(251,223,147,1) 100%); /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(top,  rgba(252,234,187,1) 0%,rgba(252,205,77,1) 50%,rgba(248,181,0,1) 51%,rgba(251,223,147,1) 100%); /* Opera 11.10+ */
                background: -ms-linear-gradient(top,  rgba(252,234,187,1) 0%,rgba(252,205,77,1) 50%,rgba(248,181,0,1) 51%,rgba(251,223,147,1) 100%); /* IE10+ */
                background: linear-gradient(to bottom,  rgba(252,234,187,1) 0%,rgba(252,205,77,1) 50%,rgba(248,181,0,1) 51%,rgba(251,223,147,1) 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fceabb', endColorstr='#fbdf93',GradientType=0 ); /* IE6-9 */
        }
</style>
<div class="container">
        <div class="row">
                <div class="col-md-3">
                        <?php $this->load->view('inc/sidebar', array('sidebar' => $sidebar)); ?>
                </div>
                <div class="col-md-9">
                        <div class="panel panel-default">
                                <div class="panel-heading"><h4>Request Detail</h4></div>
                                <div class="panel-body">                
                                        <!-- Tab panes -->
                                                <div class="form-horizontal padding10" id="detail">                       
                                                        
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
                                                        <a class="btn btn-primary btn-quote" href="<?=  base_url().'quote/load_quotation_form/'.$a_request_detail[0]->request_detail_id?>">Quote now</a>
                                                </div>
                                </div>
                        </div>
                </div>
                <div class="clearfix"></div>
        </div>
</div>
