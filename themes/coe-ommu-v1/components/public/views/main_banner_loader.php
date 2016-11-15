<!-- Page Loader -->
<article id="pageloader" class="background55 xxdark-bg parallax-loader dark-loader" <?php echo $model != null && $model->media != '' ? 'style="background-image:url('.Utility::getProtocol().'://'.Yii::app()->request->serverName.Yii::app()->request->baseUrl.'/public/banner/'.$model->media.');"' : '';?>>
	<div class="spinner">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
</article>