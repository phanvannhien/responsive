<script>
    $(document).ready(function() {
        $(".nav-stacked > li").click(function() {
            $(".nav-stacked > li").removeClass("active");
            $(this).addClass("active");
        });

    });
</script>
<div class="panel">
    <div class="panel-heading">
        <div class="btn-group btn-group-justified">
            <a class="btn btn-default glyphicon-envelope" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Tin nhắn</a>
        </div>
    </div>
    <div class="panel-body">
        <div id="collapseOne" class="panel-collapse collapse in">

            <div class="btn-group btn-group-justified">
                <a href="<?= base_url(); ?>message/list_message/inbox" class="btn btn-link">Làm mới</a>
                <a href="<?= base_url(); ?>message/newmesage" class="btn btn-link">Gửi tin</a>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="">
                        <a href="<?= base_url(); ?>message/list_message/inbox"><span class="glyphicon glyphicon-folder-close"></span> Inbox <span class="badge pull-right"><?=  isset($total_message['inbox'])?$total_message['inbox']:''?></span></a>

                </li>
                <li>
                    <a href="<?= base_url(); ?>message/list_message/sentbox"><span class="glyphicon glyphicon-folder-open"></span> Sent Box <span class="badge pull-right"><?=  isset($total_message['sentbox'])?$total_message['sentbox']:''?></span></a>
                </li>
                <li> <a href="<?= base_url(); ?>message/list_message/spam"><span class="glyphicon glyphicon-ban-circle"></span> Spam <span class="badge pull-right"><?=  isset($total_message['spam'])?$total_message['spam']:''?></span></a></li>
                <li><a href="<?= base_url(); ?>message/list_message/trash"><span class="glyphicon glyphicon-trash"></span> Trash<span class="badge pull-right"><?=  isset($total_message['trash'])?$total_message['trash']:''?></span></a></li>


            </ul>
        </div>
    </div>

</div>



<div class="btn-group btn-group-justified">
    <a class="btn btn-default glyphicon-envelope" data-toggle="collapse" data-parent="#accordion" href="#collapseContact"> Danh bạ</a>
</div>
<div id="collapseContact" class="panel-collapse collapse in">


</div>