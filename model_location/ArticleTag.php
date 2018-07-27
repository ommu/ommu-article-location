<?php
/**
 * ArticleTag
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2012 Ommu Platform (www.ommu.co)
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
 * This is the model class for table "ommu_article_tag".
 *
 * The followings are the available columns in table 'ommu_article_tag':
 * @property string $id
 * @property string $article_id
 * @property string $tag_id
 * @property string $creation_date
 * @property string $creation_id
 *
 * The followings are the available model relations:
 * @property Articles $article
 */
class ArticleTag extends CActiveRecord
{
	use UtilityTrait;
	use GridViewTrait;

	public $defaultColumns = array();
	public $tag_input;
	
	// Variable Search
	public $category_search;
	public $article_search;
	public $tag_search;
	public $creation_search;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticleTag the static model class
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
		return 'ommu_article_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, tag_id', 'required'),
			array('article_id, tag_id, creation_id', 'length', 'max'=>11),
			array(' 
				tag_input', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, article_id, tag_id, creation_date,
				category_search, article_search, tag_search, creation_search', 'safe', 'on'=>'search'),
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
			'article' => array(self::BELONGS_TO, 'Articles', 'article_id'),
			'tag' => array(self::BELONGS_TO, 'OmmuTags', 'tag_id'),
			'creation' => array(self::BELONGS_TO, 'Users', 'creation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('attribute', 'Tags'),
			'article_id' => Yii::t('attribute', 'Article'),
			'tag_id' => Yii::t('attribute', 'Tags'),
			'creation_date' => Yii::t('attribute', 'Creation Date'),
			'creation_id' => Yii::t('attribute', 'Creation'),
			'category_search' => Yii::t('attribute', 'Category'),
			'article_search' => Yii::t('attribute', 'Article'),
			'tag_search' => Yii::t('attribute', 'Tags'),
			'creation_search' => Yii::t('attribute', 'Creation'),
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		// Custom Search
		$criteria->with = array(
			'article' => array(
				'alias' => 'article',
				'select' => 'publish, cat_id, title, creation_id'
			),
			'article.tags' => array(
				'alias' => 'article_tags',
				'select' => 'tag_id',
				'together'=>true,
			),
			'tag' => array(
				'alias' => 'tag',
				'select' => 'body'
			),
			'creation' => array(
				'alias' => 'creation',
				'select' => 'displayname'
			),
		);

		$criteria->compare('t.id', $this->id);
		if(Yii::app()->getRequest()->getParam('article'))
			$criteria->compare('t.article_id', Yii::app()->getRequest()->getParam('article'));
		else
			$criteria->compare('t.article_id', $this->article_id);
		$criteria->compare('t.tag_id', $this->tag_id);
		if($this->creation_date != null && !in_array($this->creation_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')))
			$criteria->compare('date(t.creation_date)', date('Y-m-d', strtotime($this->creation_date)));
		if(Yii::app()->getRequest()->getParam('creation'))
			$criteria->compare('t.creation_id', Yii::app()->getRequest()->getParam('creation'));
		else
			$criteria->compare('t.creation_id', $this->creation_id);
		
		$criteria->compare('article.cat_id', $this->category_search);
		$criteria->compare('article.title', strtolower($this->article_search), true);
		if(Yii::app()->getRequest()->getParam('article') && Yii::app()->getRequest()->getParam('publish'))
			$criteria->compare('article.publish', Yii::app()->getRequest()->getParam('publish'));
		$tag_search = $this->urlTitle($this->tag_search);
		$criteria->compare('tag.body',$tag_search,true);
		$criteria->compare('creation.displayname', strtolower($this->creation_search), true);
		
		if(Yii::app()->user->level == 2) {
			$location = ArticleLocationUser::model()->find(array(
				'select' => 'location_id, user_id',
				'condition' => 'user_id = :user',
				'params' => array(
					':user' => Yii::app()->user->id,
				),
			));
			if($location != null) {
				$tags = $location->location->tags;
				if(!empty($tags)) {
					$items = array();
					foreach($tags as $key => $val)
						$items[] = $val->tag_id;
					$criteria->addInCondition('article_tags.tag_id', $items);
				}
			} else
				$criteria->compare('article.creation_id',Yii::app()->user->id);
		}

		if(!Yii::app()->getRequest()->getParam('ArticleTag_sort'))
			$criteria->order = 't.id DESC';

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
		}else {
			//$this->defaultColumns[] = 'id';
			$this->defaultColumns[] = 'article_id';
			$this->defaultColumns[] = 'tag_id';
			$this->defaultColumns[] = 'creation_date';
			$this->defaultColumns[] = 'creation_id';
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
			if(!Yii::app()->getRequest()->getParam('article')) {
				$this->defaultColumns[] = array(
					'name' => 'category_search',
					'value' => 'Phrase::trans($data->article->cat->name)',
					'filter'=> ArticleCategory::getCategory(),
					'type' => 'raw',
				);
				$this->defaultColumns[] = array(
					'name' => 'article_search',
					'value' => '$data->article->title',
				);
			}
			$this->defaultColumns[] = array(
				'name' => 'tag_search',
				'value' => 'str_replace(\'-\', \' \', $data->tag->body)',
			);
			$this->defaultColumns[] = array(
				'name' => 'creation_search',
				'value' => '$data->creation->displayname',
			);
			$this->defaultColumns[] = array(
				'name' => 'creation_date',
				'value' => 'Yii::app()->dateFormatter->formatDateTime($data->creation_date, \'medium\', false)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => $this->filterDatepicker($this, 'creation_date'),
			);

		}
		parent::afterConstruct();
	}

	/**
	 * get article tag
	 */
	public static function getKeyword($keyword, $tags) 
	{
		if(empty($tags))
			return $keyword;
		
		else {
			$tag = array();
			foreach($tags as $val)
				$tag[] = $val->tag->body;
				
			$implodeTag = Utility::formatFileType($tag, false);
			return $keyword.', '.$implodeTag;
		}
	}

	/**
	 * before validate attributes
	 */
	protected function beforeValidate() {
		if(parent::beforeValidate()) {
			if($this->isNewRecord)
				$this->creation_id = Yii::app()->user->id;
		}
		return true;
	}
	
	/**
	 * before save attributes
	 */
	protected function beforeSave() {
		if(parent::beforeSave()) {
			if($this->isNewRecord) {
				$tag_input = $this->urlTitle($this->tag_input);
				if($this->tag_id == 0) {
					$tag = OmmuTags::model()->find(array(
						'select' => 'tag_id, body',
						'condition' => 'body = :body',
						'params' => array(
							':body' => $tag_input,
						),
					));
					if($tag != null)
						$this->tag_id = $tag->tag_id;
					else {
						$data = new OmmuTags;
						$data->body = $this->tag_input;
						if($data->save())
							$this->tag_id = $data->tag_id;
					}					
				}
			}
		}
		return true;
	}

}