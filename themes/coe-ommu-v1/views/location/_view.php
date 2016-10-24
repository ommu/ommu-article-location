<?php
/**
 * Articles (articles)
 * @var $this SiteController
 * @var $data Articles
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Articles
 * @contect (+62)856-299-4114
 *
 */

	$medias = $data->article->medias;
?>

<div class="post-has-media clearfix post type-post status-publish has-post-thumbnail hentry category-architecture <?php echo !empty($medias) && count($medias) >= 2 ? 'format-gallery post_format-post-format-gallery' : 'format-standard'?>">
	<div class="dates f-left">
		<!-- Post Time -->
		<h6 class="date">
			<span class="day colored helvetica"><?php echo date('d', strtotime($data->article->published_date));?></span>
			<?php echo Utility::getLocalMonthName($data->article->published_date);?>, <?php echo date('Y', strtotime($data->article->published_date));?>
		</h6>
		<!-- Details -->
		<div class="details">
			<ul class="t-right fullwidth">
				<!-- Posted By -->
				<li>
					Posted By <a href="javascript:void(0);"><?php echo $data->article->creation_relation->displayname?></a>
					<i class="fa fa-user"></i>
				</li>
				<?php /*
				<!-- Comments -->
				<li>
					<a href="http://veented.info/crexis/red-hair/#comments" title="View comments">4 Comments</a>
					<i class="fa fa-comments"></i>
				</li>
				*/?>
				<!-- Tags -->
				<li>
					<a href="javascript:void(0);" rel="category tag"><?php echo Phrase::trans($data->article->cat->name, 2);?></a> <i class="fa fa-user"></i>
				</li>
				<!-- Liked -->
			</ul>
		</div>
		<!-- End Details -->
	</div>
	<div class="post-inner f-right">
		<h2 class="post-header semibold">
			<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$data->article->article_id, 't'=>Utility::getUrlTitle($data->article->title)))?>"><?php echo $data->article->title;?></a>
		</h2>
		<div class="post-media-container">
			<div class="post-media basic_slider t-right">
				<ul class="image_slider mp-gallery clearfix">
					<?php 
					if(!empty($medias)) {
						foreach($medias as $key => $val) {
							$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$val->media;?>
							<li class="slide"><a href="javascript:void(0);" title=""><img src="<?php echo Utility::getTimThumb($image, 600, 250, 1)?>" alt=""></a></li>
						<?php }
					} else {
						$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';?>
						<li class="slide"><a href="javascript:void(0);" title=""><img src="<?php echo Utility::getTimThumb($image, 600, 250, 1)?>" alt=""></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
		<div class="post-text">
			<p><?php echo Utility::shortText(Utility::hardDecode($data->article->body), 230);?></p>
			<?php /*
			<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$data->article->article_id, 't'=>Utility::getUrlTitle($data->article->title)))?>" class="ex-link post-more uppercase light st">Read more</a>
			*/?>
		</div>
	</div>
</div>