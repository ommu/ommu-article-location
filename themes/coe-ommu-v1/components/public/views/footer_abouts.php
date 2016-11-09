<!-- Box -->
<div class="col-xs-3">
	<!-- Header -->
	<h3 class="footer_header light no-margin no-padding">
		Tentang Kami
	</h3>
	<a style="" class="footerLogo" href="<?php echo Yii::app()->createUrl('site/index');?>">
		<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo_aplikasi_digital_gtp.png" alt="wd">
	</a>
	<?php echo Phrase::trans($model->quote, 2);?>
	<a class="btn colored-btn medium-btn uppercase" href="<?php echo Yii::app()->createUrl('page/view', array('id'=>$model->page_id,'t'=>Utility::getUrlTitle(Phrase::trans($model->name, 2))));?>" title="Selengkapnya">Selengkapnya</a>
</div>
<!-- End Box -->