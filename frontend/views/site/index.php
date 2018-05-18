<?php
/* @var $this yii\web\View */

$this->title = 'Login';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-6 login-content">
        <h2>This is heading</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <div class="col-md-5 col-md-offset-1 login-form ">
        <div id="loginbox" style="margin-top:50px;">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><?= Html::a('Forgot Password', ['site/request-password-reset']) ?></div>
                </div>     

                <div class="panel-body" >
                    <form id="loginform" class="form-horizontal" role="form" action="login" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="user_email" value="" placeholder="username or email">                                        
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                        </div>

                        <!--	<div class="input-group">
                                                <div class="checkbox">
                                                                <label>
                                                                                <input id="login-remember" type="checkbox" name="rememberMe" value="1"> Remember me
                                                                </label>
                                                </div>
                                </div>-->


                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <button type="submit" class="btn btn-default">Login  </button>
                                <?php if (!empty($msg)) { ?><label class="label" style="color: red"><?= $msg ?></label><?php } ?>
                                <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account! 
                                    <a href="#" onClick="$('#loginbox').hide();
                                            $('#signupbox').show()">
                                        <button id="btn-signup" type="button" class="btn btn-info"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp Sign Up for Free</button>
                                    </a> 
                                </div>
                            </div>
                        </div>    
                    </form>     



                </div>                     
            </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide();
                            $('#loginbox').show()">Sign In</a></div>
                </div>  
                <div class="panel-body" >
                    <form id="signupform" method="post" class="form-horizontal" action="register" role="form">

                        <!--                        <div id="signupalert" style="display:none" class="alert alert-danger">
                                                    <p>Error:</p>
                                                    <span></span>
                                                </div>-->
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="cpassword" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icode" class="col-md-3 control-label">Group</label>
                            <div class="col-md-9">
                                <select name="group" id="c_group" class="form-control">
                                    <option>Please Select a Group</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Button -->                                        
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="button" class="btn btn-info"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp Sign Up</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>




        </div>
    </div>
</div>


