<?php
/**
 * Article Locations (article-locations)
 * @var $this AdminController
 * @var $model ArticleLocations
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 18 October 2016, 02:29 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'article-locations-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'on_post' => '',
	)
)); ?>

<?php if($model->isNewRecord) {?>
	<div class="dialog-content">
<?php }?>

<?php if(!$model->isNewRecord) {?>
<?php //begin.Messages ?>
<div id="ajax-message">
	<?php echo $form->errorSummary($model); ?>
</div>
<?php //begin.Messages ?>
<?php }?>

<fieldset>

	<?php /*if($model->isNewRecord) {?>
	<?php //begin.Messages ?>
	<div id="ajax-message">
		<?php echo $form->errorSummary($model); ?>
	</div>
	<?php //begin.Messages ?>
	<?php }*/?>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'province_input'); ?>
		<div class="desc">
			<?php 
			//echo $form->textField($model,'province_id');
			$model->province_input = $model->province_relation->province;
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model' => $model,
				'attribute' => 'province_input',
				'source' => Yii::app()->createUrl('zoneprovince/suggest'),
				'options' => array(
					//'delay '=> 50,
					'minLength' => 1,
					'showAnim' => 'fold',
					'select' => "js:function(event, ui) {
						$('form #ArticleLocations_province_input').val(ui.item.value);
						$('form #ArticleLocations_province_id').val(ui.item.id);
					}"
				),
				'htmlOptions' => array(
					'class'	=> 'span-6',
				),
			));
			echo $form->error($model,'province_input');?>
			<?php echo $form->hiddenField($model,'province_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'province_code'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'province_code',array('maxlength'=>16,'class'=>'span-4')); ?>
			<?php echo $form->error($model,'province_code'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'province_desc'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'province_desc',array('class'=>'span-10 smaller')); ?>
			<?php echo $form->error($model,'province_desc'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'province_photo'); ?>
		<div class="desc">
			<?php 
			if(!$model->isNewRecord) {
				if(!$model->getErrors())
					$model->old_photo_input = $model->province_photo;
				echo $form->hiddenField($model,'old_photo_input');
				if($model->province_photo != '') {
					$file = Yii::app()->request->baseUrl.'/public/article/location/'.$model->old_photo_input;?>
					<img class="mb-15" src="<?php echo Utility::getTimThumb($file, 300, 400, 3);?>" alt="">					
			<?php }
			}
			echo $form->fileField($model,'province_photo'); ?>
			<?php echo $form->error($model,'province_photo'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'province_header_photo'); ?>
		<div class="desc">
			<?php 
			if(!$model->isNewRecord) {
				if(!$model->getErrors())
					$model->old_header_photo_input = $model->province_header_photo;
				echo $form->hiddenField($model,'old_header_photo_input');
				if($model->province_header_photo != '') {
					$file = Yii::app()->request->baseUrl.'/public/article/location/'.$model->old_header_photo_input;?>
					<img class="mb-15" src="<?php echo Utility::getTimThumb($file, 700, 250, 1);?>" alt="">					
			<?php }
			}
			echo $form->fileField($model,'province_header_photo'); ?>
			<?php echo $form->error($model,'province_header_photo'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>
	
	<?php if(!$model->isNewRecord) {?>
	<div class="clearfix">
		<?php echo $form->labelEx($model,'tag_input'); ?>
		<div class="desc">
			<?php 
			//echo $form->textField($model,'tag_input',array('maxlength'=>32,'class'=>'span-6'));
			$url = Yii::app()->controller->createUrl('location/tag/add', array('type'=>'article'));
			$location = $model->location_id;
			$tagId = 'ArticleLocations_tag_input';
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model' => $model,
				'attribute' => 'tag_input',
				'source' => Yii::app()->createUrl('globaltag/suggest'),
				'options' => array(
					//'delay '=> 50,
					'minLength' => 1,
					'showAnim' => 'fold',
					'select' => "js:function(event, ui) {
						$.ajax({
							type: 'post',
							url: '$url',
							data: { location_id: '$location', tag_id: ui.item.id, tag: ui.item.value },
							dataType: 'json',
							success: function(response) {
								$('form #$tagId').val('');
								$('form #tag-suggest').append(response.data);
							}
						});
					}"
				),
				'htmlOptions' => array(
					'class'	=> 'span-6',
				),
			));
			echo $form->error($model,'tag_input');?>
			<div id="tag-suggest" class="suggest clearfix">
				<?php
				if($tags != null) {
					foreach($tags as $key => $val) {?>
					<div><?php echo $val->tag->body;?><a href="<?php echo Yii::app()->controller->createUrl('location/tag/delete',array('id'=>$val->id,'type'=>'article'));?>" title="<?php echo Yii::t('phrase', 'Delete');?>"><?php echo Yii::t('phrase', 'Delete');?></a></div>
				<?php }
				}?>
			</div>
		</div>
	</div>
	<?php }?>
	
	<?php if(!$model->isNewRecord) {?>
	<div class="clearfix">
		<?php echo $form->labelEx($model,'user_input'); ?>
		<div class="desc">
			<?php 
			//echo $form->textField($model,'user_input',array('maxlength'=>32,'class'=>'span-6'));
			$url = Yii::app()->controller->createUrl('location/user/add', array('type'=>'article'));
			$location = $model->location_id;
			$userId = 'ArticleLocations_user_input';
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model' => $model,
				'attribute' => 'user_input',
				'source' => Yii::app()->createUrl('users/o/member/suggest'),
				'options' => array(
					//'delay '=> 50,
					'minLength' => 1,
					'showAnim' => 'fold',
					'select' => "js:function(event, ui) {
						$.ajax({
							type: 'post',
							url: '$url',
							data: { location_id: '$location', user_id: ui.item.id},
							dataType: 'json',
							success: function(response) {
								$('form #$userId').val('');
								$('form #user-suggest').append(response.data);
							}
						});
					}"
				),
				'htmlOptions' => array(
					'class'	=> 'span-6',
				),
			));
			echo $form->error($model,'user_input');?>
			<div id="user-suggest" class="suggest clearfix">
				<?php
				if($users != null) {
					foreach($users as $key => $val) {?>
					<div><?php echo $val->user->displayname;?><a href="<?php echo Yii::app()->controller->createUrl('location/user/delete',array('id'=>$val->id,'type'=>'article'));?>" title="<?php echo Yii::t('phrase', 'Delete');?>"><?php echo Yii::t('phrase', 'Delete');?></a></div>
				<?php }
				}?>
			</div>
		</div>
	</div>
	<?php }?>

	<div class="clearfix publish">
		<?php echo $form->labelEx($model,'publish'); ?>
		<div class="desc">
			<?php echo $form->checkBox($model,'publish'); ?>
			<?php if($model->isNewRecord) {?>
				<?php echo $form->labelEx($model,'publish'); ?>
			<?php }?>
			<?php echo $form->error($model,'publish'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<?php if(!$model->isNewRecord) {?>
		<div class="submit clearfix">
			<label>&nbsp;</label>
			<div class="desc">
				<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save'), array('onclick' => 'setEnableSave()')); ?>
			</div>
		</div>
	<?php }?>

</fieldset>

<?php if($model->isNewRecord) {?>
	</div>
	<div class="dialog-submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save') ,array('onclick' => 'setEnableSave()')); ?>
		<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
	</div>
<?php }?>

<?php $this->endWidget(); ?>


