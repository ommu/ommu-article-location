<?php	
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyAfBXOjA19jV6eA65puYWfM2jyHYOpSCeA', CClientScript::POS_END);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/custom/location_maps.js', CClientScript::POS_END);
$js = <<<EOP
	initialize();
EOP;
	$ukey = md5(uniqid(mt_rand(), true));
	$cs->registerScript($ukey, $js);	
?>
<!-- Address Type2 -->
<section class="address type-2 background37 parallax dark-bg">
    <!-- Boxed div -->
    <div class="boxed clearfix relative">
        <!-- Box -->
		<?php
			$office_place = $model->office_place != '' && $model->office_place != '-' ? $model->office_place : '';
			$office_village = $model->office_village != '' && $model->office_village != '-' ? ', '.$model->office_village : '';
			$office_district = $model->office_district != '' && $model->office_district != '-' ? ', '.$model->office_district : '';
			$city = $model->office_city != '' && $model->office_city != 0 ? ', '.$model->city_r->city : '';
			$province = $model->province_id != null && $model->province_id != 0 ? ', '.$model->province_relation->province : '';
			$country = $model->office_country != null && $model->office_country != 0 ? ', '.$model->country_r->country : '';
			$office_zipcode = $model->office_zipcode != '' && $model->office_zipcode != '-' ? ', '.$model->office_zipcode : '';
		?>
        <a class="box clearfix block f-left scroll" href="#map">
            <!-- Icon -->
            <div class="f-left icon">
                <i class="fa fa-map-marker"></i>
            </div>
            <!-- Texts -->
            <div class="f-right texts">
                <!-- Arrow -->
                <span class="arrow"></span>
                <!-- Header -->
                <h3 class="no-padding no-margin extra-light">
                    Address;
                </h3>
                <!-- Detail -->
                <p class="no-margin no-padding extra-light">
                    <?php echo $office_place.$office_village.$office_district.$city.$province.$country.$office_zipcode?>
                </p>
            </div>
            <!-- End Texts -->
        <!-- Box -->
        <a class="box clearfix block f-left" href="tel:0123456789">
            <!-- Icon -->
            <div class="f-left icon">
                <i class="fa fa-mobile"></i>
            </div>
            <!-- Texts -->
            <div class="f-right texts">
                <!-- Arrow -->
                <span class="arrow"></span>
                <!-- Header -->
                <h3 class="no-padding no-margin extra-light">
                    Phone:
                </h3>
                <!-- Detail -->
                <p class="no-margin no-padding light">
                    <?php echo $model->office_phone;?>
					<?php if($model->office_fax != '' && $model->office_fax != '-') {
						echo '<br/>'.$model->office_fax.' (fax)';
					}?>
                </p>
            </div>
            <!-- End Texts -->
        </a>
        <!-- End Box -->
        <!-- Box -->
        <a class="box clearfix block f-left" href="mailto:support@goldeyestheme.com">
            <!-- Icon -->
            <div class="f-left icon">
                <i class="fa fa-envelope"></i>
            </div>
            <!-- Texts -->
            <div class="f-right texts">
                <!-- Arrow -->
                <span class="arrow"></span>
                <!-- Header -->
                <h3 class="no-padding no-margin extra-light">
                    E-Mail
                </h3>
                <!-- Detail -->
                <p class="no-margin no-padding extra-light">
                    <?php echo $model->office_email;?>
                </p>
            </div>
            <!-- End Texts -->
        </a>
        <!-- End Box -->
        </a>
        <!-- End Box -->
    </div>
    <!-- End Boxed div -->
</section>
<!-- End Address Section -->

<!-- Map Section -->
<section id="map" class="fullwidth">
    <div id="google_map"></div>
</section>
<!-- End Map Section -->