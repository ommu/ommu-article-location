<?php
/**
 * Article Locations (article-locations)
 * @var $this AdminController
 * @var $model ArticleLocations
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 18 October 2016, 02:29 WIB
 * @link https://github.com/ommu/plu-article-location
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Article Locations'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'media_file_type'=>$media_file_type,
)); ?>