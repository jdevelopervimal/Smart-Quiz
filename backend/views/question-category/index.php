<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Question Categories');
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(!empty($msg)){?>
<div class="alert alert-success alert-dismissible custom-alert" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?= $msg;?>
</div>
<?php }?>	
<div class="col-md-12 content">
			<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1><?=	$this->title	?> 
									 <?= Html::a(Yii::t('app', 'Create Question Category'), ['create'], ['class' => 'btn btn-primary finish']) ?>
								</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cid',
            'category_name',
            'cat_duration',
            'institute_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
