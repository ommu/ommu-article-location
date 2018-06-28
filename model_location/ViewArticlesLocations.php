<?php
/**
 * ViewArticlesLocations
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 9 November 2016, 18:13 WIB
 * @link https://github.com/ommu/ommu-article-location
 *
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 *
 * --------------------------------------------------------------------------------------
 *
 * This is the model class for table "_view_articles".
 *
 * The followings are the available columns in table '_view_articles':
 * @property string $article_id
 * @property string $media_id
 * @property string $media_cover
 * @property string $media_caption
 * @property string $medias
 * @property string $media_all
 * @property string $likes
 * @property string $like_all
 * @property string $views
 * @property string $view_all
 * @property string $downloads
 * @property string $tags
 * @property integer $location_id
 */
class ViewArticlesLocations extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ViewArticlesLocations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '_view_articles_locations';
	}

	/**
	 * @return string the primarykey column
	 */
	public function primaryKey()
	{
		return 'article_id';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, media_id, medias, media_all, likes, like_all, views, view_all, downloads, tags, location_id', 'numerical', 'integerOnly'=>true),
			array('article_id, media_id', 'length', 'max'=>11),
			array('media_cover, media_caption', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('article_id, media_id, media_cover, media_caption, medias, media_all, likes, like_all, views, view_all, downloads, tags, location_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'location' => array(self::BELONGS_TO, 'ArticleLocations', 'location_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'article_id' => Yii::t('attribute', 'Article'),
			'media_id' => Yii::t('attribute', 'Media'),
			'media_cover' => Yii::t('attribute', 'Cover'),
			'media_caption' => Yii::t('attribute', 'Caption'),
			'medias' => Yii::t('attribute', 'Medias'),
			'media_all' => Yii::t('attribute', 'Media All'),
			'likes' => Yii::t('attribute', 'Likes'),
			'like_all' => Yii::t('attribute', 'Like All'),
			'views' => Yii::t('attribute', 'View'),
			'view_all' => Yii::t('attribute', 'All View'),
			'downloads' => Yii::t('attribute', 'Downloads'),
			'tags' => Yii::t('attribute', 'Tags'),
			'location_id' => Yii::t('attribute', 'Location'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.article_id',$this->article_id);
		$criteria->compare('t.media_id',$this->media_id);
		$criteria->compare('t.media_cover',strtolower($this->media_cover),true);
		$criteria->compare('t.media_caption',strtolower($this->media_caption),true);
		$criteria->compare('t.medias',$this->medias);
		$criteria->compare('t.media_all',$this->media_all);
		$criteria->compare('t.likes',$this->likes);
		$criteria->compare('t.like_all',$this->like_all);
		$criteria->compare('t.views',$this->views);
		$criteria->compare('t.view_all',$this->view_all);
		$criteria->compare('t.downloads',$this->downloads);
		$criteria->compare('t.tags',$this->tags);
		$criteria->compare('t.location_id',$this->location_id);

		if(!isset($_GET['ViewArticlesLocations_sort']))
			$criteria->order = 't.article_id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>30,
			),
		));
	}


	/**
	 * Get column for CGrid View
	 */
	public function getGridColumn($columns=null) {
		if($columns !== null) {
			foreach($columns as $val) {
				/*
				if(trim($val) == 'enabled') {
					$this->defaultColumns[] = array(
						'name'  => 'enabled',
						'value' => '$data->enabled == 1? "Ya": "Tidak"',
					);
				}
				*/
				$this->defaultColumns[] = $val;
			}
		} else {
			$this->defaultColumns[] = 'article_id';
			$this->defaultColumns[] = 'media_id';
			$this->defaultColumns[] = 'media_cover';
			$this->defaultColumns[] = 'media_caption';
			$this->defaultColumns[] = 'medias';
			$this->defaultColumns[] = 'media_all';
			$this->defaultColumns[] = 'likes';
			$this->defaultColumns[] = 'like_all';
			$this->defaultColumns[] = 'views';
			$this->defaultColumns[] = 'view_all';
			$this->defaultColumns[] = 'downloads';
			$this->defaultColumns[] = 'tags';
			$this->defaultColumns[] = 'location_id';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			$this->defaultColumns[] = 'article_id';
			$this->defaultColumns[] = 'media_id';
			$this->defaultColumns[] = 'media_cover';
			$this->defaultColumns[] = 'media_caption';
			$this->defaultColumns[] = 'medias';
			$this->defaultColumns[] = 'media_all';
			$this->defaultColumns[] = 'likes';
			$this->defaultColumns[] = 'like_all';
			$this->defaultColumns[] = 'views';
			$this->defaultColumns[] = 'view_all';
			$this->defaultColumns[] = 'downloads';
			$this->defaultColumns[] = 'tags';
			$this->defaultColumns[] = 'location_id';
		}
		parent::afterConstruct();
	}

	/**
	 * User get information
	 */
	public static function getInfo($id, $column=null)
	{
		if($column != null) {
			$model = self::model()->findByPk($id,array(
				'select' => $column,
			));
 			if(count(explode(',', $column)) == 1)
 				return $model->$column;
 			else
 				return $model;
			
		} else {
			$model = self::model()->findByPk($id);
			return $model;
		}
	}

}