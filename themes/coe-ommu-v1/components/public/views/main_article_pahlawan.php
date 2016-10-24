<?php if($model != null) {?>
<div data-vc-parallax="2" class="vc_row wpb_row vc_row-fluid vc_custom_1460456899880 vc_row-has-fill vntd-section-white vc_general vc_parallax vc_parallax-content-moving">
	<div class="bg-overlay bg-overlay-dark80"></div>
	<div class="inner">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="vntd-special-heading special-heading-align-center heading-separator-bottom" style="margin-bottom:12px;">
						<h1 class="header  georgia font-size-40px georgia font-weight-400" ><?php echo strtoupper(Phrase::trans($model[0]->cat->name, 2));?></h1>
						<p class="subtitle light " ><?php echo Phrase::trans($model[0]->cat->desc, 2);?></p>
					</div>
					<div class="vntd-carousel-holder t-center clients ">
						<div class="vntd-carousel vntd-testimonials-carousel testimonial-style-simple boxes-type-4 boxes light box-carousel three-items clearfix">
							<?php foreach($model as $key => $val) {?>
							<div class="box georgia">
								<!-- Box Image -->
								<div class="box-image fullwidth t-center normal">
									<?php 
									$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
									if($val->media_id != 0)
										$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$val->cover->media;?>
									<!-- Image -->
									<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" class="changeable-image">
										<img src="<?php echo Utility::getTimThumb($image, 100, 100, 1)?>" alt="<?php echo $val->title?>">
									</a>
								</div>
								<!-- End Box Icon -->
								<!-- Box Header -->
								<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>">
									<h4 class="box-header no-padding uppercase georgia">
										<?php echo $val->title?>
									</h4>
								</a>
								<?php /*
								<!-- Position -->
								<h5 class="colored ">
									Ceo/Company			
								</h5>
								*/?>
								<!-- Box Description -->
								<p class="no-padding no-margin raleway testimonial-content"><?php echo Utility::shortText(Utility::hardDecode($val->body), 150);?></p>
								<!-- Red More Button -->
								<br/>
								<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" class="post_read_more_button ex-link uppercase">Read More</a>
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
