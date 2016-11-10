<!-- DropDown Menu -->
<?php if($model != null) {?>
<ul class="dropdown-menu pull-left clearfix">
	<?php foreach($model as $key => $val) {?>	
	<li><a href="<?php echo Yii::app()->createUrl($val->province_code.'/index');?>" class="ex-link" title="<?php echo $val->province_relation->province;?>"><?php echo $val->province_relation->province;?></a></li>
	<?php }?>
</ul>
<?php }?>
<!-- End DropDown -->