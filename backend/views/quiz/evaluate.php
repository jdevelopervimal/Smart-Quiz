<?php
/*
	* To change this license header, choose License Headers in Project Properties.
	* To change this template file, choose Tools | Templates
	* and open the template in the editor.
	*/
$this->title	=	'Essay Evaluation';
$sr	=	1;
?>

<div class="col-lg-12 col-sm-12 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1><?=	$this->title	?> <small> Total <?=	count($results)	?> item found</small>
										<a href="<?= BASE_URL?>" class="btn btn-primary pull-right">Finish</a>
								</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>
		<div class="row">
				<div class="col-md-12">
						<?php	foreach	($results	as	$resul):	?>
								<div class="panel panel-default">
										<div class="panel-heading">
												<h3 class="panel-title">Question <?=	$sr++;	?></h3>
												<div class="clearfix"></div>
										</div>
										<div class="custom-height panel-body">
												<?=	$resul['question']	?>
												<h3>Essay Written by Student:</h3>
												<div class="user-ans-essay col-md-12">
														
														<?=	$resul['essay']['essay_cont']	?>
												</div>
												<div class="clearfix"></div>
										</div>
										<div class="panel-footer">

												<form class="navbar-form navbar-left eval-form" id="savid_<?= $resul['essay']['essay_id']?>" role="search">
														<div class="form-group">
																<label>Evaluate : </label>
																<input type="hidden" value="<?= $resul['qid']?>" name="qid"/>
																<input type="hidden" value="<?= $resul['essay']['essay_id']?>" name="essay_id"/>
																<input type="number" class="form-control" name="marks" placeholder="Marks Obtained">
														</div>
														<button  class="save-essay-eval btn btn-default" data-id="<?= $resul['essay']['essay_id']?>">Submit</button>
														<label class="pull-right">Max Marks : </label>
												</form>
												<div class="clearfix"></div>
										</div>
								</div>
						<?php	endforeach;	?>
				</div>
		</div>
</div>
