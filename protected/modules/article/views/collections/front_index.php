<?php
/**
 * Articles (articles)
 * @var $this SiteController
 * @var $model Articles
 * @var $dataProvider CActiveDataProvider
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Articles
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Articles',
	);
?>

<!-- Portfolio Section -->
<section id="portfolio" class="container masonry ms-5-columns">
	<!-- Filters -->
	<div id="portfolio-filters" class="cbp-l-filters-alignCenter normal type2">
		<!-- Filter -->
		<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
			All
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".graphic" class="cbp-filter-item">
			Graphic
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".design" class="cbp-filter-item">
			Design
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".photography" class="cbp-filter-item">
			Photography
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
		<!-- Filter -->
		<div data-filter=".web" class="cbp-filter-item">
			Web
			<!-- Filter Counter -->
			<div class="cbp-filter-counter"></div>
		</div>
	</div>
	<!-- End Filters -->
	<!-- Portfolio Items -->
	<div id="portfolio-items" class="boxed type2">
		<?php if($model != null) {
			foreach($model as $key => $val) {?>
			<!-- Item -->
			<div class="cbp-item item design">
				<!-- Item Link -->
				<a href="projects/project_01.html" class="cbp-caption ex-link">
					<!-- Item Image -->
					<div class="cbp-caption-defaultWrap">
						<!-- Image Src -->
						<img src="images/portfolio/masonry/01.jpg" alt="Crexis">
						<!-- Item Note -->
						<div class="item_icon">
							<!-- Icon -->
							<p><i class="fa fa-image"></i></p>
							<p>Photography</p>
						</div>
						<!-- End Item Note -->
					</div>
					<!-- End Item Image -->
					<!-- Item Details -->
					<div class="cbp-caption-activeWrap">
						<!-- Centered Details -->
						<div class="center-details">
							<div class="details">
								<!-- Item Name -->
								<h2 class="name ">
									Girl In Snow
								</h2>
								<!-- Tags -->
								<p class="tags">
									Design
								</p>
							</div>
						</div>
						<!-- End Center Details Div -->
					</div>
					<!-- End Item Details -->
				</a>
				<!-- End Item Link -->
			</div>
			<!-- End Item -->
			<?php }
		} else {?>
		
		<?php }?>
		<!-- Item -->
		<div class="cbp-item item photography web">
			<!-- Item Link -->
			<a href="projects/project_02.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/02.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Photography</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name">
								Walking on Bridge
							</h2>
							<!-- Tags -->
							<p class="tags">
								Photography, Web
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item design photography">
			<!-- Item Link -->
			<a href="projects/project_03.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/03.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-image"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Cheese!
							</h2>
							<!-- Tags -->
							<p class="tags">
								Design
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item web">
			<!-- Item Link -->
			<a href="projects/project_01.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/04.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Photography</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Trees in the White
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item web photography">
			<!-- Item Link -->
			<a href="projects/project_02.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/05.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Working in Office
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web, Photography
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item photography design graphic">
			<!-- Item Link -->
			<a href="projects/project_03.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/06.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-image"></i></p>
						<p>Photography</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Photography
							</h2>
							<!-- Tags -->
							<p class="tags">
								Photography, Design
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item photography design web graphic">
			<!-- Item Link -->
			<a href="projects/project_01.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/07.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Train Way
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web, Graphic
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item design photography graphic">
			<!-- Item Link -->
			<a href="projects/project_02.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/08.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Bag and Phone
							</h2>
							<!-- Tags -->
							<p class="tags">
								Design
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item design">
			<!-- Item Link -->
			<a href="projects/project_03.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/09.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Sun Light
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item photography design">
			<!-- Item Link -->
			<a href="projects/project_01.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/10.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-image"></i></p>
						<p>Photography</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Good Morning
							</h2>
							<!-- Tags -->
							<p class="tags">
								Design, Photography
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item web">
			<!-- Item Link -->
			<a href="projects/project_01.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/11.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Photography</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Trees in the White
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item web photography">
			<!-- Item Link -->
			<a href="projects/project_02.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/12.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Working in Office
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web, Photography
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item photography design graphic">
			<!-- Item Link -->
			<a href="projects/project_03.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/13.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-image"></i></p>
						<p>Photography</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Photography
							</h2>
							<!-- Tags -->
							<p class="tags">
								Photography, Design
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item photography design web graphic">
			<!-- Item Link -->
			<a href="projects/project_01.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/14.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Train Way
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web, Graphic
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item design photography graphic">
			<!-- Item Link -->
			<a href="projects/project_02.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/15.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Bag and Phone
							</h2>
							<!-- Tags -->
							<p class="tags">
								Design
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item design">
			<!-- Item Link -->
			<a href="projects/project_03.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/16.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Sun Light
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item photography design">
			<!-- Item Link -->
			<a href="projects/project_01.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/17.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-image"></i></p>
						<p>Photography</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Good Morning
							</h2>
							<!-- Tags -->
							<p class="tags">
								Design, Photography
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item design photography graphic">
			<!-- Item Link -->
			<a href="projects/project_02.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/18.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Bag and Phone
							</h2>
							<!-- Tags -->
							<p class="tags">
								Design
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item design">
			<!-- Item Link -->
			<a href="projects/project_03.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/19.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Sun Light
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
		<!-- Item -->
		<div class="cbp-item item design">
			<!-- Item Link -->
			<a href="projects/project_01.html" class="cbp-caption ex-link">
				<!-- Item Image -->
				<div class="cbp-caption-defaultWrap">
					<!-- Image Src -->
					<img src="images/portfolio/masonry/20.jpg" alt="Crexis">
					<!-- Item Note -->
					<div class="item_icon">
						<!-- Icon -->
						<p><i class="fa fa-camera-retro"></i></p>
						<p>Web Design</p>
					</div>
					<!-- End Item Note -->
				</div>
				<!-- End Item Image -->
				<!-- Item Details -->
				<div class="cbp-caption-activeWrap">
					<!-- Centered Details -->
					<div class="center-details">
						<div class="details">
							<!-- Item Name -->
							<h2 class="name ">
								Sun Light
							</h2>
							<!-- Tags -->
							<p class="tags">
								Web
							</p>
						</div>
					</div>
					<!-- End Center Details Div -->
				</div>
				<!-- End Item Details -->
			</a>
			<!-- End Item Link -->
		</div>
		<!-- End Item -->
	</div>
	<!-- End Portfolio Items -->
</section>
<!-- End Portfolio Section -->