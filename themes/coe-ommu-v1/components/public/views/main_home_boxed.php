<!-- Home Section -->
<section id="home" class="home container">
    <!-- Ful Screen Slider -->
    <div id="fullscreen">
        <!-- Slides -->
        <div class="slides-container relative">
            <!-- Slider Images -->
            <div class="background22 xxdark-bg parallax"></div>
            <div class="background24 xxdark-bg parallax"></div>
            <!-- End Slider Images -->	 
        </div>
        <!-- End Slides -->
        <!-- Slider Controls -->
        <nav class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-left"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-right"></i></a>
        </nav>
    </div>
    <!-- End Ful Screen Home -->
    <!-- Home Inner Details -->
    <div class="home-inner">
        <!-- Home Boxes -->
        <div class="home_boxes t-left">
            <!-- Texts -->
            <div class="home_boxes_texts">
                <!-- First -->
                <h2 class="white thin no-margin">
                    <?php echo Yii::t('phrase', 'Selamat Datang di CoE');?>
                </h2>
                <!-- Second, Big Text -->
                <h1 class="white thin">
                    <?php echo Yii::t('phrase', 'Centre Of Excellence <span>Budaya Jawa</span>');?>
                </h1>
                <!-- Third, Description -->
				<?php /*
                <p class="white thin no-margin">
                    Contrary to popular belief, Lorem Ipsum is not simply random text. piece of classical Latin literature
                </p>
				*/?>
            </div>
            <!-- End Texts -->
            <!-- Boxes -->
            <div class="boxes white-boxes box-carousel-dragable three-items">
				<?php if($model != null) {
				foreach($model as $key => $val) {?>
                <!-- Box -->
                <a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->view->article->article_id, 't'=>Utility::getUrlTitle($val->view->article->title)))?>" class="scroll box inline-block" title="<?php echo $val->view->article->title;?>">
                    <!-- Header -->
                    <h2 class="white thin">
                        <?php echo Utility::shortText($val->view->article->title, 30);?>
                    </h2>
                    <!-- Description -->
                    <p class="white thin">
                        <?php echo ucwords(strtolower(Phrase::trans($val->name, 2)));?>, <?php echo date('d', strtotime($val->view->article->published_date)).' '.Utility::getLocalMonthName($val->view->article->published_date).' '.date('Y', strtotime($val->view->article->published_date));?>
                    </p>
                </a>
                <!-- End Box -->
				<?php }
				}?>
                <!-- Box -->
                <div  class="box socials inline-block">
                    <!-- Header -->
                    <h2 class="white thin">
                        Follow Us On Social Networks!
                    </h2>
                    <!-- Socials -->
                    <p class="white thin">
                        <!-- Facebook -->
                        <a href="#" target="_blank" class="facebook social inline-block">
                        <i class="fa fa-facebook"></i>
                        </a>
                        <!-- Twitter -->
                        <a href="#" target="_blank" class="twitter social inline-block">
                        <i class="fa fa-twitter"></i>
                        </a>
                        <!-- Pinterest -->
                        <a href="#" target="_blank" class="pinterest social inline-block">
                        <i class="fa fa-pinterest"></i>
                        </a>
                        <!-- linkedin -->
                        <a href="#" target="_blank" class="linkedin social inline-block">
                        <i class="fa fa-linkedin"></i>
                        </a>
                        <!-- linkedin -->
                        <a href="#" target="_blank" class="flickr social inline-block">
                        <i class="fa fa-flickr"></i>
                        </a>
                    </p>
                </div>
                <!-- End Box -->
            </div>
            <!-- End Boxes -->
        </div>
        <!-- End Home Boxes -->
    </div>
    <!-- End Home Inner Details -->
    <!-- Home Bottom Note -->
    <div class="home-extra-note fullwidth t-center white thin absolute">
        <!-- Text Link -->
        <a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>$about->page_id,'t'=>Utility::getUrlTitle(Phrase::trans($about->name, 2))));?>" class="scroll">
            <!-- Bottom Text -->
			<?php /*
            <p>Crexis Stunning OnePage&amp;MultiPage Theme</p>
			*/?>
            <!-- Bottom Button -->
            <span class="home-button dark-button t-center home-circle-button fa fa-angle-down"></span>
        </a>
        <!-- End Text Link -->
    </div>
    <!-- End Home Bottom Note -->
</section>
<!-- End Home Section -->