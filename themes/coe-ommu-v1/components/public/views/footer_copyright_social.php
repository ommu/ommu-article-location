<!-- Left, Copyright Area -->
<div class="left f-left">
	<!-- Text and Link -->
	<p class="copyright">
		<?php $this->widget('FrontFooterCopyright'); ?>
	</p>
</div>
<!-- End Left -->

<!-- Right, Socials -->
<div class="right f-right">
	<?php if($model != null) {
		foreach($model as $key => $val) {?>
		<!-- Link -->
		<a href="<?php echo $val->value;?>" title="<?php echo Phrase::trans($val->cat->name, 2);?>" target="_blank" class="social">
			<i class="fa <?php echo $val->contact_icon != '' ? $val->contact_icon : 'fa-star';?>"></i>
		</a>
	<?php }
	}?>
</div>
<!-- End Right -->