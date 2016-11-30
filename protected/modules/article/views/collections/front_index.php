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

	$this->breadcrumbs=array(
		'Articles',
	);
?>

<!-- Portfolio Section -->
<section id="portfolio" class="container masonry ms-5-columns">
	<!-- Filters -->
	<div id="portfolio-filters" class="cbp-l-filters-alignCenter normal type2">
		<!-- Filter -->
		<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
			All
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".graphic" class="cbp-filter-item">
			Graphic
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".design" class="cbp-filter-item">
			Design
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".photography" class="cbp-filter-item">
			Photography
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".web" class="cbp-filter-item">
			Web
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
	</div>
	<!-- End Filters -->
	<!-- Portfolio Items -->
	<div id="portfolio-items" class="boxed type2">
		<?php if($model != null) {
			foreach($model as $key => $val) {?>
			<!-- Item -->
			<div class="cbp-item item design">
				<!-- Item Link -->
				<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" class="cbp-caption">
					<?php $medias = $val->medias;
					if(!empty($medias)) {
						$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$medias[0]->media;?>
						<!-- Item Image -->
						<div class="cbp-caption-defaultWrap">
							<!-- Image Src -->
							<img src="<?php echo Utility::getTimThumb($image, 300, 500, 3)?>" alt="Crexis">
							<!-- Item Note -->
							<div class="item_icon">
								<!-- Icon -->
								<p><i class="fa fa-image"></i></p>
								<p><?php echo $val->views->location_id != null ? $val->views->location->province_relation->province : Yii::t('phrase', 'Indonesia');?></p>
							</div>
							<!-- End Item Note -->
						</div>
						<!-- End Item Image -->					
					<?php }?>
					
					<!-- Item Details -->
					<div class="cbp-caption-activeWrap">
						<!-- Centered Details -->
						<div class="center-details">
							<div class="details">
								<!-- Item Name -->
								<h2 class="name ">
									<?php echo $val->title;?>
								</h2>
								<!-- Tags -->
								<p class="tags">
									<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>$val->cat_id, 't'=>Utility::getUrlTitle(Phrase::trans($val->cat->name, 2))))?>" title="<?php echo Phrase::trans($val->cat->name, 2);?>"><?php echo Phrase::trans($val->cat->name, 2);?></a>
									<?php if($val->views->location_id != null) {
										$locationCode = $val->views->location->province_code;?>
										<a href="<?php echo Yii::app()->createUrl($locationCode.'/index')?>" title="<?php echo $val->views->location->province_relation->province;?>"><?php echo $val->views->location->province_relation->province;?></a>
									<?php } else
										echo Yii::t('phrase', 'Indonesia');?>
								</p>
							</div>
						</div>
						<!-- End Center Details Div -->
					</div>
					<!-- End Item Details -->
				</a>
				<!-- End Item Link -->
			</div>
			<!-- End Item -->
			<?php }
		} else {?>
		
		<?php }?>
	</div>
	<!-- End Portfolio Items -->
</section>
<!-- End Portfolio Section -->