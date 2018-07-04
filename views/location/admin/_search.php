<?php
/**
 * Article Locations (article-locations)
 * @var $this AdminController
 * @var $model ArticleLocations
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (www.ommu.co)
 * @created date 18 October 2016, 02:29 WIB
 * @link https://github.com/ommu/ommu-article-location
 *
 */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<ul>
		<li>
			<?php echo $model->getAttributeLabel('location_id'); ?><br/>
			<?php echo $form->textField($model,'location_id'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('publish'); ?><br/>
			<?php echo $form->textField($model,'publish'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('province_id'); ?><br/>
			<?php echo $form->textField($model,'province_id'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('province_code'); ?><br/>
			<?php echo $form->textField($model,'province_code'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('province_desc'); ?><br/>
			<?php echo $form->textField($model,'province_desc'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('province_photo'); ?><br/>
			<?php echo $form->textField($model,'province_photo'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('province_header_photo'); ?><br/>
			<?php echo $form->textField($model,'province_header_photo'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_name'); ?><br/>
			<?php echo $form->textField($model,'office_name'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_location'); ?><br/>
			<?php echo $form->textField($model,'office_location'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_place'); ?><br/>
			<?php echo $form->textField($model,'office_place'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_country'); ?><br/>
			<?php echo $form->textField($model,'office_country'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_city'); ?><br/>
			<?php echo $form->textField($model,'office_city'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_district'); ?><br/>
			<?php echo $form->textField($model,'office_district'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_village'); ?><br/>
			<?php echo $form->textField($model,'office_village'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_zipcode'); ?><br/>
			<?php echo $form->textField($model,'office_zipcode'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_phone'); ?><br/>
			<?php echo $form->textField($model,'office_phone'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_fax'); ?><br/>
			<?php echo $form->textField($model,'office_fax'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('office_email'); ?><br/>
			<?php echo $form->textField($model,'office_email'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('creation_date'); ?><br/>
			<?php echo $form->textField($model,'creation_date'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('creation_id'); ?><br/>
			<?php echo $form->textField($model,'creation_id'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('modified_date'); ?><br/>
			<?php echo $form->textField($model,'modified_date'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('modified_id'); ?><br/>
			<?php echo $form->textField($model,'modified_id'); ?>
		</li>

		<li class="submit">
			<?php echo CHtml::submitButton(Yii::t('phrase', 'Search')); ?>
		</li>
	</ul>
<?php $this->endWidget(); ?>
