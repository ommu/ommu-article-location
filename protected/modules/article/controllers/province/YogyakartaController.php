<?php

class YogyakartaController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $defaultAction = 'index';
	public function actions()
	{
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('front_index');
	}
	public function actionArticle()
	{
		$this->render('front_article');
	}
	public function actionViewArticle()
	{
		$this->render('front_view_article');
	}
}
