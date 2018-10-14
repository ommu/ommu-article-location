<?php
/**
 * Article Location Setting (article-location-setting)
 * @var $this SettingController
 * @var $model ArticleLocationSetting
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (www.ommu.co)
 * @created date 19 Juny 2017, 04:10 WIB
 * @link https://github.com/ommu/ommu-article-location
 *
 */

	$this->breadcrumbs=array(
		'Article Location Settings'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		Yii::t('phrase', 'Update'),
	);
?>

<div class="form" name="post-on">
	<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
		'location'=>$location,
	)); ?>
</div>
