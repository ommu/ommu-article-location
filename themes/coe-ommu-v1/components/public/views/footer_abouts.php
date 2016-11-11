<!-- Box -->
<div class="col-xs-3">
	<!-- Header -->
	<h3 class="footer_header light no-margin no-padding">
		<?php echo Yii::t('phrase', 'Tentang <span class="colored">Kami</span>');?>
	</h3>
	<img class="footer_logo" src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo_white.png" alt="<?php echo $setting->site_title;?>">
	<?php echo Phrase::trans($model->quote, 2);?>
</div>
<!-- End Box -->