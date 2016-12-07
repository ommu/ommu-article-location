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
			foreach($model as $key => $val) {
				$this->renderPartial('_view', array('data'=>$val), false, false);
			}
		} else {?>
		
		<?php }?>
	</div>
	<!-- End Portfolio Items -->
	<?php if($pager['nextPage'] != 0) {?>
	<div id="loadMore-container" class="cbp-l-loadMore-text">
		<a href="<?php echo Yii::app()->controller->createUrl('index');?>" class="cbp-l-loadMore-link">
		<span class="cbp-l-loadMore-defaultText"><?php echo Yii::t('phrase', 'Selanjutnya');?></span>
		<span class="cbp-l-loadMore-loadingText"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/loader.gif" alt="<?php echo Yii::t('phrase', 'Loading...');?>" /></span>
		</a>
	</div>
	<?php }?>
</section>
<!-- End Portfolio Section -->