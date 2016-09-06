<?php
	$module = strtolower(Yii::app()->controller->module->id);
$current = strtolower(Yii::app()->controller->id);
$action = strtolower(Yii::app()->controller->action->id);
$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
?>
<nav class="main-nav <?php echo($currentAction == 'site/view' ?'dark':'');?>">
    <div class="container">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <a href="<?php echo Yii::app()->createUrl('site/index')?>" class="logo">
                <img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/logo-coe.png';?>">
            </a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <a href="" class="search"><i class="fa fa-search"></i></a>
        </div>
        <div class="clear"></div>
        <ul class="menu">
            <li><a href="<?php echo Yii::app()->createUrl('article/site/index')?>" class="<?php echo($current == 'article' ? 'active' : '');?>">Berita</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('article/site/index', array('sidebar'=>'on'))?>">Ragam Budaya</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('article/site/index', array('sidebar'=>'on'))?>">Pahlawan Budaya</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('article/site/index', array('sidebar'=>'on'))?>">Agenda Budaya</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('article/site/index', array('sidebar'=>'on'))?>">Tempat Belajar</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('article/site/index', array('sidebar'=>'on'))?>">Budaya Versi Kamu</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('site/about')?>" class="<?php echo($currentAction == 'site/about' ? 'active' : '');?>">About COE</a></li>
        </ul>
    </div>
    <a class="responsive-menu" href="javascript:void(0);"></a>
</nav>
<?php if($currentAction == 'site/index') {
    $this->widget('_HookSlider');
} else if($currentAction != 'site/view') { ?>
    <img class="bg-img" src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/bg-img.jpg';?>">
<?php } ?>
