<!-- Box -->
<div class="col-xs-3">
	<!-- Header -->
	<h3 class="footer_header light no-margin no-padding">
		<?php echo Yii::t('phrase', 'Member of <span class="colored">CoE</span>');?>
	</h3>
	<!-- List -->
	<ol>
		<?php if($model != null) {
			foreach($model as $key => $val) {?>
		<li>
			<!-- Link -->
			<a href="<?php echo Yii::app()->createUrl($val->province_code.'/index');?>">
				<?php echo $val->province_relation->province;?>
			</a>
		</li>
		<?php }
		}?>
	</ol>
</div>
<!-- End Box -->