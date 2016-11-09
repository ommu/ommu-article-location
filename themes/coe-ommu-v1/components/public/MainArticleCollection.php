<?php

class MainArticleCollection extends CWidget
{
	public $limit;

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
		
		$criteria=new CDbCriteria;
		$criteria->condition = 'publish = :publish';
		$criteria->params = array(
			':publish'=>1,
		);
		$criteria->limit = $this->limit == null ? 4 : $this->limit;
		$criteria->order = 'creation_date DESC';
			
		$model = ArticleCollections::model()->findAll($criteria);		
		
		$this->render('main_article_collection',array(
			'module' => $module,
			'controller' => $controller,
			'action' => $action,
			'currentAction' => $currentAction,
			'currentModule' => $currentModule,
			'currentModuleAction' => $currentModuleAction,
			'model' => $model,
		));
	}
}
