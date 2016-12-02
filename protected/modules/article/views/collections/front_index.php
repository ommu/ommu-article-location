<?php
/**
 * Articles (articles)
 * @var $this SiteController
 * @var $model Articles
 * @var $dataProvider CActiveDataProvider
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Articles
 * @contect (+62)856-299-4114
 *
 */

	$cs = Yii::app()->getClientScript();
	//$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/masonry-blog.js', CClientScript::POS_END);
	
	$this->breadcrumbs=array(
		'Articles',
	);
?>

<!-- Portfolio Section -->
<section id="blog" class="container masonry-blog bl-5-col">
	<!-- Filters -->
	<div id="blog-filters" class="cbp-l-filters-alignCenter normal type2">
		<!-- Filter -->
		<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
			<?php echo Yii::t('phrase', 'All');?>
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<?php if($category != null) {
			foreach($category as $key => $val) {?>		
			<!-- Filter -->
			<div data-filter=".<?php echo Utility::getUrlTitle($val->category_name);?>" class="cbp-filter-item">
				<?php echo $val->category_name;?>
				<!-- Filter Counter -->
				<div class="cbp-filter-counter"></div>
			</div>
		<?php }
		}?>
	</div>
	<!-- End Filters -->
	<!-- Portfolio Items -->
	<div id="blog-items" class="boxed">
		<?php if($model != null) {
			foreach($model as $key => $val) {?>	
			<!-- Item -->
			<div class="cbp-item item <?php echo Utility::getUrlTitle($val->category->category_name);?>">
				<?php $medias = $val->article->medias;
				if(!empty($medias)) {
					$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$medias[0]->media;?>
					<!-- Item Image -->
					<div class="item-top">
						<!-- Post Link -->
						<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->article->title)))?>" class="item_image">
							<!-- Image Src -->
							<img src="<?php echo Utility::getTimThumb($image, 300, 500, 3)?>" alt="<?php echo $val->article->title;?>">
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
					<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->article->title)))?>">
						<h2 class="head normal colored">
							<?php echo $val->article->title;?>
						</h2>
					</a>
					<!-- Description -->
					<p class="note mt-5 light">
						<span><?php echo $val->category->category_name;?></span> /
						<?php
						if($val->article->views->location_id != null) {
							$locationCode = $val->article->views->location->province_code;?>
							<a class="colored" href="<?php echo Yii::app()->createUrl($locationCode.'/index')?>" title="<?php echo $val->article->views->location->province_relation->province;?>"><?php echo $val->article->views->location->province_relation->province;?></a>
						<?php } else
							echo Yii::t('phrase', 'Indonesia');?>
						
						<?php //echo Utility::dateFormat($val->article->published_date);?>
					</p>
					<?php if(empty($medias)) {?>
						<!-- Description -->
						<p class="description light">
							<?php echo Utility::shortText(Utility::hardDecode($val->article->body), 150);?>
						</p>
					<?php }?>
				</div>
				<!-- End Center Details Div -->
				<?php /*
				<!-- Posted By -->
				<a href="#" class="posted_button">
					<!-- Image SRC -->
					<img src="../images/user_01.jpg" alt="user">
					<p>
						Posted By Amanda
						<span>@WebDesign</span>
					</p>
				</a>
				*/?>
			</div>
			<!-- End Item -->
			<?php }
		} else {?>
		
		<?php }?>
	</div>
	<!-- End Portfolio Items -->
	<div id="loadMore-container" class="cbp-l-loadMore-text">
		<a href="ajax/loadMoreBlog.html" class="cbp-l-loadMore-link">
		<span class="cbp-l-loadMore-defaultText">MORE</span>
		<span class="cbp-l-loadMore-loadingText"><img src="../images/loader.gif" alt="loader" /></span>
		<span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
		</a>
	</div>
</section>
<!-- End Portfolio Section -->