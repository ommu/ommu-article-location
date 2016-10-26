<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/quWxohwWmBHkjCBoLLP19vZDw6qV8pnAIJAS7Ma_pCc.js', CClientScript::POS_END);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/Sy5Krcgs1i8v0M3MS84pTUkt1s8Cc1Nzk1JT9HIz8wA.js', CClientScript::POS_END);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/fY5REoJADEMvBKycwYMwsBSnWMjadge8PYz6oSP6mbxkkjqM1kRMCUYaWjNy263Qs_k7agbF7NXEc3EKUWnlR2y8ZdJ7ZTmRmnBPdoh5SkKl0-qlwluHFvXRsHAXOiy7YVeFiD5_vMSv9Zg7SlAfIIx_oTPmgS8fFItUsVVkI_mq-kIUAdkA.js', CClientScript::POS_END);
	
Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');
?>

<div id="first" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1456256508033 vc_row-no-padding">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner ">
			<div class="wpb_wrapper">
				<div id="hero-section-450" class="vntd-hero hero-media-images hero-effect-none arrow-navigation-side video-controls-bottom">
					<div class="hero-fullscreen">
						<div class="slides-container relative">
							<div class="superslides-slide parallax"  style="background-image: url(<?php echo Yii::app()->theme->baseUrl;?>/images/resource/1.jpg); display:block !important; opacity: 1 !important; z-index:2 !important;"></div>
							<div class="superslides-slide parallax"  style="background-image: url(<?php echo Yii::app()->theme->baseUrl;?>/images/resource/1.jpg); display:block !important; opacity: 1 !important; z-index:2 !important;"></div>
							<div class="superslides-slide parallax"  style="background-image: url(<?php echo Yii::app()->theme->baseUrl;?>/images/resource/1.jpg); display:block !important; opacity: 1 !important; z-index:2 !important;"></div>
							<?php /*
							<div class="superslides-slide parallax"  style="background-image: url(<?php echo Yii::app()->theme->baseUrl;?>/images/resource/2.jpg); display:block !important; opacity: 1 !important; z-index:2 !important;"></div>
							*/?>
						</div>
						<nav class="slides-navigation">
							<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
							<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
						</nav>
					</div>
					<!-- Home Inner Details -->
					<div class="vntd-hero-style1 home-inner " data-0="opacity:1;" data-600="opacity:0;">
						<!-- Home Text Slider -->
						<div class="home-text-slider relative">
							<!-- Home Text Slider -->
							<h1 class="white thin text-rotator">
								<!-- Home Texts -->
								<span class="rotate">
									Selamat Datang di Portal Centre Of Excellence
								</span>
								<!-- End Home Texts -->
							</h1>
							<!-- End Home Text Slider -->
							<!-- Home Fixed Text -->		
							<p class="home-fixed-text white">Centre of Excellence Layanan Perpustakaan dan Informasi Tentang Budaya Lokal</p>
						</div>
						<?php /*
						<!-- End Home Text Slider -->
						<a href="#second" class="home-button light-button thin scroll">Get Started</a>
						*/?>						
					</div>
					<!-- End Home Inner Details -->
					<!-- Home Bottom Note -->
					<div class="home-extra-note fullwidth t-center white font-primary absolute scroll-button-circle thin" data-0="opacity:1;" data-600="opacity:0;">
						<!-- Text Link -->
						<a href="#member" class="scroll">
							<!-- Bottom Text -->
							<?php /*
							<p>Where does it come from?</p>
							*/?>
							<span class="home-button dark-button t-center home-circle-button fa fa-angle-down"></span>
						</a>
						<!-- End Text Link -->
					</div>
					<!-- End Home Bottom Note -->
				</div>
			</div>
		</div>
	</div>
</div>
<div class="vc_row-full-width"></div>

<?php /*
<?php $this->widget('MainPageWelcome', array(
	'id'=>6
)); ?>
*/?>
		
<?php $this->widget('MainArticleLocation'); ?>

<?php $this->widget('MainArticle', array(
	'category'=>2,
	'limit'=>3,
)); ?>

<?php $this->widget('MainArticle', array(
	'category'=>4,
	'limit'=>3,
)); ?>

<?php $this->widget('MainArticle', array(
	'category'=>3,
	'limit'=>6,
)); ?>

<?php $this->widget('MainArticle', array(
	'category'=>1,
	'limit'=>6,
)); ?>

<?php /*
<?php 
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');?>
	
<div class="main clearfix">
	<h4 class="center">AGENDA BUDAYA</h4>
	<div class="schedule clearfix">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<span class="date">25 Oktober 2017</span>
			Ut enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor in
			<span class="place">Taman Ismail Marzuki, Jakarta</span>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<span class="date">25 Oktober 2017</span>
			Ut enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor inUt enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor in
			<span class="place">Taman Ismail Marzuki, Jakarta</span>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<span class="date">25 Oktober 2017</span>
			Ut enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor in
			<span class="place">Taman Ismail Marzuki, Jakarta</span>
		</div>
	</div>
	<div class="news-box clearfix">
		<div class="col-md-3 col-sm-6">
			<h4>BERITA</h4>
			<a href="">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
				<span><p>Ut enim ad minim veniam, quis nostrud exercitation</p></span>
			</a>
			<a href="">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
				<span><p>Ut enim ad minim veniam, quis nostrud exercitation</p></span>
			</a>
			<a href="" class="more">More</a>
		</div>
		<div class="col-md-3 col-sm-6">
			<h4>RAGAM BUDAYA</h4>
			<a href="">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
				<span><p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation</p></span>
			</a>
			<a href="">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
				<span><p>Ut enim ad minim veniam, quis nostrud exercitation</p></span>
			</a>
			<a href="" class="more">More</a>
		</div>
		<div class="col-md-3 col-sm-6">
			<h4>PAHLAWAN BUDAYA</h4>
			<a href="">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
				<span><p>Ut enim ad minim veniam, quis nostrud exercitation</p></span>
			</a>
			<a href="">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
				<span><p>Ut enim ad minim veniam, quis nostrud exercitation</p></span>
			</a>
			<a href="" class="more">More</a>
		</div>
		<div class="col-md-3 col-sm-6">
			<h4>BUDAYA VERSI KAMU</h4>
			<a href="">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
				<span><p>Ut enim ad minim veniam, quis nostrud exercitation</p></span>
			</a>
			<a href="">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
				<span><p>Ut enim ad minim veniam, quis nostrud exercitation</p></span>
			</a>
			<a href="" class="more">More</a>
		</div>
	</div>
	<h4 class="center">TEMPAT BELAJAR</h4>
	<div class="col-md-4 col-sm-4 class">
		<a href="">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
			Ut enim ad minim veniam, quis nostrud exercitation...
		</a>
	</div>
	<div class="col-md-4 col-sm-4 class">
		<a href="">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
			Ut enim ad minim veniam, quis nostrud exercitation...
		</a>
	</div>
	<div class="col-md-4 col-sm-4 class">
		<a href="">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/resource/no-image.jpg" alt="">
			Ut enim ad minim veniam, quis nostrud exercitation...
		</a>
	</div>
</div>
*/?>
