<?php

class MainBannerLoader extends CWidget
{

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
		
		$criteria=new CDbCriteria;
		$criteria->with = array(
			'category_relation' => array(
				'alias'=>'category_relation',
			),
			'category_relation.view_cat' => array(
				'alias'=>'view',
			),
		);
		$now = new CDbExpression("NOW()");
		$criteria->condition = '(t.expired_date >= curdate() OR t.published_date >= curdate()) OR ((t.expired_date = :date OR t.expired_date = :datestr) OR t.published_date >= curdate())';
		$criteria->params = array(
			':date'=>'0000-00-00', 
			':datestr'=>'1970-01-01', 
		);
		$criteria->compare('t.publish', 1);
		$criteria->compare('view.category_name', 'home-banner');
		$criteria->order = 'RAND()';
		$model = Banners::model()->find($criteria);
		
		$this->render('main_banner_loader',array(
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
