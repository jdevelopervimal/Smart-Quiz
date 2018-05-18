<?php
use	yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionCategory */
$this->title	=	Yii::t('app',	'Add File');
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
		<form action="<?=	BASE_URL	?>" id="category-form" method="post" enctype="multipart/form-data">

			
		</form>
		</div>
		<div class="clearfix"></div>
</div>