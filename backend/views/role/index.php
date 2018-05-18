<?php use yii\helpers\Url; ?>

		<div class="col-md-12">
				<h4>User Role<span><a href="<?= Url::toRoute(['role/create']); ?>">Create Role</a></span></h4>
				<p>Lorem ipsun dolor sit amet amber to kin ni amet so mik cooa had tomb.</p>
				<div class="table-responsive">

						<table id="mytable" class="table table-bordred table-striped">

								<thead>

								<th><input type="checkbox" id="checkall" /></th>
								<th>ID</th>
								<th>Authority</th>
								<th>Name</th>
								<th>Description</th>
								<th>Actions</th>
								</thead>
								<tbody>
												<?php foreach($roles as $role): ?>
										<tr>
													<td><input type="checkbox" class="checkthis" /></td>
													<td><?=$role->id ?></td>
													<td><?=$role->authority ?></td>
													<td><?=$role->name ?></td>
													<td><?=$role->description ?></td>
													<td>	
															<p data-placement="top" class="action-btn" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
															<p data-placement="top" class="action-btn" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
													</td>
										</tr>
													<?php endforeach;?>
								</tbody>

						</table>

						<div class="clearfix"></div>
						<!--
						<ul class="pagination pull-right">
								<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
						</ul>
-->
				</div>

		</div>


<!-- -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
    <div class="modal-content">
						<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
						<div class="modal-body">

								<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

      </div>
						<div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
				</div>
    <!-- /.modal-content --> 
  </div>
		<!-- /.modal-dialog --> 
</div>
