<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionCategory */

$this->title = Yii::t('app', 'Create New Quiz');
$selected = '';
?>
<div class="col-lg-12 col-sm-12 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1><?= Html::encode($this->title) ?></h1>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <form action="<?= BASE_URL ?>quiz/create" id="quiz-form" method="post" enctype="multipart/form-data">
            <?php if ($quiz->quid) { ?>
                <input type="hidden" name="quid" value="<?= $quiz->quid ?>"/>
            <?php } ?>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Quiz Name : </label>
                <div class="col-md-4">
                    <input type="text" name="quiz_name" value="<?= $quiz->quiz_name; ?>" class="form-control" id="quiz_name" placeholder="Quiz Name"/>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Quiz Code : </label>
                <div class="col-md-4">
                    <input type="text" name="quiz_code" value="<?= $quiz->quiz_code; ?>" class="form-control" id="quiz_code" placeholder="Ex: ABC123"/>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Quiz Description:
                </label>
                <div class="col-md-4">
                    <textarea name="description" class="hasEditor" >
                        <?= $quiz->description; ?>
                    </textarea>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Quiz Duration in Minutes : 
                    <p>Quiz Duration calculate as per question section.</p>
                </label>
                <div class="col-md-4">
                    <input type="text" name="duration" class="form-control" value="<?= $quiz->duration; ?>" id="category_name" placeholder="Duration" disabled/>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Quiz Available between: 
                    <p>Set specific time period for quiz availability.</p>
                </label>
                <div class="col-md-4">
                    <input type="text" name="start_time" class="form-control" value="<?= $quiz->start_time; ?>" id="from" placeholder="Start Time"/>
                </div>
                <div class="col-md-4">
                    <input type="text" name="end_time" class="form-control" value="<?= $quiz->end_time; ?>" id="to" placeholder="End Time"/>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Percentage to pass : 
                    <p>Required percentage to pass (<strong>33.3</strong> format)</p>
                </label>
                <div class="col-md-4">
                    <input type="text" name="pass_percentage" value="<?= $quiz->pass_percentage; ?>" class="form-control" id="category_name" placeholder="Percentage to Pass"/>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Select Group: 
                    <p>You can assign quiz to more than one Group.</p>
                </label>
                <div class="col-md-4">
                    <select id="ddlCars" name="group[]" class="form-control" multiple="multiple">
                        <?php
                        foreach ($data['group'] as $group):
                            if (!empty($data['quiz-group'])) {

                                $selected = (in_array($group['gid'], $data['quiz-group'])) ? 'selected' : '';
                            }
                            ?> 
                            <option value="<?= $group['gid'] ?>" <?= $selected ?>><?= $group['group_name'] ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Quiz Type : 
                    <p>Quiz available for free or paid user</p>
                </label>
                <div class="col-sm-4 free">
                    <div class="radio">
                        <label style="font-size:16px">
                            <input type="radio" class="my-option" id="free-quiz" name="q_type" value="0" <?= ($quiz->test_type == 0) ? 'checked' : ''; ?>/>
                            <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                            Free
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size:16px">
                            <input type="radio" class="my-option" id="paid-quiz" name="q_type" value="1" <?= ($quiz->test_type == 1) ? 'checked' : ''; ?>/>
                            <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                            Paid
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12 <?= ($quiz->test_type == 1) ? '' : 'hide'; ?>" id="quiz-price-block">
                <label for="username" class="col-sm-4 control-label">Quiz Price :
                    <p>Quiz Price In INR.</p>
                </label>

                <div class="col-md-4">
                    <input type="text" name="quiz_price" class="form-control" value="<?= $quiz->quiz_price; ?>" placeholder="Quiz Price"/>
                </div>

            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Allow user to view answer : 
                    <p>After attempting quiz student may see correct answer.</p>
                </label>
                <div class="col-sm-4 free">
                    <div class="radio">
                        <label style="font-size:16px">
                            <input type="radio" class="my-option" name="view_answer" value="1"  <?= ($quiz->view_answer == 1) ? 'checked' : ''; ?>/>
                            <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                            Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size:16px">
                            <input type="radio" class="my-option" name="view_answer" value="0" <?= ($quiz->view_answer == 0) ? 'checked' : ''; ?>/>
                            <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Maximum Attempts: 
                    <p>Maximum attempts per student.</p>
                </label>
                <div class="col-md-4">
                    <select name="max_attempts" class="form-control">
                        <option value="">Select maximum attempts</option>
                        <?php
                        for ($i = 1; $i <= 100; $i++) {
                            if ($quiz->max_attempts == $i) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Quiz Type: 
                    <p>Select quiz type.</p>
                </label>
                <div class="col-sm-4 free">
                    <div class="radio">
                        <label style="font-size:16px">
                            <input type="radio" class="my-option" name="pract_test" value="1" <?= ($quiz->pract_test == 1) ? 'checked' : ''; ?>/>
                            <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                            Mock
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size:16px">
                            <input type="radio" class="my-option" name="pract_test" value="0" <?= ($quiz->pract_test == 0) ? 'checked' : ''; ?>/>
                            <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                            Exam
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Marks : 
                    <p>Marks Per question</p></label>
                <div class="col-md-4">
                    <input type="text" name="correct_score" class="form-control" value="<?= $quiz->correct_score; ?>" id="" placeholder="Marks per question"/>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="username" class="col-sm-4 control-label">Negative Marking: 
                    <p>Marks Deducted per wrong question.</p>
                </label>
                <div class="col-md-4">
                    <input type="text" name="incorrect_score" class="form-control" id="" value="<?= ($quiz->incorrect_score > 0) ? $quiz->incorrect_score : 0; ?>" placeholder="Negative marks"/>
                </div>
            </div>
            <div class="col-md-4 col-lg-offset-4 submit-btn">
                <button type="submit" id="question-submit"  class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <?php
    if ($quiz->quid > 0) {
        $quid_data = array();
        $hide = 'both';
        $quids = array();
        if ($quiz->qids_static != NULL) {
            $quid_data = unserialize($quiz->qids_static);
            $hide = $quid_data['type'];
            $quids = ($hide == 'manual') ? $quid_data['ques'] : $quid_data['category'];
        }
        ?>
        <!-- If quiz is saved -->
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Add Question</h3>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active <?= ($hide == 'manual') ? 'hide' : ''; ?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Automatically</a></li>
                        <li role="presentation" class="<?= ($hide == 'auto') ? 'hide' : ''; ?>"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Manual</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane <?= ($hide == 'manual') ? '' : 'active'; ?>" id="home">
                            <h4>Question Category		:</h4>
                            <form id="auto-quiz">
                                <div class="form-group col-md-12">
                                    <label for="username" class="col-sm-4 control-label">Quiz Duration: 
                                        <p>0 for section wise quiz attempt </p>
                                        <p>Greter than 0 for full length quiz attempt </p>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="quid" value="<?= $quiz->quid ?>"/>

                                        <input type="text" name="cat_duration" value="<?= $quiz->duration ?>" class="form-control" id='quiz_duration'/>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" name="submit"  value="save" class='btn btn-primary'/>
                                    </div>
                                </div>

                            </form>

                            <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Category Name</th>
                                        <th>No Of Questions</th>
                                        <th>Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    foreach ($data['categories'] as $cat):
                                        ?>
                                        <tr>
                                            <td><?= $sr++; ?></td>
                                            <td><?= $cat->category_name ?></td>
                                            <td>100</td>
                                            <td><?= $cat->cat_duration ?> Minutes	</td>
                                            <td>
                                                <?php
                                                if ($hide == 'auto') {
                                                    $selected = (in_array($cat->cid, $quids)) ? true : false;
                                                }
                                                ?>

                                                <button class="add-remove btn <?= ($selected) ? 'btn-success' : 'btn-warning'; ?>" id="cat_<?= $cat->cid ?>" data-operation="<?= ($selected) ? 'remove' : 'add'; ?>" data-quid='<?= $quiz->quid ?>' data-cid="<?= $cat->cid ?>"><?= ($selected) ? 'Remove' : 'Add'; ?></button>

                                            </td>
                                        </tr>
    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane <?= ($hide == 'manual') ? 'active' : ''; ?>" id="profile">
                            <h4>Add Question		:</h4>


                            <form id="manual-quiz">
                                <div class="form-group col-md-12">
                                    <label for="username" class="col-sm-4 control-label">Quiz Duration: 
                                        <p>Please specify quiz duration(in minutes)</p>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="quid" value="<?= $quiz->quid ?>"/>

                                        <input type="text" name="cat_duration" value="<?= $quiz->duration ?>" class="form-control" id='quiz_duration'/>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" name="submit"  value="save" class='btn btn-primary'/>
                                    </div>
                                </div>

                            </form>

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
                                    $q_type = [1 => 'Single Answer', 2 => 'Multiple Answer', 3 => 'Passage', 4 => 'Assay'];
                                    foreach ($data['questions'] as $ques):
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= substr(strip_tags($ques['question']), 0, 20) ?>...</td>
                                            <td><?= $ques['category_name'] ?></td>
                                            <td><?= $q_type[$ques['q_type']] ?></td>
                                            <td><?= $ques['level_name'] ?></td>
                                            <td>
                                                <?php
                                                if ($hide == 'manual') {
                                                    $selected = (in_array($ques['qid'], $quids)) ? true : false;
                                                    ?>
                                                    <span class="btn <?= ($selected) ? 'btn-success' : 'btn-warning'; ?>" id="ques_<?= $ques['qid'] ?>" onclick="<?= ($selected) ? 'remove' : 'add'; ?>QuesSingle(<?= $ques['qid'] ?>, this.id,<?= $quiz->quid ?>)"><?= ($selected) ? 'Remove' : 'Add'; ?></span>
                                                <?php } else { ?>
                                                    <span class="btn btn-warning" id="ques_<?= $ques['qid'] ?>" onclick="addQuesSingle(<?= $ques['qid'] ?>, this.id,<?= $quiz->quid ?>)">Add</span>
                                        <?php } ?>
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

                </div>
            </div>

        </div>
    <?php } else { ?>
        <h1>Save your quiz for adding question.</h1>
<?php } ?>
</div>
<div class="clearfix"></div>		
