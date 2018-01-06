<?php
/**
 * Article Locations (article-locations)
 * @var $this AdminController
 * @var $model ArticleLocations
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 18 October 2016, 02:29 WIB
 * @link https://github.com/ommu/ommu-article-location
 *
 */
?>

<?php
	$office_place = $model->office_place && $model->office_place != '-' ? $model->office_place : '';
	$office_village = $model->office_village && $model->office_village != '-' ? ', '.$model->office_village : '';
	$office_district = $model->office_district && $model->office_district != '-' ? ', '.$model->office_district : '';
	$city = $model->office_city ? ', '.$model->city->city_name : '';
	$province = $model->province_id ? ', '.$model->province->province_name : '';
	$country = $model->office_country ? ', '.$model->country->country_name : '';
	$office_zipcode = $model->office_zipcode && $model->office_zipcode != '-' ? ', '.$model->office_zipcode : '';
	
	echo $office_place.$office_village.$office_district.$city.$province.$country.$office_zipcode;
?>