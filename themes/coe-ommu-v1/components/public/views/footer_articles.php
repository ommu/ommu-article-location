<!-- Box -->
<div class="col-xs-<?php echo $this->type == null || ($this->type != null && $this->type == 'news') ? '3' : '3';?>">
	<!-- Header -->
	<h3 class="footer_header light no-margin no-padding">
		<?php echo $this->type == null || ($this->type != null && $this->type == 'news') ? Yii::t('phrase', 'Berita <span class="colored">Terbaru</span>') : Yii::t('phrase', 'Artikel <span class="colored">Budaya</span>');?>
	</h3>
	<!-- List -->
	<ol>
		<?php if($model != null) {
			foreach($model as $key => $val) {
				if($this->type == null || ($this->type != null && $this->type == 'news')) {?>
				<li>
					<!-- Link -->
					<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" title="<?php echo $val->title;?>" class="no-icon">
						<?php echo $val->title;?>
						<span><i class="fa fa-clock-o"></i> <?php echo Utility::dateFormat($val->published_date);?></span>
					</a>
				</li>
				
				<?php } else {?>
				<li>
					<!-- Link -->
					<a href="<?php echo Yii::app()->createUrl('article/site/view', array('id'=>$val->article_id, 't'=>Utility::getUrlTitle($val->title)))?>" title="<?php echo $val->title;?>" class="no-icon">
						<?php echo $val->title;?>
						<span>
							<i class="fa fa-tags"></i> <?php echo $val->collection != null ? Phrase::trans($val->cat->name,2).' '.$val->collection->category->category_name : Phrase::trans($val->cat->name,2) ;?>
							<i class="fa fa-map-marker"></i> <?php echo $val->view->location_id != null ? $val->view->location->province_relation->province : Yii::t('phrase', 'Indonesia');?>
						</span>
					</a>
				</li>				
			<?php }
			}
		}?>
	</ol>
</div>
<!-- End Box -->