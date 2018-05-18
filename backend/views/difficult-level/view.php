<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DifficultLevel */
?>
<div class="difficult-level-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'did',
            'level_name',
            'institute_id',
        ],
    ]) ?>

</div>
