<?php
/**
 * Articles (articles)
 * @var $this SiteController
 * @var $model Articles
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Articles
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Articles'=>array('manage'),
		Phrase::trans($model->cat->name,2),
		$model->title,
	);
?>

<!-- Post -->
<div class="post clearfix">
	<!-- Left, Dates -->
	<div class="dates f-left">
		<!-- Post Time -->
		<h6 class="date">
			<span class="day colored helvetica">
			<?php echo date('d', strtotime($model->published_date));?>
			</span>
			<?php echo Utility::getLocalMonthName($model->published_date);?>, <?php echo date('Y', strtotime($model->published_date));?>
		</h6>
		<!-- Details -->
		<div class="details">
			<ul class="t-right fullwidth">
				<!-- Posted By -->
				<li>
					Posted By <a><?php echo $model->creation_relation->displayname?></a>
					<i class="fa fa-user"></i>
				</li>
				<li>
					<?php
					if($model->views->location_id != null) {
						$locationCode = $model->views->location->province_code;?>
						<a href="<?php echo Yii::app()->createUrl($locationCode.'/index')?>" title="<?php echo $model->views->location->province_relation->province;?>"><?php echo $model->views->location->province_relation->province;?></a>
					<?php } else
						echo Yii::t('phrase', 'Indonesia');?>
					<i class="fa fa-map-marker"></i>
				</li>
				<!-- Comments -->
				<?php /*
				<li>
					<a href="#">12 Comments</a>
					<i class="fa fa-comments"></i>
				</li>
				*/?>
				<!-- Tags -->
				<?php $tags = $model->tags;
				if(!empty($model->tags)) {
					$countTags = count($tags);?>
				<li>
					<?php 
					$i = 0;
					foreach($tags as $key => $val) {
						$i++;?>
						<a href="javascript:void(0);" title="<?php echo $val->tag_TO->body?>"><?php echo $val->tag_TO->body?></a><?php echo $i != $countTags ? ',' : '';?>
					<?php }?>
					<i class="fa fa-comments"></i>
				</li>
				<?php }?>
				<!-- Liked -->
				<?php /*
				<li>
					<a href="#">Extra Link</a>
					<i class="fa fa-link"></i>
				</li>
				*/?>
			</ul>
		</div>
		<!-- End Details -->
	</div>
	<!-- End Left, Dates -->
	<!-- Post Inner -->
	<div class="post-inner f-right">
		<!-- Header -->
		<?php /*
		<h2 class="post-header semibold">
			Post With Stunning <span class="colored">Video</span>
		</h2>
		*/?>
		<!-- Media -->
		<?php $medias = $model->medias;
		if(!empty($medias)) {
			$count = count($medias);?>
			<div class="post-image <?php echo $count > 1 ? 'image_slider mp-gallery clearfix' : 'post-media mp-gallery';?>">
				<?php foreach($medias as $key => $val) {
					$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$val->media;?>
					<?php if($count > 1) {?>
						<!-- Slide -->
						<li class="slide">
							<a href="<?php echo $image;?>" title="Post image">
								<img src="<?php echo Utility::getTimThumb($image, 470, 880, 3)?>" alt="">
							</a>
						</li>
						<!-- Slide -->
					<?php } else {?>
						<a href="<?php echo $image;?>" title="Post image">
						<img src="<?php echo Utility::getTimThumb($image, 470, 880, 3)?>" alt="">
						</a>
				<?php }
				}?>
			</div>
		<?php }?>
		<!-- Description -->
		<div class="post-text light">
			<?php echo $model->body;?>
		</div>
	</div>
	<!-- End Post Inner -->
</div>
<!-- End Post -->