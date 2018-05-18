<?php use yii\helpers\Url; 
$this->title = 'All Users';
?>
<?php if(!empty($msg)){?>
<div class="alert alert-success alert-dismissible custom-alert" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?= $msg;?>
</div>
<?php }?>

		<div class="col-md-12 content">
			<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
							 <h1><?=	$this->title	?> <small> Total <?= count($users)?> item found</small>
									<a href="<?= BASE_URL;?>users/create" class="btn btn-primary finish">Add new</a>
								</h1>
								<div class="clearfix"></div>
						</div>
				</div>
		</div>
		<div class="row">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

								<thead>

								<th>Sr.</th>
								<th>Name</th>
								<th>Email(Username)</th>
								<th>Group</th>
								<th>Profile Status</th>
								<th>User Status</th>
								<th>Actions</th>
								</thead>
								<tbody>
										<?php $i = 1; foreach($users as $user):?>
										<tr>
												<td><?= $i?></td>
												<td><?= $user['first_name'].' '.$user['last_name'];?><span class="label pull-right <?= ($user['membership'] == 'paid') ? 'label-success' : 'label-warning'?>"><?= $user['membership']?></span></td>
												<td><?= $user['email']?> (<?= $user['username']?>)</td>
												<td><?= $user['group_name']?></td>
												<td><span class="label pull-left <?= ($user['profile_status'] == 'active') ? 'label-success' : 'label-danger'?>"><?= $user['profile_status']?></span>	</td>
												<td><span class="label pull-left <?= ($user['status'] == 'active') ? 'label-success' : 'label-danger'?>"><?= $user['status']?></span>	</td>
												<td>	
															<p data-placement="top" class="action-btn" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs" href="<?= BASE_URL?>users/create/<?= $user['id']?>"><span class="glyphicon glyphicon-pencil"></span></a></p>
															<p data-placement="top" class="action-btn" data-toggle="tooltip" title="Delete"><a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure wants to delete?')" href="<?= BASE_URL?>users/delete/<?= $user['id']?>"><span class="glyphicon glyphicon-trash"></span></a></p>
													
														</td>		
										</tr>
										<?php 
										$i++;
										endforeach;?>
								</tbody>

						</table>
		</div>
						<div class="clearfix"></div>
		</div>
