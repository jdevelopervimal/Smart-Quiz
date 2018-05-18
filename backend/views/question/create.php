<?php
/* @var $this yii\web\View */
/* @var $model common\models\Question */
$q_type = [1=>'Single Answer',2=>'Multiple Answer',3=>'Passage',4=>'Assay'];
?>
<?php if(!empty($msg)){?>
<div class="alert alert-success alert-dismissible custom-alert" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?= $msg;?>
</div>
<?php }?>
<div class="col-lg-12 col-sm-12 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
								<h1>Create New Question
										<?php	if	($parent['p_id']	!=	0)	{	?>
												<a href="<?=	BASE_URL;	?>question/index" class="btn btn-primary finish">Finish</a>
										<?php	}	?>
								</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>
		<div class="row">
				<form action="<?=	BASE_URL	?>question/create<?=($question->qid != 0)? '?id='.$question->qid: '';?>" id="question-form" method="post" enctype="multipart/form-data">
						
								<input type="hidden" name="qid" value="<?=	($question->qid) ? $question->qid : 0;?>"/>
						
						<div class="form-group col-md-12">
								<label for="username" class="col-sm-4 control-label">Question Type : </label>
								<div class="col-md-4">
										<select name="question_type" class="form-control" onchange="selectQuestion(this.value);" <?=($question->qid != 0)? 'disabled': '';?>>
												<option value="">Please Select Question Type</option>
												<option value="1" <?=	($question->q_type	==	1)	?	"selected"	:	"";	?>>Single Question - Single Answer</option>
												<option value="2" <?=	($question->q_type	==	2)	?	"selected"	:	"";	?>>Single Question - Multiple Answer</option>
												<?php	if	($parent['p_id']	==	0)	{	?>
														<option value="3" <?=	($question->q_type	==	3)	?	"selected"	:	"";	?>>Passage Question</option>
														<option value="4" <?=	($question->q_type	==	4)	?	"selected"	:	"";	?>>Assay Type</option>
												<?php	}	?>
										</select>
								</div>
						</div>
						<?php	if	($parent['p_id']	==	0)	{	?>
								<div class="form-group col-md-12">
										<label for="username" class="col-sm-4 control-label">Question Category : </label>
										<div class="col-md-4">
												<select name="question_category" class="form-control">
														<option value="">Please Select Question Category</option>
														<?php
														foreach	($category	as	$cat):
																$sel	=	($cat->cid	==	$question->cid)	?	"selected"	:	"";
																?>

																<option value="<?=	$cat->cid;	?>" <?=	$sel	?>><?=	$cat->category_name;	?></option>
														<?php	endforeach;	?>
												</select>
										</div>
								</div>
						<?php	}else	{	?>
								<input type='hidden' name='question_category' value="<?=	$parent['p_cat']	?>" />
								<input type="hidden" name="parent" value="<?=	$parent['p_id']	?>"/>
						<?php	}	?>
						<div class="form-group col-md-12">
								<label for="username" class="col-sm-4 control-label">Difficulty Level : 
										<p>Set Difficulty	<strong>Easy, Medium, Hard</strong></p>
								</label>
								<div class="col-md-4">
										<select name="did" class="form-control">
												<option value="">Please Select Difficulty level</option>
												<?php
												foreach	($difficulty	as	$dif):
														$sel	=	($dif->did	==	$question->did)	?	"selected"	:	"";
														?>
														<option value="<?=	$dif->did;	?>" <?=	$sel	?>><?=	$dif->level_name;	?></option>
<?php	endforeach;	?>
										</select>
								</div>
						</div>
						<div class="form-group col-md-12">
								<label for="username" class="col-sm-4 control-label">Question : </label>
								<div class="col-md-8">
										<textarea class="form-control hasEditor" name="question"><?=	$question->question;	?></textarea>
								</div>
								<div class="clearfix"></div>
						</div>
						<div class="form-group col-md-12" id="description-block">
								<label for="username" class="col-sm-4 control-label">
										Description / Solution : 
										<p>User may see solution after attempting the quiz</p>
								</label>
								<div class="col-md-8">
										<textarea class="form-control hasEditor"name="descrition"><?=	$question->description;	?></textarea>
								</div>
								<div class="clearfix"></div>
						</div>
						<?php
