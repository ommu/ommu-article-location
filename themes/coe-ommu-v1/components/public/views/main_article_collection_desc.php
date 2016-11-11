<!-- Portfolio Section -->
<?php if($model != null) {?>
<section id="portfolio" class="container 5-columns-margin <?php echo $this->theme != null && $this->theme == 'dark' ? 'dark-bg' : '';?>">

	<!-- Portfolio Inner -->
	<div class="inner t-center animated" data-animation="fadeIn" data-animation-delay="100">

		<!-- Header -->
		<h2 class="header header-style-1 <?php echo $this->theme != null && $this->theme == 'dark' ? 'white' : 'dark';?> normal oswald uppercase">
			<?php echo Yii::t('phrase', 'Koleksi Budaya');?>
		</h2>
		<!-- Header Text -->
		<p class="light">
			<?php echo Yii::t('phrase', 'Koleksi Budaya');?>
		</p>

	</div>
	<!-- End Inner -->

	<!-- Filters -->
	<?php /*
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
	*/?>
	<!-- End Filters -->

	<!-- Portfolio Items -->
	<div id="portfolio-items" class="fullwidth type2">
		<?php foreach($model as $key => $val) {?>
		<!-- Item -->
		<div class="cbp-item item design">
			<!-- Item Link -->
			<a href="<?php echo Yii::app()->createUrl('article/collection/view', array('id'=>$val->collection_id, 't'=>Utility::getUrlTitle($val->article->title)))?>" class="cbp-caption ex-link">

				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<?php 
					$medias = $val->article->medias;
					$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
					if(!empty($medias))
						$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$medias[0]->media;?>
					<!-- Image Src -->
					<img src="<?php echo Utility::getTimThumb($image, 420, 300, 1)?>" alt="<?php echo $val->article->title;?>" />

					<!-- Item Note -->
					 <div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-external-link"></i></p>
					</div>
					 <!-- End Item Note -->
				</div>
				<!-- End Item Image -->

				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								<?php echo Utility::shortText($val->article->title, 20);?>
							</h2>
							<!-- Tags -->
							<p class="tags">
								<?php echo $val->article->views->location_id != null ? $val->article->views->location->province_relation->province : Yii::t('phrase', 'Indonesia');?>
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
		<?php }?>
	</div>
	<!-- End Portfolio Items -->

</section>
<?php }?>
<!-- End Portfolio Section -->