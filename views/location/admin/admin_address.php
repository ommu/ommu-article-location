<?php
/**
 * Article Locations (article-locations)
 * @var $this AdminController
 * @var $model ArticleLocations
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@ommu.co>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (www.ommu.co)
 * @created date 18 October 2016, 02:29 WIB
 * @link https://github.com/ommu/ommu-article-location
 *
 */

	$this->breadcrumbs=array(
		'Article Locations'=>array('manage'),
		$model->location_id=>array('view','id'=>$model->location_id),
		Yii::t('phrase', 'Update'),
	);
?>

<div class="form">
<?php $form=$this->beginWidget('application.libraries.yii-traits.system.OActiveForm', array(
	'id'=>'article-locations-form',
	'enableAjaxValidation'=>true,
)); ?>
	<?php //begin.Messages ?>
	<div id="ajax-message">
		<?php echo $form->errorSummary($model); ?>
		<?php
		if(Yii::app()->user->hasFlash('error'))
			echo $this->flashMessage(Yii::app()->user->getFlash('error'), 'error');
		if(Yii::app()->user->hasFlash('success'))
			echo $this->flashMessage(Yii::app()->user->getFlash('success'), 'success');
		?>
	</div>
	<?php //begin.Messages ?>
	
	<fieldset>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'office_name'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'office_name', array('maxlength'=>64, 'class'=>'span-4')); ?>
				<?php echo $form->error($model,'office_name'); ?>
			</div>
		</div>
		
		<div class="clearfix">
			<label><?php echo $model->getAttributeLabel('office_location');?> <span class="required">*</span></label>
			<div class="desc">
				<?php echo $form->textField($model,'office_location', array('maxlength'=>32, 'class'=>'span-4')); ?>
				<?php echo $form->error($model,'office_location'); ?>
				<div class="small-px"><?php echo Yii::t('phrase', 'A struct containing metadata defining the location of a place');?></div>
			</div>
		</div>

		<div class="clearfix">
			<label><?php echo $model->getAttributeLabel('office_place');?> <span class="required">*</span></label>
			<div class="desc">
				<?php echo $form->textArea($model,'office_place', array('rows'=>6, 'cols'=>50, 'class'=>'span-8 smaller')); ?>
				<div class="pt-10"></div>
				<?php echo $form->textField($model,'office_village', array('maxlength'=>32, 'class'=>'span-4', 'placeholder'=>$model->getAttributeLabel('office_village'))); ?>
				<?php echo $form->textField($model,'office_district', array('maxlength'=>32, 'class'=>'span-4', 'placeholder'=>$model->getAttributeLabel('office_district'))); ?>
				<?php echo $form->error($model,'office_place'); ?>
				<div class="small-px"><?php echo Yii::t('phrase', 'The number, street, district and village of the postal address for this business');?></div>
			</div>
		</div>
		
		<div class="clearfix">
			<label><?php echo $model->getAttributeLabel('office_city');?> <span class="required">*</span></label>
			<div class="desc">
				<?php 
				$province_id = $model->province_id ? $model->province_id : null;
				echo $form->dropDownList($model,'office_city', OmmuZoneCity::getCity($province_id)); ?>
				<?php echo $form->error($model,'office_city'); ?>
				<div class="small-px"><?php echo Yii::t('phrase', 'The city (or locality) line of the postal address for this business');?></div>
			</div>
		</div>
		
		<div class="clearfix">
			<label><?php echo $model->getAttributeLabel('province_id');?> <span class="required">*</span></label>
			<div class="desc">
				<?php 				
				$office_country = $model->office_country ? $model->office_country : null;
				echo $form->dropDownList($model,'province_id', OmmuZoneProvince::getProvince($office_country)); ?>
				<?php echo $form->error($model,'province_id'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'office_zipcode'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'office_zipcode', array('maxlength'=>6, 'class'=>'span-3')); ?>
				<?php echo $form->error($model,'office_zipcode'); ?>
				<div class="small-px"><?php echo Yii::t('phrase', 'The postcode (or ZIP code) of the postal address for this business');?></div>
			</div>
		</div>

		<div class="clearfix">
			<label><?php echo $model->getAttributeLabel('office_phone');?> <span class="required">*</span></label>
			<div class="desc">
				<?php echo $form->textField($model,'office_phone', array('maxlength'=>32, 'class'=>'span-5')); ?>
				<?php echo $form->error($model,'office_phone'); ?>
				<div class="small-px"><?php echo Yii::t('phrase', 'A telephone number to contact this business');?></div>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'office_fax'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'office_fax', array('maxlength'=>32, 'class'=>'span-5')); ?>
				<?php echo $form->error($model,'office_fax'); ?>
				<div class="small-px"><?php echo Yii::t('phrase', 'A fax number to contact this business');?></div>
			</div>
		</div>
		
		<div class="clearfix">
			<label><?php echo $model->getAttributeLabel('office_email');?> <span class="required">*</span></label>
			<div class="desc">
				<?php echo $form->textField($model,'office_email', array('maxlength'=>32, 'class'=>'span-5')); ?>
				<?php echo $form->error($model,'office_email'); ?>
				<div class="small-px"><?php echo Yii::t('phrase', 'An email address to contact this business');?></div>
			</div>
		</div>
		
		<div class="submit clearfix">
			<label>&nbsp;</label>
			<div class="desc">
				<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save'), array('onclick' => 'setEnableSave()')); ?>
			</div>
		</div>
	</fieldset>
</div>

<?php $this->endWidget(); ?>