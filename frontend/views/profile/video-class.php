<div class="col-lg-9 col-sm-6 content">
						<div class="row">
								<div class="filter col-md-12">
										<div class="page-header">
												<h1>Video Classes <small>Total : 200 Classes available</small></h1>
												<div class="clearfix"></div>
										</div>
								</div>
								<div class="main-content col-md-12">
										<div class="row">
												<?php	for	($i	=	1;	$i	<	10;	$i++)	{	?>
												<div class="col-md-4 video-img-box">
														<a href="#" class="open-video" data-video="aa.mp4">
														<img class="video-class-img" src="<?= BASE_IMG_URL;?>video-class.jpg" alt="class-title"/>
														<span><i class="fa fa-play-circle" aria-hidden="true"></i></span>
														<p>Video Class title...</p>
														</a>
														<div class="clearfix"></div>
												</div>
												<?php	}	?>

								</div>
						</div>
				</div>

		</div><!-- end of .content -->
		
		<!-- Video Modal -->
<div class="modal fade video-popup" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Video Title</h4>
      </div>
      <div class="modal-body">
        <span id="new-video" style="display: none"></span>
								<div class="embed-responsive embed-responsive-16by9"> <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen=""></iframe> </div>
      </div>
    </div>
  </div>
</div>