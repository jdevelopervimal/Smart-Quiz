<?php
$this->title	=	Yii::t('app',	'Files');
$file_type	=	[
				1	=>	'Assignments',
				2	=>	'Video Class',
				3	=>	'PDFs',
				4	=>	'Quiz',
];
?>
<?php	if	(!empty($msg))	{	?>
		<div class="alert alert-success alert-dismissible custom-alert" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong> <?=	$msg;	?>
		</div>
<?php	}	?>	
<div class="col-lg-12 col-sm-12 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1>Create new category</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>

		<div class="row upload-file-form-1">
				<form action="<?=	BASE_URL	?>" class="form-inline" id="upload-form-1" method="post" enctype="multipart/form-data">
						<input type="hidden" name="request" value="update-category"/>
						<div class="form-group col-md-3">
								<input type="hidden" id="category_id" name="id" value="0"/>
								<input type="text" class="form-control" value="" id="category_name" name="category_name" placeholder="Category Name">
						</div>
						<div class="col-md-3 upld-btn"><button type="submit" id="upd-btn" class="btn btn-primary">Save</button></div>
				</form>
		</div>
		<div class="row">
				<table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
								<tr>
										<th style="width: 100px;">Sr</th>
										<th>Name</th>
										<th style="width: 100px;">Action</th>
								</tr>
						</thead>
						<tbody>
								<?php	$sr	=	1;
								foreach	($data['fileCategory']	as	$category):	?>
										<tr>
												<td><?=	$sr++;	?></td>
												<td><?=	$category->name;	?></td>
												<td>
														<a title="Update" class="update-file-cat" data-toggle="tooltip" data-id="<?=	$category->id;	?>" data-name="<?=	$category->name;	?>"><span class="glyphicon glyphicon-pencil"></span></a>
														<a title="Delete" class="delete-file-cat" data-toggle="tooltip" data-id="<?=	$category->id;	?>"><span class="glyphicon glyphicon-trash"></span></a>
												</td>
										</tr>
<?php	endforeach;	?>
						</tbody>
    </table>
		</div>
		<div class="clearfix"></div>
</div>
<div class="col-lg-12 col-sm-12 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1><?=	$this->title	?> <small> Total  item found</small>
										<a href="javascript:void(0);" class="btn btn-primary finish">Add new</a>
								</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>
		<div class="row upload-file-form">
				<div class="col-md-12">
				<form action="<?=	BASE_URL	?>" class="form-inline" id="upload-form-2" method="post" enctype="multipart/form-data">
						<input type="hidden" name="request" value="update-file"/>
						<div class="form-group col-md-3">
								<label for="exampleInputName2">Type</label>
								<select class="form-control" name="file_type">
										<option value=""> Please select One</option>
										<?php	foreach	($file_type	as	$key	=>	$val):	?>
												<option value="<?=	$key	?>"><?=	$val	?></option>
										<?php	endforeach;	?>
								</select>
						</div>
						<div class="form-group col-md-3">
								<label for="exampleInputName2">Subjects</label>
								<select class="form-control" name="subject_id">
										<option value=""> Please select One</option>
										<?php	foreach	($data['fileCategory']	as	$category):	?>
												<option value="<?=	$category->id	?>"><?=	$category->name	?></option>
											<?php	endforeach;	?>
								</select>
						</div>
						<div class="form-group col-md-3">
								<label for="exampleInputEmail2">Topic</label>
								<input type="text" name="topic_name" class="form-control" id="exampleInputEmail2" placeholder="Topic">
						</div>
						<div class="form-group col-md-3">
								<label for="exampleInputEmail2">Topic</label>
								<input type="file" class="form-control" id="userFile" name="file_name" placeholder="file">
									<div class="clearfix"></div>
						</div>
						<div class="form-group col-md-3 height-normal">
										<label for="inputPassword">Group</label>
													<select id="ddlCars" name="group[]" class="form-control" multiple="multiple">
											<?php foreach	($data['group'] as $group): ?>
												<option value="<?= $group->gid?>"><?= $group->group_name?></option>
											<?php endforeach;?>
										</select>
								</div>
						
						<div class="form-group col-sm-9">
						<button type="submit" class="btn btn-primary">Upload</button>			
						<p class="pull-right">Note: Supported file types are pdf, doc, docx, png, jpg, jpeg.</p>
						</div>
				</form>
				</div>
				<div class="clearfix"></div>
				<div id="progress-div"><div id="progress-bar" style="display: none"></div></div>
		</div>
		
		<div class="row">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
								<tr>
										<th>Sr</th>
										<th>Topic</th>
										<th>File Type</th>
										<th>Subjects</th>
										<th>Group</th>
										<th>Delete</th>
								</tr>
						</thead>
						<tbody>
								<?php
								$i	=	1;
								foreach	($data['files']	as	$file):
										?>
										<tr>
												<td><?=	$i	?></td>
												<td><?=	$file->topic_name	?></td>
												<td><?=	$file_type[$file->file_category]	?></td>
														<td><?=	$file->subject_id	//$data['fileCategory']?></td>
												<td><a href="<?=	BASE_PATH.'files/'.$file->file_path	?>" target="blank"><button class="btn btn-primary">Download</button></a></td>
												<td>
																<a href="javascript:void(0);" class="delete-file" data-filename="<?= $file->file_path?>" data-id="<?=	$file->id	?>" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a>
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

<pre><?php //print_r($data['fileCategory']);?></pre>
