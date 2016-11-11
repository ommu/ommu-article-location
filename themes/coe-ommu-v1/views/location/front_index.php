<?php
/**
 * Articles (articles)
 * @var $this SiteController
 * @var $model Articles
 * @var $dataProvider CActiveDataProvider
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Articles
 * @contect (+62)856-299-4114
 *
 */
 
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');

	$this->breadcrumbs=array(
		'Articles',
	);
?>

<?php $this->widget('MainArticle', array(
	'layout'=>'main_article_landscape',
	'category'=>2,
	'limit'=>4,
	'location'=>$this->location_id,
)); ?>

<?php $this->widget('MainArticleCollection', array(
	'layout'=>'main_article_collection_desc',
	'theme'=>'dark',
	'limit'=>8,
	'location'=>$this->location_id,
)); ?>

<?php $this->widget('MainArticle', array(
	'layout'=>'main_article_box',
	'category'=>4,
	'limit'=>6,
	'location'=>$this->location_id,
)); ?>

<?php $this->widget('MainArticle', array(
	'layout'=>'main_article_radio',
	'theme'=>'dark',
	'category'=>3,
	'limit'=>6,
	'location'=>$this->location_id,
)); ?>