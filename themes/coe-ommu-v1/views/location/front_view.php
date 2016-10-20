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

	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile(/*flexslider-css'*/Yii::app()->theme->baseUrl.'/css/flexslider.min.css?ver=4.11.2');
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/quWxohwWmBHkjCBoLLP19vZDw6qV8pnAIJAS7Ma_pCc.js', CClientScript::POS_END);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/Sy5Krcgs1i8v0M3MS84pTUkt1s8Cc1Nzk1JT9HIz8wA.js', CClientScript::POS_END);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9BPLkqtyCzWzwKiwtLUokq93MT0vMy0zGTdgvyC0gK93Mw8HQNMVWk5qRXFOZkpqUW66CpKylNTk_PzcwA.js', CClientScript::POS_END);

	$medias = $model->medias;
?>

<div class="post-has-media post type-post status-publish has-post-thumbnail hentry category-architecture <?php echo !empty($medias) && count($medias) >= 2 ? 'format-gallery post_format-post-format-gallery' : 'format-standard'?>">
	<div class="dates f-left">
		<!-- Post Time -->
		<h6 class="date">
			<span class="day colored helvetica"><?php echo date('d', strtotime($model->published_date));?></span>
			<?php echo Utility::getLocalMonthName($model->published_date);?>, <?php echo date('Y', strtotime($model->published_date));?>
		</h6>
		<!-- Details -->
		<div class="details">
			<ul class="t-right fullwidth">
				<!-- Posted By -->
				<li>
					Posted By <a href="javascript:void(0);"><?php echo $model->creation_relation->displayname?></a>
					<i class="fa fa-user"></i>
				</li>
				<?php /*
				<!-- Comments -->
				<li>
					<a href="http://veented.info/crexis/red-hair/#comments" title="View comments">4 Comments</a>
					<i class="fa fa-comments"></i>
				</li>
				<!-- Tags -->
				<li>
					<a href="http://veented.info/crexis/category/architecture/" rel="category tag">Architecture</a>						<i class="fa fa-user"></i>
				</li>
				<!-- Liked -->
				*/?>
			</ul>
		</div>
		<!-- End Details -->
	</div>
	<div class="post-inner f-right">
		<h2 class="post-header semibold">
			<a href="javascript:void(0);"><?php echo $model->title;?></a>
		</h2>
		<div class="post-media-container">
			<div class="post-media basic_slider t-right">
				<ul class="image_slider mp-gallery clearfix">
					<?php 
					if(!empty($medias)) {
						foreach($medias as $key => $val) {
							$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$val->media;?>
							<li class="slide"><a href="javascript:void(0);" title=""><img src="<?php echo Utility::getTimThumb($image, 880, 470, 1)?>" alt=""></a></li>
						<?php }
					} else {
						$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';?>
						<li class="slide"><a href="javascript:void(0);" title=""><img src="<?php echo Utility::getTimThumb($image, 880, 470, 1)?>" alt=""></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
		<div class="post-content-holder">
			<?php echo $model->body;?>
		</div>
	</div>
</div>