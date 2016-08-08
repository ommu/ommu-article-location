<?php
	$cs = Yii::app()->getClientScript();
$js=<<<EOP
	$('#archive-article .pager a').live('click', function() {
		var url = $(this).attr('href');
		//alert(url);
		
		//return false;
	});
EOP;
	$cs->registerScript('load', $js, CClientScript::POS_END);
?>

<?php if($model != false && !empty($model->data)) {
	foreach($model->data as $key => $val) {
		$server = Utility::getConnected(Yii::app()->params['server_options']['bpad']);
		if(in_array($server, array('http://103.255.15.100','http://192.168.30.100','http://localhost','http://127.0.0.1')))
			$server = $server.'/bpadportal';
		
		$image = $val->media_image;
		$image_default = Yii::app()->request->baseUrl.'/public/meta_default.png';
		if(!in_array(Utility::getProtocol().'://'.Yii::app()->request->serverName, Yii::app()->params['server_options']['localhost']))
			$image = preg_replace('('.$server.')', 'http://bpadjogja.info', $val->media_image);
		
		$title = ucwords(strtolower($val->title));?>
		<div class="mb40 col-md-12">
			<div class="service-box list-item">
				<img src="<?php echo Utility::getTimThumb($val->media_image != '-' ? $val->media_image : $image_default, 300, 200, 1);?>" alt="<?php echo $title;?>">
				<div class="info">
					<h4><?php echo $title;?></h4>
					<?php echo $val->intro != '' && $val->intro != '-' ? '<p>'.Utility::shortText(Utility::hardDecode($val->intro), 160).'</p>' : '';?>
					<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$val->id,'t'=>Utility::getUrlTitle($title),'source'=>'blog'));?>" title="<?php echo $title;?>">Learn More</a>
				</div>
					<?php //end.post-info ?>
			</div>
			<?php //end.service box ?>
		</div>
		<?php //end.col ?>	
<?php }?>
<div class="clearfix"></div>

<?php } else {?>
	<div class="col-md-12">
		<div class="null-condition">			
			<h3><strong>Blog's</strong> tidak ditemukan</h3>
		</div>
	</div>
<?php }?>

<?php if($model != false && $model->nextPager != '-') {?>
<div class="pager">
	<a href="<?php echo Yii::app()->controller->createUrl('index', array('url'=>urlencode($model->nextPager)));?>" title="<?php echo Yii::t('phrase', 'Loadmore');?>"><?php echo Yii::t('phrase', 'Loadmore');?></a>
</div>
<?php }?>