<?php
/**
 * @var $this SearchController
 * version: 1.2.0
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/Core
 * @contact (+62)856-299-4114
 *
 */
 ?>
 

<?php if(!empty($results)) {
	$pages = new CPagination(count($results));
	$currentPage = Yii::app()->getRequest()->getQuery('page', 1);
	$pages->pageSize = 10;

	$i = $currentPage * $pages->pageSize - $pages->pageSize;
	$end = $currentPage * $pages->pageSize;
	for($i=$i; $i<$end; $i++) {
		if($results[$i]->title != '') {?>
			<!-- Post -->
			<div class="post clearfix">
				<!-- Left, Dates -->
				<div class="dates f-left">
					<!-- Post Time -->
					<h6 class="date">
						<span class="day colored helvetica">
						<?php echo date('d', strtotime(CHtml::encode($results[$i]->date)));?>
						</span>
						<?php echo Utility::getLocalMonthName(CHtml::encode($results[$i]->date));?> <?php echo date('Y', strtotime(CHtml::encode($results[$i]->date)));?>
					</h6>
					<!-- Details -->
					<div class="details">
						<ul class="t-right fullwidth">
							<!-- Posted By -->
							<li>
								Posted By <a><?php echo $query->highlightMatches(CHtml::encode($results[$i]->creation));?></a>
								<i class="fa fa-user"></i>
							</li>
							<li>
								<?php echo CHtml::encode($results[$i]->category);?>
								<i class="fa fa-flag"></i>
							</li>
						</ul>
					</div>
					<!-- End Details -->
				</div>
				<!-- End Left, Dates -->
				<!-- Post Inner -->
				<div class="post-inner f-right">
					<!-- Header -->
					<a href="<?php echo CHtml::encode($results[$i]->url);?>">
						<h2 class="post-header semibold">
							<?php echo $query->highlightMatches(CHtml::encode($results[$i]->title));?>
						</h2>
					</a>
					<!-- Media -->
					<?php if($results[$i]->media != '') {?>
						<div class="post-image post-media mp-gallery">
							<a href="<?php echo $results[$i]->media;?>" title="<?php echo CHtml::encode($results[$i]->title);?>">
								<img src="<?php echo Utility::getTimThumb($results[$i]->media, 880, 470, 1)?>" alt="<?php echo CHtml::encode($results[$i]->title);?>">
							</a>			
						</div>
					<?php }?>
					<!-- Description -->
					<div class="post-text light">
						<?php $shortText = empty($medias) ? 800 : 230;
						echo $query->highlightMatches(CHtml::encode(Utility::shortText($results[$i]->body, $shortText)));?>
					</div>
					<!-- Load More Button -->
					<a href="<?php echo CHtml::encode($results[$i]->url);?>" class="post-more uppercase light st">
						<?php echo Yii::t('phrase', 'Selengkapnya');?>
					</a>
				</div>
				<!-- End Post Inner -->
			</div>
			<!-- End Post -->
		<?php }
	}?>
	
	<div class="pagination block t-center mt-70 mb-00">
		<?php $this->widget('OLinkPager', array(
			'pages' => $pages,
			'header' => '',
		));?>
	</div>	
		
<?php } else {?>
<div class="contact">
	<div class="white-form">
		<!-- Submit Message -->
		<div class="submit_message">
			<p class="t-left no-margin">
				<!-- Error Message Icon -->
				<i class="fa fa-check"></i>
				<?php echo $this->pageTitle;?>
				<br/>
				<span><strong><em><?php echo $_GET['keyword'];?></em></strong> tidak ditemukan dalam pencarian</span>
			</p>
		</div>
	</div>
</div>
<?php }?>