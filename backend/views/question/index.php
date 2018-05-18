<?php
/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');
$q_type = [1 => 'Single Answer', 2 => 'Multiple Answer', 3 => 'Passage', 4 => 'Assay'];
?>
<?php if (!empty($msg)) { ?>
    <div class="alert alert-success alert-dismissible custom-alert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> <?= $msg; ?>
    </div>
<?php } ?>
<div class="col-lg-12 col-sm-12 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1><?= $this->title ?> <small> Total <?= count($questions) ?> item found</small>
                    <a href="<?= BASE_URL; ?>question/create" class="btn btn-primary finish">Add new</a>
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
                    <th>Question</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Difficulty</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;
foreach ($questions as $ques):
    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= substr(strip_tags($ques['question']), 0, 20) ?>...</td>
                        <td><?= $ques['category_name'] ?></td>
                        <td><?= $q_type[$ques['q_type']] ?></td>
                        <td><?= $ques['level_name'] ?></td>
                        <td>
                            <a href="<?= BASE_URL ?>question/create?id=<?= $ques['qid'] ?>" title="Update" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="<?= BASE_URL ?>question/delete?id=<?= $ques['qid'] ?>" onclick="return confirm('Are you sure wants to delete?')" title="Delete" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>
