<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title='User Results Page';
?>
<div class="col-lg-12 col-sm-12 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1><?=	$this->title	?> <small> Total <?= count($results)?> item found</small>
								</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>
		<div class="main-content col-md-12">
														<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
														<thead>
																		<tr>
																						<th>Sr</th>
																						<th>User</th>
																						<th>Group</th>
																						<th>Quiz</th>
																						<th>Req. Percentage %	</th>
																						<th>You Get %</th>
																						<th>Marks obt./Max Marks</th>
																						<th>Result</th>
																						<th>Action</th>
																		</tr>
														</thead>
														<tbody>
																<?php		
																$sr = 1;
																foreach	($results as $result):?>
																<tr>
																		<td><?= $sr++;?></td>
																		<td><?= $result['first_name'].' '.$result['last_name']?></td>
																		<td><?= $result['group_name']?></td>
																		<td><?= $result['quiz_name']?></td>
																		<td><?= $result['pass_percentage']?>%</td>
																		<td><?= $result['percentage']?>%</td>
																		<td><?= array_sum(explode(',',	$result['score_ind']));?> / <?= $result['max_score']?></td>
																		<td>
																		<?php if($result['q_result'] == 0){ ?>
																				<span class="label label-warning">Pending</span>
																		<?php }else{?>
																				<span class="label label-<?= ($result['percentage'] >= $result['pass_percentage'])? 'success':'danger'?>"><?= ($result['percentage'] >= $result['pass_percentage'])? 'Pass':'Fail'?></span>
																		<?php }?>
																		</td>
																		<td>
																				<?php if($result['q_result'] == 0){?>
																				<a href="<?= BASE_URL?>evaluate/<?= $result['rid']?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Evaluate</a>
																				<?php }else{?>
																				<a href="<?= BASE_URL?>summery/<?= $result['rid']?>" class="view-result btn btn-primary" data-resultid = "<?= $result['rid']?>"><i class="fa fa-eye" aria-hidden="true"></i> Summery</a>
																				<?php }?>
																		</td>
																</tr>
																<?php endforeach;?>
														</tbody>
														</table>
								</div>
		
</div>