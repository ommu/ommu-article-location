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
		$cs->registerCssFile(/*crexis-styles-css'*/Yii::app()->theme->baseUrl.'/css/style.css?ver=4.6.1');
		$cs->registerCssFile(/*socials-css'*/Yii::app()->theme->baseUrl.'/css/socials.css?ver=4.6.1');
		$cs->registerCssFile(/*crexis-responsive-css'*/Yii::app()->theme->baseUrl.'/css/responsive.css?ver=4.6.1');
		$cs->registerCssFile(/*crexis-responsive-css'*/Yii::app()->theme->baseUrl.'/css/dynamic.css?ver=4.6.1');
		$cs->registerCssFile(/*cubePortfolio-css'*/Yii::app()->theme->baseUrl.'/css/scripts/cubeportfolio.min.css?ver=4.5.4');
		$cs->registerCssFile(/*magnific-popup-css'*/Yii::app()->theme->baseUrl.'/css/scripts/magnific-popup.css?ver=4.5.4');
		$cs->registerCssFile(/*owl-carousel-css'*/Yii::app()->theme->baseUrl.'/css/scripts/owl.carousel.css?ver=4.5.4');
		
		//$cs->registerCssFile(/*contact-form-7-css'*/Yii::app()->theme->baseUrl.'/css/woocommerce.css?ver=2.5.5');
		//$cs->registerCssFile(/*contact-form-7-css'*/Yii::app()->theme->baseUrl.'/css/woocommerce-layout.css?ver=2.5.5');
		//$cs->registerCssFile(/*contact-form-7-css'*/Yii::app()->theme->baseUrl.'/css/woocommerce-styling.css?ver=4.5.4');
		//$cs->registerCssFile(/*contact-form-7-css'*/Yii::app()->theme->baseUrl.'/css/layerslider.css?ver=5.6.2');
		//$cs->registerCssFile(/*contact-form-7-css'*/Yii::app()->theme->baseUrl.'/css/styles.css?ver=4.4');
		//$cs->registerCssFile(/*think-button-style-css'*/Yii::app()->theme->baseUrl.'/css/button.css?ver=4.5.4');
		//$cs->registerCssFile(/*ccf-form-css'*/Yii::app()->theme->baseUrl.'/css/form.min.css?ver=7.6');
		//$cs->registerCssFile(/*rs-plugin-settings-css'*/Yii::app()->theme->baseUrl.'/css/settings.css?ver=5.2.4.1');	
		//$cs->registerCssFile(/*rs-plugin-settings-css'*/Yii::app()->theme->baseUrl.'/css/woocommerce-smallscreen.css?ver=2.5.5');
		//$cs->registerCssFile(/*js_composer_front-css'*/Yii::app()->theme->baseUrl.'/css/js_composer.min.css?ver=4.11.2');
		
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/form.css');
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/typography.css');
		//$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/layout.css');
		//$cs->registerCssFile(Yii::app()->request->baseUrl.'/externals/content.css');
		//$cs->registerCoreScript('jquery', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jY9dCsJADIQv1O7iPXzzBCEbSty_mmTR3t5trY-1QiAwfDOZoNCL1T_nkQumFkj9vc-jkSz7GvCcGTNPAkYucxku_goLyS1xIPFqYIyrYxKiohXjIZFWVTfVRSGwJpApMLi9yj9GEyjKxrXo7-qNPVb5dD4DQ39uZow9_xhvpd_Xb-Yb.js');
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/ncvBDYAwCEDRhWxJR1LEiKFFC5i4vXpwAa8_7xfAMNeaUJuP6GnRXg1GM3KDKVhm2Azemiu3oUCn04Rn6rDHJIyffdR2BPUr-0qV9mi4ZlcV-zM-WCWctb33DQ.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/TcxBDoAwCETRC1lJT2RIi4kmMAaIXt8uWc9_0-kDBlTFhxBHSAbdQafDUmwSz9kSbbDnrpdtfa3HAg9CvIB3xfCod63YHw.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9BPLkqtyCzWL8_PT87PzU0tSk7VTywuTi1BEdItTi7KLCgpBgA.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/HcrBDYAwCADAhaToy3kMYkJtQQtNdHtT33czUuNHHLPjZR5Q5ORURacFyTQ2CjisVVhRlErf-a_57tzeNGTkDw.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9RPzs8rSUwu0U3LL8rVNdfPzEvOKU1JLdbPKtYvTi7KLCgpBgA.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9Qvz89Pzs_NTS1KTtVPLC5OLSnWzwKiwtLUokrdpJz85OzSTChXD8wN9dTLzcwDAA.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/M9Qvz89Pzs_NTS1KTtVPLC5OLSnWzyrWTyvKzytJzUtBltbLzczTMcShIauwNLWoUjc5Pz87MxXK04PwQPoA.js', CClientScript::POS_END);
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
 <body <?php echo $this->dialogDetail == true ? 'style="overflow-y: hidden;"' : '';?> class="<?php echo $module == null && $currentAction == 'site/index' ? 'page page-template-default' : 'blog';?> wpb-js-composer vc_responsive">
 
	<article id="pageloader" class="white-loader">
		<div class="spinner">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</article>

	<nav id="navigation" class="<?php echo $module == null && $currentAction == 'site/index' ? 'white-nav navigation-style-transparent' : 'relative-nav white-nav navigation-style-default';?>">
		<div class="navigation double-nav <?php echo $module == null && $currentAction == 'site/index' ? 'first-nav' : '';?> white-nav">
			<div class="nav-inner clearfix">
				<!-- Logo Area -->
				<div class="logo f-left">
					<?php /*
					<!-- Logo Link -->
					<a href="http://veented.info/crexis" class="logo-link scroll">
					<img src="http://veented.info/crexis/wp-content/uploads/2016/02/logo_dark_red_big.png" class="logo-secondary" alt="Crexis WordPress Theme" /><img src="http://veented.info/crexis/wp-content/uploads/2016/02/logo_white_red_big.png" class="site-logo logo-primary" data-second-logo="http://veented.info/crexis/wp-content/uploads/2016/02/logo_dark_red_big.png" alt="Crexis WordPress Theme" />					
					</a>
					*/?>
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
						<li class="menu-item">
							<a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a>	
						</li>
						<li class="menu-item">
							<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>1))?>">Berita</a>
						</li>
						<li class="menu-item">
							<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>2))?>">Ragam Budaya</a>
						</li>
						<li class="menu-item">
							<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>3))?>">Pahlawan Budaya</a>
						</li>
						<li class="menu-item">
							<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>4))?>">Agenda Budaya</a>
						</li>
						<li class="menu-item">
							<a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>1))?>">Tentang Kami</a>
						</li>
						<li class="menu-item">
							<a href="<?php echo Yii::app()->createUrl('support/contact/feedback')?>">Kontak Kami</a>
						</li>
						<li class="dropdown-toggle search-toggle">
							<a href="#" id="search-toggle" class="search"><i class="fa fa-search"></i></a>
							<!-- DropDown Menu -->
							<ul id="search-dropdown" class="dropdown-menu dropdown-search pull-right clearfix">
								<li class="raleway mini-text gray">
									<form method="get" class="search-form" id="search-form" action="<?php echo Yii::app()->createUrl('search/result');?>">
										<input type="text" name="keyword" id="s" class="transparent uppercase" placeholder="Search...">
										<button type="submit"><i class="fa fa-search"></i></button>
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<nav id="mobile-nav" class="mobile-nav">
			<ul id="menu-main-navigation-1" class="nav uppercase normal">
				<li class="menu-item">
					<a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a>	
				</li>
				<li class="menu-item">
					<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>1))?>">Berita</a>
				</li>
				<li class="menu-item">
					<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>2))?>">Ragam Budaya</a>
				</li>
				<li class="menu-item">
					<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>3))?>">Pahlawan Budaya</a>
				</li>
				<li class="menu-item">
					<a href="<?php echo Yii::app()->createUrl('article/site/index', array('category'=>4))?>">Agenda Budaya</a>
				</li>
				<li class="menu-item">
					<a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>1))?>">Tentang Kami</a>
				</li>
				<li class="menu-item">
					<a href="<?php echo Yii::app()->createUrl('support/contact/feedback')?>">Kontak Kami</a>
				</li>
			</ul>
		</nav>
	</nav>
								
	<div id="page-content" class="<?php echo $module == null && $currentAction == 'site/index' ? 'header-style-transparent page-with-vc' : 'header-style-default page-without-vc';?>">
		<?php //if($currentAction != 'site/error')
			echo $content;?>
	</div>
	
	<?php /*
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
	*/?>
	
	<footer class="footer fullwidth  footer-classic t-left big-footer dark-footer">
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
				<?php /*
				<!-- Right, Socials -->
				<div class="right f-right">
					<div class="vntd-social-icons social-icons-classic social-icons-"><a class="social social-facebook url facebook url" href="http://your_facebook_page_url" target="_blank"><i class="fa fa-facebook url"></i></a><a class="social social-twitter twitter" href="#" target="_blank"><i class="fa fa-twitter"></i></a><a class="social social-dribbble dribbble" href="#" target="_blank"><i class="fa fa-dribbble"></i></a><a class="social social-vimeo vimeo" href="#" target="_blank"><i class="fa fa-vimeo"></i></a><a class="social social-youtube youtube" href="#" target="_blank"><i class="fa fa-youtube"></i></a></div>
				</div>
				<!-- End Right -->
				*/?>
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