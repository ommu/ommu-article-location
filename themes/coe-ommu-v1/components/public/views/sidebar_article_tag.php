<?php if($model != null) {?>
<div id="tag_cloud-2" class="widget bar widget_tag_cloud">
	<h5>Tags</h5>
	<div class="tagcloud">
		<?php foreach($model as $key => $val) {?>
		<a href="<?php echo Yii::app()->createUrl('article/site/index', array('tag'=>$val->tag_id, 't'=>Utility::getUrlTitle($val->tag_TO->body)))?>" style='font-size: 14px;'><?php echo $val->tag_TO->body?></a>
		<?php }?>
	</div>
</div>
<?php }?>