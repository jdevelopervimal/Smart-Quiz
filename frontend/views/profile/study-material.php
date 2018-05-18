<div class="col-lg-9 col-sm-6 content">
		<div class="row">
				<div class="filter col-md-12">
						<div class="page-header">
								<h1>PDFs</h1>
								<div class="clearfix"></div>
						</div>
				</div>
				<div class="main-content col-md-12">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
										<tr>
												<th>Sr</th>
												<th>Topics</th>
												<th>Subjects</th>
												<th>Download</th>
										</tr>
								</thead>
								<tbody>
										<?php foreach($files as $file):?>
										<tr>
												<td>1</td>
												<td><?= $file['topic_name']?></td>
												<td><?= $file['name']?></td>
												<td class="text-center"><a class='btn btn-info btn-xs' href="<?= SITE_URL?>uploads/files/<?= $file['file_path']?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> download</a></td>
										</tr>
										<?php endforeach;?>
								</tbody>
						</table>
				</div>
		</div>
</div>