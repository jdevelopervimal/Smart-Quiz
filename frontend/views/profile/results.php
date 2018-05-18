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
												<h1>My Results</h1>
												<div class="clearfix"></div>
										</div>
								</div>
								<div class="main-content col-md-12">
														<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
														<thead>
																		<tr>
																						<th>Sr</th>
																						<th>Quiz</th>
																						<th>Pass Percentage %	</th>
																						<th>You Get %</th>
																						<th>Your Score / Max Score</th>
																						<th>Result</th>
																						<th>Date</th>
																						<th>Action</th>
																		</tr>
														</thead>
														<tbody>
																<?php		
																$sr = 1;
																foreach	($results as $result):?>
																<tr>
																		<td><?= $sr++;?></td>
																		<td><?= $result['quiz_name']?></td>
																		<td><?= $result['pass_percentage']?>%</td>
																		<td><?= $result['percentage']?>%</td>
																		<td><?= $result['score'];?> / <?= $result['max_score']?></td>
																		<td>
																		<?php if($result['q_result'] == 0){ ?>
																				<span class="label label-warning">Pending</span>
																		<?php }else{?>
																				<span class="label label-<?= ($result['percentage'] >= $result['pass_percentage'])? 'success':'danger'?>"><?= ($result['percentage'] >= $result['pass_percentage'])? 'Pass':'Fail'?></span>
																		<?php }?>
																		</td>
																		<td>
																				<?php 
																				$time = $result['start_time'];
																				$date = new DateTime("@$time");
																				echo $date->format('Y-m-d H:i:s');
																				?>
																		</td>
																		<td>
																				<a href="<?= BASE_URL?>result-summery/<?= $result['rid']?>"><button class="view-result btn btn-primary" data-resultid = "<?= $result['rid']?>"><i class="fa fa-eye" aria-hidden="true"></i> Summery</button></a>
																		</td>
																</tr>
																<?php endforeach;?>
														</tbody>
														</table>
								</div>
						</div>
		</div>

<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Answer Sheet</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="confirm-to-submit">Submit Quiz</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>