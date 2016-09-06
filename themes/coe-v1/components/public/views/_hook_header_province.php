<?php
$controller = strtolower(Yii::app()->controller->id);
$action = strtolower(Yii::app()->controller->action->id);
$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
?>
<nav class="main-nav <?php echo $controller; ?>">
    <div class="container">
        <div class="col-md-3 col-sm-3 col-xs-4">
            <a href="<?php echo Yii::app()->controller->createUrl('index')?>" class="logo">
				<?php if($controller == 'jateng'){ ?>
					<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/logo-jateng.png';?>">
				<?php } else if($controller == 'banten'){ ?>
					<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/logo-banten.png';?>">
				<?php } else if($controller == 'jabar'){ ?>
					<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/logo-jabar.png';?>">
				<?php } else if($controller == 'jatim'){ ?>
					<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/logo-jatim.png';?>">
				<?php } else if($controller == 'yogyakarta'){ ?>
					<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/logo-yogyakarta.png';?>">
				<?php } else if($controller == 'jakarta'){ ?>
					<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/logo-jakarta.png';?>">
				<?php } ?>
            </a>
        </div>
         <ul class="menu col-md-6">
            <li><a href="<?php echo Yii::app()->controller->createUrl($controller.'/article')?>" class="<?php echo(in_array($action, array('article', 'viewarticle'))  ? 'active' : '');?>">Berita</a></li>
            <li><a href="">Berita II</a></li>
            <li><a href="">Berita III</a></li>
        </ul>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <a href="" class="search"><i class="fa fa-search"></i></a>
        </div>
        <div class="clear"></div>
    </div>
    <a class="responsive-menu" href="javascript:void(0);"></a>
</nav>
<?php if($action == 'index') {
    $this->widget('_HookSliderProvince');
} ?>
