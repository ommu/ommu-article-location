<?php
/**
 * ArticleCollectionSubjects
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 20 October 2016, 10:09 WIB
 * @link http://company.ommu.co
 * @contact (+62)856-299-4114
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
 * This is the model class for table "ommu_article_collection_subjects".
 *
 * The followings are the available columns in table 'ommu_article_collection_subjects':
 * @property string $id
 * @property string $collection_id
 * @property string $tag_id
 * @property string $creation_date
 * @property string $creation_id
 *
 * The followings are the available model relations:
 * @property ArticleCollections $collection
 * @property OmmuTags $tag
 */
class ArticleCollectionSubjects extends CActiveRecord
{
	public $defaultColumns = array();
	public $tag_input;
	
	// Variable Search
	public $collection_search;
	public $tag_search;
	public $creation_search;

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArticleCollectionSubjects the static model class
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
		return 'ommu_article_collection_subjects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('collection_id, tag_id', 'required'),
			array('collection_id, tag_id, creation_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, collection_id, tag_id, creation_date, creation_id,
				collection_search, tag_search, creation_search', 'safe', 'on'=>'search'),
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
			'collection' => array(self::BELONGS_TO, 'ArticleCollections', 'collection_id'),
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
			'id' => Yii::t('attribute', 'ID'),
			'collection_id' => Yii::t('attribute', 'Collection'),
			'tag_id' => Yii::t('attribute', 'Subject'),
			'creation_date' => Yii::t('attribute', 'Creation Date'),
			'creation_id' => Yii::t('attribute', 'Creation'),
			'collection_search' => Yii::t('attribute', 'Collection'),
			'tag_search' => Yii::t('attribute', 'Subject'),
			'creation_search' => Yii::t('attribute', 'Creation'),
		);
		/*
			'ID' => 'ID',
			'Digital' => 'Digital',
			'Author' => 'Author',
			'Creation Date' => 'Creation Date',
			'Creation' => 'Creation',
		
		*/
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

		$criteria->compare('t.id',strtolower($this->id),true);
		if(isset($_GET['collection']))
			$criteria->compare('t.collection_id',$_GET['collection']);
		else
			$criteria->compare('t.collection_id',$this->collection_id);
		if(isset($_GET['tag']))
			$criteria->compare('t.tag_id',$_GET['tag']);
		else
			$criteria->compare('t.tag_id',$this->tag_id);
		if($this->creation_date != null && !in_array($this->creation_date, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.creation_date)',date('Y-m-d', strtotime($this->creation_date)));
		if(isset($_GET['creation']))
			$criteria->compare('t.creation_id',$_GET['creation']);
		else
			$criteria->compare('t.creation_id',$this->creation_id);
		
		// Custom Search
		$criteria->with = array(
			'collection' => array(
				'alias'=>'collection',
				'select'=>'collection_title',
			),
			'tag' => array(
				'alias'=>'tag',
				'select'=>'body',
			),
			'creation' => array(
				'alias'=>'creation',
				'select'=>'displayname',
			),
		);
		$criteria->compare('collection.collection_title',strtolower($this->collection_search), true);
		$criteria->compare('tag.body',strtolower($this->tag_search), true);
		$criteria->compare('creation.displayname',strtolower($this->creation_search), true);

		if(!isset($_GET['ArticleCollectionSubjects_sort']))
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
		} else {
			//$this->defaultColumns[] = 'id';
			$this->defaultColumns[] = 'collection_id';
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
			/*
			$this->defaultColumns[] = array(
				'class' => 'CCheckBoxColumn',
				'name' => 'id',
				'selectableRows' => 2,
				'checkBoxHtmlOptions' => array('name' => 'trash_id[]')
			);
			*/
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			if(!isset($_GET['collection'])) {
				$this->defaultColumns[] = array(
					'name' => 'collection_search',
					'value' => '$data->collection->collection_title',
				);
			}
			if(!isset($_GET['tag'])) {
				$this->defaultColumns[] = array(
					'name' => 'tag_search',
					'value' => '$data->tag->body',
				);
			}
			$this->defaultColumns[] = array(
				'name' => 'creation_search',
				'value' => '$data->creation->displayname',
			);
			$this->defaultColumns[] = array(
				'name' => 'creation_date',
				'value' => 'Utility::dateFormat($data->creation_date)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'creation_date',
					'language' => 'ja',
					'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'creation_date_filter',
					),
					'options'=>array(
						'showOn' => 'focus',
						'dateFormat' => 'dd-mm-yy',
						'showOtherMonths' => true,
						'selectOtherMonths' => true,
						'changeMonth' => true,
						'changeYear' => true,
						'showButtonPanel' => true,
					),
				), true),
			);
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
				'select' => $column
			));
			return $model->$column;
			
		} else {
			$model = self::model()->findByPk($id);
			return $model;			
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
				if($this->tag_id == 0) {
					$subject = OmmuTags::model()->find(array(
						'select' => 'tag_id, body',
						'condition' => 'publish = 1 AND body = :body',
						'params' => array(
							':body' => $this->tag_input,
						),
					));
					if($subject != null) {
						$this->tag_id = $subject->tag_id;
					} else {
						$data = new OmmuTags;
						$data->body = $this->tag_input;
						if($data->save()) {
							$this->tag_id = $data->tag_id;
						}
					}					
				}
			}
		}
		return true;
	}

}