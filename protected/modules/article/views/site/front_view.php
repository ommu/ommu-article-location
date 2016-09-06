<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/lockfixed.js', CClientScript::POS_END);
	
$js=<<<EOP
	$.lockfixed(".article-detail .share-box",{offset: {top: 100, bottom: 250}});
EOP;
	$ukey = md5(uniqid(mt_rand(), true));
	$cs->registerScript($ukey, $js);
?>
<div class="col-md-12 col-sm-12 col-xs-12 article-detail relative">
<div class="share-box">
	<ul>
		<li><a class="fb" href="" title="Share Facebook"></a></li>
		<li><a class="twitter" href="" title="Share Twitter"></a></li>
		<li><a class="email" href="" title="Email"></a></li>
		<li><a class="print" href="" title="Print"></a></li>
		<li><a class="gmail" href="" title="Gmail"></a></li>
		<li><a class="tumblr" href="" title="Tumblr"></a></li>
		<li><a class="pinterest" href="" title="Pinterest"></a></li>
		<li><a class="gplus" href="" title="Gplus"></a></li>
	</ul>
</div>
	<h4 class="border-bottom mt-10 pb-10">BERITA</h4>
	<div class="content col-md-11 col-sm-12">
		<h1 class="mt-25">Center of Excellence Budaya Lokal Jawa</h1>
		<span class="date date pb-20 pt-5">17 Agusuts 2016</span>
		<img class="mb-10" width="100%" src="<?php echo Yii::app()->theme->baseUrl.'/images/resource/news-detail.jpg';?>">
		<span class="caption"><i>Suasana kantor baru</i></span>
		<p>Pembangunan Center of Excellence merupakan bagian dari Program Pembangunan Perpustakaan Digital Nasional Indonesia yang digagas oleh Perpustakaan Nasional Republik Indonesia. Melalui teknologi informasi komunikasi diharapkan khasanah budaya lokal yang dimiliki dapat dilestarikan serta disebarluaskan ke berbagai pihak yang membutuhkan.</p>
		<p>Pembangunan Center of Excellence Layanan Perpustakaan Dan Informasi Tentang Budaya Lokal bertujuan untuk memenuhi kebutuhan pemustaka terhadap informasi tentang budaya-budaya yang ada di wilayah Negara Kesatuan Republik Indonesia melalui pengembangan perpustakaan yang mampu menyelenggarakan layanan perpustakaan dan informasi tentang budaya masyarakat yang ada di wilayah yang telah ditetapkan dengan standar kinerja yang tinggi..</p>
		<video width="100%" controls>
			<source src="<?php echo Yii::app()->baseUrl;?>/videos/video.mp4" type="video/mp4">
		</video>
		<span class="caption"><i>Video lorem ipsum</i></span>
		<p>Secara bertahap dan selektif Perpustakaan Nasional memfasilitasi pembangunan centers of excellence untuk budaya-budaya yang ada di Indonesia. salah satunya adalah  Badan Perpustakaan dan Arsip Daerah Daerah Istimewa Yogyakarta, sebagai center of Excellence Budaya Jawa, dengan ruang lingkup informasi budaya di wilayah Jawa, meliputi Provinsi Jawa Barat, DKI Jakarta, Jawa Tengah, Jawa Timur, Banten dan Daerah Istimewa Yogyakarta.</p>
		<p>Untuk mendukung pembangunan dan pengembangan Center of excellence Budaya Jawa , BPAD DIY sendiri telah melakukan kegiatan-kegiatan seperti diskusi tentang kebudayaan Jawa, macapat maupun bedah pustaka langka. Juga pengalihan huruf dan pengalihan bahasa terhadap buku-buku yang berhuruf dan berbahasa Jawa, maupun alih media koleksi budaya Jawa. Selain itu koleksi, sumber daya manusia, infrastruktur serta tata kelola perpustakaan senantiasa ditingkatkan. Termasuk yang dilakukan adalah kerja sama antarperpustakaan.</p>
		<p>Dengan adanya informasi  budaya yang dapat diakses dengan mudah, masyarakat diharapkan dapat menyerap unsur-unsur budaya asing tetapi tetap dapat mempertahankan serta memperkokoh budaya lokal sehingga mempunyai daya tahan yang cukup tangguh. Dengan demikian melalui center of excellence, budaya Jawa dapat tumbuh dan berkembang sesuai kemajuan zaman, serta membawa manfaat bagi banyak orang.</p>
		 <audio style="width: 100%" controls>
		  <source src="<?php echo Yii::app()->baseUrl;?>/public/Kalimba.mp3" type="audio/mpeg">
		</audio>
		<span class="caption"><i>Audio lorem ipsum</i></span>
		<p>Dengan adanya informasi  budaya yang dapat diakses dengan mudah, masyarakat diharapkan dapat menyerap unsur-unsur budaya asing tetapi tetap dapat mempertahankan serta memperkokoh budaya lokal sehingga mempunyai daya tahan yang cukup tangguh. Dengan demikian melalui center of excellence, budaya Jawa dapat tumbuh dan berkembang sesuai kemajuan zaman, serta membawa manfaat bagi banyak orang.</p>
		<nav>
			<a href=""><span>Prev Artikel</span><span class="icon"><</span></a>
			<a href=""><span class="icon">></span><span>Next Artikel</span></a>
		</nav>
	</div>
</div>
