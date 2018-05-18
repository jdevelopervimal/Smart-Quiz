<?php
use yii\helpers\Html;

?>
<div class="col-lg-9 col-sm-6 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1>Latest Quiz
                    <small>(Total <?= count($quizes); ?> quiz found)</small>
                </h1>
                <!--
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="#">Practice</a></li>
                    <li role="presentation"><a href="#">Mock</a></li>
                </ul>-->
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="main-content col-md-12">
            <div class="row">
                 <?php foreach ($quizes as $quiz): ?>
                <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= substr(strip_tags($quiz->quiz_name), 0, 10); ?><?php echo strlen($quiz->quiz_name) > 10 ? '...' : '';?> <span class="label label-info"><?= ($quiz->test_type == 0) ? 'Free' : 'Paid'; ?></span></h3>
                    </div>
                    <div class="panel-body">
                        <p class="quz-des italic">Duration: <b><?= $quiz->duration; ?>m</b></p>
                        <p class="quz-des italic">Max. Marks: <b><?= $quiz->correct_score; ?></b></p>
                        <p class="quz-des italic">Negative Marking: <b><?= ($quiz->duration == 0) ? 'No' : 'Yes'; ?></b></p>
                        <p class="quz-des"><?= substr(strip_tags($quiz->description), 0, 110); ?><?php echo strlen($quiz->description) > 100 ? '...' : '';?> </p>
                    </div>
                    <div class="panel-footer">
                        <a class="attempt-btn pull-right"  href="<?= BASE_URL ?>quiz-info/<?= $quiz->quid ?>">Detail
                            <span><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                            <div class="clearfix"></div>
                    </div>
                </div>
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </div>

</div><!-- end of .content -->
<?php
//print_r(Yii::$app->session);
?>
