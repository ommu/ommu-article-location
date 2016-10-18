<?php
/**
 * SyncPost
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 18 October 2016, 14:47 WIB
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
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $description
 * @property string $thumbnail
 * @property integer $post_flag
 * @property string $post_status
 * @property string $post_date
 * @property string $hits
 */
class SyncPost extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SyncPost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->coe;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_flag', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('author', 'length', 'max'=>32),
			array('post_status', 'length', 'max'=>1),
			array('hits', 'length', 'max'=>20),
			array('description, thumbnail, post_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, author, description, thumbnail, post_flag, post_status, post_date, hits', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('attribute', 'ID'),
			'title' => Yii::t('attribute', 'Title'),
			'author' => Yii::t('attribute', 'Author'),
			'description' => Yii::t('attribute', 'Description'),
			'thumbnail' => Yii::t('attribute', 'Thumbnail'),
			'post_flag' => Yii::t('attribute', 'Post Flag'),
			'post_status' => Yii::t('attribute', 'Post Status'),
			'post_date' => Yii::t('attribute', 'Post Date'),
			'hits' => Yii::t('attribute', 'Hits'),
		);
		/*
			'ID' => 'ID',
			'Title' => 'Title',
			'Author' => 'Author',
			'Description' => 'Description',
			'Thumbnail' => 'Thumbnail',
			'Post Flag' => 'Post Flag',
			'Post Status' => 'Post Status',
			'Post Date' => 'Post Date',
			'Hits' => 'Hits',
		
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.title',strtolower($this->title),true);
		$criteria->compare('t.author',strtolower($this->author),true);
		$criteria->compare('t.description',strtolower($this->description),true);
		$criteria->compare('t.thumbnail',strtolower($this->thumbnail),true);
		$criteria->compare('t.post_flag',$this->post_flag);
		$criteria->compare('t.post_status',strtolower($this->post_status),true);
		if($this->post_date != null && !in_array($this->post_date, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.post_date)',date('Y-m-d', strtotime($this->post_date)));
		$criteria->compare('t.hits',strtolower($this->hits),true);

		if(!isset($_GET['SyncPost_sort']))
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
			$this->defaultColumns[] = 'title';
			$this->defaultColumns[] = 'author';
			$this->defaultColumns[] = 'description';
			$this->defaultColumns[] = 'thumbnail';
			$this->defaultColumns[] = 'post_flag';
			$this->defaultColumns[] = 'post_status';
			$this->defaultColumns[] = 'post_date';
			$this->defaultColumns[] = 'hits';
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
			$this->defaultColumns[] = 'title';
			$this->defaultColumns[] = 'author';
			$this->defaultColumns[] = 'description';
			$this->defaultColumns[] = 'thumbnail';
			$this->defaultColumns[] = 'post_flag';
			$this->defaultColumns[] = 'post_status';
			$this->defaultColumns[] = array(
				'name' => 'post_date',
				'value' => 'Utility::dateFormat($data->post_date)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'post_date',
					'language' => 'ja',
					'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'post_date_filter',
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
			$this->defaultColumns[] = 'hits';
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
	/*
	protected function beforeValidate() {
		if(parent::beforeValidate()) {
			// Create action
		}
		return true;
	}
	*/

	/**
	 * after validate attributes
	 */
	/*
	protected function afterValidate()
	{
		parent::afterValidate();
			// Create action
		return true;
	}
	*/
	
	/**
	 * before save attributes
	 */
	/*
	protected function beforeSave() {
		if(parent::beforeSave()) {
			//$this->post_date = date('Y-m-d', strtotime($this->post_date));
		}
		return true;	
	}
	*/
	
	/**
	 * After save attributes
	 */
	/*
	protected function afterSave() {
		parent::afterSave();
		// Create action
	}
	*/

	/**
	 * Before delete attributes
	 */
	/*
	protected function beforeDelete() {
		if(parent::beforeDelete()) {
			// Create action
		}
		return true;
	}
	*/

	/**
	 * After delete attributes
	 */
	/*
	protected function afterDelete() {
		parent::afterDelete();
		// Create action
	}
	*/

}