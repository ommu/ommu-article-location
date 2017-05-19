<?php
/**
 * @var $this SiteController
 * version: 1.2.0
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2012 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/Core
 * @contact (+62)856-299-4114
 *
 */

	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');
?>

<?php $this->widget('MainHome', array(
	'layout'=>'main_home_boxed',
)); ?>

<?php $this->widget('MainArticleLocation'); ?>

<?php $this->widget('MainArticle', array(
	'layout'=>'main_article_landscape',
	'category'=>2,
	'limit'=>4,
)); ?>

<?php $this->widget('MainArticleCollection', array(
	'theme'=>'dark',
	'limit'=>8,
)); ?>

<?php $this->widget('MainArticle', array(
	'layout'=>'main_article_box',
	'category'=>4,
	'limit'=>6,
)); ?>

<?php $this->widget('MainArticle', array(
	'layout'=>'main_article_radio',
	'theme'=>'dark',
	'category'=>3,
	'limit'=>6,
)); ?>

<?php $this->widget('MainArticle', array(
	'category'=>1,
	'limit'=>6,
)); ?>