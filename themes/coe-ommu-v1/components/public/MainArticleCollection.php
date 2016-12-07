<?php

class MainArticleCollection extends CWidget
{
	public $layout;
	public $theme;
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
		Yii::import('application.modules.article.model_bpad_coe.Articles');
		Yii::import('application.modules.article.model_bpad_coe.ArticleCollections');
		Yii::import('application.modules.article.model_bpad_coe.ArticleCollectionCategory');
		Yii::import('application.modules.article.model_bpad_coe.ViewArticles');
		
		$criteria=new CDbCriteria;
		if($this->location != null) {
			$criteria->with = array(
				'article' => array(
					'alias'=>'article',
				),
				'article.views' => array(
					'alias'=>'views',
				),
			);
		}
		$criteria->condition = 't.publish = :publish';
		$criteria->params = array(
			':publish'=>1,
		);
		if($this->location != null)
			$criteria->compare('views.location_id', $this->location);
		$criteria->limit = $this->limit == null ? 4 : $this->limit;
		$criteria->order = 't.creation_date DESC';
			
		$model = ArticleCollections::model()->findAll($criteria);
		
		$criteria->order = 'RAND()';
		$random = ArticleCollections::model()->find($criteria);
		
		$render = 'main_article_collection';
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
