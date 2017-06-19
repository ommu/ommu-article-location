<?php
/**
 * ViewArticleLocations
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 18 October 2016, 15:30 WIB
 * @link https://github.com/ommu/plu-article-location
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
 * This is the model class for table "_view_article_locations".
 *
 * The followings are the available columns in table '_view_article_locations':
 * @property integer $location_id
 * @property string $tags
 * @property string $users
 * @property integer $address
 * @property integer $phone
 * @property integer $email
 * @property integer $photo
 * @property integer $photo_header
 */
class ViewArticleLocations extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ViewArticleLocations the static model class
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
		return '_view_article_locations';
	}

	/**
	 * @return string the primarykey column
	 */
	public function primaryKey()
	{
		return 'location_id';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location_id', 'numerical', 'integerOnly'=>true),
			array('tags, users', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('location_id, tags, users, address, phone, email, photo, photo_header', 'safe', 'on'=>'search'),
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
			'location_id' => Yii::t('attribute', 'Location'),
			'tags' => Yii::t('attribute', 'Tags'),
			'users' => Yii::t('attribute', 'Users'),
			'address' => Yii::t('attribute', 'Address'),
			'phone' => Yii::t('attribute', 'Phone'),
			'email' => Yii::t('attribute', 'Email'),
			'photo' => Yii::t('attribute', 'Photo'),
			'photo_header' => Yii::t('attribute', 'Photo Header'),
		);
		/*
			'Location' => 'Location',
			'Tags' => 'Tags',
			'Users' => 'Users',
		
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

		$criteria->compare('t.location_id',$this->location_id);
		$criteria->compare('t.tags',$this->tags);
		$criteria->compare('t.users',$this->users);
		$criteria->compare('t.address',$this->address);
		$criteria->compare('t.phone',$this->phone);
		$criteria->compare('t.email',$this->email);
		$criteria->compare('t.photo',$this->photo);
		$criteria->compare('t.photo_header',$this->photo_header);

		if(!isset($_GET['ViewArticleLocations_sort']))
			$criteria->order = 't.location_id DESC';

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
			$this->defaultColumns[] = 'location_id';
			$this->defaultColumns[] = 'tags';
			$this->defaultColumns[] = 'users';
			$this->defaultColumns[] = 'address';
			$this->defaultColumns[] = 'phone';
			$this->defaultColumns[] = 'email';
			$this->defaultColumns[] = 'photo';
			$this->defaultColumns[] = 'photo_header';
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
			//$this->defaultColumns[] = 'location_id';
			$this->defaultColumns[] = 'tags';
			$this->defaultColumns[] = 'users';
			$this->defaultColumns[] = 'address';
			$this->defaultColumns[] = 'phone';
			$this->defaultColumns[] = 'email';
			$this->defaultColumns[] = 'photo';
			$this->defaultColumns[] = 'photo_header';
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

}