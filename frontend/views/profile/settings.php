<?php

use	yii\helpers\Html;
use	yii\bootstrap\ActiveForm;
?>
<div class="col-lg-9 col-sm-6 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
								<h1>Settings <small></small></h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>

		<div class="">
				<p>Personal Information</p>
				<form role="form" action="my-settings" id="my-info" method="post" enctype="multipart/form-data">
						<input type="hidden" name="request" value="step-1"/>
						<input type="hidden" name="old_pic" value="<?= $user['profile_pic']?>"/>
								
        <div class="col-md-12">
										<div class="col-md-3">
																				<div class="image-uploader" data-base-height="150" data-base-width="150">
																						<div class="image">
																								<label>Click me</label>
																							<img src="<?=	BASE_USR_IMG_URL;	?><?= $user['profile_pic']?>" class="ui-draggable" style="width: 100%;position: relative;">
																						</div>
																						<input id="uploader" name="file" type="file" />
																						<div class="zoom" style="display:none;">
																								<div class="plus"></div>
																								<div class="minus"></div>
																								<div class="close"></div>
																						</div>
																				</div>
												<p class='upload_info'>Click or drag a file to change your image</p>
										</div>
										<div class="col-md-8 pull-right">
												<div class="form-group col-md-12">
														<label>First name</label>
														<input type="text" class="form-control" name="first_name" value="<?= $user['first_name']?>" placeholder="First Name" />
            </div>
            <div class="form-group col-md-12">
														<label>Last name</label>
														<input type="text" class="form-control" name="last_name" value="<?= $user['last_name']?>" placeholder="Last Name" />
            </div>
            <div class="form-group col-md-12">
														<label>Father's name</label>
														<input type="text" class="form-control" name="fathers_name" value="<?= $user['fathers_name']?>" placeholder="Father's Name" />
            </div>
												<div class="form-group col-md-12">
																<div data-toggle="buttons">
																		<label class="btn btn-default btn-circle btn-lg <?= ($user['gender'] == 'female') ? 'active':'';?>"><input type="radio" name="q1" value="female" <?= ($user['gender'] == 'female') ? 'checked':'';?>><i class="fa fa-female" aria-hidden="true"></i></label>
																		<label class="btn btn-default btn-circle btn-lg <?= ($user['gender'] == 'male') ? 'active':'';?>">       <input type="radio" name="q1" value="male" <?= ($user['gender'] == 'male') ? 'checked':'';?>><i class="fa fa-male" aria-hidden="true"></i></label>
																</div>
														<button type="submit" class="btn btn-primary pull-right hide" id='pers-info'>Update</button>
												</div>
										</div>
        </div>
				</form>
				<p>Change Password</p>
				<form role="form" action="my-settings" id="my-info-password" method="post" enctype="multipart/form-data">
						<input type="hidden" name="request" value="step-2"/>
						<div class="col-md-12">
										<div class="form-group col-md-4 row">
												<label>Old Password</label>		
												<input type="password" class="form-control" name="old_password" placeholder="Current Password" />
										</div>
										<div class="form-group col-md-4 ">
												<label>New Password</label>
												<input type="password" class="form-control" name="password" placeholder="Password" />
										</div>
								
										<div class="form-group col-md-4 row">
												<label>Confirm Password</label>	
												<input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" />
										</div>
								<button type="submit" class="btn btn-primary pull-left hide" id='pass-info'>Update</button>
      </div>
				</form>	
				<?php /*
				<p>Social Links</p>
				<form role="form" action="my-settings" id="my-info-social" method="post" enctype="multipart/form-data">
						<div class="col-md-12">
										<div class="form-group col-md-4 row">
												<label>Twitter</label>		
												<input type="text" class="form-control" name="old_password" placeholder="" />
										</div>
										<div class="form-group col-md-4 ">
												<label>Google Plus</label>
												<input type="text" class="form-control" name="password" placeholder="" />
										</div>
								
										<div class="form-group col-md-4 row">
												<label>Facebook</label>	
												<input type="text" class="form-control" name="cpassword" placeholder="" />
										</div>
								<button class="btn btn-primary pull-left hide" id='info-social'>Update</button>
      </div>
				</form>					
				 * 
				 */?>				
		</div>
</div>