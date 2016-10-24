<?php if($model != null) {?>
<div class="vc_row wpb_row vc_row-fluid vc_custom_1456304985147">
	<div class="inner">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="vntd-special-heading special-heading-align-center heading-no-separator" style="margin-bottom:12px;">
						<h1 class="header  georgia font-size-40px georgia font-weight-400" ><?php echo strtoupper(Phrase::trans($model[0]->cat->name, 2));?></h1>
						<p class="subtitle light"><?php echo Phrase::trans($model[0]->cat->desc, 2);?></p>
					</div>
					<div class="vntd-carousel-holder news">
						<div class="vntd-carousel vntd-blog-carousel blog-slider t-left box-carousel three-items vntd-blog">
							<?php foreach($model as $key => $val) {?>
							<div class="item box">
								<div class="inner-slider">
									<?php 
									$medias = $val->medias;
									if(!empty($medias)) {
										foreach($medias as $key => $row) {
											$image = Yii::app()->request->baseUrl.'/public/article/'.$row->article_id.'/'.$row->media;?>
											<div class="image"><a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$row->article_id, 't'=>Utility::getUrlTitle($row->title)))?>"><img src="<?php echo Utility::getTimThumb($image, 460, 276, 1)?>" alt=""></a></div>
										<?php }
									} else {
										$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';?>
										<div class="image"><a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>"><img src="<?php echo Utility::getTimThumb($image, 460, 276, 1)?>" alt=""></a></div>
									<?php }?>
								</div>
								<!-- Post Details -->
								<div class="details extra-light">
									<!-- Header -->
									<h3 class="no-padding"><a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>"><?php echo Utility::shortText($val->title, 40);?></a></h3>
									<!-- Post Details -->
									<p class="post-details">
										<i class="fa fa-clock-o"></i>
										on <?php echo Utility::dateFormat($val->published_date);?> <i class="fa fa-user"></i>
										Posted By <span class="colored"><?php echo $val->creation_relation->displayname?></span>
									</p>
									<!-- Post Message -->
									<p class="post_message">
									<p><?php echo Utility::shortText(Utility::hardDecode($val->body), 150);?></p>
									</p>
									<!-- Red More Button -->
									<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" class="post_read_more_button ex-link uppercase">Read More</a>
								</div>
								<!-- End Post Details -->
							</div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>
