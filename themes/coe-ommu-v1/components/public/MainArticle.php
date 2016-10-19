<?php

class MainArticle extends CWidget
{
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
		Yii::import('application.modules.article.models.Articles');
		Yii::import('application.modules.article.models.ArticleCategory');
		Yii::import('application.modules.article.models.ArticleMedia');
		
		$criteria=new CDbCriteria;
		$criteria->condition = 'publish = :publish AND published_date <= curdate()';
		$criteria->params = array(
			':publish'=>1,
		);
		$criteria->order = 'published_date DESC';
		//$criteria->addInCondition('cat_id',array(2,3,5,6,7,18));
		$criteria->compare('cat_id', $this->category);
		$criteria->limit = $this->limit == null ? 3 : $this->limit;
			
		$model = Articles::model()->findAll($criteria);
		
		if($this->category == null)
			$render = 'main_article_news';
		else {
			if($this->category == 1)
				$render = 'main_article_news';
			else if($this->category == 2)
				$render = 'main_article_ragam';
			else if($this->category == 3)
				$render = 'main_article_pahlawan';
			else if($this->category == 4)
				$render = 'main_article_agenda';
		}
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
