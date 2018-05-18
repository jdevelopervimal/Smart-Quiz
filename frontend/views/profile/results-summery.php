<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$result = $data['result'];
$question = $data['questions'];
$qids = explode(',', $result['qids']);
$oids = explode(',', $result['oids']);
$score = explode(',', $result['score_ind']);
?>

<div class="col-lg-9 col-sm-6 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1>Quiz Summery</h1>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-summery" role="tablist">
                <?php
                $s = 1;
                foreach ($question as $que):
                    ?>
                    <li role="presentation" class="<?= ($s == 1) ? 'active' : ''; ?>"><a href="#section_<?= $s; ?>" aria-controls="section_<?= $s++; ?>" role="tab" data-toggle="tab"><?= $que['category_name'] ?></a></li>
                <?php endforeach; ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                $s = 1;
                $quesr = 1;
                foreach ($question as $que):
                    ?>
                    <div role="tabpanel" class="tab-pane <?= ($s == 1) ? 'active' : ''; ?>" id="section_<?= $s++; ?>">
                        <?php foreach ($que['questions'] as $quest): ?>
                            <?php if ($quest['q_type'] != 3) { ?>

                                <div class="panel panel-default ques-summery">
                                    <div class="panel-heading">Question : <?= $quesr++; ?></div>
                                    <div class="panel-body" style="padding: 0px 20px;padding-top: 11px;">
                                        <div class="ques-des">	
                                            <h4>Question:</h4>
                                            <?= $quest['question']; ?>	
                                        </div>
                                        <div class="ques-des">
                                            <h4>Solution:</h4>
                                            <?= $quest['description']; ?>
                                        </div>		

                                        <h5>Options : </h5>
                                        <div class="row">
                                            <?php
                                            $a = 65;
                                            $op_arr = array();
                                            foreach ($quest['options'] as $option):
                                                ?>																		
                                                <div class="col-md-6">
                                                    <div class="panel <?= ($option['score'] > 0) ? 'panel-primary' : 'panel-default'; ?> ques-summery">
                                                        <div class="panel-heading">	<?php echo chr($a); ?></div>
                                                        
                                                            <div class="panel-body"><?= $option['option_value']; ?>	
                                                                <?php $op_arr[$option['oid']] = chr($a++); ?>
                                                            </div>
                                                        </div>
                                                </div>

                                             <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <?php $key = array_search($quest['qid'], $qids, true); ?>
                                        <?php if($quest['q_type'] == 2){ 
                                            $ans = '';
                                            if(false !== $key){
                                                $opts = explode('$', $oids[$key]);
                                                foreach($opts as $op){
                                                    $ans  .= $op_arr[substr($op, 0,-2)].',';
                                                }
                                            }else{
                                                $ans = 'Not Answered';
                                            }
                                           ?>
                                        <span class="pull-left">Your Answer : <?= $ans; ?></span><span class="pull-right">Score : <?= (false !== $key) ? $score[$key] : '0'; ?></span>
                                        <?php }else{ ?>
                                        <span class="pull-left">Your Answer : <?= (false !== $key) ? $op_arr[$oids[$key]] : 'Not Answered'; ?></span><span class="pull-right">Score : <?= (false !== $key) ? $score[$key] : '0	'; ?></span>
                                        <?php }?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <?php }else { ?>
                                <div class="multiple_ques">
                                    <h3>Question <?= $quesr; ?></h3>
                                    <?= $quest['question']; ?>
                                    <?php
                                    $sub_no = 1;
                                    foreach ($quest['sub_ques'] as $sub):
                                        ?>
                                        <div class="panel panel-default ques-summery">
                                            <div class="panel-heading">Question : <?= $quesr; ?> . <?= $sub_no++; ?></div>
                                            <div class="panel-body" style="padding: 0px 20px;padding-top: 11px;">
                                                <div class="ques-des">
                                                    <h4>Question:</h4>
                                                        <?= $sub['question']; ?>
                                                </div>
                                                <div class="ques-des">
                                                    <h4>Solution:</h4>
                                                        <?= $sub['description']; ?>
                                                </div>
                                                <h5>Options : </h5>
                                                <div class="row">
                                                    <?php
                                                    $a = 65;
                                                    $op_arr = array();
                                                    foreach ($sub['options'] as $option):
                                                        ?>																		
                                                        <div class="col-md-6">
                                                            <div class="panel <?= ($option['score'] > 0) ? 'panel-primary' : 'panel-default'; ?> ques-summery">
                                                                <div class="panel-heading">	<?php echo chr($a); ?></div>
                                                                
                                                                    <div class="panel-body"><?= $option['option_value']; ?>	
                                                                    <?php $op_arr[$option['oid']] = chr($a++); ?>
                                                                    </div>
                                                                
                                                            </div>
                                                        </div>

                                                <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                        <?php $key = array_search($quest['qid'], $qids, true); ?>
                                        <?php if($sub['q_type'] == 2){ 
                                            $ans = '';
                                            if(false !== $key){
                                                $opts = explode('$', $oids[$key]);
                                                foreach($opts as $op){
                                                    $ans  .= $op_arr[substr($op, 0,-2)].',';
                                                }
                                            }else{
                                                $ans = 'Not Answered';
                                            }
                                           ?>
                                        <span class="pull-left">Your Answer : <?= $ans; ?></span><span class="pull-right">Score : <?= (false !== $key) ? $score[$key] : '0'; ?></span>
                                        <?php }else{ ?>
                                        <span class="pull-left">Your Answer : <?= (false !== $key) ? $op_arr[$oids[$key]] : 'Not Answered'; ?></span><span class="pull-right">Score : <?= (false !== $key) ? $score[$key] : '0	'; ?></span>
                                        <?php }?>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                <?php endforeach; ?>
                                </div>
                            <?php $quesr++; ?>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                  <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>