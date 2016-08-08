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
	$i = 0;
	foreach($model->data as $key => $val) {
		$i++;
		$server = Utility::getConnected(Yii::app()->params['server_options']['bpad']);
		if(in_array($server, array('http://103.255.15.100','http://192.168.30.100','http://localhost','http://127.0.0.1')))
			$server = $server.'/bpadportal';
		
		$image = $val->media_image;
		$image_default = Yii::app()->request->baseUrl.'/public/meta_default.png';
		if(!in_array(Utility::getProtocol().'://'.Yii::app()->request->serverName, Yii::app()->params['server_options']['localhost']))
			$image = preg_replace('('.$server.')', 'http://bpadjogja.info', $val->media_image);
		
		$title = ucwords(strtolower($val->title));?>
		<div class="mb40 col-md-6 col-sm-6 col-xs-12">
			<div class="post-snippet">
				<div class="img-box">
					<img src="<?php echo Utility::getTimThumb($val->media_image != '-' ? $val->media_image : $image_default, 300, 170, 1);?>" alt="<?php echo $title;?>">
				</div>
				<div class="meta">
					<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$val->id,'t'=>Utility::getUrlTitle($title),'source'=>'blog'));?>" title="<?php echo $title;?>">
						<h4><?php echo $title;?></h4>
					</a>
					<?php echo $val->intro != '' && $val->intro != '-' ? '<p>'.Utility::shortText(Utility::hardDecode($val->intro), 180).'</p>' : '';?>
					<div class="post-info">
						<i class="pe-7s-clock"></i>
						<p><?php echo $val->published_date;?></p>
						<i class="ml-15 pe-7s-look"></i>
						<p><?php echo $val->view;?></p>
						<?php /*
						<div class="pull-right">
							<a href="#"><i class="pe-7s-share"></i></a>
							<a href="#"><i class="pe-7s-like"></i></a>
						</div>
						*/?>
					</div>
					<?php //end.post-info ?>
				</div>
				<?php //end.meta ?>
			</div>
			<?php //end.post-snippet ?>
		</div>
		<?php //end.col ?>
		<?php if($i%2 == 0) {?>
			<div class="clearfix"></div>
		<?php }?>
<?php }?>
<div class="clearfix"></div>

<?php } else {?>
	<div class="col-md-12">
		<div class="null-condition">			
			<h3><strong>Deposit</strong> tidak ditemukan</h3>
		</div>
	</div>
<?php }?>

<?php if($model != false && $model->nextPager != '-') {?>
<div class="pager">
	<a href="<?php echo Yii::app()->controller->createUrl('index', array('url'=>urlencode($model->nextPager)));?>" title="<?php echo Yii::t('phrase', 'Loadmore');?>"><?php echo Yii::t('phrase', 'Loadmore');?></a>
</div>
<?php }?>