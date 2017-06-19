<?php
/**
 * AdminController
 * @var $this AdminController
 * @var $model ArticleLocations
 * @var $form CActiveForm
 * version: 0.0.1
 * Reference start
 *
 * TOC :
 *	Index
 *	Manage
 *	Add
 *	Edit
 *	View
 *	RunAction
 *	Delete
 *	Publish
 *	Setting
 *	Address
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 18 October 2016, 02:29 WIB
 * @link https://github.com/ommu/plu-article-location
 * @contect (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class AdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $defaultAction = 'index';

	/**
	 * Initialize admin page theme
	 */
	public function init() 
	{
		if(!Yii::app()->user->isGuest) {
			if(in_array(Yii::app()->user->level, array(1,2))) {
				$arrThemes = Utility::getCurrentTemplate('admin');
				Yii::app()->theme = $arrThemes['folder'];
				$this->layout = $arrThemes['layout'];
			} else {
				$this->redirect(Yii::app()->createUrl('site/login'));
			}
		} else {
			$this->redirect(Yii::app()->createUrl('site/login'));
		}
	}

	/**
	 * @return array action filters
	 */
	public function filters() 
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() 
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->level)',
				//'expression'=>'isset(Yii::app()->user->level) && (Yii::app()->user->level != 1)',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('manage','setting','address','add','edit','view','runaction','delete','publish'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->level) && in_array(Yii::app()->user->level, array(1,2))',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() 
	{
		$this->redirect(array('manage'));
	}

	/**
	 * Manages all models.
	 */
	public function actionManage() 
	{
		$model=new ArticleLocations('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArticleLocations'])) {
			$model->attributes=$_GET['ArticleLocations'];
		}

		$columnTemp = array();
		if(isset($_GET['GridColumn'])) {
			foreach($_GET['GridColumn'] as $key => $val) {
				if($_GET['GridColumn'][$key] == 1) {
					$columnTemp[] = $key;
				}
			}
		}
		$columns = $model->getGridColumn($columnTemp);

		$this->pageTitle = Yii::t('phrase', 'Locations');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('admin_manage',array(
			'model'=>$model,
			'columns' => $columns,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd() 
	{
		$model=new ArticleLocations;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ArticleLocations'])) {
			$model->attributes=$_POST['ArticleLocations'];
			$model->scenario = 'setting';
			
			if($model->save()) {
				Yii::app()->user->setFlash('success', Yii::t('phrase', 'Article location success created.'));
				$this->redirect(Yii::app()->controller->createUrl('edit', array('id'=>$model->location_id,'plugin'=>'location')));
			}
		}
		
		$this->dialogDetail = true;
		$this->dialogGroundUrl = Yii::app()->controller->createUrl('manage', array('plugin'=>'location'));
		$this->dialogWidth = 600;

		$this->pageTitle = Yii::t('phrase', 'Create Location');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('admin_add',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionEdit($id) 
	{
		$model=$this->loadModel($id);
		$tags=$model->tags;
		$users=$model->users;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ArticleLocations'])) {
			$model->attributes=$_POST['ArticleLocations'];
			$model->scenario = 'setting';
			
			if($model->save()) {
				Yii::app()->user->setFlash('success', Yii::t('phrase', 'Article location success updated'));
				$this->redirect(Yii::app()->controller->createUrl('edit', array('id'=>$model->location_id,'plugin'=>'location')));
			}
		}
		
		$this->pageTitle = Yii::t('phrase', 'Update Location: $province_name', array('$province_name'=>$model->province->province_name));
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('admin_edit',array(
			'model'=>$model,
			'tags'=>$tags,
			'users'=>$users,
		));
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) 
	{
		$model=$this->loadModel($id);
		
		$this->dialogDetail = true;
		$this->dialogGroundUrl = Yii::app()->controller->createUrl('manage', array('plugin'=>'location'));
		$this->dialogWidth = 550;

		$this->pageTitle = Yii::t('phrase', 'View Location: $province_name', array('$province_name'=>$model->province->province_name));
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('admin_view',array(
			'model'=>$model,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionRunAction() {
		$id       = $_POST['trash_id'];
		$criteria = null;
		$actions  = $_GET['action'];

		if(count($id) > 0) {
			$criteria = new CDbCriteria;
			$criteria->addInCondition('id', $id);

			if($actions == 'publish') {
				ArticleLocations::model()->updateAll(array(
					'publish' => 1,
				),$criteria);
			} elseif($actions == 'unpublish') {
				ArticleLocations::model()->updateAll(array(
					'publish' => 0,
				),$criteria);
			} elseif($actions == 'trash') {
				ArticleLocations::model()->updateAll(array(
					'publish' => 2,
				),$criteria);
			} elseif($actions == 'delete') {
				ArticleLocations::model()->deleteAll($criteria);
			}
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) 
	{
		$model=$this->loadModel($id);
		
		if(Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			if(isset($id)) {
				if($model->delete()) {
					echo CJSON::encode(array(
						'type' => 5,
						'get' => Yii::app()->controller->createUrl('manage', array('plugin'=>'location')),
						'id' => 'partial-article-locations',
						'msg' => '<div class="errorSummary success"><strong>'.Yii::t('phrase', 'Article location success deleted.').'</strong></div>',
					));
				}
			}

		} else {
			$this->dialogDetail = true;
			$this->dialogGroundUrl = Yii::app()->controller->createUrl('manage', array('plugin'=>'location'));
			$this->dialogWidth = 350;

			$this->pageTitle = Yii::t('phrase', 'Delete location: $province_name', array('$province_name'=>$model->province->province_name));
			$this->pageDescription = '';
			$this->pageMeta = '';
			$this->render('admin_delete');
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionPublish($id) 
	{
		$model=$this->loadModel($id);
		
		if($model->publish == 1) {
			$title = Yii::t('phrase', 'Unpublish');
			$replace = 0;
		} else {
			$title = Yii::t('phrase', 'Publish');
			$replace = 1;
		}
		$pageTitle = Yii::t('phrase', '{title} location: $province_name', array('{title}'=>$title, '$province_name'=>$model->province->province_name));

		if(Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			if(isset($id)) {
				//change value active or publish
				$model->publish = $replace;

				if($model->update()) {
					echo CJSON::encode(array(
						'type' => 5,
						'get' => Yii::app()->controller->createUrl('manage', array('plugin'=>'location')),
						'id' => 'partial-article-locations',
						'msg' => '<div class="errorSummary success"><strong>'.Yii::t('phrase', 'Article location success updated.').'</strong></div>',
					));
				}
			}

		} else {
			$this->dialogDetail = true;
			$this->dialogGroundUrl = Yii::app()->controller->createUrl('manage', array('plugin'=>'location'));
			$this->dialogWidth = 350;

			$this->pageTitle = $pageTitle;
			$this->pageDescription = '';
			$this->pageMeta = '';
			$this->render('admin_publish',array(
				'title'=>$title,
				'model'=>$model,
			));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionSetting() 
	{
		$location = ArticleLocationUser::model()->find(array(
			'select' => 'location_id, user_id',
			'condition' => 'user_id = :user',
			'params' => array(
				':user' => Yii::app()->user->id,
			),
		));
		if($location == null)
			throw new CHttpException(404, Yii::t('phrase', 'The requested page does not exist.'));
			
		$model=$this->loadModel($location->location_id);
		$tags=$model->tags;
		$users=$model->users;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ArticleLocations'])) {
			$model->attributes=$_POST['ArticleLocations'];
			$model->scenario = 'setting';
			
			if($model->save()) {
				Yii::app()->user->setFlash('success', Yii::t('phrase', 'Article location success updated'));
				$this->redirect(Yii::app()->controller->createUrl('setting', array('plugin'=>'location')));
			}
		}
		
		$this->pageTitle = Yii::t('phrase', 'Location Setting: $province_name', array('$province_name'=>$model->province->province_name));
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('admin_edit',array(
			'model'=>$model,
			'tags'=>$tags,
			'users'=>$users,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionAddress() 
	{
		$id = $_GET['id'];
		
		if(isset($id))
			$model=$this->loadModel($id);		
		else {
			$location = ArticleLocationUser::model()->find(array(
				'select' => 'location_id, user_id',
				'condition' => 'user_id = :user',
				'params' => array(
					':user' => Yii::app()->user->id,
				),
			));
			if($location == null)
				throw new CHttpException(404, Yii::t('phrase', 'The requested page does not exist.'));
				
			$model=$this->loadModel($location->location_id);
		}

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ArticleLocations'])) {
			$model->attributes=$_POST['ArticleLocations'];
			$model->scenario = 'address';
			
			if($model->save()) {
				Yii::app()->user->setFlash('success', Yii::t('phrase', 'Article location success updated'));
				$this->redirect(Yii::app()->controller->createUrl('address', array('id'=>$model->location_id,'plugin'=>'location')));
			}
		}
		
		$this->pageTitle = Yii::t('phrase', 'Location Address: $province_name', array('$province_name'=>$model->province->province_name));
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('admin_address',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) 
	{
		$model = ArticleLocations::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404, Yii::t('phrase', 'The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) 
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-locations-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
