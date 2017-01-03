<?php if($model != null) {
	$mediaRandom = $random->medias;?>
<!-- Clients Section -->
<section id="clients" class="background10 parallax-radio <?php echo $this->theme != null && $this->theme == 'dark' ? 'dark-bg' : '';?>" <?php echo !empty($mediaRandom) ? 'style="background-image:url('.Utility::getProtocol().'://'.Yii::app()->request->serverName.Yii::app()->request->baseUrl.'/public/article/'.$random->article_id.'/'.$mediaRandom[0]->media.')";' : '';?>>
	<!-- Inner -->
	<div class="inner t-center clearfix">
		<!-- Header -->
		<h1 class="header header-style-1 <?php echo $this->theme != null && $this->theme == 'dark' ? 'white' : 'dark';?> semibold t-center uppercase animated" data-animation="fadeIn" data-animation-delay="100">
			<?php echo strtoupper(Phrase::trans($model[0]->cat->name, 2));?>
		</h1>
		<!-- Header Text -->
		<p class="normal t-center animated" data-animation="fadeIn" data-animation-delay="100">
			<?php echo Phrase::trans($model[0]->cat->desc, 2);?>
		</p>
		<div class="boxes boxes-type-4 light box-carousel three-items clearfix animated" data-animation="fadeIn" data-animation-delay="500">
			<?php foreach($model as $key => $val) {?>
			<!-- Box -->
			<div class="box white">
				<!-- Box Image -->
				<div class="box-image fullwidth t-center normal">
					<?php 
					$medias = $val->medias;
					$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
					if(!empty($medias))
						$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$medias[0]->media;?>
					<!-- Image -->
					<?php if($this->location == null)
						$link = 'article/site/view';
					else
						$link = $val->view->location->province_code.'/view';?>
					<a href="<?php echo Yii::app()->createUrl($link, array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" class="changeable-image">
						<img src="<?php echo Utility::getTimThumb($image, 100, 100, 1)?>" alt="<?php echo $val->title?>">
					</a>
				</div>
				<!-- End Box Icon -->
				<!-- Box Header -->
				<a href="<?php echo Yii::app()->createUrl($link, array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>">
					<h4 class="box-header no-padding uppercase">
						<?php echo $val->title?>
					</h4>
				</a>
				<!-- Position -->
				<h5 class="colored ">
					<?php echo $val->view->location_id != null ? $val->view->location->province_relation->province : Yii::t('phrase', 'Indonesia');?>
				</h5>
				<!-- Box Description -->
				<p class="no-padding no-margin">
					<?php echo Utility::shortText(Utility::hardDecode($val->body), 150);?>
				</p>
			</div>
			<!-- End Box -->
			<?php }?>
		</div>
		<!-- End Boxes -->
	
		<?php if($this->location != null) {?>
		<div class="clearfix"></div>
		<div class="mt-20">
			<a class="colored" href="<?php echo Yii::app()->createUrl($model[0]->view->location->province_code.'/article', array('category'=>$model[0]->cat_id, 't'=>Utility::getUrlTitle(Phrase::trans($model[0]->cat->name, 2))))?>" title="<?php echo Yii::t('phrase', 'Selengkapnya');?>"><?php echo Yii::t('phrase', 'Selengkapnya');?></a>
		</div>	
		<?php }?>
	</div>
	<!-- End Inner -->
</section>
<!-- End Clients -->
<?php }?>
