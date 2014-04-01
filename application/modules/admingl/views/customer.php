<div class="col-lg-12">
    <div class="panel panel-default">
        <table class="table table-bordered">
            
           <?php 
           
              foreach ($rows as $r){
                 echo $r->user_email.'<br>';
              }
               ?>
        </table>
    </div>
</div>