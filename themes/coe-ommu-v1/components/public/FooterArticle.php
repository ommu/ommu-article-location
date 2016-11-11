<?php

class FooterArticle extends CWidget
{
	public $type;
	public $category;
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
		Yii::import('application.modules.article.models.ArticleCategory');
		Yii::import('application.modules.article.model_bpad_coe.Articles');
		Yii::import('application.modules.article.model_bpad_coe.ArticleMedia');
		Yii::import('application.modules.article.model_bpad_coe.ViewArticles');
		
		$criteria=new CDbCriteria;
		$criteria->condition = 't.publish = :publish AND t.published_date <= curdate()';
		$criteria->params = array(
			':publish'=>1,
		);
		$criteria->order = 't.published_date DESC';
		if($this->category != null)
			$criteria->addInCondition('cat_id', $this->category);
		$criteria->limit = $this->limit == null ? 4 : $this->limit;
			
		$model = Articles::model()->findAll($criteria);
		
		$this->render('footer_articles',array(
			'module' => $module,
			'controller' => $controller,
			'action' => $action,
			'currentAction' => $currentAction,
			'currentModule' => $currentModule,
			'currentModuleAction' => $currentModuleAction,
			'model' => $model,
			'type' => $type,
		));
	}
}
