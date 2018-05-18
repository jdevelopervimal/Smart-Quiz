<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
			<!--<link href="/testyii2.0/frontend/web/css/jquery.countdownTimer.css" rel="stylesheet">toastr.min-->
<link href="<?= BASE_URL?>frontend/web/css/toastr.css" rel="stylesheet">
<link href="<?= BASE_URL?>frontend/web/css/jquery.countdown.css" rel="stylesheet">
			<link href="<?= BASE_URL?>frontend/web/css/CalcSS3.css" rel="stylesheet">
						<?php $this->head() ?>
				<script>
				var JS_BASE_URL = '<?=	BASE_URL;?>';
				</script>
</head>
<body class="quiz-access">
<?php $this->beginBody() ?>

<div class="wrap">
<div class="progress-custom hide-custom"></div>
		<nav class="navbar navbar-default site-navbar">
  <div class="container-fluid container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" id="quiz-name" href="#"><h2>Test Yii 2.0</h2></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse quiz-menu" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
								<li id="quiz-section">Default</li>
								<li><div id="countdowntimer"><!--<i class="fa fa-clock-o" aria-hidden="true"></i>--><span id="future_date"><span></div></li>
								<li id="visible-calc"><i class="fa fa-calculator" aria-hidden="true"></i></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
        <?= $content ?>
    </div>
</div>
		
<div class="calc-main calc-large col-md-5">
		<div class="calc-display">
			<span>0</span>
			<div class="calc-rad">Rad</div>
			<div class="calc-hold"></div>
			<div class="calc-buttons">
				<div class="calc-info">?</div>
				<div class="calc-smaller">&gt;</div>
				<div class="calc-ln">.</div>
			</div>
		</div>
		<div class="calc-left">
			<div><div>2nd</div></div>
			<div><div>(</div></div>
			<div><div>)</div></div>
			<div><div>%</div></div>
			<div><div>1/x</div></div>
			<div><div>x<sup>2</sup></div></div>
			<div><div>x<sup>3</sup></div></div>
			<div><div>y<sup>x</sup></div></div>
			<div><div>x!</div></div>
			<div><div>&radic;</div></div>
			<div><div class="calc-radxy">
				<sup>x</sup><em>&radic;</em><span>y</span>
			</div></div>
			<div><div>log</div></div>
			<div><div>sin</div></div>
			<div><div>cos</div></div>
			<div><div>tan</div></div>
			<div><div>ln</div></div>
			<div><div>sinh</div></div>
			<div><div>cosh</div></div>
			<div><div>tanh</div></div>
			<div><div>e<sup>x</sup></div></div>
			<div><div>Deg</div></div>
			<div><div>&pi;</div></div>
			<div><div>EE</div></div>
			<div><div>Rand</div></div>
		</div>
		<div class="calc-right">
			<div><div>mc</div></div>
			<div><div>m+</div></div>
			<div><div>m-</div></div>
			<div><div>mr</div></div>
			<div class="calc-brown"><div >AC</div></div>
			<div class="calc-brown"><div>+/&#8211;</div></div>
			<div class="calc-brown calc-f19"><div>&divide;</div></div>
			<div class="calc-brown calc-f21"><div>&times;</div></div>
			<div class="calc-black"><div>7</div></div>
			<div class="calc-black"><div>8</div></div>
			<div class="calc-black"><div>9</div></div>
			<div class="calc-brown calc-f18"><div>&#8211;</div></div>
			<div class="calc-black"><div>4</div></div>
			<div class="calc-black"><div >5</div></div>
			<div class="calc-black"><div>6</div></div>
			<div class="calc-brown calc-f18"><div>+</div></div>
			<div class="calc-black"><div>1</div></div>
			<div class="calc-black"><div>2</div></div>
			<div class="calc-black"><div>3</div></div>
			<div class="calc-blank"><textarea></textarea></div>
			<div class="calc-orange calc-eq calc-f17"><div>
				<div class="calc-down">=</div>
			</div></div>
			<div class="calc-black calc-zero"><div>
				<span>0</span>
			</div></div>
			<div class="calc-black calc-f21"><div>.</div></div>
		</div>
	</div>

<footer class="footer">
    <div class="container">
						<p class="pull-left">
								<button class="btn btn-primary"  id="prev-btn"><i class="fa fa-caret-left" aria-hidden="true"></i> Previous</button>
								<?php /*<button class="btn btn-primary" id="save-btn"><i class="fa fa-spinner" aria-hidden="true"></i> Save</button> */?>
								
								<button class="btn btn-primary" data-current="1" data-child="0" id="next-btn" data-category="0">Save & Next <i class="fa fa-caret-right" aria-hidden="true"></i></button>
									<button class="btn btn-warning" id="skip-btn">skip <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
						</p>
								
        <p class="pull-right">
										
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#answer-sheet">Answer Sheet</button>
										<button id="exit-quiz" class="btn btn-danger">Exit</button></p>
    </div>
</footer>

<?php $this->endBody() ?>
		<script src="<?= BASE_URL?>frontend/web/js/jquery.plugin.min.js"></script>
	<script src="<?= BASE_URL?>frontend/web/js/toastr.min.js"></script>
		<script src="<?= BASE_URL?>frontend/web/js/jquery.countdown.min.js"></script>
		<script src="<?= BASE_URL?>frontend/web/js/CalcSS3.js"></script>
<script src="<?= BASE_URL?>frontend/web/js/quiz.1.js"></script>
</body>
</html>
<?php $this->endPage() ?>
