<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$result = $data['result'];
?>
<div class="col-lg-9 col-sm-6 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1>Result Status</h1>
                <ul class="nav nav-pills">
                    <?php if ($data['result']['essay_ques'] == 1) { ?>
                        <li role="presentation" class="active"><button class="btn btn-warning">Pending</button></li>
                    <?php } else { ?>
                        <li role="presentation" class="active"><button class="btn <?= ($data['pass'] == 'Pass') ? 'success' : 'danger' ?>"><?= ($data['pass'] == 'Pass') ? 'Pass' : 'Fail' ?></button></li>
                    <?php } ?>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="main-content col-md-12">
            <div class="row">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Result status</td>
                            <td>Pass/fail</td>
                        </tr>
                        <tr>
                            <td>Quiz</td>
                            <td><?= $data['quiz']['quiz_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><?= $data['quiz']['description'] ?></td>
                        </tr>
                        <tr>
                            <td>Percentage Require to pass %</td>
                            <td><?= $data['quiz']['pass_percentage'] ?></td>
                        </tr>
                        <tr>
                            <td>You Get %</td>
                            <td><?= ($data['result']['essay_ques'] == 1) ? 'Result Pending' : $data['result']['percentage'] ?></td>
                        </tr>
                <!--	<tr>
                                        <td>Total Time Spent</td>
                                        <td><?= $data['result']['time_spent'] ?></td>
                        </tr>
                        -->
                    </tbody>
                </table>
                <div class="col-md-12 quiz-start">
                </div>
            </div>
        </div>
        <div class="col-md-12 quiz-start">
            <a href="<?= BASE_URL ?>quiz">
                <button class="btn btn-lg btn-primary">Go back</button>
            </a>
        </div>
    </div>
</div>

