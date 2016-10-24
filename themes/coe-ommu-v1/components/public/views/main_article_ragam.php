<?php if($model != null) {?>
<div id="team" class="vc_row wpb_row vc_row-fluid">
	<div class="inner">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="vntd-special-heading special-heading-align-center heading-separator" style="margin-bottom:35px;">
						<h1 class="header  font-primary uppercase font-size-30 font-primary font-weight-default" ><?php echo strtoupper(Phrase::trans($model[0]->cat->name, 2));?></h1>
						<p class="subtitle light " ><?php echo Phrase::trans($model[0]->cat->desc, 2);?></p>
					</div>
					<div class="vntd-team vntd-team-grid type-1">
						<div class="team-boxes clearfix">
							<?php foreach($model as $key => $val) {?>
							<div class="team-box animated col-md-4">
								<?php 
								$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
								if($val->media_id != 0)
									$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$val->cover->media;?>
								<!-- Image Area -->
								<div class="member-image fullwidth">
									<!-- Image Way -->
									<img src="<?php echo Utility::getTimThumb($image, 420, 300, 1)?>" alt="<?php echo $val->title;?>">
								</div>
								<!-- Member Details -->
								<div class="member-details light">
									<!-- Name -->
									<h3><?php echo Utility::shortText($val->title, 60);?></h3>
									<?php /*
									<!-- Position -->
									<p class="member-position">Ceo &amp; Founder</p>
									*/?>
									<!-- Strip -->
									<div class="strip"></div>
									<!-- Member Description -->
									<p class="normal">
										<?php echo Utility::shortText(Utility::hardDecode($val->body), 120);?>
									</p>
									<?php /*
									<!-- Socials -->
									<div class="socials">
										<a href="#" target="_blank" class="member-social facebook"><i class="fa fa-facebook"></i></a><a href="#" target="_blank" class="member-social twitter"><i class="fa fa-twitter"></i></a><a href="#" target="_blank" class="member-social pinterest"><i class="fa fa-pinterest"></i></a>				
									</div>
									*/?>
									<!-- View More Button -->
									<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>"data-toggle="modal" data-target="#member1" class="member-more uppercase normal team_modal">Read More</a>
								</div>
								<!-- End Member Details -->
							</div>
							<div id="member-modals" class="member-modals">
								<!-- Modal -->
								<div class="modal fade" id="member1" tabindex="-1" role="dialog" aria-hidden="true">
									<!-- Modal Dialog -->
									<div class="modal-dialog t-left">
										<!-- Body -->
										<div class="modal-body t-center clearfix">
											<!-- Close Button -->
											<a class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
											<!-- Image SRC -->
											<div class="member-image">
												<img src="<?php echo Utility::getTimThumb($image, 420, 341, 1)?>" alt="<?php echo $val->title;?>" />
											</div>
											<!-- Details -->
											<div class="details t-left">
												<!-- Member Name -->
												<h2 class="member-header light"><?php echo Utility::shortText($val->title, 60);?></h2>
												<?php /*
												<!-- Member Position -->
												<h4 class="member-position light colored">Ceo &amp; Founder</h4>
												*/?>
												<!-- Description -->
												<p class="no-padding light"><?php echo $val->body;?></p>
											</div>
											<!-- End Details -->
										</div>
										<!-- End Body -->
									</div>
									<!-- End Dialog -->
								</div>
								<!-- End Modal -->
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
