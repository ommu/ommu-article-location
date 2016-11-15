<?php if($model != null) {?>
<!-- Categories Section -->
<section id="categories" class="background9 parallax-location xdark-bg pattern-black" <?php echo $random->province_header_photo != '' ? 'style="background-image:url('.Utility::getProtocol().'://'.Yii::app()->request->serverName.Yii::app()->request->baseUrl.'/public/article/location/'.$random->province_header_photo.')";' : '';?>>
	<!-- Inner -->
	<div class="inner t-center animated" data-animation="fadeIn" data-animation-delay="100">
		<!-- First Header -->
		<h4 class="header-first georgia"><?php echo Yii::t('phrase', 'Member of CoE');?></h4>
		<!-- Header -->
		<h1 class="header header-style-2 georgia white t-center">
			<?php echo Yii::t('phrase', 'Centre Of Excellence Budaya Jawa');?>
		</h1>
		<!-- Header Text -->
		<p class="normal t-center">
			Dapatkan Informasi seputar Budaya Lokal dengan megakses halaman Member CoE
		</p>
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
						<img src="<?php echo Utility::getTimThumb($image, 420, 616, 1)?>" alt="<?php echo $val->province_relation->province;?>">
					</div>
				</div>
				<!-- End Category Inner Slider -->
				<!-- Box Texts -->
				<div class="box-texts white">
					<!-- Header -->
					<a href="<?php echo Yii::app()->createUrl($val->province_code.'/index');?>" title="<?php echo $val->province_relation->province;?>">
						<h2 class="t-shadow">
							<?php echo $val->province_relation->province;?>
						</h2>
					</a>
					<!-- Description -->
					<p class="t-shadow">
						<?php echo $val->province_desc != '' && $val->province_desc != '-' && $val->province_desc != $val->province_relation->province ? $val->province_desc : '';?>
					</p>
				</div>
				<!-- End Box Texts -->
			</div>
			<!-- End Box -->
			<?php }?>
		</div>
		<!-- End Category Boxes -->
		<!-- Bottom Page Texts -->
		<div class="bottom-page-texts relative t-center">
			<!-- Slider Texts Area -->
			<h2 class=" georgia">Ragam Budaya, Agenda Budaya, Pahlawan Budaya dan Berita</h2>
			<p class="normal raleway">Dapatkan Informasi Seputar Budaya Lokal seperti Ragam Budaya, Agenda Budaya, Pahlawan Budaya dan berita-berita lainnya seputar Layanan Portal Centre Of Excellence (CoE) Budaya Jawa</p>
			<!-- Bottom Buttons -->
			<?php /*
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
			*/?>
			<!-- End Buttons -->
		</div>
		<!-- End Bottom Page Texts -->
	</div>
	<!-- End Categories -->
</section>
<?php }?>
