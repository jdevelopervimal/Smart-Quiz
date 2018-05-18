<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserGroup */

$this->title = Yii::t('app', 'Create User Group');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Groups'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-create content">
	<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
						</div>
				</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
