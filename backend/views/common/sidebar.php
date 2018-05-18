<?php

use yii\helpers\Url; ?>

<div id="sidebar-wrapper">
    <ul id="sidebar_menu" class="sidebar-nav">
        <li class="sidebar-brand"><a id="menu-toggle" href="#">Administrator<!--<span id="main_icon" class="glyphicon glyphicon-align-justify"></span>--></a></li>
    </ul>
    <div class=" navbar-collapse collapse sidebar-navbar-collapse">
        <ul class="sidebar-nav nav navbar-nav" id="sidenav01">
            <li>
                <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
                    <span class="glyphicon glyphicon-user first"></span> Users<span class="glyphicon glyphicon-menu-down side-menu-icon"></span>
                    <span class="glyphicon glyphicon-user side-menu-icon-hide" data-toggle="tooltip" data-placement="right" title="Users"></span>
                </a>
                <div class="collapse" id="toggleDemo" style="height:0px;">
                    <ul class="nav nav-list">
                        <li><a href="<?= BASE_URL . 'users/index' ?>">User List</a></li>
                        <!--<li><a href="<?= BASE_URL . 'role/index' ?>">User Role</a></li>-->
                        <li><a href="<?= BASE_URL . 'user-group' ?>">User Group</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
                    <span class="glyphicon glyphicon-folder-open first"></span>Quiz<span class="glyphicon glyphicon-menu-down side-menu-icon"></span>
                    <span class="glyphicon glyphicon-folder-open side-menu-icon-hide"></span></a>
                <div class="collapse" id="toggleDemo2" style="height:0px;">
                    <ul class="nav nav-list">
                        <li><a href="<?= BASE_URL . 'quiz/index' ?>">All Quiz</a></li>
                        <li><a href="<?= BASE_URL . 'question-category/index' ?>">Sections</a></li>
                        <li><a href="<?= BASE_URL . 'question/index' ?>">Question Bank</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="<?= BASE_URL . 'users/results' ?>"><span class="glyphicon glyphicon-stats first"></span>Results<span class="glyphicon glyphicon-stats side-menu-icon-hide"></span></a></li>
            
            <li><a href="<?= BASE_URL . 'upload/index' ?>"><span class="glyphicon glyphicon-cloud-upload first"></span> All Uploads<span class="glyphicon glyphicon-cloud-upload side-menu-icon-hide"></span></a></li>
            <!--
            <li><a href="#"><span class="glyphicon glyphicon-calendar first"></span> Calender<span class="glyphicon glyphicon-calendar side-menu-icon-hide"></span></a></li>
            <li><a href="<?= BASE_URL . 'users/inbox' ?>"><span class="glyphicon glyphicon-envelope first"></span> Inbox <span class="badge pull-right side-menu-icon">42</span><span class="glyphicon glyphicon-envelope side-menu-icon-hide"></span></a></li>
            <li><a href="<?= BASE_URL . 'institute/index' ?>"><span class="glyphicon glyphicon-education first"></span> Institute<span class="glyphicon glyphicon-education side-menu-icon-hide"></span></a></li>
            -->
            <li><a href="<?= BASE_URL . 'transaction/index' ?>"><span class="glyphicon glyphicon-usd first"></span> Transaction<span class="glyphicon glyphicon-education side-menu-icon-hide"></span></a></li>
            
            <li><a href="<?= BASE_URL . 'user/settings' ?>"><span class="glyphicon glyphicon-cog first"></span> Settings<span class="glyphicon glyphicon-cog side-menu-icon-hide"></span></a></li>

        </ul>
    </div>
</div>
