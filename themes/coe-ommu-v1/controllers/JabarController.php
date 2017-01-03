<?php
/**
 * JakartaController
 * @var $this JakartaController
 * @var $model Articles
 * @var $form CActiveForm
 * version: 0.0.1
 * Reference start
 *
 * TOC :
 *	Index
 *	View
 *	Download
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Articles
 * @contect (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class JabarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $defaultAction = 'index';
	public $location_id = 2;
	public $location_name = '';
	public $location_desc = '';
	public $location_office = '';
	public $location_office_url = '';
	public $location_office_address = '';

	/**
	 * Initialize admin page theme
	 */
	public function init() 
	{		
		Yii::import('application.modules.article.models.*');
		Yii::import('application.modules.article.model_bpad_coe.*');
		
		$arrThemes = Utility::getCurrentTemplate('public');
		Yii::app()->theme = $arrThemes['folder'];
		$this->layout = $arrThemes['layout'];
		
		$location = ArticleLocations::model()->findByPk($this->location_id);
		$this->location_name = $location->province_relation->province;
		$this->location_desc = $location->province_desc;
		$this->location_office = trim($location->office_location);
		$this->location_office_url = Yii::app()->createUrl($location->province_code.'/office');
		
		$office_place = $location->office_place != '' && $location->office_place != '-' ? $location->office_place : '';
		$office_village = $location->office_village != '' && $location->office_village != '-' ? ', '.$location->office_village : '';
		$office_district = $location->office_district != '' && $location->office_district != '-' ? ', '.$location->office_district : '';
		$city = $location->office_city != '' && $location->office_city != 0 ? ', '.$location->city_r->city : '';
		$province = $location->province_id != null && $location->province_id != 0 ? ', '.$location->province_relation->province : '';
		$country = $location->office_country != null && $location->office_country != 0 ? ', '.$location->country_r->country : '';
		$office_zipcode = $location->office_zipcode != '' && $location->office_zipcode != '-' ? ', '.$location->office_zipcode : '';
		$this->location_office_address = $office_place.$office_village.$office_district.$city.$province.$country.$office_zipcode;
		
		if($location != null && $location->province_header_photo != '')
			$this->pageImage = Yii::app()->request->baseUrl.'/public/article/location/'.$location->province_header_photo;
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
				'actions'=>array('index','article','view','office'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->level)',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->level) && (Yii::app()->user->level == 1)',
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
		$setting = ArticleSetting::model()->findByPk(1,array(
			'select' => 'meta_description, meta_keyword',
		));
		
		if(isset($_GET['category']) && $_GET['category'] != '')
			$title = ArticleCategory::model()->findByPk($_GET['category']);

		$criteria=new CDbCriteria;
		$criteria->condition = 'publish = :publish AND published_date <= curdate()';
		$criteria->params = array(
			':publish'=>1,
		);
		$criteria->order = 'published_date DESC';
		if(isset($_GET['category']) && $_GET['category'] != '')
			$criteria->compare('cat_id',$_GET['category']);

		$dataProvider = new CActiveDataProvider('Articles', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>6,
			),
		));
		
		$this->pageTitleShow = true;
		$this->adsSidebar = false;
		$this->pageDescriptionShow = true;
		$this->pageTitle = $this->location_name;
		$this->pageDescription = $this->location_desc;
		$this->pageMeta = $setting->meta_keyword;
		$this->render('/location/front_index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionArticle() 
	{
		$location = ArticleLocations::model()->findByPk($this->location_id);
		
		$criteria=new CDbCriteria;
		$criteria->with = array(
			'article',
		);
		if($location != null && !empty($location->tags)) {			
			$items = array();
			foreach($location->tags as $key => $val)
				$items[] = $val->tag_id;
			$criteria->addInCondition('t.tag_id',$items);
		}
		$criteria->compare('article.publish', 1);
		if(isset($_GET['category']) && $_GET['category'] != '')
			$criteria->compare('article.cat_id', $_GET['category']);
		$criteria->order = 'article.published_date DESC';
		$criteria->group = 'article.article_id';

		$dataProvider = new CActiveDataProvider('ArticleTag', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>6,
			),
		));
		$model = $dataProvider->getData();
		
		$this->pageTitleShow = true;
		$this->pageDescriptionShow = true;
		$this->pageTitle = Yii::t('phrase', 'Article {$location}', array('{$location}'=>$this->location_name));
		$this->pageDescription = $this->location_desc;
		$this->pageMeta = '';
		$this->render('/location/front_article',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) 
	{
		$setting = ArticleSetting::model()->findByPk(1,array(
			'select' => 'meta_keyword',
		));

		$model=$this->loadModel($id);
		
		$viewFind = ArticleViews::model()->find(array(
			'select' => 'view_id, publish, article_id, user_id, views',
			'condition' => 'publish = :publish AND article_id = :article AND user_id = :user',
			'params' => array(
				':publish' => 1,
				':article' => $model->article_id,
				':user' => !Yii::app()->user->isGuest ? Yii::app()->user->id : 0,
			),
		));
		if($viewFind != null)
			ArticleViews::model()->updateByPk($viewFind->view_id, array('views'=>$viewFind->views + 1));
		
		else {
			$view=new ArticleViews;
			$view->article_id = $model->article_id;
			$view->save();
		}
		
		//Random Article
		$criteria=new CDbCriteria;
		$criteria->condition = 'publish = :publish AND published_date <= curdate() AND article_id <> :id';
		$criteria->params = array(
			':publish'=>1,
			':id'=>$id,
		);
		$criteria->compare('cat_id',$model->cat_id);
		$criteria->order = 'RAND()';
		$criteria->limit = 4;
		$random = Articles::model()->findAll($criteria);
		
		$this->pageTitleShow = true;
		$this->pageDescriptionShow = true;
		$this->pageTitle = $model->title;
		$this->pageDescription = Utility::shortText(Utility::hardDecode($model->body),300);
		$this->pageMeta = ArticleTag::getKeyword($setting->meta_keyword, $id);
		$medias = $model->medias;
		if(!empty($medias)) {
			if(in_array($model->article_type, array('1','3'))) {
				$media = Yii::app()->request->baseUrl.'/public/article/'.$id.'/'.$medias[0]->media;
			} else if($model->article_type == 2) {
				$media = 'http://www.youtube.com/watch?v='.$medias[0]->media;
			}
			$this->pageImage = $media;
		}
		$this->render('/location/front_view',array(
			'model'=>$model,
			'random'=>$random,
		));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionOffice() 
	{
		$this->layout = false;
		$model = ArticleLocations::model()->findByPk($this->location_id, array(
			'select' => 'office_name'
		));
		$setting = OmmuSettings::model()->findByPk(1,array(
			'select' => 'site_title'
		));
		
		$return = array();
		$return['maps'] = array(
			'icon'=>Utility::getProtocol().'://'.Yii::app()->request->serverName.Yii::app()->request->baseUrl.'/public/marker_default.png',
			'width'=>42,
			'height'=>48,
		);
		$point = explode(',', $model->office_location);
		$return['data'][] = array(
			'id'=>1,
			'lat'=>trim($point[0]),
			'lng'=>trim($point[1]),
			'name'=>$model->office_name != '' && $model->office_name != '-' ? $model->office_name : $setting->site_title,
			'address'=>$this->location_office_address,
		);
		
		echo CJSON::encode($return);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) 
	{
		$model = Articles::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='articles-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
