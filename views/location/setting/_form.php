<?php
/**
 * Article Location Setting (article-location-setting)
 * @var $this SettingController
 * @var $model ArticleLocationSetting
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@ommu.co>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (www.ommu.co)
 * @created date 19 Juny 2017, 04:10 WIB
 * @link https://github.com/ommu/ommu-article-location
 *
 */

	$cs = Yii::app()->getClientScript();
$js=<<<EOP
	$('input[name="ArticleLocationSetting[media_resize]"]').on('change', function() {
		var id = $(this).val();
		if(id == '1') {
			$('div#resize_size').slideDown();
		} else {
			$('div#resize_size').slideUp();
		}
	});
EOP;
	$cs->registerScript('js', $js, CClientScript::POS_END);
?>

<?php $form=$this->beginWidget('application.libraries.yii-traits.system.OActiveForm', array(
	'id'=>'article-location-setting-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php //begin.Messages ?>
	<div id="ajax-message">
		<?php echo $form->errorSummary($model); ?>
	</div>
	<?php //begin.Messages ?>

	<fieldset>

		<div class="clearfix">
			<label>
				<?php echo $model->getAttributeLabel('license');?> <span class="required">*</span><br/>
				<span><?php echo Yii::t('phrase', 'Enter the your license key that is provided to you when you purchased this plugin. If you do not know your license key, please contact support team.');?></span>
			</label>
			<div class="desc">
				<?php if($model->isNewRecord || (!$model->isNewRecord && $model->license == '')) {
					$model->license = $this->licenseCode();
					echo $form->textField($model,'license', array('maxlength'=>32,'class'=>'span-4'));
				} else
					echo $form->textField($model,'license', array('maxlength'=>32,'class'=>'span-4','disabled'=>'disabled'));?>
				<?php echo $form->error($model,'license'); ?>
				<div class="small-px"><?php echo Yii::t('phrase', 'Format: XXXX-XXXX-XXXX-XXXX');?></div>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'permission'); ?>
			<div class="desc">
				<div class="small-px"><?php echo Yii::t('phrase', 'Select whether or not you want to let the public (visitors that are not logged-in) to view the following sections of your social network. In some cases (such as Profiles, Blogs, and Albums), if you have given them the option, your users will be able to make their pages private even though you have made them publically viewable here. For more permissions settings, please visit the General Settings page.');?></div>
				<?php if($model->isNewRecord && !$model->getErrors())
					$model->permission = 1;
				echo $form->radioButtonList($model, 'permission', array(
					1 => Yii::t('phrase', 'Yes, the public can view articles unless they are made private.'),
					0 => Yii::t('phrase', 'No, the public cannot view articles.'),
				)); ?>
				<?php echo $form->error($model,'permission'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'meta_description'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'meta_description', array('rows'=>6, 'cols'=>50, 'class'=>'span-7 smaller')); ?>
				<?php echo $form->error($model,'meta_description'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'meta_keyword'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'meta_keyword', array('rows'=>6, 'cols'=>50, 'class'=>'span-7 smaller')); ?>
				<?php echo $form->error($model,'meta_keyword'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'gridview_column'); ?>
			<div class="desc">
				<?php 
				$customField = array(
					'creation_search' => $location->getAttributeLabel('creation_search'),
					'creation_date' => $location->getAttributeLabel('creation_date'),
					'tag_i' => $location->getAttributeLabel('tag_i'),
					'user_i' => $location->getAttributeLabel('user_i'),
					'address_search' => $location->getAttributeLabel('address_search'),
					'email_search' => $location->getAttributeLabel('email_search'),
					'phone_search' => $location->getAttributeLabel('phone_search'),
					'photo_search' => $location->getAttributeLabel('photo_search'),
					'photo_header_search' => $location->getAttributeLabel('photo_header_search'),
				);
				if(!$model->getErrors())
					$model->gridview_column = unserialize($model->gridview_column);
				echo $form->checkBoxList($model,'gridview_column', $customField); ?>
				<?php echo $form->error($model,'gridview_column'); ?>
			</div>
		</div>

		<div class="clearfix">
			<label><?php echo Yii::t('phrase', 'Media Setting');?> <span class="required">*</span></label>
			<div class="desc">
				<p><?php echo $model->getAttributeLabel('media_resize');?></p>
				<?php if($model->isNewRecord && !$model->getErrors())
					$model->media_resize = 0;
				echo $form->radioButtonList($model, 'media_resize', array(
					0 => Yii::t('phrase', 'No, not resize media after upload.'),
					1 => Yii::t('phrase', 'Yes, resize media after upload.'),
				)); ?>
				
				<?php if(!$model->getErrors()) {
					$model->media_resize_size = unserialize($model->media_resize_size);
				}?>
				
				<div id="resize_size" class="mt-15 <?php echo $model->media_resize == 0 ? 'hide' : '';?>">
					<p><?php echo Yii::t('phrase', 'Photo Size');?></p>
					<?php echo Yii::t('phrase', 'Width').': ';?><?php echo $form->textField($model,'media_resize_size[photo][width]', array('maxlength'=>4,'class'=>'span-2')); ?>&nbsp;&nbsp;&nbsp;
					<?php echo Yii::t('phrase', 'Height').': ';?><?php echo $form->textField($model,'media_resize_size[photo][height]', array('maxlength'=>4,'class'=>'span-2')); ?>
					<?php echo $form->error($model,'media_resize_size[photo]'); ?>
					
					<p><?php echo Yii::t('phrase', 'Photo Header Size');?></p>
					<?php echo Yii::t('phrase', 'Width').': ';?><?php echo $form->textField($model,'media_resize_size[header][width]', array('maxlength'=>4,'class'=>'span-2')); ?>&nbsp;&nbsp;&nbsp;
					<?php echo Yii::t('phrase', 'Height').': ';?><?php echo $form->textField($model,'media_resize_size[header][height]', array('maxlength'=>4,'class'=>'span-2')); ?>
					<?php echo $form->error($model,'media_resize_size[header]'); ?>
				</div>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'media_file_type'); ?>
			<div class="desc">
				<?php 
				if(!$model->getErrors()) {
					$media_file_type = unserialize($model->media_file_type);
					if(!empty($media_file_type))
						$model->media_file_type = Utility::formatFileType($media_file_type, false);
					else
						$model->media_file_type = 'jpg, png, bmp';
				}
				echo $form->textField($model,'media_file_type', array('class'=>'span-6')); ?>
				<?php echo $form->error($model,'media_file_type'); ?>
				<div class="small-px">pisahkan jenis file dengan koma (,). example: "jpg, png, bmp"</div>
			</div>
		</div>

		<div class="submit clearfix">
			<label>&nbsp;</label>
			<div class="desc">
				<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save'), array('onclick' => 'setEnableSave()')); ?>
			</div>
		</div>

	</fieldset>
<?php $this->endWidget(); ?>
