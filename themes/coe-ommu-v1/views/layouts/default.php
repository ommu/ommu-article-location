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
		$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/master.css');
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/form.css');
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/typography.css');
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/layout.css');
		//$cs->registerCssFile(Yii::app()->request->baseUrl.'/externals/content.css');
		//$cs->registerCoreScript('jquery', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery-2.1.3.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/bootstrap.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.appear.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/waypoint.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/modernizr-latest.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.easing.1.3.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/SmoothScroll.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.magnific-popup.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.superslides.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.flexslider.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.simple-text-rotator.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.cubeportfolio.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/owl.carousel.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.parallax-1.1.3.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/skrollr.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.fitvids.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.mb.YTPlayer.js', CClientScript::POS_END);
		// Twitter
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/tweecool.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/tweecool.js', CClientScript::POS_END);
		// Revolution Slider
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/rev_slider/jquery.themepunch.revolution.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/rev_slider/jquery.themepunch.tools.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/rev_slider/rev_plugins.js', CClientScript::POS_END);
		// Page Plugins
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/plugins.js', CClientScript::POS_END);
		// Portfolio Plugins
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/portfolio.js', CClientScript::POS_END);	
		Yii::app()->clientScript->scriptMap=array(
			'jquery.js'=>false,
		);		
		
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
 </head>
 <body <?php echo $this->dialogDetail == true ? 'style="overflow-y: hidden;"' : '';?> class="<?php echo $module == null && $currentAction == 'site/index' ? 'parallax' : '';?>">
 
	<!-- Page Loader -->
	<article id="pageloader" class="white-loader">
		<div class="spinner">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</article>

	<!-- Navigation - select your nav color - dark-nav or white-nav -->
	<nav id="navigation" class="white-nav">
		<!-- Navigation -->
		<div class="navigation first-nav double-nav raleway">
			<!-- Navigation Inner -->
			<div class="nav-inner clearfix">
				<!-- Logo Area -->
				<div class="logo f-left">
					<!-- Logo Link -->
					<a href="#home" class="logo-link scroll">
						<!-- Logo Image / data-second-logo for only white nav -->
						<img src="images/logo/logo_white_red.png" data-second-logo="images/logo/logo_dark_red.png" alt="crexis_logo" />
					</a>
				</div>
				<!-- End Logo Area -->
				<!-- Mobile Menu Button -->
				<a class="mobile-nav-button"><i class="fa fa-bars"></i></a>
				<!-- Navigation Links -->
				<div class="nav-menu clearfix f-right">
					<!-- Nav List -->
					<ul class="nav uppercase normal">
						<li class="dropdown-toggle nav-toggle">
							<a href="#">Home</a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-center clearfix">
								<!-- Submenu -->
								<li class="submenu">
									<!-- Submenu Title -->
									<a href="#" class="menu-title">
									One Page
									</a>
									<!-- Column -->
									<div class="submenu_column">
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index.html" class="ex-link">
										Default Home Page
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index1.html" class="ex-link label" data-label-color="orange" data-label-text="Hot">
										Home Boxes Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index2.html" class="ex-link">
										Slider Revolution 1
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index3.html" class="ex-link label" data-label-color="blue" data-label-text="Hot">
										Slider Revolution 2
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index4.html" class="ex-link">
										Black White Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index5.html" class="ex-link">
										Home Boxes With B&amp;W
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index6.html" class="ex-link">
										Slider Revolution 3
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index7.html" class="ex-link">
										Awesome FS Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index8.html" class="ex-link label" data-label-color="orange" data-label-text="New">
										FS Edition Type 2
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index9.html" class="ex-link">
										FS Edition With Parallax
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index10.html" class="ex-link">
										FullWidth Slider
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index11.html" class="ex-link">
										RainyDay Effect
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index12.html" class="ex-link">
										Slider Revolution 4
										</a>
									</div>
									<!-- End Column -->
								</li>
								<!-- End Submenu -->
								<!-- Submenu -->
								<li class="submenu">
									<!-- Column -->
									<div class="submenu_column">
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index13.html" class="ex-link">
										FullWidth Slider 2
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index14.html" class="ex-link">
										FullWidth Slider 3
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index15.html" class="ex-link">
										Parallax Image Dark Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index16.html" class="ex-link">
										Neptun Type
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index17.html" class="ex-link">
										Video Background
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index18.html" class="ex-link">
										Video BG Dark Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index19.html" class="ex-link">
										FullWidth Layer Slider
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index20.html" class="ex-link label" data-label-color="blue" data-label-text="Hot">
										FS Layer Slider
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index21.html" class="ex-link">
										FW Slider Dark Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index22.html" class="ex-link">
										Slider  Revolution 5
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index23.html" class="ex-link label" data-label-color="blue" data-label-text="Hot">
										Video BG Night Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="index24.html" class="ex-link">
										Animated Background
										</a>
									</div>
									<!-- End Column -->
								</li>
								<!-- End Submenu -->
								<!-- Submenu -->
								<li class="submenu">
									<!-- Submenu Title -->
									<a href="#" class="menu-title">
									Multi Page
									</a>
									<!-- Column -->
									<div class="submenu_column">
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index.html" class="ex-link">
										Default Home Page
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index1.html" class="ex-link label" data-label-color="orange" data-label-text="Hot">
										Home Boxes Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index2.html" class="ex-link">
										Slider Revolution 1
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index3.html" class="ex-link label" data-label-color="blue" data-label-text="Hot">
										Slider Revolution 2
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index4.html" class="ex-link">
										Black White Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index5.html" class="ex-link">
										Home Boxes With B&amp;W
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index6.html" class="ex-link">
										Slider Revolution 3
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index7.html" class="ex-link">
										FullWidth Slider
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index8.html" class="ex-link">
										RainyDay Effect
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index9.html" class="ex-link">
										Slider Revolution 4
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index10.html" class="ex-link">
										FullWidth Slider 2
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index11.html" class="ex-link">
										FullWidth Slider 3
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index12.html" class="ex-link">
										Parallax Image Dark Edition
										</a>
									</div>
									<!-- End Column -->
								</li>
								<!-- End Submenu -->
								<!-- Submenu -->
								<li class="submenu">
									<!-- Column -->
									<div class="submenu_column">
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index13.html" class="ex-link">
										Neptun Type
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index14.html" class="ex-link">
										Video Background
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index15.html" class="ex-link">
										Video BG Dark Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index16.html" class="ex-link">
										FullWidth Layer Slider
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index17.html" class="ex-link label" data-label-color="blue" data-label-text="Hot">
										FS Layer Slider
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index18.html" class="ex-link">
										FW Slider Dark Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index19.html" class="ex-link">
										Slider  Revolution 5
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index20.html" class="ex-link">
										Video BG Night Edition
										</a>
										<!-- Add Your label text and color - red, blue, green, orange, purple, black, white -->
										<a href="mp-index21.html" class="ex-link">
										Animated Background
										</a>
									</div>
									<!-- End Column -->
								</li>
								<!-- End Submenu -->
							</ul>
							<!-- End DropDown -->
						</li>
						<li class="dropdown-toggle nav-toggle">
							<a href="#">Pages</a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-left clearfix">
								<li><a href="pages-about-1.html" class="ex-link">About Us 1</a></li>
								<li><a href="pages-about-2.html" class="ex-link">About Us 2</a></li>
								<li><a href="pages-about-3.html" class="ex-link">About Us 3</a></li>
								<li><a href="pages-contact-1.html" class="ex-link">Contact Us 1</a></li>
								<li><a href="pages-contact-2.html" class="ex-link">Contact Us 2</a></li>
								<li><a href="pages-services-1.html" class="ex-link">Services 1</a></li>
								<li><a href="pages-services-2.html" class="ex-link">Services 2</a></li>
								<li><a href="pages-services-3.html" class="ex-link">Services 3</a></li>
								<li><a href="pages-login.html" class="ex-link">Login Page</a></li>
							</ul>
							<!-- End DropDown -->
						</li>
						<li class="dropdown-toggle nav-toggle">
							<a href="portfolio-titles-fw-5-col.html" class="ex-link">Portfolio</a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-left clearfix">
								<li class="dropdown-submenu nav-toggle">
									<a href="#" class="ex-link">
									Wide
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="portfolio-fw-6col.html" class="ex-link">6 Columns</a></li>
										<li><a href="portfolio-fw-5col.html" class="ex-link">5 Columns</a></li>
										<li><a href="portfolio-fw-4col.html" class="ex-link">4 Columns</a></li>
										<li><a href="portfolio-fw-3col.html" class="ex-link">3 Columns</a></li>
										<li><a href="portfolio-fw-2col.html" class="ex-link">2 Columns</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu nav-toggle">
									<a href="#" class="ex-link">
									Boxed
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="portfolio-boxed-5col.html" class="ex-link">5 Columns</a></li>
										<li><a href="portfolio-boxed-4col.html" class="ex-link">4 Columns</a></li>
										<li><a href="portfolio-boxed-3col.html" class="ex-link">3 Columns</a></li>
										<li><a href="portfolio-boxed-2col.html" class="ex-link">2 Columns</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu nav-toggle">
									<a href="#" class="ex-link">
									Masonry (Wide)
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="portfolio-masonry-6col.html" class="ex-link">6 Columns</a></li>
										<li><a href="portfolio-masonry-5col.html" class="ex-link">5 Columns</a></li>
										<li><a href="portfolio-masonry-4col.html" class="ex-link">4 Columns</a></li>
										<li><a href="portfolio-masonry-3col.html" class="ex-link">3 Columns</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu nav-toggle">
									<a href="#" class="ex-link">
									Masonry (Boxed)
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="portfolio-boxed-masonry-6col.html" class="ex-link">6 Columns</a></li>
										<li><a href="portfolio-boxed-masonry-5col.html" class="ex-link">5 Columns</a></li>
										<li><a href="portfolio-boxed-masonry-4col.html" class="ex-link">4 Columns</a></li>
										<li><a href="portfolio-boxed-masonry-3col.html" class="ex-link">3 Columns</a></li>
										<li><a href="portfolio-boxed-masonry-2col.html" class="ex-link">2 Columns</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu nav-toggle">
									<a href="#" class="ex-link">
									Wide (Titles)
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="portfolio-titles-fw-6-col.html" class="ex-link">6 Columns</a></li>
										<li><a href="portfolio-titles-fw-5-col.html" class="ex-link">5 Columns</a></li>
										<li><a href="portfolio-titles-fw-4-col.html" class="ex-link">4 Columns</a></li>
										<li><a href="portfolio-titles-fw-3-col.html" class="ex-link">3 Columns</a></li>
										<li><a href="portfolio-titles-fw-2-col.html" class="ex-link">2 Columns</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu nav-toggle">
									<a href="#" class="ex-link">
									Boxed (Titles)
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="portfolio-titles-boxed-5-col.html" class="ex-link">5 Columns</a></li>
										<li><a href="portfolio-titles-boxed-4-col.html" class="ex-link">4 Columns</a></li>
										<li><a href="portfolio-titles-boxed-3-col.html" class="ex-link">3 Columns</a></li>
										<li><a href="portfolio-titles-boxed-2-col.html" class="ex-link">2 Columns</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu nav-toggle">
									<a href="#" class="ex-link">
									Single
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="projects/project_01.html" class="ex-link">Single 1</a></li>
										<li><a href="projects/project_02.html" class="ex-link">Single 2</a></li>
										<li><a href="projects/project_03.html" class="ex-link">Single 3</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown-toggle nav-toggle">
							<a href="elements-boxes.html" class="ex-link">Elements</a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-left clearfix">
								<li><a href="elements-boxes.html" class="ex-link">Boxes</a></li>
								<li><a href="elements-buttons.html" class="ex-link">Buttons</a></li>
								<li><a href="elements-components.html" class="ex-link">Components</a></li>
								<li><a href="elements-icons.html" class="ex-link">Icons</a></li>
								<li><a href="elements-typography.html" class="ex-link">Typography</a></li>
							</ul>
							<!-- End DropDown Menu -->
						</li>
						<li class="dropdown-toggle nav-toggle">
							<a href="#">Blog</a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-left clearfix">
								<li><a href="blog/blog_sidebar.html" class="ex-link">Sidebar</a></li>
								<li><a href="blog/blog_fullwidth.html" class="ex-link">Fullwidth</a></li>
								<li class="dropdown-submenu nav-toggle">
									<a href="blog/blog_masonry_6_col.html" class="ex-link">
									Masonry (Wide)
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="blog/blog_masonry_6_col.html" class="ex-link">6 Columns</a></li>
										<li><a href="blog/blog_masonry_5_col.html" class="ex-link">5 Columns</a></li>
										<li><a href="blog/blog_masonry_4_col.html" class="ex-link">4 Columns</a></li>
										<li><a href="blog/blog_masonry_3_col.html" class="ex-link">3 Columns</a></li>
										<li><a href="blog/blog_masonry_dark.html" class="ex-link">Dark Edition</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu nav-toggle">
									<a href="blog/blog_masonry_boxed_4_col.html" class="ex-link">
									Masonry (Boxed)
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="blog/blog_masonry_boxed_5_col.html" class="ex-link">5 Columns</a></li>
										<li><a href="blog/blog_masonry_boxed_4_col.html" class="ex-link">4 Columns</a></li>
										<li><a href="blog/blog_masonry_boxed_3_col.html" class="ex-link">3 Columns</a></li>
										<li><a href="blog/blog_masonry_boxed_2_col.html" class="ex-link">2 Columns</a></li>
									</ul>
								</li>
								<li><a href="blog/blog_rainyday.html" class="ex-link">Rainyday</a></li>
								<li class="dropdown-submenu nav-toggle">
									<a href="blog/blog_single.html" class="ex-link">
									Single
									<i class="fa fa-angle-right f-right"></i>
									</a>
									<!-- DropDown Menu -->
									<ul class="dropdown-menu pull-left clearfix">
										<li><a href="blog/blog_single.html" class="ex-link">Sidebar</a></li>
										<li><a href="blog/blog_single_fullwidth.html" class="ex-link">Fullwidth</a></li>
										<li><a href="blog/blog_single_dark.html" class="ex-link">Dark Edition</a></li>
									</ul>
								</li>
							</ul>
							<!-- End DropDown Menu -->
						</li>
						<li class="dropdown-toggle nav-toggle">
							<a href="pages-shop-4-col.html" class="ex-link">Shop</a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-left clearfix">
								<li><a href="pages-shop-4-col.html" class="ex-link">4 Columns</a></li>
								<li><a href="pages-shop-3-col.html" class="ex-link">3 Columns</a></li>
								<li><a href="pages-shop-2-col.html" class="ex-link">2 Columns</a></li>
								<li><a href="pages-shop-single.html" class="ex-link">Single Product</a></li>
							</ul>
							<!-- End DropDown Menu -->
						</li>
						<li class="dropdown-toggle nav-toggle">
							<a href="#" class="tahoma"><i class="fa fa-search"></i></a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-right clearfix">
								<li class="ml-20 mt-15 mr-20 mb-15 raleway mini-text gray">
									<form method="post" class="search-form">
										<input type="text" name="search" id="search" class="transparent uppercase" placeholder="Search...">
										<button type="submit">
										<i class="fa fa-search"></i>
										</button>
									</form>
								</li>
							</ul>
						</li>
						<li class="dropdown-toggle nav-toggle">
							<a href="#" class="tahoma"><i class="fa fa-shopping-cart"></i> (0)</a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-right clearfix">
								<li class="ml-20 mt-15 mr-20 mb-15 raleway mini-text gray">No Product In The Cart</li>
							</ul>
						</li>
						<li class="dropdown-toggle nav-toggle">
							<a href="#" class="tahoma">Eng<i class="fa fa-angle-down"></i></a>
							<!-- DropDown Menu -->
							<ul class="dropdown-menu pull-right clearfix">
								<li><a href="#" class="scroll">English</a></li>
								<li><a href="#" class="scroll">Germany</a></li>
								<li><a href="#" class="scroll">Spanish</a></li>
							</ul>
						</li>
					</ul>
					<!-- End Nav List -->
				</div>
				<!-- End Navigation Links -->
			</div>
			<!-- End Navigation Inner -->
		</div>
	</nav>
	<!-- End Nav -->
	
	<?php echo $content;?>
	
	<!-- Footer -->
	<footer class="big-footer fullwidth dark-footer t-left">
		<!-- Footer Inner -->
		<div class="clearfix boxed footer_inner">
			<!-- Box -->
			<div class="col-xs-3">
				<!-- Header -->
				<h3 class="footer_header light no-margin no-padding">
					About Us
				</h3>
				<!-- Text -->
				<p class="footer_text">
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.
				</p>
				<!-- Text -->
				<p class="footer_text">
					The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.
				</p>
			</div>
			<!-- End Box -->
			<!-- Box -->
			<div class="col-xs-3">
				<!-- Header -->
				<h3 class="footer_header light no-margin no-padding">
					Additional Links
				</h3>
				<!-- List -->
				<ol>
					<li>
						<!-- Link -->
						<a href="index3.html" class="ex-link">
						Awesome Parallax Home Page
						</a>
					</li>
					<li>
						<!-- Link -->
						<a href="index4.html" class="ex-link">
						Home Page Black&amp;White Style
						</a>
					</li>
					<li>
						<!-- Link -->
						<a href="portfolio-masonry-5col.html" class="ex-link">
						Portfolio Page Masonry Layout
						</a>
					</li>
					<li>
						<!-- Link -->
						<a href="index8.html" class="ex-link">
						Awesome Fullscreen&amp;Dotted Menu
						</a>
					</li>
					<li>
						<!-- Link -->
						<a href="blog/blog_masonry_6_col.html" class="ex-link">
						Masonry Blog Style
						</a>
					</li>
				</ol>
			</div>
			<!-- End Box -->
			<!-- Box -->
			<div class="col-xs-3">
				<!-- Header -->
				<h3 class="footer_header light no-margin no-padding">
					Latest Tweets
				</h3>
				<div id="latest_tweets"></div>
			</div>
			<!-- End Box -->
			<!-- Box -->
			<div class="col-xs-3">
				<!-- Header -->
				<h3 class="footer_header light no-margin no-padding">
					Flickr
				</h3>
				<!-- Flickr -->
				<div id="flickr_badge_wrapper">
					<!-- Flickr Link -->
					<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08"></script>
				</div>
			</div>
			<!-- End Box -->
		</div>
		<!-- End Footer Inner -->
		<!-- Bottom -->
		<div class="footer_bottom">
			<!-- Bottom Inner -->
			<div class="boxed clearfix">
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
					<!-- Link -->
					<a href="#" target="_blank" class="social">
					<i class="fa fa-twitter"></i>
					</a>
					<!-- Link -->
					<a href="#" target="_blank" class="social">
					<i class="fa fa-facebook"></i>
					</a>
					<!-- Link -->
					<a href="#" target="_blank" class="social">
					<i class="fa fa-pinterest"></i>
					</a>
					<!-- Link -->
					<a href="#" target="_blank" class="social">
					<i class="fa fa-tumblr"></i>
					</a>
				</div>
				<!-- End Right -->
			</div>
			<!-- End Inner -->
		</div>
		<!-- End Footer, Bottom -->
	</footer>
	<!-- End Footer -->	
	
	<div id="back-top"><a href="#home" class="scroll t-center white"><i class="fa fa-angle-up"></i></a></div>
	
	<?php $this->widget('FrontGoogleAnalytics'); ?>
 </body>
</html>
<?php }
}?>