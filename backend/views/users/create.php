<?php $desabled = '';?>
<div class="col-lg-12 col-sm-12 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1><?= ($user->first_name)? 'Update User': 'Create User'?></h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>
		<div class="row">
				<form class="form-horizontal" action="" id="user-form" method="post">
						<?php if($user->id > 0){ $desabled = 'disabled';?>
						<input type="hidden" name="id" value="<?= $user->id?>"/>
						<?php }?>
							<div class="col-md-12">
								<div class="form-group col-md-6">
										<label class="col-sm-4 control-label">First Name</label>
										<div class="col-sm-8">
												<input type="text" class="form-control" name="first_name" value="<?= $user->first_name?>" id="" placeholder="First Name">
										</div>
								</div>
									<div class="form-group col-md-6">
										<label for="inputPassword" class="col-sm-4 control-label">Last Name</label>
										<div class="col-sm-8">
												<input type="text" class="form-control" name="last_name" value="<?= $user->last_name?>" id="" placeholder="Last Name">
										</div>
								</div>
						</div>		
						<div class="col-md-12">
								<div class="form-group col-md-6">
										<label class="col-sm-4 control-label">User Type</label>
										<div class="col-sm-8">
														<select class="selectpicker form-control" name="role_id">
																
																<option value="1">Admin</option>
																<option value="2">Teacher</option>
																<option value="3" selected>Student</option>
														</select>
											</div>
								</div>
								<div class="form-group col-md-6">
										<label for="inputPassword" class="col-sm-4 control-label">Status</label>
										<div class="col-sm-8">
												<div id="radioBtn" class="btn-group">
														<a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="active">Active</a>
														<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="inactive">Inactive</a>
														<input type="hidden" name="status" id="happy" value="active">
												</div>
										</div>
								</div>
						</div>		

						<div class="col-md-12">
								<div class="form-group col-md-6">
										<label class="col-sm-4 control-label">Email</label>
										<div class="col-sm-8">
												<input type="text" class="form-control" value="<?= $user->email?>" name="email" id="" placeholder="Email" <?= $desabled;?>>
										</div>
								</div>
									<div class="form-group col-md-6">
										<label for="inputPassword" class="col-sm-4 control-label">Membership</label>
										<div class="col-sm-8">
												<div id="membership" class="btn-group">
														<a class="btn btn-primary btn-sm active" data-toggle="member" data-title="free">Free</a>
														<a class="btn btn-primary btn-sm notActive" data-toggle="member" data-title="paid">Paid</a>
														<input type="hidden" name="membership" id="member" value="free">
												</div>
										</div>
								</div>
						</div>
						<div class="col-md-12">
								<div class="form-group col-md-6">
										<label for="inputPassword" class="col-sm-4 control-label">Password</label>
										<div class="col-sm-8">
												<input type="password" class="form-control" name="password" id="" placeholder="Password">
										</div>
								</div>
								<div class="form-group col-md-6">
										<label for="inputPassword" class="col-sm-4 control-label">Group</label>
										<div class="col-sm-8">
												<select class="form-control" name="group_id">
														<option value="">Please select user group</option>
														<?php foreach	($group as $gp): ?>
														<?php $selected = ($user->group_id == $gp->gid) ? 'Selected': '';?>
														<option value="<?= $gp->gid?>" <?= $selected?>><?= $gp->group_name?></option>
														<?php endforeach;?>
												</select>
										</div>
								</div>
						</div>
						<div class="col-md-12">
						<div class="form-group col-md-6">
										<label for="inputPassword" class="col-sm-4 control-label">Confirm Password</label>
										<div class="col-sm-8">
												<input type="password" class="form-control" name="cpassword" id="" placeholder="Password">
										</div>
								</div>
						</div>
						<div class="col-md-5 col-md-offset-5">
								<input type="submit" class="btn btn-primary" value="Create"/>
						</div>
				</form>
				<div class="clearfix"></div>
		</div>
</div>
