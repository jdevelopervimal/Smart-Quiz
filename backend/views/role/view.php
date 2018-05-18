<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Role */
?>
<div class="role-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'version',
            'authority',
            'description',
            'name',
            'created_at',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
