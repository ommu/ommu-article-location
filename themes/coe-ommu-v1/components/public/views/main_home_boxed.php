<!-- Home Section -->
<section id="home" class="home container">
    <!-- Ful Screen Slider -->
    <div id="fullscreen">
        <!-- Slides -->
        <div class="slides-container relative">
            <!-- Slider Images -->
			<?php if($banner != null) {
				foreach($banner as $key => $val) {?>
				<div class="background46 xxdark-bg parallax" style="background-image:url(<?php echo Utility::getProtocol().'://'.Yii::app()->request->serverName.Yii::app()->request->baseUrl.'/public/banner/'.$val->media;?>);"></div>
			<?php }
			} else {?>
				<div class="background46 xxdark-bg parallax"></div>
			<?php }?>
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
				foreach($model as $key => $val) {
					if($val->view->article_id != null) {?>
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
					}
				}?>
                <!-- Box -->
				<?php if($social != null) {?>
                <div  class="box socials inline-block">
                    <!-- Header -->
                    <h2 class="white thin">
                        Follow Us On Social Networks!
                    </h2>
                    <!-- Socials -->
                    <p class="white thin">
						<?php foreach($social as $key => $val) {?>
                        <a href="<?php echo $val->value;?>" target="_blank" class="social inline-block" title="<?php echo Phrase::trans($val->cat->name, 2);?>">
							<i class="fa <?php echo $val->contact_icon != '' ? $val->contact_icon : 'fa-star';?>"></i>
                        </a>
						<?php }?>
                    </p>
                </div>
				<?php }?>
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
        <a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>$about->page_id,'t'=>Utility::getUrlTitle(Phrase::trans($about->name, 2))));?>" title="<?php echo Phrase::trans($about->name, 2);?>" class="scroll">
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