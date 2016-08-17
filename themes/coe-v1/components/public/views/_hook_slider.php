<?php
$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/custom/custom.slider.js', CClientScript::POS_END);
$js = <<<EOP
	$("#slider").owlCarousel({
	    navigation : false, // Show next and prev buttons
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		autoPlay: 5000,
		transitionStyle : "fadeUp",
		mouseDrag: false,
	});
EOP;
$ukey = md5(uniqid(mt_rand(), true));
$cs->registerScript($ukey, $js);
?>
<div class="slider-box">
	<div class="caption">
		<div>
			<img src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/caption.png';?>">
			<span>Well I've lost it all, I'm just a silhouette, I'm a lifeless face that you'll soon forget,<br/>My eyes are damp from the words you left.</span>
		</div>
	</div>
	<div id="slider">
		<div class="item">
			<img src="<?php echo Yii::app()->baseUrl;?>/public/banner/1.jpg" alt="">
		</div>
		<div class="item">
			<img src="<?php echo Yii::app()->baseUrl;?>/public/banner/2.jpg" alt="">
		</div>
	</div>
</div>
