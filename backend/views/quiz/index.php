<?php
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset; 

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quizzes');
//$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
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
							 <h1><?=	$this->title	?> <small> Total <?= count($data)?> item found</small>
									<a href="<?= BASE_URL;?>quiz/create" class="btn btn-primary finish">Add new</a>
								</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>
		<div class="row">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Quiz</th>
                <th>Availability</th>
                <th>Percentage</th>
                <th>Max Attempts</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
										<?php 
										$i = 1;
										foreach($data as $quiz):?>
            <tr>
                <td><?= $i?></td>
                <td><?= $quiz->quiz_name?></td>
                <td><?= $quiz->start_time?> - <?= $quiz->end_time?></td>
                <td><?= $quiz->pass_percentage?></td>
                <td><?= $quiz->max_attempts?></td>
                <td>
																<a href="<?= BASE_URL?>quiz/create?id=<?= $quiz->quid?>" title="Update" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a>
																	<a href="<?= BASE_URL?>quiz/delete?id=<?= $quiz->quid?>" title="Delete" data-pjax="0" role="modal-remote" data-request-method="post" data-toggle="tooltip" data-confirm-title="Are you sure?" data-confirm-message="Are you sure want to delete this item"><span class="glyphicon glyphicon-trash"></span></a>
																</td>
            </tr>
            <?php	
												$i++;
												endforeach;?>
        </tbody>
    </table>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
		</div>
</div>

