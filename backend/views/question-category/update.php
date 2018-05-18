<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionCategory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Question Category',
]) . ' ' . $model->cid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Question Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cid, 'url' => ['view', 'id' => $model->cid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="question-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
