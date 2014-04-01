<script>
        $(function(){
                var menu_ul = $('.menu > li > ul');
                var menu_ul_selected = $('.menu > li > ul > li.selected').parent();
                var menu_a = $('.menu > li > a ');
                
                menu_ul.not(menu_ul_selected).hide();
                
                menu_a.click(function(e){
//                        e.preventDefault();
                        if(!$(this).hasClass('active'))
                        {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true,true).slideDown('normal');
                        }
                        else
                        {
                                $(this).removeClass('active');
                                $(this).next().stop(true,true).slideUp('normal');
                        }
                });
        });
</script>
<div  id="wrapper">
    <ul class="menu">
        <li class="item1"><a href="#">Buying Request <span>340</span></a>
            <ul>
                <li class="subitem1 <?=$sidebar=='post_request'?'selected':''?>"><a href="<?php echo(base_url()."request/post_buying_request"); ?>">Post Buying Request</a></li>
                <li class="subitem2 <?=$sidebar=='list_request'?'selected':''?>"><a href="<?php echo(base_url()."request/list_request"); ?>">Manage Buying Request<span>6</span></a></li>
                <li class="subitem3"><a href="#">Manage Receive Quotes<span>2</span></a></li>
            </ul>
        </li>
<!--        <li class="item2"><a href="#">Videos <span>147</span></a>
            <ul>
                <li class="subitem1"><a href="#">Cute Kittens <span>14</span></a></li>
                <li class="subitem2"><a href="#">Strange "Stuff" <span>6</span></a></li>
                <li class="subitem3"><a href="#">Automatic Fails <span>2</span></a></li>
            </ul>
        </li>
        <li class="item3"><a href="#">Galleries <span>340</span></a>
            <ul>
                <li class="subitem1"><a href="#">Cute Kittens <span>14</span></a></li>
                <li class="subitem2"><a href="#">Strange "Stuff" <span>6</span></a></li>
                <li class="subitem3"><a href="#">Automatic Fails <span>2</span></a></li>
            </ul>
        </li>
        <li class="item4"><a href="#">Podcasts <span>222</span></a>
            <ul>
                <li class="subitem1"><a href="#">Cute Kittens <span>14</span></a></li>
                <li class="subitem2"><a href="#">Strange "Stuff" <span>6</span></a></li>
                <li class="subitem3"><a href="#">Automatic Fails <span>2</span></a></li>
            </ul>
        </li>-->
        <li class="item5"><a href="#">Suppliers<span>16</span></a>
            <ul>
                <li class="subitem1"><a href="#">My Supplier<span>14</span></a></li>
                <li class="subitem2"><a href="#">Recommended Suppliers<span>6</span></a></li>               
            </ul>
        </li>
    </ul>
</div>
