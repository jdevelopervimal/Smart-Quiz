<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Institute */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Institute',
]) . ' ' . $model->su_institute_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Institutes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->su_institute_id, 'url' => ['view', 'id' => $model->su_institute_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="institute-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
