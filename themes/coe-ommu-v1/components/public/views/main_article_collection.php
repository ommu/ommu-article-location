<?php if($model != null) {?>
<!-- Portfolio Section -->
<section id="portfolio" class="container 4-columns">
	<!-- Portfolio Inner -->
	<div class="inner t-center animated" data-animation="fadeIn" data-animation-delay="100">
		<!-- Header -->
		<h2 class="header header-style-1 dark semibold uppercase">
			Koleksi Budaya
		</h2>
		<!-- Header Text -->
		<p class="light">
			Koleksi Budaya
		</p>
	</div>
	<!-- End Inner -->
	
	<!-- Filters -->
	<?php /*
	<div id="portfolio-filters" class="cbp-l-filters-alignCenter uppercase">
		<!-- Filter -->
		<div data-filter="*" class="cbp-filter-item-active cbp-filter-item georgia">
			ALL
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".graphic" class="cbp-filter-item georgia">
			Graphic
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".design" class="cbp-filter-item georgia">
			Design
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".photography" class="cbp-filter-item georgia">
			photography
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".web" class="cbp-filter-item georgia">
			web
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
	</div>
	*/?>
	<!-- End Filters -->
	
	<!-- Portfolio Items -->
	<div id="portfolio-items" class="fullwidth">
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
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details georgia uppercase">
							<!-- Item Name -->
							<h2 class="name ">
								<?php echo Utility::shortText($val->article->title, 60);?>
							</h2>
							<!-- Tags -->
							<p class="tags">
								Design
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
	<!-- Load More -->
	<?php /*
	<div id="loadMore-container" class="loadmore">
		<!-- Load More Button Link -->
		<a href="<?php echo Yii::app()->createUrl('article/collection/index')?>" class="load-more-button cbp-l-loadMore-link oswald uppercase t-center light-type antialiased">
		<span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
		<span class="cbp-l-loadMore-loadingText">LOADING...</span>
		<span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
		</a>
	</div>
	*/?>
	<!-- End Load More -->	
</section>
<!-- End Portfolio Section -->
<?php }?>