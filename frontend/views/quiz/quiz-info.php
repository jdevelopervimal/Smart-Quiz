<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-9 col-sm-6 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1>Quiz Information</h1>
                <ul class="nav nav-pills">
                    <?php if ($access == 'yes') { ?>
                        <li role="presentation" class="active"><button class="btn btn-primary">Available</button></li>
                    <?php } else { ?>
                        <li role="presentation" class="active"><button class="btn btn-danger">Not Available</button></li>
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
                            <td>Name</td>
                            <td><?= $quiz[0]['quiz_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><?= $quiz[0]['description'] ?></td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td><?php
                    if (isset($quiz['cat_duration'])) {
                        echo 'Full length quiz ' . $quiz['cat_duration'] . ' minutes';
                    } else {
                        foreach ($quiz['category'] as $category) {
                            echo $category['category_name'] . ' (' . $category['cat_duration'] . ' Minutes), ';
                        }
                    }
                    ?></td>
                        </tr>
                        <tr>
                            <td>Total Questions</td>
                            <td><?= $quiz['ques_count'] ?></td>
                        </tr>
                        <tr>
                            <td>Marks per Question</td>
                            <td><?= $quiz[0]['correct_score'] ?> (With <?= ($quiz[0]['incorrect_score'] == 0) ? 'No' : $quiz[0]['incorrect_score'] ?> Negative marking)</td>
                        </tr>
                        <tr>
                            <td>Available Attempts</td>
                            <td><?php if (empty($quiz[1])) { ?>
                                    You have <?= $quiz[0]['max_attempts'] ?> attempts in this quiz.
                                <?php } else { ?>
                                    <strong>Total Attempts : <?= $quiz[0]['max_attempts'] ?></strong>, (Only <?= $quiz[0]['max_attempts'] - (count($quiz[1])) ?> attempts available.)
                                <?php } ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12 quiz-start">
                <?php if ($access == 'yes') { ?>
                    
                        <?php
                        $sum = 1;
                        if (isset($quiz[1][0]['res_saved_data'])) {
                            $res = $quiz[1][0]['res_saved_data'];
                            $new = explode(',', $res);
                            $sum = array_sum($new);
                        }
                        $start = ($sum > 1) ? 'Resume Test' : 'Start Now';
                        ?>
                        <a href="<?= BASE_URL ?>access-quiz/<?= $quiz[0]['quid'] ?>" onclick="return confirm('Are you sure?')">
                            <button class="btn btn-lg btn-primary"><?php echo $start; ?></button>
                        </a>
                   
                <?php }else{
                    if($quiz[0]['test_type'] == 1){ ?>
                         <a href="<?= BASE_URL ?>purchase/<?= $quiz[0]['quid'] ?>" >
                            <button class="btn btn-lg btn-primary">Buy Now</button>
                        </a>
                    <?php }
                } ?>
                     </div>
            </div>
        </div>
    </div>
</div>