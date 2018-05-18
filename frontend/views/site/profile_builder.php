		<div class="row">
		<h2 class="profile-buid-heading">Complete your profile to continue</h2>
		<section>
				<div class="wizard">
						<div class="wizard-inner">
								<div class="connecting-line"></div>
								<ul class="nav nav-tabs" role="tablist">

										<li role="presentation" class="active">
												<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
														<span class="round-tab">
																<i class="glyphicon glyphicon-folder-open"></i>
														</span>
												</a>
										</li>

										<li role="presentation" class="disabled">
												<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
														<span class="round-tab">
																<i class="glyphicon glyphicon-pencil"></i>
														</span>
												</a>
										</li>
										<li role="presentation" class="disabled">
												<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
														<span class="round-tab">
																<i class="glyphicon glyphicon-picture"></i>
														</span>
												</a>
										</li>

										<li role="presentation" class="disabled">
												<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
														<span class="round-tab">
																<i class="glyphicon glyphicon-ok"></i>
														</span>
												</a>
										</li>
								</ul>
						</div>

					
								<div class="tab-content">
										<div class="tab-pane active" role="tabpanel" id="step1">
												<div class="step1">
														<div class="col-md-6 col-lg-offset-3">
																<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
																		aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
																		Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
																		occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>-->
																	<form role="form" id="profile-form" method="post" enctype="multipart/form-data">
																			<input type="hidden" name="request" value="step-1"/>
																			<div class="form-group col-md-12">
																		<label for="username" class="col-sm-4 control-label">Choose your username</label>
																		<div class="col-md-8">
																				<input type="text" name="username" class="form-control" id="username" value="" placeholder="Username"/>
																				<div class="user-err"></div>
																		</div>
																</div>
																<div class="form-group col-md-12 pwd-tool-tip">
																		<label for="password" class="col-sm-4 control-label">New Password</label>
																		<div class="col-md-8">
																				<input type="password" name="password" data-toggle="tooltip" title="Minimum 8 characters at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character"  class="form-control" id="password" value="" placeholder="Password"/>
																		</div>
																</div>
																<div class="form-group col-md-12">
																		<label for="cpassword" class="col-sm-4 control-label">Conform Password</label>
																		<div class="col-md-8">
																				<input type="password" name="cpassword" class="form-control" id="cpassword" value="" placeholder="Confirm Password"/>		
																		</div>
																</div>
																
																<ul class="list-inline pull-right">
																		<li><button type="submit" class="btn btn-primary" data-form="profile-form">continue</button></li>
																			
																</ul>
																</form>
														</div>



												</div>

										</div>
										<div class="tab-pane" role="tabpanel" id="step2">
												<div class="step2">
														<div class="row">
																<div class="col-md-8 col-lg-offset-2 lebel-left">
																			<form role="form" id="profile-form-personal" method="post" enctype="multipart/form-data">
																		<input type="hidden" name="request" value="step-2"/>
																					<div class="col-md-3">
																				<div class="image-uploader" data-base-height="250" data-base-width="230">
																						<div class="image">
																								<label>Click or drag a file to change your image</label>
																								<img />
																						</div>
																						<input id="uploader" name="file" type="file" />
																						<div class="zoom" style="display:none;">
																								<div class="plus"></div>
																								<div class="minus"></div>
																								<div class="close"></div>
																						</div>
																				</div>
																		</div>
																		<div class="col-md-9">
																				<div class="form-group col-md-12">
																						<label for="first-name" class="col-sm-4 control-label">First Name</label>
																						<div class="col-md-8">
																								<input type="text" name="first_name" class="form-control" id="first-name" value="" placeholder="First Name"/>
																						</div>
																				</div>
																				<div class="form-group col-md-12">
																						<label for="last-name" class="col-sm-4 control-label">Last Name</label>
																						<div class="col-md-8">
																								<input type="text" name="last_name" class="form-control" id="last-name" value="" placeholder="Last Name"/>
																						</div>
																				</div>
																				<div class="form-group col-md-12">
																						<label for="cpassword" class="col-sm-4 control-label">Gender</label>
																						<div class="col-md-8">
																								<div data-toggle="buttons">
																										<label class="btn btn-default btn-circle btn-lg active"><input type="radio" name="q1" value="female" checked><i class="fa fa-female" aria-hidden="true"></i></label>
																										<label class="btn btn-default btn-circle btn-lg">       <input type="radio" name="q1" value="male"><i class="fa fa-male" aria-hidden="true"></i></label>
																								</div>
																						</div>
																				</div>
																				<div class="form-group col-md-12">
																						<label for="father-name" class="col-sm-4 control-label">Father's Name</label>
																						<div class="col-md-8">
																								<input type="text" name="father_name" class="form-control" id="father-name" value="" placeholder="Father's Name"/>
																						</div>
																				</div>
																					<div class="form-group col-md-12">
																						<label for="referrer" class="col-sm-4 control-label">Referrer</label>
																						<div class="col-md-8">
																								<input type="text" name="referrer" class="form-control" id="referrer" value="" placeholder="Referrer"/>
																						</div>
																				</div>
																				
																		</div>
																					
																				<ul class="list-inline pull-right">
														<li><button type="submit" class="btn btn-primary" data-form="profile-form-personal">continue</button></li>
												</ul>
																			</form>
																</div>
														</div>
												</div>
												
										</div>
										<div class="tab-pane" role="tabpanel" id="step3">
												<div class="col-md-8 col-lg-offset-2 lebel-left">
														<h5 class='text-center'><strong>Academic Detail</strong></h5>
														<hr>
															<form role="form" action="complete-profile" id="profile-form-academic" method="post" enctype="multipart/form-data">
														<input type="hidden" name="request" value="step-3"/>
																	<div class="row mar_ned">

														</div>
														<div class="row mar_ned">
																<div class="">
																	<label for="highest_qualification" class="col-sm-4 control-label">Highest Education</label>
																</div>
																<div class="col-md-8 col-xs-9">
																		<select name="highest_qualification" id="highest_qualification" class="dropselectsec">
																				<option value=""> Select Highest Education</option>
																				<option value="1">Ph.D</option>
																				<option value="2">Masters Degree</option>
																				<option value="3">PG Diploma</option>
																				<option value="4">Bachelors Degree</option>
																				<option value="5">Diploma</option>
																				<option value="6">Intermediate / (10+2)</option>
																				<option value="7">Secondary</option>
																				<option value="8">Others</option>
																		</select>
																</div>
														</div>
														<div class="row mar_ned">
																<div class="">
																<label for="specialization" class="col-sm-4 control-label">Specialization</label>
																</div>
																<div class="col-md-8 col-xs-9">
																		<input type="text" name="specialization" id="specialization" placeholder="Specialization" class="dropselectsec" autocomplete="off">
																</div>
														</div>
														<div class="row mar_ned">
																<div class="">
																	<label for="year_of_passedout" class="col-sm-4 control-label">Year of Passed Out</label>
																</div>
																<div class="col-md-8 col-xs-9">
																		<select name="year_of_passedout" id="year_of_passedout" class="birthdrop">
																				<option value="">Year</option>
																				<?php for($i=1;$i<30;$i++){?>
																				<option value="<?= $i+1990?>"><?= $i+1990?></option>
																						<?php }?>
																		</select>
																</div>
														</div>
														
														<div class="row mar_ned">
																	<ul class="list-inline pull-right">
														<li><button type="submit" class="btn btn-primary btn-info-full" data-form="profile-form-academic">continue</button></li>
												</ul>
														</div>
															</form>
												</div>
												
											
										</div>
										<div class="tab-pane" role="tabpanel" id="complete">
												<div class="step44">
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
																		aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
																		Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
																		occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
															<form role="form" id="profile-form-terms" method="post" enctype="multipart/form-data">
														<input type="hidden" name="request" value="step-4"/>
														<input type="checkbox" name="terms" id="terms-check" value="1"/>
														<label>Terms & Conditions</label>
														<br />
														
															</form>
																<input type="submit" name="save" id="accepts_terms" value="save" class="btn btn-primary btn-info-full"/>
												</div>
										</div>
										
										<div class="clearfix"></div>
								</div>
						
						
						<div class="alert alert-warning" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Complete you profile carefully.</div>
				</div>
		</section>
</div>