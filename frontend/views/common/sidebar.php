<?php
$session = new \yii\web\Session();
$session->open();
$name = $session->get('name');
$email = $session->get('email');
$group = $session->get('group');
$profile = $session->get('profile_pic');
?>
<div class="col-lg-3 col-sm-6 leftsidebar">

    <div class="card hovercard">
        <div class="cardheader" style="background:url(<?= BASE_IMG_URL; ?>banner.jpg)">

        </div>
        <div class="avatar">
        <?php if(!empty($profile)){?>    
            <a href="<?= BASE_URL ?>profile"><img alt="" src="<?= BASE_USR_IMG_URL; ?><?= $profile ?>"></a>
        <?php }else{?>
            <a href="<?= BASE_URL ?>profile"><img alt="" src="<?= BASE_USR_IMG_URL; ?>default-avatar.png"></a>
        <?php }?>
        </div>
        <div class="info">
            <div class="title">
                <a target="_blank" href=""><?= $name ?></a>
            </div>
            <div class="desc"><?= $email ?></div>
            <!--<div class="desc">Curious developer</div>-->
            <div class="desc"><?= $group ?></div>
        </div>
        <div class="bottom">
            <a class="btn btn-primary btn-twitter btn-sm" href="">
                <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-danger btn-sm" rel="publisher"
               href="">
                <i class="fa fa-google-plus"></i>
            </a>
            <a class="btn btn-primary btn-sm" rel="publisher"
               href="">
                <i class="fa fa-facebook"></i>
            </a>
            <a class="btn btn-warning btn-sm" rel="publisher" href="">
                <i class="fa fa-behance"></i>
            </a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <!--<a class="navbar-brand" href="#">Brand</a>-->
        </div>
        <div class="collapse navbar-collapse sidebar" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?= BASE_URL . 'profile' ?>"><span><i class="fa fa-user" aria-hidden="true"></i></span>Home</a></li>
                <li><a href="<?= BASE_URL . 'quiz' ?>"><span><i class="fa fa-question-circle" aria-hidden="true"></i></span>Quiz</a></li>
                <li><a href="<?= BASE_URL . 'assignments' ?>"><span><i class="fa fa-file-text-o" aria-hidden="true"></i></span>Assignments</a></li>
                <!--<li><a href="<?= BASE_URL . 'video-classes' ?>"><span><i class="fa fa-film" aria-hidden="true"></i></span>Video Classes</a></li>-->
                <li><a href="<?= BASE_URL . 'study-material' ?>"><span><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>Study Material</a></li>
                <li><a href="<?= BASE_URL . 'all-results' ?>"><span><i class="fa fa-bar-chart" aria-hidden="true"></i></span>My Results</a></li>
                <!--<li><a href="<?= BASE_URL . 'inbox' ?>"><span><i class="fa fa-envelope" aria-hidden="true"></i></span>Inbox</a></li>-->
                <li><a href="<?= BASE_URL . 'settings' ?>"><span><i class="fa fa-cog" aria-hidden="true"></i></span>Profile Settings</a></li>
            </ul>
        </div>
    </div>

</div>