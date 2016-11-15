<?php

class MainArticle extends CWidget
{
	public $layout;
	public $theme;
	public $category;
	public $limit;
	public $location;

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
		Yii::import('application.modules.article.models.ArticleCategory');
		Yii::import('application.modules.article.model_bpad_coe.Articles');
		Yii::import('application.modules.article.model_bpad_coe.ArticleMedia');
		Yii::import('application.modules.article.model_bpad_coe.ViewArticles');
		
		$criteria=new CDbCriteria;
		$criteria->with = array(
			'views' => array(
				'alias'=>'views',
			),
		);
		$criteria->condition = 't.publish = :publish AND t.published_date <= curdate()';
		$criteria->params = array(
			':publish'=>1,
		);
		$criteria->order = 't.published_date DESC';
		//$criteria->addInCondition('cat_id',array(2,3,5,6,7,18));
		$criteria->compare('t.cat_id', $this->category);
		if($this->location != null)
			$criteria->compare('views.location_id', $this->location);
		$criteria->limit = $this->limit == null ? 3 : $this->limit;
			
		$model = Articles::model()->findAll($criteria);
		
		$criteria->order = 'RAND()';
		$random = Articles::model()->find($criteria);
		
		$render = 'main_article_news';
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
			'random' => $random,
		));
	}
}
