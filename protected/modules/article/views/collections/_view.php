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
?>

<!-- Item -->
<div class="cbp-item item <?php echo Utility::getUrlTitle($data->category->category_name);?>">
	<?php $medias = $data->article->medias;
	if(!empty($medias)) {
		$image = Yii::app()->request->baseUrl.'/public/article/'.$data->article_id.'/'.$medias[0]->media;?>
		<!-- Item Image -->
		<div class="item-top">
			<!-- Post Link -->
			<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$data->article_id, 't'=>Utility::getUrlTitle($data->article->title)))?>" class="item_image">
				<!-- Image Src -->
				<img src="<?php echo Utility::getTimThumb($image, 300, 500, 3)?>" alt="<?php echo $data->article->title;?>">
			</a>
			<?php /*
			<!-- Icon -->
			<a href="<?php echo $image;?>" class="item_button first">
			<i class="fa fa-heart"></i>
			</a>
			*/?>
			<!-- Icon -->
			<a href="<?php echo $image;?>" class="item_button first">
			<i class="fa fa-image"></i>
			</a>
		</div>
		<!-- End Item Image -->					
	<?php }?>
	
	<!-- Details -->
	<div class="details">
		<!-- Item Name -->
		<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$data->article_id, 't'=>Utility::getUrlTitle($data->article->title)))?>">
			<h2 class="head light">
				<?php echo $data->article->title;?>
			</h2>
		</a>
		<!-- Description -->
		<p class="note mt-5 light">
			<span><?php echo $data->category->category_name;?></span> /
			<?php
			if($data->article->views->location_id != null) {
				$locationCode = $data->article->views->location->province_code;?>
				<a class="colored" href="<?php echo Yii::app()->createUrl($locationCode.'/index')?>" title="<?php echo $data->article->views->location->province_relation->province;?>"><?php echo $data->article->views->location->province_relation->province;?></a>
			<?php } else
				echo Yii::t('phrase', 'Indonesia');?>
			
			<?php //echo Utility::dateFormat($data->article->published_date);?>
		</p>
		<?php if(empty($medias)) {?>
			<!-- Description -->
			<p class="description light">
				<?php echo Utility::shortText(Utility::hardDecode($data->article->body), 150);?>
			</p>
		<?php }?>
	</div>
	<!-- End Center Details Div -->
	<!-- Posted By -->
	<a href="<?php echo $data->article->views->location_id != null ? Yii::app()->createUrl($data->article->views->location->province_code.'/index') : 'javascript:void(0);';?>" class="posted_button">
		<!-- Image SRC -->
		<?php 
		if($data->article->views->location->province_photo != '')
			$imageLocation = Yii::app()->request->baseUrl.'/public/article/location/'.$data->article->views->location->province_photo;
		else
			$imageLocation = Yii::app()->request->baseUrl.'/public/article/article_default.png';?>
		<img src="<?php echo Utility::getTimThumb($imageLocation, 100, 100, 1)?>" alt="<?php echo $data->article->views->location_id != null ? $data->article->views->location->province_relation->province : Yii::t('phrase', 'Indonesia');?>">
		<p>
			<?php echo $data->article->creation_relation->displayname;?>
			<span><?php echo Utility::dateFormat($data->article->published_date);?></span>
		</p>
	</a>
</div>
<!-- End Item -->