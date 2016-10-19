<?php

class SidebarArticleTags extends CWidget
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
		Yii::import('application.modules.article.models.ArticleTag');
		
		$criteria=new CDbCriteria;
		$criteria->order = 'creation_date DESC';
		$criteria->limit = $this->limit == null ? 10 : $this->limit;
			
		$model = ArticleTag::model()->findAll($criteria);
		
		$this->render('sidebar_article_tag',array(
			'model' => $model,
		));
	}
}
