<?php 
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');?>
	
<script async defer
 	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIOONzzSSIeqptRc_hnE4E_aOyQFLGbpU&callback=initMap">
</script>
<?php
$cs = Yii::app()->getClientScript();
$js = <<<EOP
function initMap() {
  var locations = [
      ['Unit Badran I<br/>Jln. Tentara Rakyat Mataram 4 Yogyakarta<br/>Telp. (0274) 588219, 561218', -7.803079, 110.366261, 2],
      ['Unit Badran II<br/>Jln. Tentara Rakyat Mataram 29 Yogyakarta<br/>Telp. (0274) 513969, 563367', -7.8032491, 110.3398253, 1],
    ];
  var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: new google.maps.LatLng(-7.803079, 110.366261),
    });
	  
	var infowindow = new google.maps.InfoWindow();
	var marker, i;
    for (i = 0; i < locations.length; i++) {  
		var icon = baseUrl+'/themes/coe-v1/images/icons/marker-'+i+'.png';
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		icon: icon
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}
EOP;
$ukey = md5(uniqid(mt_rand(), true));
$cs->registerScript($ukey, $js, CClientScript::POS_END);
?>
<div class="col-md-9 col-sm-9 col-xs-12 mt-25 mb-25">
	<h4 class="border-bottom mt-10 pb-10">ABOUT CENTRE OF EXCELLENCE</h4>
	<div class="content">
		<h1 class="mt-25">CENTRE OF EXCELLENCE</h1>
		<p>Perpustakaan yang menerapkan standar kinerja yangtinggi di dalam penyelenggaraaan layanan perpustakaan dan informasi untuk memenuhi kebutuhan pemustaka </p>
		<h1>Kontak Kami</h1>
		<strong>Unit Badran I</strong><br/>
		Jln. Tentara Rakyat Mataram 4 Yogyakarta<br/>
		Telp. (0274) 588219, 561218 <br/><br/>
		<strong>Unit Badran II</strong><br/>
		Jln. Tentara Rakyat Mataram 29 Yogyakarta<br/>
		Telp. (0274) 513969, 563367<br/><br/>
		<h1>Feedback</h1>
		<fieldset>
			<div class="clearfix">
				<div class="desc">
					<input type="text" class="span-11" placeholder="Nama">
				</div>
			</div>
			<div class="clearfix">
				<div class="desc">
					<input type="text" class="span-11" placeholder="Email">
				</div>
			</div>
			<div class="clearfix">
				<div class="desc">
					<textarea class="span-11 medium" placeholder="Pesan"></textarea>
				</div>
			</div>
			<div class="clearfix capcha">
				<div class="desc">
					<?php $this->widget('CCaptcha'); ?>
					<div class="clear"></div>
					<input type="text" placeholder="Captha" class="span-5 mt-10">
				</div>
			</div>
			<div class="clearfix">
				<div class="submit">
					<input type="submit">
				</div>
			</div>
		</fieldset>
		<br/><h1>Peta Lokasi</h1>
		<div id="map"></div>
	</div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12 mt-25 mb-25">
	<?php $this->widget('_HookSidebar'); ?>
</div>