<?php
/**
 * Article Locations (article-locations)
 * @var $this AdminController
 * @var $model ArticleLocations
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (www.ommu.co)
 * @created date 18 October 2016, 02:29 WIB
 * @link https://github.com/ommu/ommu-article-location
 *
 */

	$this->breadcrumbs=array(
		'Article Locations'=>array('manage'),
		$model->location_id,
	);
?>

<div class="dialog-content">
	<?php $this->widget('application.libraries.core.components.system.FDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'name'=>'location_id',
				'value'=>$model->location_id,
			),
			array(
				'name'=>'publish',
				'value'=>$model->publish == '1' ? CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/publish.png') : CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/unpublish.png'),
				'type' => 'raw',
			),
			array(
				'name'=>'province_id',
				'value'=>$model->province_id ? $model->province->province_name : '-',
			),
			array(
				'name'=>'province_code',
				'value'=>$model->province_code ? $model->province_code : '-',
			),
			array(
				'name'=>'province_desc',
				'value'=>$model->province_desc ? $model->province_desc : '-',
			),
			array(
				'name'=>'province_photo',
				'value'=>$model->province_photo ? $model->province_photo : '-',
			),
			array(
				'name'=>'province_header_photo',
				'value'=>$model->province_header_photo ? $model->province_header_photo : '-',
			),
			array(
				'name'=>'office_name',
				'value'=>$model->office_name ? $model->office_name : '-',
			),
			array(
				'name'=>'office_location',
				'value'=>$model->office_location ? $model->office_location : '-',
			),
			array(
				'name'=>'office_place',
				'value'=>$model->office_place ? $this->renderPartial('_view_address', array('model'=>$model), true, false) : '-',
				'type'=>'raw',
			),
			array(
				'name'=>'office_phone',
				'value'=>$model->office_phone ? $model->office_phone : '-',
			),
			array(
				'name'=>'office_fax',
				'value'=>$model->office_fax ? $model->office_fax : '-',
			),
			array(
				'name'=>'office_email',
				'value'=>$model->office_email ? $model->office_email : '-',
			),
			array(
				'name'=>'creation_date',
				'value'=>!in_array($model->creation_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')) ? Utility::dateFormat($model->creation_date, true) : '-',
			),
			array(
				'name'=>'creation_id',
				'value'=>$model->creation->displayname ? $model->creation->displayname : '-',
			),
			array(
				'name'=>'modified_date',
				'value'=>!in_array($model->modified_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')) ? Utility::dateFormat($model->modified_date, true) : '-',
			),
			array(
				'name'=>'modified_id',
				'value'=>$model->modified->displayname ? $model->modified->displayname : '-',
			),
		),
	)); ?>
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
