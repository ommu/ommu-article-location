<?php if($model != null) {?>
<!-- Categories Section -->
<section id="categories" class="background9 parallax2 xdark-bg pattern-black">
	<!-- Inner -->
	<div class="inner t-center animated" data-animation="fadeIn" data-animation-delay="100">
		<!-- First Header -->
		<h4 class="header-first georgia"><?php echo Yii::t('phrase', 'Member of CoE');?></h4>
		<!-- Header -->
		<h1 class="header header-style-2 white georgia t-center ">
			<?php echo Yii::t('phrase', 'Centre Of Excellence Budaya Jawa');?>
		</h1>
		<!-- Header Text -->
		<?php /*
		<p class="normal t-center">
			Contrary to popular belief, Lorem Ipsum is not simply random text.
		</p>
		*/?>
	</div>
	<!-- End Inner -->
	<!-- Categories -->
	<div class="categories fullwidth">
		<!-- Boxes -->
		<div class="category-boxes double-slider relative clearfix">
			<?php foreach($model as $key => $val) {?>		
			<!-- Box -->
			<div class="box animated" data-animation="fadeIn" data-animation-delay="300">
				<!-- Category Inner Slider -->
				<div class="category-inner-slider inner-slider">
					<?php $image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
					if($val->province_photo != '')
						$image = Yii::app()->request->baseUrl.'/public/article/location/'.$val->province_photo;
					?>
					<!-- Image Div -->
					<div class="image">
						<!-- Image SRC -->
						<img src="<?php echo Utility::getTimThumb($image, 420, 616, 1)?>" alt="Red Hair">
					</div>
				</div>
				<!-- End Category Inner Slider -->
				<!-- Box Texts -->
				<div class="box-texts georgia white">
					<!-- Header -->
					<a href="<?php echo Yii::app()->createUrl($val->province_code.'/article');?>">
						<h2 class="t-shadow">
							<?php echo $val->province_relation->province;?>
						</h2>
					</a>
					<!-- Description -->
					<?php /*
					<p class="t-shadow">
						Lorem ipsum is dolor samet
					</p>
					*/?>
				</div>
				<!-- End Box Texts -->
			</div>
			<!-- End Box -->
			<?php }?>
		</div>
		<!-- End Category Boxes -->
		<!-- Bottom Page Texts -->
		<?php /*
		<div class="bottom-page-texts relative t-center">
			<!-- Slider Texts Area -->
			<h2 class=" georgia">Clean, responsive and professional design with powerfull code!</h2>
			<p class="normal raleway">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit.</p>
			<!-- Bottom Buttons -->
			<div class="bottom-page-buttons">
				<!-- First Button -->
				<a href="#portfolio" class="t-center scroll  content-button">
					<p class="uppercase">Our Portfolio</p>
					<p class="normal">Click for Our All Works</p>
				</a>
				<!-- Second Button -->
				<a href="#contact" class="t-center scroll  content-button">
					<p class="uppercase">Keep In Touch</p>
					<p class="normal">Send Us a Message</p>
				</a>
			</div>
			<!-- End Buttons -->
		</div>
		*/?>
		<!-- End Bottom Page Texts -->
	</div>
	<!-- End Categories -->
</section>
<?php }?>
