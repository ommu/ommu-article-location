<?php
/**
 * Article Location Setting (article-location-setting)
 * @var $this SettingController
 * @var $model ArticleLocationSetting
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @created date 19 Juny 2017, 04:10 WIB
 * @link https://github.com/ommu/plu-article-location
 * @contact (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Article Location Settings'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>

<div class="form" name="post-on">
	<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
		'location'=>$location,
	)); ?>
</div>
