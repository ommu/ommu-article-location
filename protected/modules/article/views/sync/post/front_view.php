<?php
/**
 * Sync Posts (sync-post)
 * @var $this PostController
 * @var $model SyncPost
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 18 October 2016, 14:50 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Sync Posts'=>array('manage'),
		$model->title,
	);
?>

<?php //begin.Messages ?>
<?php
if(Yii::app()->user->hasFlash('success'))
	echo Utility::flashSuccess(Yii::app()->user->getFlash('success'));
?>
<?php //end.Messages ?>

<?php $this->widget('application.components.system.FDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'id',
			'value'=>$model->id,
			//'value'=>$model->id != '' ? $model->id : '-',
		),
		array(
			'name'=>'title',
			'value'=>$model->title,
			//'value'=>$model->title != '' ? $model->title : '-',
		),
		array(
			'name'=>'author',
			'value'=>$model->author,
			//'value'=>$model->author != '' ? $model->author : '-',
		),
		array(
			'name'=>'description',
			'value'=>$model->description != '' ? $model->description : '-',
			//'value'=>$model->description != '' ? CHtml::link($model->description, Yii::app()->request->baseUrl.'/public/visit/'.$model->description, array('target' => '_blank')) : '-',
			'type'=>'raw',
		),
		array(
			'name'=>'thumbnail',
			'value'=>$model->thumbnail != '' ? $model->thumbnail : '-',
			//'value'=>$model->thumbnail != '' ? CHtml::link($model->thumbnail, Yii::app()->request->baseUrl.'/public/visit/'.$model->thumbnail, array('target' => '_blank')) : '-',
			'type'=>'raw',
		),
		array(
			'name'=>'post_flag',
			'value'=>$model->post_flag,
			//'value'=>$model->post_flag != '' ? $model->post_flag : '-',
		),
		array(
			'name'=>'post_status',
			'value'=>$model->post_status,
			//'value'=>$model->post_status != '' ? $model->post_status : '-',
		),
		array(
			'name'=>'post_date',
			'value'=>!in_array($model->post_date, array('0000-00-00','1970-01-01')) ? Utility::dateFormat($model->post_date) : '-',
		),
		array(
			'name'=>'hits',
			'value'=>$model->hits,
			//'value'=>$model->hits != '' ? $model->hits : '-',
		),
	),
)); ?>

<div class="dialog-content">
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
