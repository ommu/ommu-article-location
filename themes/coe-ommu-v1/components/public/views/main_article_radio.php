<?php if($model != null) {?>
<!-- Clients Section -->
<section id="clients" class="background10 parallax6 dark-bg">
	<!-- Inner -->
	<div class="inner t-center clearfix">
		<!-- Header -->
		<h1 class="header strip header-style-2 white georgia t-center  animated" data-animation="fadeIn" data-animation-delay="100">
			<?php echo strtoupper(Phrase::trans($model[0]->cat->name, 2));?>
		</h1>
		<!-- Header Text -->
		<p class="normal t-center animated" data-animation="fadeIn" data-animation-delay="100">
			<?php echo Phrase::trans($model[0]->cat->desc, 2);?>
		</p>
		<div class="boxes boxes-type-4 light box-carousel three-items clearfix animated" data-animation="fadeIn" data-animation-delay="500">
			<?php foreach($model as $key => $val) {?>
			<!-- Box -->
			<div class="box white georgia">
				<!-- Box Image -->
				<div class="box-image fullwidth t-center normal">
					<?php 
					$medias = $val->medias;
					$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
					if(!empty($medias))
						$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$medias[0]->media;?>
					<!-- Image -->
					<a href="" class="changeable-image">
						<img src="<?php echo Utility::getTimThumb($image, 100, 100, 1)?>" alt="<?php echo $val->title?>">
					</a>
				</div>
				<!-- End Box Icon -->
				<!-- Box Header -->
				<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>">
					<h4 class="box-header no-padding uppercase ">
						<?php echo $val->title?>
					</h4>
				</a>
				<!-- Position -->
				<h5 class="colored ">
					Ceo/Company
				</h5>
				<!-- Box Description -->
				<p class="no-padding no-margin raleway">
					<?php echo Utility::shortText(Utility::hardDecode($val->body), 150);?>
				</p>
			</div>
			<!-- End Box -->
			<?php }?>
		</div>
		<!-- End Boxes -->
	</div>
	<!-- End Inner -->
</section>
<!-- End Clients -->
<?php }?>
