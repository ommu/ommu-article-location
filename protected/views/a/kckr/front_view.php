<div class="post">
	<?php
		$server = Utility::getConnected(Yii::app()->params['server_options']['bpad']);
		if(in_array($server, array('http://103.255.15.100','http://192.168.30.100','http://localhost','http://127.0.0.1')))
			$server = $server.'/bpadportal';
		
		$media_file = $model->media_file;
		if(!in_array(Utility::getProtocol().'://'.Yii::app()->request->serverName, Yii::app()->params['server_options']['localhost']))
			$media_file = preg_replace('('.$server.')', 'http://bpadjogja.info', $model->media_file);
		
	if($model->media_image != '-') {?>
	<img class="mb20" src="<?php echo Utility::getTimThumb($model->media_image, 800, 600, 3);?>" alt="<?php echo $model->title;?>">
	<?php }
	if($model->media_file != '-') {
		$extension = pathinfo($model->media_file, PATHINFO_EXTENSION);
		if($extension == 'pdf')
			$file = 'fa-file-pdf-o';
		else if(in_array($extension, array('doc','docx','opt')))
			$file = 'fa-file-word-o';
		else if(in_array($extension, array('xls','xlsx')))
			$file = 'fa-file-excel-o';
		else if(in_array($extension, array('ppt','pptx')))
			$file = 'fa-file-powerpoint-o';
		else if(in_array($extension, array('jpg','jpeg','gif','png','bmp')))
			$file = 'fa-file-photo-o';
		else if(in_array($extension, array('zip','rar','7z')))
			$file = 'fa-file-zip-o';
		else if(in_array($extension, array('mp3')))
			$file = 'fa-file-audio-o';
		else if(in_array($extension, array('mp4','flv')))
			$file = 'fa-file-movie-o';
		else
			$file = 'fa-file-pdf-o';?>
		<div class="download mb20">
			<a href="<?php echo $media_file;?>" title="<?php echo $model->title;?>"><i class="fa <?php echo $file;?>"></i> <?php echo Yii::t('phrase', 'Download');?></a>
		</div>
	<?php }?>
	<?php echo $model->body;?>
	<div class="post-footer meta mb-0">
		<i class="ml-15 pe-7s-world"></i>
		<p><?php echo $model->category;?></p>
		<i class="pe-7s-clock"></i>
		<p><?php echo $model->published_date;?></p>
		<i class="ml-15 pe-7s-look"></i>
		<p><?php echo $model->view;?></p>
		<?php if($model->media_file != '-') {?>
			<i class="ml-15 pe-7s-download"></i>
			<p><?php echo $model->download;?></p>
		<?php }?>		
	</div>
	<div class="post-footer mt-0">
		<div class="sharing">
			<p>Share this post: </p>
			<a href="#">
				<img src="https://maxcdn.icons8.com/Color/PNG/24/Social_Networks/facebook-24.png" title="Facebook">
			</a>
			<a href="#">
				<img src="https://maxcdn.icons8.com/Color/PNG/24/Social_Networks/instagram-24.png" title="Instagram">
			</a>
			<a href="#">
				<img src="https://maxcdn.icons8.com/Color/PNG/24/Social_Networks/twitter-24.png" title="Twitter">
			</a>
			<a href="#">
				<img src="https://maxcdn.icons8.com/Color/PNG/24/Logos/pinterest-24.png" title="Pinterest">
			</a>
		</div>
		<?php /*
		<p class="read-more">
			Read More in: <a href="#">Business</a>, <a href="#">Investing</a>
		</p>
		*/?>
	</div>
</div>