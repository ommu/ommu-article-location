<?php
/**
 * Sync Posts (sync-post)
 * @var $this PostController
 * @var $model SyncPost
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 18 October 2016, 14:50 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<ul>
		<li>
			<?php echo $model->getAttributeLabel('id'); ?><br/>
			<?php echo $form->textField($model,'id'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('title'); ?><br/>
			<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('author'); ?><br/>
			<?php echo $form->textField($model,'author',array('size'=>32,'maxlength'=>32)); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('description'); ?><br/>
			<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('thumbnail'); ?><br/>
			<?php echo $form->textArea($model,'thumbnail',array('rows'=>6, 'cols'=>50)); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('post_flag'); ?><br/>
			<?php echo $form->textField($model,'post_flag'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('post_status'); ?><br/>
			<?php echo $form->textField($model,'post_status',array('size'=>1,'maxlength'=>1)); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('post_date'); ?><br/>
			<?php echo $form->textField($model,'post_date'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('hits'); ?><br/>
			<?php echo $form->textField($model,'hits',array('size'=>20,'maxlength'=>20)); ?>
		</li>

		<li class="submit">
			<?php echo CHtml::submitButton(Yii::t('phrase', 'Search')); ?>
		</li>
	</ul>
<?php $this->endWidget(); ?>
