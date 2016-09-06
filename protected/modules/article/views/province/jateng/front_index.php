<div class="main clearfix">
	<h4 class="center">AGENDA BUDAYA</h4>
	<div class="schedule clearfix">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<span class="date">25 Oktober 2017</span>
			Ut enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor in
			<span class="place">Taman Ismail Marzuki, Jakarta</span>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<span class="date">25 Oktober 2017</span>
			Ut enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor inUt enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor in
			<span class="place">Taman Ismail Marzuki, Jakarta</span>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<span class="date">25 Oktober 2017</span>
			Ut enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor in
			<span class="place">Taman Ismail Marzuki, Jakarta</span>
		</div>
	</div>
	<div class="article-list pt-20 pb-20 clearfix">
		<?php for ($i = 1; $i <= 2; $i++) { ?>
			<div class="col-md-4 col-sm-4 col-xs-6 box">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-1.jpg';?>">
				<span class="date">17 Agusuts 2016</span>
				<a href="<?php echo Yii::app()->controller->createUrl('article/view')?>" class="title">Ut enim ad minim veniam, quis nostrud exercitation</a>
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			</div>
			<div class="col-md-4 col-sm-4 col-xs-6 box">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-1.jpg';?>">
				<span class="date">17 Agusuts 2016</span>
				<a href="" class="title">Ut enim ad minim veniam, quis nostrud exercitation</a>
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			</div>
			<div class="col-md-4 col-sm-4 col-xs-6 box">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-1.jpg';?>">
				<span class="date">17 Agusuts 2016</span>
				<a href="" class="title">Ut enim ad minim</a>
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			</div>
		<?php } ?>
		<div class="clear"></div>
	</div>
</div>