//				echo '<pre>';
//print_r($options);
//echo '</pre>';
						
						if(is_array($options) && !empty($options)){
								$i = 1;
								foreach($options as $opt):
										$uniqu = 'optRemove_'.$opt['oid'];
						?>
						<div class="col-md-12 options removable" id="<?= $uniqu?>">
								<div class="col-md-4">	
										<span class="add-btn" onclick="delOption(<?= $opt['oid']?>,'<?= $uniqu?>')"><i class="fa fa-<?= ($i == 1) ? 'plus': 'minus';?>-circle" aria-hidden="true"></i></span>
										<div class="<?=	($question->q_type	==	1)	?	"radio"	:	"checkbox";	?>">
												<label style="font-size:23px">
														<input type="hidden" name="oid[]" value="<?= $opt['oid']?>"/>
														<input type="<?=	($question->q_type	==	1)	?	"radio"	:	"checkbox";	?>" class="my-option" name="<?=	($question->q_type	==	1)	?	"option"	:	"option[]";	?>" value="<?= $i?>" <?= ($opt['score'] == 0) ? '' : 'checked';?>/>
														<span class="cr"><i class="cr-icon fa fa-<?=	($question->q_type	==	1)	?	"circle"	:	"check";	?>"></i></span>
												</label>
										</div>
								</div>

								<div class="col-md-8">
										<textarea name="option_value[]" class="form-control hasEditor"><?= $opt['option_value']?></textarea>
								</div>
						</div>
						<?php 
						$i++;
						endforeach;
						}?>
						<div class="col-md-4 col-lg-offset-4 submit-btn"  id="question-submit">
								<button type="submit" class="btn btn-primary">Submit</button>

						</div>

				</form>
				<?php if(!empty($data)){ ?>
				<div class="clearfix"></div>
				<div class="col-md-12	child-ques">
						<h2>Passage Associated Question <small>Total <?= count($data['child'])?> item found.</small>
						<a href="<?= BASE_URL;?>question/create?parent=<?= $question->qid?>" class="btn btn-primary finish">Add new</a>
						</h2>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Question</th>
                <th>Type</th>
                <th>Difficulty</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
										<?php 
										$i = 1;
										foreach($data['child'] as $ques):?>
            <tr>
                <td><?= $i?></td>
                <td><?= $ques['question']?></td>
                <td><?= $q_type[$ques['q_type']]?></td>
                <td><?= $ques['did']?></td>
                <td>
																<a href="<?= BASE_URL?>question/create?id=<?= $ques['qid']?>" title="Update" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a>
																	<a href="<?= BASE_URL?>question/delete?id=<?= $ques['qid']?>" title="Delete" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
																</td>
            </tr>
            <?php	
												$i++;
												endforeach;?>
        </tbody>
    </table>
				</div>
				<?php }?>
		</div>
</div>

<!--Options Template -->
<div class="col-md-12 options hide" id="ques1">
		<div class="col-md-4">	
				<span class="add-btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
				<div class="radio">
						<label style="font-size:23px">
								<input type="radio" class="my-option" name="option" value="no"/>
								<span class="cr"><i class="cr-icon fa fa-circle"></i></span>
						</label>
				</div>
		</div>

		<div class="col-md-8">
				<textarea name="option_value[]" class="form-control"></textarea>
		</div>
</div>
<div class="col-md-12 options hide" id="ques2">

		<div class="col-md-4">	
				<span class="add-btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
				<div class="checkbox">
						<label style="font-size:23px">
								<input type="checkbox" class="my-option" name="option[]" value="no"/>
								<span class="cr"><i class="cr-icon fa fa-check"></i></span>

						</label>
				</div>
		</div>
		<div class="col-md-8">
				<textarea name="option_value[]" class="form-control"></textarea>
		</div>

</div>
<div class="clearfix"></div>	
