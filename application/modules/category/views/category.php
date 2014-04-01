<?php $this->load->view('manager/header'); ?>
    <div class="col-md-9">
        <?php if(isset($message)):?>
                <div class="alert alert-danger">
                    <?php echo $message;?>
                </div>
        <?php endif;?>
        <div id="content" style="">
            <div class="clearfix" id="page_title">
                <div class="title_icon"><img title="" alt="" src=""></div>
                <h1 class="content_title" ><a href="#">LIST POST</a></h1>
            </div>       
        
            <div id="col-container" class="clearfix">
                <div id="posts_list" class="clearfix">
                    <div>
                        <p class="add_cat_btn">
                            <a class="btn btn-default" href="#"><span>Delete</span></a>
                            <a class="btn btn-default" href="#"><span>Add New</span></a>
                        </p>
                    </div>        
                    <div>
                        <form id="posts-category" name="posts-category" action="" method="post">
                        </form>
                    </div>
                    <!--add or delete-->
                    <div>
                        <p class="add_cat_btn">
                            <a class="btn btn-default" href="#"><span>Delete</span></a>
                            <a class="btn btn-default" href="#"><span>Add New</span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('manager/footer'); ?>
