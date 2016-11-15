<?php

class MainHome extends CWidget
{
	public $layout;
	public $category = array();

	public function init() {
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() 
	{
		$module = strtolower(Yii::app()->controller->module->id);
		$controller = strtolower(Yii::app()->controller->id);
		$action = strtolower(Yii::app()->controller->action->id);
		$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
		$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		
		//import model
		Yii::import('application.modules.banner.models.Banners');
		Yii::import('application.modules.banner.models.BannerCategory');
		Yii::import('application.modules.banner.models.ViewBannerCategory');
		
		Yii::import('application.modules.article.models.ArticleCategory');
		Yii::import('application.modules.article.models.ViewArticleCategory');
		Yii::import('application.modules.article.model_bpad_coe.Articles');
		
		$criteria=new CDbCriteria;
		$criteria->condition = 't.publish = :publish';
		$criteria->params = array(
			':publish'=>1,
		);
		if($this->category != null)
			$criteria->addInCondition('cat_id', $this->category);
			
		$model = ArticleCategory::model()->findAll($criteria);
	
		$about = OmmuPages::model()->findByPk(6);
			
		$criteriaBanner=new CDbCriteria;
		$criteriaBanner->with = array(
			'category_relation' => array(
				'alias'=>'category_relation',
			),
			'category_relation.view_cat' => array(
				'alias'=>'view',
			),
		);
		$now = new CDbExpression("NOW()");
		$criteriaBanner->condition = '(t.expired_date >= curdate() OR t.published_date >= curdate()) OR ((t.expired_date = :date OR t.expired_date = :datestr) OR t.published_date >= curdate())';
		$criteriaBanner->params = array(
			':date'=>'0000-00-00', 
			':datestr'=>'1970-01-01', 
		);
		$criteriaBanner->compare('t.publish', 1);
		$criteriaBanner->compare('view.category_name', 'home-banner');
		$criteriaBanner->order = 't.expired_date DESC';
		$banner = Banners::model()->findAll($criteriaBanner);

		$social = SupportContacts::model()->findAll(array(
			//'select' => 'publish, name',
			'condition' => 'publish = :publish',
			'params' => array(
				':publish' => 1,
			),
			//'order' => 'id ASC'
		));
		
		$render = 'main_home_default';
		if($this->layout != null)
			$render = $this->layout;
		
		$this->render($render,array(
			'module' => $module,
			'controller' => $controller,
			'action' => $action,
			'currentAction' => $currentAction,
			'currentModule' => $currentModule,
			'currentModuleAction' => $currentModuleAction,
			'model' => $model,
			'about' => $about,
			'banner' => $banner,
			'social' => $social,
		));
	}
}
