<?php
/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transaction');
?>
<div class="col-lg-12 col-sm-12 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1><?= $this->title ?> <small> Total <?= count($transactions) ?> item found</small>
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
                    <th>Trans. ID</th>
                    <th>User Name</th>
                    <th>Group</th>
                    <th>Quiz</th>
                    <th>Purchase Date</th>
                    <th>Status</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($transactions as $trans):?>
                <tr>
                    <td><?= $i++;?></td>
                    <td><?= $trans['transaction_id'];?></td>
                    <td><?= $trans['username'];?></td>
                    <td><?= $trans['group_name'];?></td>
                    <td><?= $trans['quiz_name'];?></td>
                    <td><?= $trans['created_on'];?></td>
                    <td><?= $trans['transaction_status'];?></td>
                    <td><?= $trans['ammount'];?></td>
                </tr>   
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>