<div class="col-md-12 col-sm-12 col-xs-12 mt-25 mb-25">
	<h4 class="border-bottom mt-10 pb-10">BERITA</h4>
	<div class="article-list">
		<div class="col-md-12 col-sm-12 col-xs-12 box first">
			<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-1.jpg';?>">
			<span class="date right">17 Agusuts 2016</span>
			<a href="<?php echo Yii::app()->controller->createUrl('article/view')?>" class="title left">Ut enim ad minim veniam, quis nostrud exercitation</a>
			<div class="clear"></div>
			<div class="col-md-6 col-sm-6 col-xs-12 desc">
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia Excepteur sint occaecat cupidatat non proident
			</div>
			<div class="clear"></div>
		</div>
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
		<ul class="pagination" id="yw0">
			<li class="first"><a href="">&lt;&lt;</a></li>
			<li class="previous"><a href="">&lt;</a></li>
			<li class="page selected"><a href="">1</a></li>
			<li class="page"><a href="">2</a></li>
			<li class="next"><a href="">&gt;</a></li>
			<li class="last"><a href="">&gt;&gt;</a></li>
		</ul>
	</div>
</div>
<div class="clear"></div>
<div class="col-md-9 col-sm-9 col-xs-12 mt-25 mb-25">
	<h4 class="border-bottom mt-10 pb-10">BERITA</h4>
	<div class="article-list">
		<?php for ($i = 1; $i <= 2; $i++) { ?>
			<div class="col-md-6 col-sm-6 col-xs-6 box">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-1.jpg';?>">
				<span class="date">17 Agusuts 2016</span>
				<a href="<?php echo Yii::app()->controller->createUrl('article/view')?>" class="title">Ut enim ad minim veniam, quis nostrud exercitation</a>
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 box">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-1.jpg';?>">
				<span class="date">17 Agusuts 2016</span>
				<a href="" class="title">Ut enim ad minim veniam, quis nostrud exercitation</a>
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 box">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-1.jpg';?>">
				<span class="date">17 Agusuts 2016</span>
				<a href="" class="title">Ut enim ad minim</a>
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 box">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-1.jpg';?>">
				<span class="date">17 Agusuts 2016</span>
				<a href="" class="title">Ut enim ad minim veniam, quis nostrud exercitation</a>
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			</div>
		<?php } ?>
		<div class="clear"></div>
		<ul class="pagination" id="yw0">
			<li class="first"><a href="">&lt;&lt;</a></li>
			<li class="previous"><a href="">&lt;</a></li>
			<li class="page selected"><a href="">1</a></li>
			<li class="page"><a href="">2</a></li>
			<li class="next"><a href="">&gt;</a></li>
			<li class="last"><a href="">&gt;&gt;</a></li>
		</ul>
	</div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12 mt-25 mb-25">
	<?php $this->widget('_HookSidebar'); ?>
</div>
