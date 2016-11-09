<?php if($model != null) {?>
<!-- News From Blog -->
<section class="news border-1px soft-border no-border-bottom">
	<!-- Inner -->
	<div class="inner t-center">
		<!-- Header -->
		<h1 class="header header-style-2 dark georgia t-center animated" data-animation="fadeIn" data-animation-delay="100">
			<?php echo strtoupper(Phrase::trans($model[0]->cat->name, 2));?>
		</h1>
		<!-- Header Text -->
		<p class="normal t-center animated" data-animation="fadeIn" data-animation-delay="100">
			<?php echo Phrase::trans($model[0]->cat->desc, 2);?>
		</p>
		<!-- Blog Slider -->
		<div class="blog-slider t-left box-carousel three-items">
			<?php foreach($model as $key => $val) {?>
			<!-- Box -->
			<div class="box">
				<!-- Inner Sldier -->
				<div class="inner-slider">
					<?php 
					$medias = $val->medias;
					if(!empty($medias)) {
						foreach($medias as $key => $row) {
							$image = Yii::app()->request->baseUrl.'/public/article/'.$row->article_id.'/'.$row->media;?>
							<!-- image / Slide -->
							<div class="image">
								<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$row->article_id, 't'=>Utility::getUrlTitle($val->title)))?>">
									<!-- Image SRC -->
									<img src="<?php echo Utility::getTimThumb($image, 460, 276, 1)?>" alt="">
								</a>
							</div>
						<?php }
					} else {
						$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';?>
						<!-- image / Slide -->
						<div class="image">
							<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>">
								<!-- Image SRC -->
								<img src="<?php echo Utility::getTimThumb($image, 460, 276, 1)?>" alt="">
							</a>
						</div>
					<?php }?>
				</div>
				<!-- End Inner Sldier -->
				<!-- Post Details -->
				<div class="details extra-light">
					<!-- Header -->
					<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>">
						<h3 class="no-padding">
							<?php echo Utility::shortText($val->title, 40);?>
						</h3>
					</a>
					<!-- Post Details -->
					<p class="post-details">
						<i class="fa fa-clock-o"></i>
						on <?php echo Utility::dateFormat($val->published_date);?>
						<i class="fa fa-user"></i>
						Posted By <span class="colored"><?php echo $val->creation_relation->displayname?></span>
					</p>
					<!-- Post Message -->
					<p class="post_message">
						<?php echo Utility::shortText(Utility::hardDecode($val->body), 150);?>
					</p>
					<!-- Red More Button -->
					<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" class="post_read_more_button ex-link uppercase">
						Read More
					</a>
				</div>
				<!-- End Post Details -->
			</div>
			<!-- End Box -->
			<?php }?>
		</div>
		<!-- End Blog Slider -->
	</div>
	<!-- End Inner -->
</section>
<!-- End News Section -->
<?php }?>
