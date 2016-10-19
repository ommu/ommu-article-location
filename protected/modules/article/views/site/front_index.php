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

	$cs = Yii::app()->getClientScript(); 
	$cs->registerCssFile(/*flexslider-css'*/Yii::app()->theme->baseUrl.'/css/flexslider.min.css?ver=4.11.2');
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/1q1ZOZ4WCgjHiPtheevOtDCH7uI7Us22l5Gh8_fME.js', CClientScript::POS_END);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9BPLkqtyCzWzwKiwtLUokq93MT0vMy0zGTdgvyC0gK93Mw8AA.js', CClientScript::POS_END);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9BPLkqtyCzWzwKiwtLUokq9tJzUiuKczJTUIt3czDwdAyQVJeWpqcn5-TkA.js', CClientScript::POS_END);

	$this->breadcrumbs=array(
		'Articles',
	);
?>

<?php $this->widget('application.components.system.FListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'pager' => array(
		'header' => '',
	), 
	'summaryText' => '',
	'itemsCssClass' => 'items clearfix blog-inner blog-style-classic blog-items boxed',
	'pagerCssClass'=>'pager clearfix col-md-12 blog-pagination pagination block t-center',
)); ?>