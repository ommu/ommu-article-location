<?php $this->beginContent('//layouts/default');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');
	
	$module = strtolower(Yii::app()->controller->module->id);
	$controller = strtolower(Yii::app()->controller->id);
	$action = strtolower(Yii::app()->controller->action->id);
	$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
	$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	if($module == null) {
		if($controller == 'site') {
			if($action == 'index')
				$class = 'main';
			else if($action == 'login')
				$class = 'login';
			else
				$class = $action;
		} else
			$class = Utility::getUrlTitle($controller);
	} else {
		if($controller == 'site') {
			if($module == 'article')
				$class = 'blog';
			else
				$class = $module;
		} else
			$class = Utility::getUrlTitle($module.'-'.$controller);
	}
	
	$location = false;
	if(in_array($controller, array('jateng','jabar','jatim','banten','jogja','jakarta'))) {
		$location = true;
		$title = $this->location_name;
		$description = $this->location_desc;
	} else {
		$title = $this->pageTitle;
		$description = $this->pageDescription;
	}
?>
<?php //echo $this->dialogDetail == true ? (empty($this->dialogWidth) ? 'class="boxed clearfix"' : 'class="clearfix"') : 'class="clearfix"';?>

<?php if($module == null && $currentAction == 'site/index') {
	echo $content;?>
	
<?php } else {
	if($this->dialogDetail == false && $this->pageTitleShow == true) {?>
	<!-- Page Header - litle-header or bigger-header - soft-header, dark-header or background -->
	<section id="page-header" class="<?php echo $location == true ? 'background16 parallax xxdark-bg big-header' : 'dark-layout litle-header';?>" <?php echo $location == true && !empty($this->pageImage) ? 'style="background-image:url('.$this->pageImage.');"' : ''?>>
		<!-- Page Header Inner -->
		<div class="page_header_inner clearfix white antialiased">
			<!-- Left -->
			<div class="left f-left">
				<!-- Header -->
				<h2 class="page_header">
					<?php echo CHtml::encode($location == true && $action == 'view' ? $this->pageTitle : $title); ?>
				</h2>
				<!-- Sub Page Text -->
				<?php if($description != '') {?>
				<h5 class="page_note light">
					<?php echo $location == true && $action == 'view' ? $title : $description; ?>
				</h5>
				<?php }?>
			</div>
			<!-- Right -->
			<?php /*
			<div class="right f-right">
				<!-- Right Buttons -->
				<a href="#" class="light">
				Home 
				</a>
				/
				<!-- Button -->
				<a href="#" class="light">
				Icon Styles
				</a>
			</div>
			*/?>
			<!-- End Right -->
		</div>
		<!-- End Inner -->
	</section>
	<!-- End #page-header -->	
	<?php }
	
	if($this->adsSidebar == true) {?>
        <!-- Blog -->
        <section id="blog" class="clearfix boxed pt-40 mb-80">
            <!-- Posts -->
            <div class="posts col-md-9 pl-00 pr-10 mt-90">
				<?php echo $content;?>
            </div>
            <!-- End Posts -->
            <!-- Sidebar -->
            <div class="sidebar col-md-3 pl-20 pr-00 mt-90 gray">
				<?php /*
                <!-- Widget -->
                <div class="widget mb-75">
                    <!-- Head -->
                    <h3 class="widget-head mb-20">
                        Search
                    </h3>
                    <!-- Search Form -->
                    <form class="search-form relative">
                        <input type="text" name="search" class="search" placeholder="Search...">
                        <button class="search-button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- End Widget -->
                <!-- Widget -->
                <div class="widget mb-75">
                    <!-- Head -->
                    <h3 class="widget-head mb-20">
                        About Crexis
                    </h3>
                    <!-- Widget -->
                    <p class="widget-desc">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page.
                    </p>
                </div>
                <!-- End Widget -->
                <!-- Widget -->
                <div class="widget mb-75">
                    <!-- Head -->
                    <h3 class="widget-head mb-20">
                        Categories
                    </h3>
                    <!-- Categories -->
                    <ul class="categories">
                        <!-- Links -->
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Video</a></li>
                        <li><a href="#">MultiPage</a></li>
                        <li><a href="#">OnePage</a></li>
                    </ul>
                    <!-- End Categories -->
                </div>
                <!-- End Widget -->
                <!-- Widget -->
                <div class="widget mb-75">
                    <!-- Head -->
                    <h3 class="widget-head mb-20">
                        Tags
                    </h3>
                    <!-- Tags -->
                    <a href="#" class="tag">Design</a>
                    <a href="#" class="tag">Photography</a>
                    <a href="#" class="tag">HTML</a>
                    <a href="#" class="tag">Video</a>
                    <a href="#" class="tag">OnePage</a>
                    <a href="#" class="tag">Wordpress</a>
                    <a href="#" class="tag">MultiPage</a>
                    <a href="#" class="tag">Crexis</a>
                    <a href="#" class="tag">Branding</a>
                </div>
                <!-- End Widget -->
				*/?>
            </div>
            <!-- End Sidebar -->
			
			<?php /*
            <!-- Pagination -->
            <div class="col-md-12 pagination block t-center mt-90 mb-00">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&amp;laquo;</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">11</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                        <span aria-hidden="true">&amp;raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
			*/?>
        </section>
        <!-- End Blog -->	
		
	<?php } else
		echo $content;	
}?>

<?php $this->endContent(); ?>