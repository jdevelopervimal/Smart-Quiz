<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Groups');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12 content">
			<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1><?=	$this->title	?> 
									 <?= Html::a(Yii::t('app', 'Create User Group'), ['create'], ['class' => 'btn btn-primary finish']) ?>
								</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gid',
            'group_name',
            'institute_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
