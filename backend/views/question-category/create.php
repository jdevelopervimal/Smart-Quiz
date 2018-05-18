<?php
use	yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionCategory */
$this->title	=	Yii::t('app',	'Create Question Category');
?>

<div class="col-lg-12 col-sm-12 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1><?=	Html::encode($this->title)	?></h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>
		<div class="row">

		</div>
		<div class="row">
		<form action="<?=	BASE_URL	?>question-category/create" id="category-form" method="post" enctype="multipart/form-data">
				<?php if($model->cid){ ?>
				<input type="hidden" name="cid" value="<?= $model->cid?>"/>
				<?php }?>
				<div class="form-group col-md-12">
						<label for="username" class="col-sm-4 control-label">Category Name : </label>
						<div class="col-md-4">
								<input type="text" name="category_name" value="<?= $model->category_name?>" class="form-control" id="category_name" placeholder="Category Name"/>
						</div>
				</div>
				<div class="form-group col-md-12">
						<label for="username" class="col-sm-4 control-label">Category Duration: 
								<p>Time duration for section wise time up in quiz(In minutes).</p>
						</label>
						<div class="col-md-4">
								<input type="text" name="cat_duration" value="<?= $model->cat_duration?>" class="form-control" id="category_name" placeholder="Category Duration"/>
						</div>
				</div>
				<div class="col-md-4 col-lg-offset-4 submit-btn">
						<button type="submit" id="question-submit"  class="btn btn-primary">Submit</button>
				</div>
		</form>
		</div>
		<div class="clearfix"></div>
</div>
