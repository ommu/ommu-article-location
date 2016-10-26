<?php if($model != null) {?>
<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" data-vc-parallax="2" class="vc_row wpb_row vc_row-fluid vc_custom_1459937771735 vc_row-has-fill vc_row-no-padding vntd-section-white vc_general vc_parallax vc_parallax-content-moving" id="member">
	<div class="bg-overlay bg-overlay-dark_dots"></div>
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner ">
			<div class="wpb_wrapper">
				<div class="vntd-special-heading special-heading-align-center heading-no-separator" style="margin-bottom:60px;">
					<h4 class="header-first  georgia">Member of CoE</h4>
					<h1 class="header  georgia font-size-40px georgia font-weight-400" >Centre Of Excellence</h1>
					<?php /*<p class="subtitle light " >The standard Lorem Ipsum passage, used since the 1500s</p>*/?>
				</div>
				<div class="vntd-carousel-holder">
					<div class="categories fullwidth">
						<!-- Boxes -->
						<div class="category-boxes double-slider relative clearfix" data-cols="6">
							<?php foreach($model as $key => $val) {?>
							<div class="box animated" data-animation="fadeIn" data-animation-delay="100">
								<!-- Category Inner Slider -->
								<div class="category-inner-slider inner-slider">
									<?php $image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
									if($val->province_photo != '')
										$image = Yii::app()->request->baseUrl.'/public/article/location/'.$val->province_photo;
									?>
									<div class="image">
										<!-- Image SRC -->
										<img src="<?php echo Utility::getTimThumb($image, 420, 616, 1)?>" alt="Red Hair">
									</div>
								</div>
								<!-- End Category Inner Slider -->
								<!-- Box Texts -->
								<div class="box-texts georgia white">
									<!-- Header -->
									<a href="<?php echo Yii::app()->createUrl($val->province_code.'/article');?>"><h2 class="t-shadow georgia"><?php echo $val->province_relation->province?></h2></a>
									<?php /*
									<!-- Description -->
									<p class="t-shadow">Art is beautiful.</p>
									*/?>
								</div>
								<!-- End Box Texts -->
							</div>
							<?php }?>
						</div>
					</div>
				</div>
				<?php /*
				<div class="vntd-cta vntd-cta-style-classic vntd-cta-color-dark bottom-page-texts relative t-center ">
					<h2 class="vntd-cta-heading georgia">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
					<p class="normal raleway">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
				*/?>
			</div>
		</div>
	</div>
</div>
<div class="vc_row-full-width"></div>
<?php }?>
