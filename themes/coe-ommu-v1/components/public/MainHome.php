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
		));
	}
}
