
<!-- Home Section -->
<section id="home" class="home container">
	<!-- Ful Screen Slider -->
	<div id="fullscreen">
		<!-- Slides -->
		<div class="slides-container relative">
			<!-- Slider Images -->
			<div class="background17 parallax"></div>
			<div class="background13 parallax"></div>
			<div class="background36 parallax"></div>
			<!-- End Slider Images -->	 
		</div>
		<!-- End Slides -->
		<!-- Slider Controls -->
		<nav class="slides-navigation">
			<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
			<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
		</nav>
	</div>
	<!-- End Ful Screen Home -->
	<!-- Home Inner Details -->
	<div class="home-inner t-center" data-0="opacity:1;" data-600="opacity:0;">
		<!-- Home Text Slider -->
		<div class="home-text-slider relative">
			<!-- Home Text Slider -->
			<h1 class="white thin text-rotetor">
				<!-- Home Texts -->
				<span class="rotate">
				We Create Awesome Themes!,
				Crexis Creative Design Studio
				</span>
				<!-- End Home Texts -->
			</h1>
			<!-- End Home Text Slider -->
			<!-- Home Fixed Text -->		
			<p class="home-fixed-text white thin t-center">Contrary to popular belief, Lorem Ipsum is not simply random text. piece of classical Latin literature</p>
		</div>
		<!-- End Home Text Slider -->
		<!-- Home Button -->
		<a href="#about" class="home-button light-button thin scroll">Get Started</a>
	</div>
	<!-- End Home Inner Details -->
	<!-- Home Bottom Note -->
	<div class="home-extra-note fullwidth t-center white thin absolute" data-0="opacity:1;" data-600="opacity:0;">
		<!-- Text Link -->
		<a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>$about->page_id,'t'=>Utility::getUrlTitle(Phrase::trans($about->name, 2))));?>" class="scroll">
			<!-- Bottom Text -->
			<p>Crexis Stunning OnePage&amp;MultiPage Theme</p>
			<!-- Bottom Button -->
			<span class="home-button dark-button t-center home-circle-button fa fa-angle-down"></span>
		</a>
		<!-- End Text Link -->
	</div>
	<!-- End Home Bottom Note -->
</section>
<!-- End Home Section -->