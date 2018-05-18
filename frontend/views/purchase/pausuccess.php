<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="col-lg-9 col-sm-6 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1>Purchase Quiz</h1>
                <ul class="nav nav-pills">
                        <li role="presentation" class="active"><button class="btn btn-<?php echo ($status = 'success') ? 'success': 'danger'?>"><?= $status; ?></button></li>
   
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-12 text-center">
                <?php if($status == 'success'){ ?>
            <h3>Transaction Successfully Completed!</h3>
            <a href='<?= BASE_URL?>quiz-info/<?php echo $response['productinfo']?>'><button class="btn btn-primary">GO To Quiz</button></a>
                <?php }else{?>
            <h2>Some Error Occurred Please try again.</h2>
            <a href='<?= BASE_URL?>quiz-info/<?php echo $response['productinfo']?>' ><button class="btn btn-primary">GO To Quiz</button></a>
                <?php }?>
        </div>
    </div>
</div>