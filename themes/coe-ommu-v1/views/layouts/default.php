<?php
if(isset($_GET['protocol']) && $_GET['protocol'] == 'script') {
	echo $cs=Yii::app()->getClientScript()->getScripts();
	
} else {
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');
	$module = strtolower(Yii::app()->controller->module->id);
	$controller = strtolower(Yii::app()->controller->id);
	$action = strtolower(Yii::app()->controller->action->id);
	$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
	$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);

	/**
	 * = Global condition
	 ** Construction condition
	 */
	$setting = OmmuSettings::model()->findByPk(1,array(
		'select' => 'online, site_type, site_url, site_title, construction_date, signup_inviteonly, general_include',
	));
	$construction = (($setting->online == 0 && date('Y-m-d', strtotime($setting->construction_date)) > date('Y-m-d')) && (Yii::app()->user->isGuest || (!Yii::app()->user->isGuest && in_array(!Yii::app()->user->level, array(1,2))))) ? 1 : 0 ;

	/**
	 * = Dialog Condition
	 * $construction = 1 (construction active)
	 */
	if($construction == 1)
		$dialogWidth = !empty($this->dialogWidth) ? ($this->dialogFixed == false ? $this->dialogWidth.'px' : '600px') : '900px';
	else {
		if($this->dialogDetail == true)
			$dialogWidth = !empty($this->dialogWidth) ? ($this->dialogFixed == false ? $this->dialogWidth.'px' : '600px') : '700px';
		else
			$dialogWidth = '';
	}
	$display = ($this->dialogDetail == true && !Yii::app()->request->isAjaxRequest) ? 'style="display: block;"' : '';
	
	/**
	 * = pushState condition
	 */
	$title = CHtml::encode($this->pageTitle).' | '.$setting->site_title;
	$description = $this->pageDescription;
	$keywords = $this->pageMeta;
	$urlAddress = Utility::getProtocol().'://'.Yii::app()->request->serverName.Yii::app()->request->requestUri;
	$apps = $this->dialogDetail == true ? ($this->dialogFixed == false ? 'apps' : 'module') : '';

	if(Yii::app()->request->isAjaxRequest && !isset($_GET['ajax'])) {
		if(Yii::app()->session['theme_active'] != Yii::app()->theme->name) {
			$return = array(
				'redirect' => $urlAddress,		
			);

		} else {
			$page = $this->contentOther == true ? 1 : 0;
			$dialog = $this->dialogDetail == true ? (empty($this->dialogWidth) ? 1 : 2) : 0;		// 0 = static, 1 = dialog, 2 = notifier
			$header = /* $this->widget('SidebarAccountMenu', array(), true) */'';
			
			if($this->contentOther == true) {
				$render = array(
					'content' => $content, 
					'other' => $this->contentAttribute,
				);
			} else
				$render = $content;
			
			$return = array(
				'partial' => 'off',
				'titledoc' => CHtml::encode($this->pageTitle),
				'title' => $title,
				'description' => $description,
				'keywords' => $keywords,
				'address' => $urlAddress,
				'dialogWidth' => $dialogWidth,			
			);
			$return['page'] = $page;
			$return['dialog'] = $dialog;
			$return['apps'] = $apps;
			$return['header'] = $this->dialogDetail != true ? $header : '';
			$return['render'] = $render;
			$return['script'] = $cs=Yii::app()->getClientScript()->getOmmuScript();
		}
		echo CJSON::encode($return);

	} else {
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile(/*woocommerce-general-css'*/Yii::app()->theme->baseUrl.'/css/woocommerce.css?ver=2.5.5');
		$cs->registerCssFile(/*woocommerce-layout-css'*/Yii::app()->theme->baseUrl.'/css/woocommerce-layout.css?ver=2.5.5');
		$cs->registerCssFile(/*vntd-woocommerce-custom-css'*/Yii::app()->theme->baseUrl.'/css/woocommerce-styling.css?ver=4.5.4');
		$cs->registerCssFile(/*layerslider-css'*/Yii::app()->theme->baseUrl.'/css/layerslider.css?ver=5.6.2');
		$cs->registerCssFile(/*contact-form-7-css'*/Yii::app()->theme->baseUrl.'/css/styles.css?ver=4.4');
		$cs->registerCssFile(/*think-button-style-css'*/Yii::app()->theme->baseUrl.'/css/button.css?ver=4.5.4');
        $cs->registerCssFile(/*ccf-jquery-ui-css''*/Yii::app()->theme->baseUrl.'/css/jquery-ui.css?ver=4.5.4');
		$cs->registerCssFile(/*ccf-form-css'*/Yii::app()->theme->baseUrl.'/css/form.min.css?ver=7.6');
		$cs->registerCssFile(/*rs-plugin-settings-css'*/Yii::app()->theme->baseUrl.'/css/settings.css?ver=5.2.4.1');
		$cs->registerCssFile(/*woocommerce-smallscreen-css'*/Yii::app()->theme->baseUrl.'/css/woocommerce-smallscreen.css?ver=2.5.5');		
		$cs->registerCssFile(/*vntd-demo-style-css'*/Yii::app()->theme->baseUrl.'/css/style_demo.css?ver=4.5.4');		
		$cs->registerCssFile(/*crexis-styles-css'*/Yii::app()->theme->baseUrl.'/css/style.css?ver=4.5.4');		
		$cs->registerCssFile(/*socials-css'*/Yii::app()->theme->baseUrl.'/css/socials.css?ver=4.5.4');
		$cs->registerCssFile(/*crexis-responsive-css'*/Yii::app()->theme->baseUrl.'/css/responsive.css?ver=4.5.4');
		$cs->registerCssFile(/*cubePortfolio-css'*/Yii::app()->theme->baseUrl.'/css/cubeportfolio.min.css?ver=4.5.4');
		$cs->registerCssFile(/*magnific-popup-css'*/Yii::app()->theme->baseUrl.'/css/magnific-popup.css?ver=4.5.4');
		$cs->registerCssFile(/*owl-carousel-css'*/Yii::app()->theme->baseUrl.'/css/owl.carousel.css?ver=4.5.4');
		$cs->registerCssFile(/*js_composer_front-css'*/Yii::app()->theme->baseUrl.'/css/js_composer.min.css?ver=4.11.2');
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/form.css');
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/typography.css');
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/layout.css');
		//$cs->registerCssFile(Yii::app()->request->baseUrl.'/externals/content.css');
		//$cs->registerCoreScript('jquery', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jY9dCsJADIQv1O7iPXzzBCEbSty_mmTR3t5trY-1QiAwfDOZoNCL1T_nkQumFkj9vc-jkSz7GvCcGTNPAkYucxku_goLyS1xIPFqYIyrYxKiohXjIZFWVTfVRSGwJpApMLi9yj9GEyjKxrXo7-qNPVb5dD4DQ39uZow9_xhvpd_Xb-Yb.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/ncvBDYAwCEDRhWxJR1LEiKFFC5i4vXpwAa8_7xfAMNeaUJuP6GnRXg1GM3KDKVhm2Azemiu3oUCn04Rn6rDHJIyffdR2BPUr-0qV9mi4ZlcV-zM-WCWctb33DQ.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/TcxBDoAwCETRC1lJT2RIi4kmMAaIXt8uWc9_0-kDBlTFhxBHSAbdQafDUmwSz9kSbbDnrpdtfa3HAg9CvIB3xfCod63YHw.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9BPLkqtyCzWL8_PT87PzU0tSk7VTywuTi1BEdItTi7KLCgpBgA.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/HcrBDYAwCADAhaToy3kMYkJtQQtNdHtT33czUuNHHLPjZR5Q5ORURacFyTQ2CjisVVhRlErf-a_57tzeNGTkDw.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9RPzs8rSUwu0U3LL8rVNdfPzEvOKU1JLdbPKtYvTi7KLCgpBgA.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9Qvz89Pzs_NTS1KTtVPLC5OLSnWzwKiwtLUokrdpJz85OzSTChXD8wN9dTLzcwDAA.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9Qvz89Pzs_NTS1KTtVPLC5OLSnWzyrWTyvKzytJzUtBltbLzczTMcShIauwNLWoUjc5Pz87MxXK04PwQPoA.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/bY3RDsIgDEV_SEDiB5mOdQsL0NqybPt7kWiMcW9Nzz33ercRBcoZJaADVazqFnWTUKlYRhdAqpkE5oylqs2xXILgHtVtbGIJaR2xG72kVCPI6ei5q3snGx2IqlYB7sS3170JTIryWU1xcBscTLENfa.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/Sy5Krcgs1i8v0M3MS84pTUkt1s8Cc1Nzk1JT9HIz8wA.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/fY5REoJADEMvBKycwYMwsBSnWMjadge8PYz6oSP6mbxkkjqM1kRMCUYaWjNy263Qs_k7agbF7NXEc3EKUWnlR2y8ZdJ7ZTmRmnBPdoh5SkKl0-qlwluHFvXRsHAXOiy7YVeFiD5_vMSv9Zg7SlAfIIx_oTPmgS8fFItUsVVkI_mq-kIUAdkA.js', CClientScript::POS_END);
		
		//Javascript Attribute
		$jsAttribute = array(
			'baseUrl'=>BASEURL,
			'lastTitle'=>$title,
			'lastDescription'=>$description,
			'lastKeywords'=>$keywords,
			'lastUrl'=>$urlAddress,
			'dialogConstruction'=>$construction == 1 ? 1 : 0,
			'dialogGroundUrl'=>$this->dialogDetail == true ? ($this->dialogGroundUrl != '' ? $this->dialogGroundUrl : '') : '',
		);
		if($this->contentOther == true)
			$jsAttribute['contentOther'] = $this->contentAttribute;
	?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8" />
  <title><?php echo $title;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="Ommu Platform (support@ommu.co)" />
  <script type="text/javascript">
	var globals = '<?php echo CJSON::encode($jsAttribute);?>';
  </script>
  <?php echo $setting->general_include != '' ? $setting->general_include : ''?>
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl?>/favicon.ico" />
  <style type="text/css"></style>
	<script>
		/* You can add more configuration options to webfontloader by previously defining the WebFontConfig with your options */
		if ( typeof WebFontConfig === "undefined" ) {
			WebFontConfig = new Object();
		}
		WebFontConfig['google'] = {families: ['Open+Sans:400', 'Raleway:500', 'Oswald']};
		
		(function() {
			var wf = document.createElement( 'script' );
			wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName( 'script' )[0];
			s.parentNode.insertBefore( wf, s );
		})();
	</script>  
	<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1456256508033{padding-top: 0px !important;padding-bottom: 0px !important;}.vc_custom_1456255021415{background-image: url(http://veented.info/crexis/wp-content/uploads/2016/02/background41.jpg?id=104) !important;}.vc_custom_1461031643005{padding-top: 100px !important;padding-bottom: 100px !important;background-image: url(http://veented.info/crexis/wp-content/uploads/2016/02/background40.jpg?id=103) !important;}.vc_custom_1456347525799{padding-bottom: 0px !important;}.vc_custom_1456265830226{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #f9f9f9 !important;}.vc_custom_1459937771735{padding-top: 56px !important;padding-bottom: 50px !important;background-image: url(http://veented.info/crexis/wp-content/uploads/2016/02/background9.jpg?id=72) !important;}.vc_custom_1460456899880{background-image: url(http://veented.info/crexis/wp-content/uploads/2016/02/background10.jpg?id=73) !important;}.vc_custom_1456304229609{padding-top: 25px !important;padding-bottom: 20px !important;background-color: #1d1d1d !important;}.vc_custom_1456304985147{padding-bottom: 60px !important;}</style>
	<noscript>
		<style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style>
	</noscript>
	
 </head>
 <body <?php echo $this->dialogDetail == true ? 'style="overflow-y: hidden;"' : '';?> class="page page-id-63 page-template-default wpb-js-composer js-comp-ver-4.11.2 vc_responsive">
	
	<?php /*
	<article id="pageloader" class="white-loader">
		<div class="spinner">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</article> 
	*/?>

	<nav id="navigation" class=" white-nav navigation-style-transparent">
		<div class="navigation double-nav first-nav white-nav">
			<div class="nav-inner clearfix">
				<!-- Logo Area -->
				<div class="logo f-left">
					<!-- Logo Link -->
					<a href="http://veented.info/crexis" class="logo-link scroll">
					<img src="http://veented.info/crexis/wp-content/uploads/2016/02/logo_dark_red_big.png" class="logo-secondary" alt="Crexis WordPress Theme" /><img src="http://veented.info/crexis/wp-content/uploads/2016/02/logo_white_red_big.png" class="site-logo logo-primary" data-second-logo="http://veented.info/crexis/wp-content/uploads/2016/02/logo_dark_red_big.png" alt="Crexis WordPress Theme" />					
					</a>
				</div>
				<!-- End Logo Area -->
				<!-- Mobile Menu Button -->
				<!--<a class="mobile-nav-button"><i class="fa fa-bars"></i></a>-->
				<a id="mobile-nav-button" class="mobile-nav-button">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				</a>
				<!-- Navigation Links -->
				<div class="desktop-nav nav-menu clearfix f-right">
					<ul id="menu-main-navigation" class="nav uppercase normal">
						<li id="menu-item-158" class="mega-menu menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-63 current_page_item current-menu-ancestor current_page_ancestor menu-item-has-children menu-item-158">
							<a href="http://veented.info/crexis/default-home-page/">Home</a>
							<ul class="dropdown-menu">
								<li id="menu-item-372" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-372">
									<a href="#">Multi Page</a>
									<ul class="dropdown-menu">
										<li id="menu-item-386" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-63 current_page_item menu-item-386"><a href="http://veented.info/crexis/default-home-page/">Default Home Page</a></li>
										<li id="menu-item-391" class="hot-link menu-item menu-item-type-post_type menu-item-object-page menu-item-391"><a href="http://veented.info/crexis/home-boxes-edition/">Home Boxes Edition</a></li>
										<li id="menu-item-404" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-404"><a href="http://veented.info/crexis/home-revolution-slider-1/">Revolution Slider 1</a></li>
										<li id="menu-item-405" class="hot-link-blue menu-item menu-item-type-post_type menu-item-object-page menu-item-405"><a href="http://veented.info/crexis/home-revolution-slider-2/">Revolution Slider 2</a></li>
										<li id="menu-item-1058" class="hot-link menu-item menu-item-type-post_type menu-item-object-page menu-item-1058"><a href="http://veented.info/crexis/home-revolution-slider-3/">Revolution Slider 3</a></li>
										<li id="menu-item-1059" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1059"><a href="http://veented.info/crexis/home-revolution-slider-4/">Revolution Slider 4</a></li>
										<li id="menu-item-1060" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1060"><a href="http://veented.info/crexis/home-revolution-slider-5/">Revolution Slider 5</a></li>
										<li id="menu-item-1061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="http://veented.info/crexis/home-black-white-edition/">Black White Edition</a></li>
										<li id="menu-item-1062" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1062"><a href="http://veented.info/crexis/home-boxes-black-white/">Black White Boxes</a></li>
										<li id="menu-item-1586" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1586"><a href="http://veented.info/crexis/home-veented-slider/">Veented Slider</a></li>
										<li id="menu-item-1067" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1067"><a href="http://veented.info/crexis/home-fullwidth-slider/">Fullwidth Slider</a></li>
										<li id="menu-item-1068" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1068"><a href="http://veented.info/crexis/home-fullwidth-slider-2/">Fullwidth Slider 2</a></li>
										<li id="menu-item-1057" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1057"><a href="http://veented.info/crexis/home-fullwidth-slider-3/">Fullwidth Slider 3</a></li>
									</ul>
								</li>
								<li id="menu-item-373" class="no-title menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-373">
									<a href="#">Multi Page 2</a>
									<ul class="dropdown-menu">
										<li id="menu-item-1087" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1087"><a href="http://veented.info/crexis/home-fullwidth-slider-4-dark/">Fullwidth Slider 4 Dark</a></li>
										<li id="menu-item-1071" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1071"><a href="http://veented.info/crexis/home-parallax-image-dark-edition/">Parallax Image Dark Edition</a></li>
										<li id="menu-item-1072" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1072"><a href="http://veented.info/crexis/home-rainyday-effect/">RainyDay Effect</a></li>
										<li id="menu-item-1093" class="hot-link-blue menu-item menu-item-type-post_type menu-item-object-page menu-item-1093"><a href="http://veented.info/crexis/home-neptun-type/">Neptun Type</a></li>
										<li id="menu-item-1073" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1073"><a href="http://veented.info/crexis/home-video-background/">Video Background</a></li>
										<li id="menu-item-1074" class="hot-link menu-item menu-item-type-post_type menu-item-object-page menu-item-1074"><a href="http://veented.info/crexis/home-video-background-dark/">Video BG Dark</a></li>
										<li id="menu-item-1075" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1075"><a href="http://veented.info/crexis/home-video-background-night/">Video BG Night</a></li>
										<li id="menu-item-1076" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1076"><a href="http://veented.info/crexis/home-fullwidth-layer-slider/">Fullwidth Layer Slider</a></li>
										<li id="menu-item-1098" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1098"><a href="http://veented.info/crexis/home-animated-background/">Animated Background</a></li>
									</ul>
								</li>
								<li id="menu-item-370" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-370">
									<a href="#">One Page</a>
									<ul class="dropdown-menu">
										<li id="menu-item-821" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-821"><a href="http://veented.info/crexis/onepager-default-home-page/">Default Home Page</a></li>
										<li id="menu-item-820" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-820"><a href="http://veented.info/crexis/onepager-home-boxes-edition/">Home Boxes Edition</a></li>
										<li id="menu-item-867" class="hot-link-blue menu-item menu-item-type-post_type menu-item-object-page menu-item-867"><a href="http://veented.info/crexis/onepager-revolution-slider-1/">Revolution Slider 1</a></li>
										<li id="menu-item-866" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-866"><a href="http://veented.info/crexis/onepager-revolution-slider-2/">Revolution Slider 2</a></li>
										<li id="menu-item-927" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-927"><a href="http://veented.info/crexis/onepager-revolution-slider-3/">Revolution Slider 3</a></li>
										<li id="menu-item-888" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-888"><a href="http://veented.info/crexis/onepager-revolution-slider-4/">Revolution Slider 4</a></li>
										<li id="menu-item-887" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-887"><a href="http://veented.info/crexis/onepager-revolution-slider-5/">Revolution Slider 5</a></li>
										<li id="menu-item-1025" class="hot-link menu-item menu-item-type-post_type menu-item-object-page menu-item-1025"><a href="http://veented.info/crexis/onepager-fullpage/">FullPage Version</a></li>
										<li id="menu-item-1024" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1024"><a href="http://veented.info/crexis/onepager-fullpage-2/">FullPage Version 2</a></li>
										<li id="menu-item-1843" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1843"><a href="http://veented.info/crexis/onepager-fullpage-3/">FullPage Version 3</a></li>
										<li id="menu-item-865" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-865"><a href="http://veented.info/crexis/onepager-black-white-edition/">Black White Edition</a></li>
										<li id="menu-item-873" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-873"><a href="http://veented.info/crexis/onepager-black-white-boxes/">Black White Boxes</a></li>
										<li id="menu-item-889" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-889"><a href="http://veented.info/crexis/onepager-veented-slider/">Veented Slider</a></li>
									</ul>
								</li>
								<li id="menu-item-371" class="no-title menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-371">
									<a href="#">One Page 2</a>
									<ul class="dropdown-menu">
										<li id="menu-item-916" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-916"><a href="http://veented.info/crexis/onepager-fullwidth-slider/">Fullwidth Slider</a></li>
										<li id="menu-item-915" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-915"><a href="http://veented.info/crexis/onepager-fullwidth-slider-2/">Fullwidth Slider 2</a></li>
										<li id="menu-item-1792" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1792"><a href="http://veented.info/crexis/onepager-fullwidth-slider-3/">Fullwidth Slider 3</a></li>
										<li id="menu-item-971" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-971"><a href="http://veented.info/crexis/onepager-fullwidth-slider-4-dark/">Fullwidth Slider 4 Dark</a></li>
										<li id="menu-item-940" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-940"><a href="http://veented.info/crexis/onepager-parallax-image-dark/">Parallax Image Dark Edition</a></li>
										<li id="menu-item-1806" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1806"><a href="http://veented.info/crexis/onepager-rainyday-effect/">RainyDay Effect</a></li>
										<li id="menu-item-939" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939"><a href="http://veented.info/crexis/onepager-neptun-type/">Neptun Type</a></li>
										<li id="menu-item-964" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-964"><a href="http://veented.info/crexis/onepager-video-background/">Video Background</a></li>
										<li id="menu-item-963" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-963"><a href="http://veented.info/crexis/onepager-video-bg-dark/">Video BG Dark</a></li>
										<li id="menu-item-962" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-962"><a href="http://veented.info/crexis/onepager-video-bg-night/">Video BG Night</a></li>
										<li id="menu-item-961" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-961"><a href="http://veented.info/crexis/onepager-fullwidth-layer-slider/">Fullwidth Layer Slider</a></li>
										<li id="menu-item-979" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-979"><a href="http://veented.info/crexis/onepager-animated-background/">Animated Background</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li id="menu-item-159" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-159">
							<a href="#">Pages</a>
							<ul class="dropdown-menu">
								<li id="menu-item-421" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-421"><a href="http://veented.info/crexis/about-us-1/">About Us 1</a></li>
								<li id="menu-item-494" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-494"><a href="http://veented.info/crexis/about-us-2/">About Us 2</a></li>
								<li id="menu-item-493" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-493"><a href="http://veented.info/crexis/about-us-3/">About Us 3</a></li>
								<li id="menu-item-427" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-427"><a href="http://veented.info/crexis/contact-us-1/">Contact Us 1</a></li>
								<li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-492"><a href="http://veented.info/crexis/contact-us-2/">Contact Us 2</a></li>
								<li id="menu-item-426" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-426"><a href="http://veented.info/crexis/services-1/">Services 1</a></li>
								<li id="menu-item-491" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-491"><a href="http://veented.info/crexis/services-2/">Services 2</a></li>
								<li id="menu-item-518" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-518"><a href="http://veented.info/crexis/services-3/">Services 3</a></li>
							</ul>
						</li>
						<li id="menu-item-677" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-677">
							<a href="http://veented.info/crexis/works/boxed-titles-3-columns/">Portfolio</a>
							<ul class="dropdown-menu">
								<li id="menu-item-682" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-682">
									<a href="http://veented.info/crexis/works/wide-5-columns/">Wide</a>
									<ul class="dropdown-menu">
										<li id="menu-item-681" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-681"><a href="http://veented.info/crexis/works/wide-6-columns/">Wide 6 Columns</a></li>
										<li id="menu-item-680" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-680"><a href="http://veented.info/crexis/works/wide-5-columns/">Wide 5 Columns</a></li>
										<li id="menu-item-679" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-679"><a href="http://veented.info/crexis/works/wide-4-columns/">Wide 4 Columns</a></li>
										<li id="menu-item-678" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-678"><a href="http://veented.info/crexis/works/wide-3-columns/">Wide 3 Columns</a></li>
									</ul>
								</li>
								<li id="menu-item-683" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-683">
									<a href="http://veented.info/crexis/works/boxed-3-columns/">Boxed</a>
									<ul class="dropdown-menu">
										<li id="menu-item-687" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-687"><a href="http://veented.info/crexis/works/boxed-5-columns/">Boxed 5 Columns</a></li>
										<li id="menu-item-686" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-686"><a href="http://veented.info/crexis/works/boxed-4-columns/">Boxed 4 Columns</a></li>
										<li id="menu-item-685" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-685"><a href="http://veented.info/crexis/works/boxed-3-columns/">Boxed 3 Columns</a></li>
										<li id="menu-item-684" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-684"><a href="http://veented.info/crexis/works/boxed-2-columns/">Boxed 2 Columns</a></li>
									</ul>
								</li>
								<li id="menu-item-689" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-689">
									<a href="http://veented.info/crexis/works/masonry-wide-5-columns/">Masonry Wide</a>
									<ul class="dropdown-menu">
										<li id="menu-item-676" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-676"><a href="http://veented.info/crexis/works/masonry-wide-6-columns/">Masonry Wide 6 Columns</a></li>
										<li id="menu-item-675" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-675"><a href="http://veented.info/crexis/works/masonry-wide-5-columns/">Masonry Wide 5 Columns</a></li>
										<li id="menu-item-674" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-674"><a href="http://veented.info/crexis/works/masonry-wide-4-columns/">Masonry Wide 4 Columns</a></li>
										<li id="menu-item-673" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-673"><a href="http://veented.info/crexis/works/masonry-wide-3-columns/">Masonry Wide 3 Columns</a></li>
									</ul>
								</li>
								<li id="menu-item-690" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-690">
									<a href="http://veented.info/crexis/works/masonry-5-columns/">Masonry</a>
									<ul class="dropdown-menu">
										<li id="menu-item-672" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-672"><a href="http://veented.info/crexis/works/masonry-5-columns/">Masonry 5 Columns</a></li>
										<li id="menu-item-671" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-671"><a href="http://veented.info/crexis/works/masonry-4-columns/">Masonry 4 Columns</a></li>
										<li id="menu-item-670" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-670"><a href="http://veented.info/crexis/works/masonry-3-columns/">Masonry 3 Columns</a></li>
										<li id="menu-item-669" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-669"><a href="http://veented.info/crexis/works/masonry-2-columns/">Masonry 2 Columns</a></li>
									</ul>
								</li>
								<li id="menu-item-688" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-688">
									<a href="http://veented.info/crexis/works/boxed-titles-3-columns/">Boxed (Titles)</a>
									<ul class="dropdown-menu">
										<li id="menu-item-664" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-664"><a href="http://veented.info/crexis/works/boxed-titles-4-columns/">Boxed Titles 4 Columns</a></li>
										<li id="menu-item-663" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-663"><a href="http://veented.info/crexis/works/boxed-titles-3-columns/">Boxed Titles 3 Columns</a></li>
										<li id="menu-item-662" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-662"><a href="http://veented.info/crexis/works/boxed-titles-2-columns/">Boxed Titles 2 Columns</a></li>
									</ul>
								</li>
								<li id="menu-item-692" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-692">
									<a href="http://veented.info/crexis/works/wide-titles-5-columns/">Wide (Titles)</a>
									<ul class="dropdown-menu">
										<li id="menu-item-668" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-668"><a href="http://veented.info/crexis/works/wide-titles-6-columns/">Wide Titles 6 Columns</a></li>
										<li id="menu-item-667" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-667"><a href="http://veented.info/crexis/works/wide-titles-5-columns/">Wide Titles 5 Columns</a></li>
										<li id="menu-item-666" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-666"><a href="http://veented.info/crexis/works/wide-titles-4-columns/">Wide Titles 4 Columns</a></li>
										<li id="menu-item-665" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-665"><a href="http://veented.info/crexis/works/wide-titles-3-columns/">Wide Titles 3 Columns</a></li>
									</ul>
								</li>
								<li id="menu-item-1119" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-has-children menu-item-1119">
									<a href="http://veented.info/crexis/portfolio/jumping/">Single Posts</a>
									<ul class="dropdown-menu">
										<li id="menu-item-1115" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1115"><a href="http://veented.info/crexis/portfolio/angel-girl/">Basic Sidebar</a></li>
										<li id="menu-item-1116" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1116"><a href="http://veented.info/crexis/portfolio/beautiful-girl/">Basic Fullwidth</a></li>
										<li id="menu-item-1117" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1117"><a href="http://veented.info/crexis/portfolio/blue-eyes/">Extended Hero Section</a></li>
										<li id="menu-item-1118" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1118"><a href="http://veented.info/crexis/portfolio/creative-game/">Extended Veented Slider</a></li>
										<li id="menu-item-1123" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1123"><a href="http://veented.info/crexis/portfolio/forest-scream/">Extended Hero Video</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li id="menu-item-2069" class="mega-menu no-titles menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2069">
							<a href="http://veented.info/crexis/features/">Features</a>
							<ul class="dropdown-menu">
								<li id="menu-item-2082" class="no-title menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2082">
									<a href="http://veented.info/crexis/features/">Features</a>
									<ul class="dropdown-menu">
										<li id="menu-item-2131" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2131"><a href="http://veented.info/crexis/features/headers/">Headers</a></li>
										<li id="menu-item-2130" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2130"><a href="http://veented.info/crexis/features/theme-options/">Theme Options</a></li>
										<li id="menu-item-2128" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2128"><a href="http://veented.info/crexis/features/page-builder/">Page Builder</a></li>
										<li id="menu-item-2129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2129"><a href="http://veented.info/crexis/features/demo-import/">One Click Demo Import</a></li>
										<li id="menu-item-2091" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2091"><a href="http://veented.info/crexis/features/hero-sections/">Hero Sections</a></li>
										<li id="menu-item-551" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-551"><a href="http://veented.info/crexis/typography/">Typography &#038; Columns</a></li>
										<li id="menu-item-555" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-555"><a href="http://veented.info/crexis/boxes/">Icon Boxes</a></li>
										<li id="menu-item-554" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-554"><a href="http://veented.info/crexis/buttons/">Buttons</a></li>
									</ul>
								</li>
								<li id="menu-item-2084" class="no-title menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2084">
									<a href="http://veented.info/crexis/features/">Features</a>
									<ul class="dropdown-menu">
										<li id="menu-item-2073" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2073"><a href="http://veented.info/crexis/features/tabs-and-accordion/">Tabs and Accordion</a></li>
										<li id="menu-item-2077" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2077"><a href="http://veented.info/crexis/features/image-carousel/">Image Carousel</a></li>
										<li id="menu-item-2078" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2078"><a href="http://veented.info/crexis/features/image-gallery/">Image Gallery</a></li>
										<li id="menu-item-2080" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2080"><a href="http://veented.info/crexis/features/logos-carousel/">Logos Carousel</a></li>
										<li id="menu-item-2071" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2071"><a href="http://veented.info/crexis/features/blog-carousel/">Blog Carousel</a></li>
										<li id="menu-item-2072" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2072"><a href="http://veented.info/crexis/features/portfolio-carousel/">Portfolio Carousel</a></li>
										<li id="menu-item-2070" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2070"><a href="http://veented.info/crexis/features/timeline/">Timeline</a></li>
									</ul>
								</li>
								<li id="menu-item-2083" class="no-title menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2083">
									<a href="http://veented.info/crexis/features/">Features</a>
									<ul class="dropdown-menu">
										<li id="menu-item-2081" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2081"><a href="http://veented.info/crexis/features/pricing-tables/">Pricing Tables</a></li>
										<li id="menu-item-2079" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2079"><a href="http://veented.info/crexis/features/counters/">Counters</a></li>
										<li id="menu-item-2074" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2074"><a href="http://veented.info/crexis/features/charts/">Charts</a></li>
										<li id="menu-item-2075" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2075"><a href="http://veented.info/crexis/features/progress-bars/">Progress Bars</a></li>
										<li id="menu-item-2076" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2076"><a href="http://veented.info/crexis/features/testimonials/">Testimonials</a></li>
										<li id="menu-item-552" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-552"><a href="http://veented.info/crexis/icons/">Icons</a></li>
										<li id="menu-item-553" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-553"><a href="http://veented.info/crexis/components/">Other Components</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li id="menu-item-455" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-455">
							<a href="http://veented.info/crexis/sample-page/">Blog</a>
							<ul class="dropdown-menu">
								<li id="menu-item-739" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-739"><a href="http://veented.info/crexis/sample-page/">Sidebar</a></li>
								<li id="menu-item-740" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-740"><a href="http://veented.info/crexis/sample-page/blog-fullwidth/">Fullwidth</a></li>
								<li id="menu-item-735" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-735">
									<a href="http://veented.info/crexis/sample-page/blog-masonry-wide-5/">Masonry Wide</a>
									<ul class="dropdown-menu">
										<li id="menu-item-734" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-734"><a href="http://veented.info/crexis/sample-page/blog-masonry-wide/">Masonry Wide 6</a></li>
										<li id="menu-item-733" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-733"><a href="http://veented.info/crexis/sample-page/blog-masonry-wide-5/">Masonry Wide 5</a></li>
										<li id="menu-item-732" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-732"><a href="http://veented.info/crexis/sample-page/blog-masonry-wide-4/">Masonry Wide 4</a></li>
										<li id="menu-item-731" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-731"><a href="http://veented.info/crexis/sample-page/blog-masonry-dark/">Masonry Wide Dark</a></li>
									</ul>
								</li>
								<li id="menu-item-762" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-762">
									<a href="http://veented.info/crexis/sample-page/blog-masonry-boxed-4/">Masonry Boxed</a>
									<ul class="dropdown-menu">
										<li id="menu-item-761" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-761"><a href="http://veented.info/crexis/sample-page/blog-masonry-boxed/">Masonry Boxed 5</a></li>
										<li id="menu-item-760" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-760"><a href="http://veented.info/crexis/sample-page/blog-masonry-boxed-4/">Masonry Boxed 4</a></li>
										<li id="menu-item-763" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-763"><a href="http://veented.info/crexis/sample-page/blog-masonry-boxed-3/">Masonry Boxed 3</a></li>
										<li id="menu-item-759" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-759"><a href="http://veented.info/crexis/sample-page/blog-masonry-boxed-2/">Masonry Boxed 2</a></li>
									</ul>
								</li>
								<li id="menu-item-769" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-769"><a href="http://veented.info/crexis/sample-page/blog-rainy-day/">Blog Rainy Day</a></li>
								<li id="menu-item-1130" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-has-children menu-item-1130">
									<a href="http://veented.info/crexis/new-york-city/">Single Posts</a>
									<ul class="dropdown-menu">
										<li id="menu-item-1131" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1131"><a href="http://veented.info/crexis/red-hair/">Sidebar</a></li>
										<li id="menu-item-1128" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1128"><a href="http://veented.info/crexis/black-and-white/">Fullwidth</a></li>
										<li id="menu-item-1129" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1129"><a href="http://veented.info/crexis/in-the-woods/">Dark Layout</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li id="menu-item-770" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-770">
							<a href="http://veented.info/crexis/shop/">Shop</a>
							<ul class="dropdown-menu">
								<li id="menu-item-1218" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1218"><a href="http://veented.info/crexis/shop/">Fullwidth 4 Cols</a></li>
								<li id="menu-item-1215" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1215"><a href="http://veented.info/crexis/shop/?layout=fullwidth3">Fullwidth 3 Cols</a></li>
								<li id="menu-item-1216" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1216"><a href="http://veented.info/crexis/shop/?layout=sidebar3">Sidebar 3 Cols</a></li>
								<li id="menu-item-1217" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1217"><a href="http://veented.info/crexis/shop/?layout=sidebar2">Sidebar 2 Cols</a></li>
							</ul>
						</li>
						<li class="dropdown-toggle search-toggle">
							<a href="#" id="search-toggle" class="search"><i class="fa fa-search"></i></a>
							<!-- DropDown Menu -->
							<ul id="search-dropdown" class="dropdown-menu dropdown-search pull-right clearfix">
								<li class="raleway mini-text gray">
									<form method="post" class="search-form" id="search-form" action="http://veented.info/crexis/">
										<input type="text" name="s" id="s" class="transparent uppercase" placeholder="Search...">
										<button type="submit"><i class="fa fa-search"></i></button>
									</form>
								</li>
							</ul>
						</li>
						<li id="woo-nav-cart" class="dropdown-toggle nav-toggle nav-cart">
							<a href="#" class="tahoma"><i class="fa fa-shopping-cart"></i> (<span class="woo-cart-count">0</span>)</a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-right clearfix nav-cart-products">
								<div class="widget_shopping_cart">
									<div class="widget_shopping_cart_content"></div>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<nav id="mobile-nav" class="mobile-nav">
			<ul id="menu-main-navigation-1" class="nav uppercase normal">
				<li class="mega-menu menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-63 current_page_item current-menu-ancestor current_page_ancestor menu-item-has-children menu-item-158">
					<a href="http://veented.info/crexis/default-home-page/">Home</a>
					<ul class="dropdown-menu">
						<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-372">
							<a href="#">Multi Page</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-63 current_page_item menu-item-386"><a href="http://veented.info/crexis/default-home-page/">Default Home Page</a></li>
								<li class="hot-link menu-item menu-item-type-post_type menu-item-object-page menu-item-391"><a href="http://veented.info/crexis/home-boxes-edition/">Home Boxes Edition</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-404"><a href="http://veented.info/crexis/home-revolution-slider-1/">Revolution Slider 1</a></li>
								<li class="hot-link-blue menu-item menu-item-type-post_type menu-item-object-page menu-item-405"><a href="http://veented.info/crexis/home-revolution-slider-2/">Revolution Slider 2</a></li>
								<li class="hot-link menu-item menu-item-type-post_type menu-item-object-page menu-item-1058"><a href="http://veented.info/crexis/home-revolution-slider-3/">Revolution Slider 3</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1059"><a href="http://veented.info/crexis/home-revolution-slider-4/">Revolution Slider 4</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1060"><a href="http://veented.info/crexis/home-revolution-slider-5/">Revolution Slider 5</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="http://veented.info/crexis/home-black-white-edition/">Black White Edition</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1062"><a href="http://veented.info/crexis/home-boxes-black-white/">Black White Boxes</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1586"><a href="http://veented.info/crexis/home-veented-slider/">Veented Slider</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1067"><a href="http://veented.info/crexis/home-fullwidth-slider/">Fullwidth Slider</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1068"><a href="http://veented.info/crexis/home-fullwidth-slider-2/">Fullwidth Slider 2</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1057"><a href="http://veented.info/crexis/home-fullwidth-slider-3/">Fullwidth Slider 3</a></li>
							</ul>
						</li>
						<li class="no-title menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-373">
							<a href="#">Multi Page 2</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1087"><a href="http://veented.info/crexis/home-fullwidth-slider-4-dark/">Fullwidth Slider 4 Dark</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1071"><a href="http://veented.info/crexis/home-parallax-image-dark-edition/">Parallax Image Dark Edition</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1072"><a href="http://veented.info/crexis/home-rainyday-effect/">RainyDay Effect</a></li>
								<li class="hot-link-blue menu-item menu-item-type-post_type menu-item-object-page menu-item-1093"><a href="http://veented.info/crexis/home-neptun-type/">Neptun Type</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1073"><a href="http://veented.info/crexis/home-video-background/">Video Background</a></li>
								<li class="hot-link menu-item menu-item-type-post_type menu-item-object-page menu-item-1074"><a href="http://veented.info/crexis/home-video-background-dark/">Video BG Dark</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1075"><a href="http://veented.info/crexis/home-video-background-night/">Video BG Night</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1076"><a href="http://veented.info/crexis/home-fullwidth-layer-slider/">Fullwidth Layer Slider</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1098"><a href="http://veented.info/crexis/home-animated-background/">Animated Background</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-370">
							<a href="#">One Page</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-821"><a href="http://veented.info/crexis/onepager-default-home-page/">Default Home Page</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-820"><a href="http://veented.info/crexis/onepager-home-boxes-edition/">Home Boxes Edition</a></li>
								<li class="hot-link-blue menu-item menu-item-type-post_type menu-item-object-page menu-item-867"><a href="http://veented.info/crexis/onepager-revolution-slider-1/">Revolution Slider 1</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-866"><a href="http://veented.info/crexis/onepager-revolution-slider-2/">Revolution Slider 2</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-927"><a href="http://veented.info/crexis/onepager-revolution-slider-3/">Revolution Slider 3</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-888"><a href="http://veented.info/crexis/onepager-revolution-slider-4/">Revolution Slider 4</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-887"><a href="http://veented.info/crexis/onepager-revolution-slider-5/">Revolution Slider 5</a></li>
								<li class="hot-link menu-item menu-item-type-post_type menu-item-object-page menu-item-1025"><a href="http://veented.info/crexis/onepager-fullpage/">FullPage Version</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1024"><a href="http://veented.info/crexis/onepager-fullpage-2/">FullPage Version 2</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1843"><a href="http://veented.info/crexis/onepager-fullpage-3/">FullPage Version 3</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-865"><a href="http://veented.info/crexis/onepager-black-white-edition/">Black White Edition</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-873"><a href="http://veented.info/crexis/onepager-black-white-boxes/">Black White Boxes</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-889"><a href="http://veented.info/crexis/onepager-veented-slider/">Veented Slider</a></li>
							</ul>
						</li>
						<li class="no-title menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-371">
							<a href="#">One Page 2</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-916"><a href="http://veented.info/crexis/onepager-fullwidth-slider/">Fullwidth Slider</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-915"><a href="http://veented.info/crexis/onepager-fullwidth-slider-2/">Fullwidth Slider 2</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1792"><a href="http://veented.info/crexis/onepager-fullwidth-slider-3/">Fullwidth Slider 3</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-971"><a href="http://veented.info/crexis/onepager-fullwidth-slider-4-dark/">Fullwidth Slider 4 Dark</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-940"><a href="http://veented.info/crexis/onepager-parallax-image-dark/">Parallax Image Dark Edition</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1806"><a href="http://veented.info/crexis/onepager-rainyday-effect/">RainyDay Effect</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939"><a href="http://veented.info/crexis/onepager-neptun-type/">Neptun Type</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-964"><a href="http://veented.info/crexis/onepager-video-background/">Video Background</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-963"><a href="http://veented.info/crexis/onepager-video-bg-dark/">Video BG Dark</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-962"><a href="http://veented.info/crexis/onepager-video-bg-night/">Video BG Night</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-961"><a href="http://veented.info/crexis/onepager-fullwidth-layer-slider/">Fullwidth Layer Slider</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-979"><a href="http://veented.info/crexis/onepager-animated-background/">Animated Background</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-159">
					<a href="#">Pages</a>
					<ul class="dropdown-menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-421"><a href="http://veented.info/crexis/about-us-1/">About Us 1</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-494"><a href="http://veented.info/crexis/about-us-2/">About Us 2</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-493"><a href="http://veented.info/crexis/about-us-3/">About Us 3</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-427"><a href="http://veented.info/crexis/contact-us-1/">Contact Us 1</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-492"><a href="http://veented.info/crexis/contact-us-2/">Contact Us 2</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-426"><a href="http://veented.info/crexis/services-1/">Services 1</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-491"><a href="http://veented.info/crexis/services-2/">Services 2</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-518"><a href="http://veented.info/crexis/services-3/">Services 3</a></li>
					</ul>
				</li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-677">
					<a href="http://veented.info/crexis/works/boxed-titles-3-columns/">Portfolio</a>
					<ul class="dropdown-menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-682">
							<a href="http://veented.info/crexis/works/wide-5-columns/">Wide</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-681"><a href="http://veented.info/crexis/works/wide-6-columns/">Wide 6 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-680"><a href="http://veented.info/crexis/works/wide-5-columns/">Wide 5 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-679"><a href="http://veented.info/crexis/works/wide-4-columns/">Wide 4 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-678"><a href="http://veented.info/crexis/works/wide-3-columns/">Wide 3 Columns</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-683">
							<a href="http://veented.info/crexis/works/boxed-3-columns/">Boxed</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-687"><a href="http://veented.info/crexis/works/boxed-5-columns/">Boxed 5 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-686"><a href="http://veented.info/crexis/works/boxed-4-columns/">Boxed 4 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-685"><a href="http://veented.info/crexis/works/boxed-3-columns/">Boxed 3 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-684"><a href="http://veented.info/crexis/works/boxed-2-columns/">Boxed 2 Columns</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-689">
							<a href="http://veented.info/crexis/works/masonry-wide-5-columns/">Masonry Wide</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-676"><a href="http://veented.info/crexis/works/masonry-wide-6-columns/">Masonry Wide 6 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-675"><a href="http://veented.info/crexis/works/masonry-wide-5-columns/">Masonry Wide 5 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-674"><a href="http://veented.info/crexis/works/masonry-wide-4-columns/">Masonry Wide 4 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-673"><a href="http://veented.info/crexis/works/masonry-wide-3-columns/">Masonry Wide 3 Columns</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-690">
							<a href="http://veented.info/crexis/works/masonry-5-columns/">Masonry</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-672"><a href="http://veented.info/crexis/works/masonry-5-columns/">Masonry 5 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-671"><a href="http://veented.info/crexis/works/masonry-4-columns/">Masonry 4 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-670"><a href="http://veented.info/crexis/works/masonry-3-columns/">Masonry 3 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-669"><a href="http://veented.info/crexis/works/masonry-2-columns/">Masonry 2 Columns</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-688">
							<a href="http://veented.info/crexis/works/boxed-titles-3-columns/">Boxed (Titles)</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-664"><a href="http://veented.info/crexis/works/boxed-titles-4-columns/">Boxed Titles 4 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-663"><a href="http://veented.info/crexis/works/boxed-titles-3-columns/">Boxed Titles 3 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-662"><a href="http://veented.info/crexis/works/boxed-titles-2-columns/">Boxed Titles 2 Columns</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-692">
							<a href="http://veented.info/crexis/works/wide-titles-5-columns/">Wide (Titles)</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-668"><a href="http://veented.info/crexis/works/wide-titles-6-columns/">Wide Titles 6 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-667"><a href="http://veented.info/crexis/works/wide-titles-5-columns/">Wide Titles 5 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-666"><a href="http://veented.info/crexis/works/wide-titles-4-columns/">Wide Titles 4 Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-665"><a href="http://veented.info/crexis/works/wide-titles-3-columns/">Wide Titles 3 Columns</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-has-children menu-item-1119">
							<a href="http://veented.info/crexis/portfolio/jumping/">Single Posts</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1115"><a href="http://veented.info/crexis/portfolio/angel-girl/">Basic Sidebar</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1116"><a href="http://veented.info/crexis/portfolio/beautiful-girl/">Basic Fullwidth</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1117"><a href="http://veented.info/crexis/portfolio/blue-eyes/">Extended Hero Section</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1118"><a href="http://veented.info/crexis/portfolio/creative-game/">Extended Veented Slider</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1123"><a href="http://veented.info/crexis/portfolio/forest-scream/">Extended Hero Video</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="mega-menu no-titles menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2069">
					<a href="http://veented.info/crexis/features/">Features</a>
					<ul class="dropdown-menu">
						<li class="no-title menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2082">
							<a href="http://veented.info/crexis/features/">Features</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2131"><a href="http://veented.info/crexis/features/headers/">Headers</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2130"><a href="http://veented.info/crexis/features/theme-options/">Theme Options</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2128"><a href="http://veented.info/crexis/features/page-builder/">Page Builder</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2129"><a href="http://veented.info/crexis/features/demo-import/">One Click Demo Import</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2091"><a href="http://veented.info/crexis/features/hero-sections/">Hero Sections</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-551"><a href="http://veented.info/crexis/typography/">Typography &#038; Columns</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-555"><a href="http://veented.info/crexis/boxes/">Icon Boxes</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-554"><a href="http://veented.info/crexis/buttons/">Buttons</a></li>
							</ul>
						</li>
						<li class="no-title menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2084">
							<a href="http://veented.info/crexis/features/">Features</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2073"><a href="http://veented.info/crexis/features/tabs-and-accordion/">Tabs and Accordion</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2077"><a href="http://veented.info/crexis/features/image-carousel/">Image Carousel</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2078"><a href="http://veented.info/crexis/features/image-gallery/">Image Gallery</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2080"><a href="http://veented.info/crexis/features/logos-carousel/">Logos Carousel</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2071"><a href="http://veented.info/crexis/features/blog-carousel/">Blog Carousel</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2072"><a href="http://veented.info/crexis/features/portfolio-carousel/">Portfolio Carousel</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2070"><a href="http://veented.info/crexis/features/timeline/">Timeline</a></li>
							</ul>
						</li>
						<li class="no-title menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2083">
							<a href="http://veented.info/crexis/features/">Features</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2081"><a href="http://veented.info/crexis/features/pricing-tables/">Pricing Tables</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2079"><a href="http://veented.info/crexis/features/counters/">Counters</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2074"><a href="http://veented.info/crexis/features/charts/">Charts</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2075"><a href="http://veented.info/crexis/features/progress-bars/">Progress Bars</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2076"><a href="http://veented.info/crexis/features/testimonials/">Testimonials</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-552"><a href="http://veented.info/crexis/icons/">Icons</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-553"><a href="http://veented.info/crexis/components/">Other Components</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-455">
					<a href="http://veented.info/crexis/sample-page/">Blog</a>
					<ul class="dropdown-menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-739"><a href="http://veented.info/crexis/sample-page/">Sidebar</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-740"><a href="http://veented.info/crexis/sample-page/blog-fullwidth/">Fullwidth</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-735">
							<a href="http://veented.info/crexis/sample-page/blog-masonry-wide-5/">Masonry Wide</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-734"><a href="http://veented.info/crexis/sample-page/blog-masonry-wide/">Masonry Wide 6</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-733"><a href="http://veented.info/crexis/sample-page/blog-masonry-wide-5/">Masonry Wide 5</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-732"><a href="http://veented.info/crexis/sample-page/blog-masonry-wide-4/">Masonry Wide 4</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-731"><a href="http://veented.info/crexis/sample-page/blog-masonry-dark/">Masonry Wide Dark</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-762">
							<a href="http://veented.info/crexis/sample-page/blog-masonry-boxed-4/">Masonry Boxed</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-761"><a href="http://veented.info/crexis/sample-page/blog-masonry-boxed/">Masonry Boxed 5</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-760"><a href="http://veented.info/crexis/sample-page/blog-masonry-boxed-4/">Masonry Boxed 4</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-763"><a href="http://veented.info/crexis/sample-page/blog-masonry-boxed-3/">Masonry Boxed 3</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-759"><a href="http://veented.info/crexis/sample-page/blog-masonry-boxed-2/">Masonry Boxed 2</a></li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-769"><a href="http://veented.info/crexis/sample-page/blog-rainy-day/">Blog Rainy Day</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-has-children menu-item-1130">
							<a href="http://veented.info/crexis/new-york-city/">Single Posts</a>
							<ul class="dropdown-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1131"><a href="http://veented.info/crexis/red-hair/">Sidebar</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1128"><a href="http://veented.info/crexis/black-and-white/">Fullwidth</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1129"><a href="http://veented.info/crexis/in-the-woods/">Dark Layout</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-770">
					<a href="http://veented.info/crexis/shop/">Shop</a>
					<ul class="dropdown-menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1218"><a href="http://veented.info/crexis/shop/">Fullwidth 4 Cols</a></li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1215"><a href="http://veented.info/crexis/shop/?layout=fullwidth3">Fullwidth 3 Cols</a></li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1216"><a href="http://veented.info/crexis/shop/?layout=sidebar3">Sidebar 3 Cols</a></li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1217"><a href="http://veented.info/crexis/shop/?layout=sidebar2">Sidebar 2 Cols</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</nav>
								
	<div id="page-content" class="header-style-transparent page-with-vc">
		<div class="page-holder page-layout-fullwidth">			
			<?php if($currentAction != 'site/error')
				echo $content;?>
		</div>
	</div>

	<div id="footer-widgets-area" class="footer big-footer fullwidth dark-footer t-left">
		<div class="boxed footer_inner">
			<div class="footer-widgets-holder clearfix">
				<div class="col-xs-3">
					<div class="bar footer-widget footer-widget-col-1 widget_text">
						<h4>About Us</h4>
						<div class="textwidget">
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed. </p>
							<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="bar footer-widget footer-widget-col-2 widget_recent_entries">
						<h4>Recent Blog Posts</h4>
						<ul>
							<li>
								<a href="http://veented.info/crexis/red-hair/">Post from Blog</a>
							</li>
							<li>
								<a href="http://veented.info/crexis/black-and-white/">Desert and Clouds</a>
							</li>
							<li>
								<a href="http://veented.info/crexis/in-the-woods/">Train Tracks</a>
							</li>
							<li>
								<a href="http://veented.info/crexis/city-of-new-york/">City of New York</a>
							</li>
							<li>
								<a href="http://veented.info/crexis/cloudy-desert/">Cloudy Desert</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="bar footer-widget footer-widget-col-3 pr_widget_twitter">
						<h4>Latest Tweets</h4>
						<div id="latest_tweets" data-username="envato" data-number="3"></div>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="bar footer-widget footer-widget-col-4 pr_widget_flickr">
						<h4>Flickr</h4>
						<div class="flickr-badge">
							<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=Latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=10133335@N08"></script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
														
	<footer class="footer fullwidth  footer-classic t-left big-footer dark-footer">
		<div class="footer_bottom">
			<!-- Bottom Inner -->
			<div class="boxed clearfix">
				<!-- Left, Copyright Area -->
				<div class="left f-left">
					<!-- Text and Link -->
					<p class="copyright">
						©2015 All rights reserved. Designed by <a href="http://veented.info/crexis/">Goldeyes Theme</a>.					
					</p>
				</div>
				<!-- End Left -->
				<!-- Right, Socials -->
				<div class="right f-right">
					<div class="vntd-social-icons social-icons-classic social-icons-"><a class="social social-facebook url facebook url" href="http://your_facebook_page_url" target="_blank"><i class="fa fa-facebook url"></i></a><a class="social social-twitter twitter" href="#" target="_blank"><i class="fa fa-twitter"></i></a><a class="social social-dribbble dribbble" href="#" target="_blank"><i class="fa fa-dribbble"></i></a><a class="social social-vimeo vimeo" href="#" target="_blank"><i class="fa fa-vimeo"></i></a><a class="social social-youtube youtube" href="#" target="_blank"><i class="fa fa-youtube"></i></a></div>
				</div>
				<!-- End Right -->
			</div>
			<!-- End Inner -->
		</div>
	</footer>
										
	<div id="back-top"><a href="#home" class="scroll t-center white"><i class="fa fa-angle-up"></i></a></div>
	
	<?php $this->widget('FrontGoogleAnalytics'); ?>
 </body>
</html>
<?php }
}?>