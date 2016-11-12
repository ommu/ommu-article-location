<?php if($model != null) {?>
<!-- Team Section -->
<section id="team" class="container type-2 <?php echo $this->theme != null && $this->theme == 'dark' ? 'dark-bg' : '';?>">
    <!-- Featured Works Inner -->
    <div class="inner t-center">
        <!-- Header -->
        <h2 class="header header-style-1 <?php echo $this->theme != null && $this->theme == 'dark' ? 'white' : 'dark';?> semibold uppercase animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">
            <?php echo strtoupper(Phrase::trans($model[0]->cat->name, 2));?>
        </h2>
        <!-- Header Text -->
        <p class="light animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">
            <?php echo Phrase::trans($model[0]->cat->desc, 2);?>
        </p>
        <!-- Team Boxes -->
        <div class="team-boxes box-carousel antialiased four-items clearfix">
			<?php 
			$i = 0;
			foreach($model as $key => $val) {
				$i++;?>
            <!-- Team Box -->
            <div class="team-box animated" data-animation="fadeIn" data-animation-delay="300">
                <!-- Image Area -->
                <div class="member-image fullwidth">
					<?php 
					$medias = $val->medias;
					$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
					if(!empty($medias))
						$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$medias[0]->media;?>
                    <!-- Image Way -->
                   <img src="<?php echo Utility::getTimThumb($image, 420, 300, 1)?>" alt="<?php echo $val->title;?>" />
                </div>
                <!-- Member Details -->
                <div class="member-details light">
                    <!-- Name -->
                    <h3>
                        <?php echo Utility::shortText($val->title, 60);?>
                    </h3>
                    <!-- Position -->
                    <h5>
                       <?php echo $val->views->location_id != null ? $val->views->location->province_relation->province : Yii::t('phrase', 'Indonesia');?>
                    </h5>
                    <!-- Strip -->
                    <div class="strip"></div>
                    <!-- Member Description -->
                    <p class="normal">
                        <?php echo Utility::shortText(Utility::hardDecode($val->body), 120);?>
                    </p>
                    <!-- Socials -->
					<?php /*
                    <div class="socials">
                        <!-- Social Link -->
                        <a href="#">
                        <i class="fa fa-facebook"></i>
                        </a>
                        <!-- Social Link -->
                        <a href="#">
                        <i class="fa fa-twitter"></i>
                        </a>
                        <!-- Social Link -->
                        <a href="#">
                        <i class="fa fa-pinterest"></i>
                        </a>
                    </div>
					*/?>
                    <!-- View More Button -->
					<?php if($this->location == null)
						$link = 'article/site/view';
					else
						$link = $val->views->location->province_code.'/view';?>
                    <a href="<?php echo Yii::app()->createUrl($link, array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" data-toggle="modal" data-target="#member<?php echo $i;?>" class="member-more uppercase normal team_modal"><?php echo Yii::t('phrase', 'Selengkapnya');?></a>
                </div>
                <!-- End Member Details -->
            </div>
            <!-- End Box -->
			<?php }?>
        </div>
        <!-- End Boxes -->
    </div>
    <!-- End Inner -->
    <!-- Member Modals -->
    <div id="member-modals">
		<?php 
		$i = 0;
		foreach($model as $key => $val) {
			$i++;?>
        <!-- Modal -->
        <div class="modal fade" id="member<?php echo $i;?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h2 class="member-header extra-light">
                           <?php echo $val->title;?>
                        </h2>
                        <!-- Member Position -->
                        <h4 class="member-position extra-light colored">
                            <?php echo $val->views->location_id != null ? $val->views->location->province_relation->province : Yii::t('phrase', 'Indonesia');?>
                        </h4>
                        <!-- Description -->
                        <p class="no-padding extra-light">
                            <?php echo $val->body;?>
                        </p>
                    </div>
                    <!-- End Details -->
                </div>
                <!-- End Body -->
            </div>
            <!-- End Dialog -->
        </div>
        <!-- End Modal -->
		<?php }?>
    </div>
    <!-- End Modals -->
</section>
<!-- End Team Section -->
<?php }?>