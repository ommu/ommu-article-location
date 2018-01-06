<?php
/**
 * ArticleLocations
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 18 October 2016, 02:26 WIB
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
 * This is the model class for table "ommu_article_locations".
 *
 * The followings are the available columns in table 'ommu_article_locations':
 * @property integer $location_id
 * @property integer $publish
 * @property integer $province_id
 * @property integer $province_code
 * @property integer $province_desc
 * @property integer $province_photo
 * @property integer $province_header_photo
 * @property string $office_name
 * @property string $office_location
 * @property string $office_place
 * @property integer $office_country
 * @property integer $office_city
 * @property integer $office_district
 * @property integer $office_village
 * @property string $office_zipcode
 * @property string $office_phone
 * @property string $office_fax
 * @property string $office_email
 * @property string $creation_date
 * @property string $creation_id
 * @property string $modified_date
 * @property string $modified_id
 *
 * The followings are the available model relations:
 * @property ArticleLocationTag[] $ArticleLocationTags
 * @property ArticleLocationUser[] $ArticleLocationUsers
 */
class ArticleLocations extends CActiveRecord
{
	public $defaultColumns = array();
	public $province_i;
	public $tag_i;
	public $user_i;
	public $old_photo_i;
	public $old_header_photo_i;
	
	// Variable Search
	public $address_search;
	public $email_search;
	public $phone_search;
	public $photo_search;
	public $photo_header_search;
	public $creation_search;
	public $modified_search;

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArticleLocations the static model class
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
		return 'ommu_article_locations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('publish, province_code', 'required'),
			array('
				province_i', 'required', 'on'=>'setting'),
			array('office_location, office_place, office_city, office_phone, office_email', 'required', 'on'=>'address'),
			array('location_id, publish, province_id, office_country, office_city', 'numerical', 'integerOnly'=>true),
			array('office_location, office_district, office_village, office_phone, office_fax, office_email,
				tag_i, user_i', 'length', 'max'=>32),
			array('province_code', 'length', 'max'=>16),
			array('office_city, creation_id, modified_id', 'length', 'max'=>11),
			array('office_country, office_zipcode', 'length', 'max'=>5),
			array('province_id, province_desc, province_photo, province_header_photo, office_name, office_location, office_place, office_country, office_city, office_district, office_village, office_zipcode, office_phone, office_fax, office_email,
				province_i, tag_i, user_i, old_photo_i, old_header_photo_i', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('location_id, publish, province_id, province_code, province_desc, province_photo, province_header_photo, office_name, office_location, office_place, office_country, office_city, office_district, office_village, office_zipcode, office_phone, office_fax, office_email, creation_date, creation_id, modified_date, modified_id,
				address_search, email_search, phone_search, photo_search, photo_header_search, province_i, creation_search, modified_search', 'safe', 'on'=>'search'),
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
			'view' => array(self::BELONGS_TO, 'ViewArticleLocations', 'location_id'),
			'country' => array(self::BELONGS_TO, 'OmmuZoneCountry', 'office_country'),
			'province' => array(self::BELONGS_TO, 'OmmuZoneProvince', 'province_id'),
			'city' => array(self::BELONGS_TO, 'OmmuZoneCity', 'office_city'),
			'creation' => array(self::BELONGS_TO, 'Users', 'creation_id'),
			'modified' => array(self::BELONGS_TO, 'Users', 'modified_id'),
			'tags' => array(self::HAS_MANY, 'ArticleLocationTag', 'location_id'),
			'users' => array(self::HAS_MANY, 'ArticleLocationUser', 'location_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'location_id' => Yii::t('attribute', 'Location'),
			'publish' => Yii::t('attribute', 'Publish'),
			'province_id' => Yii::t('attribute', 'Province'),
			'province_code' => Yii::t('attribute', 'Code'),
			'province_desc' => Yii::t('attribute', 'Description'),
			'province_photo' => Yii::t('attribute', 'Photo'),
			'province_header_photo' => Yii::t('attribute', 'Header Photo'),
			'creation_date' => Yii::t('attribute', 'Creation Date'),
			'office_name' => Yii::t('attribute', 'Office Name'),
			'office_location' => Yii::t('attribute', 'Office Maps Location'),
			'office_place' => Yii::t('attribute', 'Office Address'),
			'office_country' => Yii::t('attribute', 'Office Country'),
			'office_city' => Yii::t('attribute', 'Office City'),
			'office_district' => Yii::t('attribute', 'Office District'),
			'office_village' => Yii::t('attribute', 'Office Village'),
			'office_zipcode' => Yii::t('attribute', 'Office Zipcode'),
			'office_phone' => Yii::t('attribute', 'Office Phone'),
			'office_fax' => Yii::t('attribute', 'Office Fax'),
			'office_email' => Yii::t('attribute', 'Office Email'),
			'creation_id' => Yii::t('attribute', 'Creation'),
			'modified_date' => Yii::t('attribute', 'Modified Date'),
			'modified_id' => Yii::t('attribute', 'Modified'),
			'province_i' => Yii::t('attribute', 'Province'),
			'tag_i' => Yii::t('attribute', 'Tag'),
			'user_i' => Yii::t('attribute', 'User'),
			'old_photo_i' => Yii::t('attribute', 'Old Photo'),
			'old_header_photo_i' => Yii::t('attribute', 'Old Photo Header'),
			'address_search' => Yii::t('attribute', 'Address'),
			'phone_search' => Yii::t('attribute', 'Phone'),
			'email_search' => Yii::t('attribute', 'Email'),
			'photo_search' => Yii::t('attribute', 'Photo'),
			'photo_header_search' => Yii::t('attribute', 'Photo Header'),
			'creation_search' => Yii::t('attribute', 'Creation'),
			'modified_search' => Yii::t('attribute', 'Modified'),
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
		
		// Custom Search
		$criteria->with = array(
			'view' => array(
				'alias'=>'view',
			),
			'province' => array(
				'alias'=>'province',
				'select'=>'province_name'
			),
			'creation' => array(
				'alias'=>'creation',
				'select'=>'displayname'
			),
			'modified' => array(
				'alias'=>'modified',
				'select'=>'displayname'
			),
		);

		$criteria->compare('t.location_id',$this->location_id);
		if(isset($_GET['type']) && $_GET['type'] == 'publish')
			$criteria->compare('t.publish',1);
		elseif(isset($_GET['type']) && $_GET['type'] == 'unpublish')
			$criteria->compare('t.publish',0);
		elseif(isset($_GET['type']) && $_GET['type'] == 'trash')
			$criteria->compare('t.publish',2);
		else {
			$criteria->addInCondition('t.publish',array(0,1));
			$criteria->compare('t.publish',$this->publish);
		}
		$criteria->compare('t.province_id',$this->province_id);
		$criteria->compare('t.province_code',strtolower($this->province_code),true);
		$criteria->compare('t.province_desc',strtolower($this->province_desc),true);
		$criteria->compare('t.province_photo',strtolower($this->province_photo),true);
		$criteria->compare('t.province_header_photo',strtolower($this->province_header_photo),true);
		$criteria->compare('t.office_name',strtolower($this->office_name),true);
		$criteria->compare('t.office_location',strtolower($this->office_location),true);
		$criteria->compare('t.office_place',strtolower($this->office_place),true);
		$criteria->compare('t.office_country',$this->office_country);
		$criteria->compare('t.office_city',$this->office_city);
		$criteria->compare('t.office_district',strtolower($this->office_district),true);
		$criteria->compare('t.office_village',strtolower($this->office_village),true);
		$criteria->compare('t.office_zipcode',$this->office_zipcode,true);
		$criteria->compare('t.office_phone',$this->office_phone,true);
		$criteria->compare('t.office_fax',$this->office_fax,true);
		$criteria->compare('t.office_email',strtolower($this->office_email),true);
		if($this->creation_date != null && !in_array($this->creation_date, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.creation_date)',date('Y-m-d', strtotime($this->creation_date)));
		if(isset($_GET['creation']))
			$criteria->compare('t.creation_id',$_GET['creation']);
		else
			$criteria->compare('t.creation_id',$this->creation_id);
		if($this->modified_date != null && !in_array($this->modified_date, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.modified_date)',date('Y-m-d', strtotime($this->modified_date)));
		if(isset($_GET['modified']))
			$criteria->compare('t.modified_id',$_GET['modified']);
		else
			$criteria->compare('t.modified_id',$this->modified_id);
		
		$criteria->compare('view.address',$this->address_search);
		$criteria->compare('view.phone',$this->phone_search);
		$criteria->compare('view.email',$this->email_search);
		$criteria->compare('view.photo',$this->photo_search);
		$criteria->compare('view.photo_header',$this->photo_header_search);
		$criteria->compare('view.tags',$this->tag_i);
		$criteria->compare('view.users',$this->user_i);
		$criteria->compare('province.province_name',strtolower($this->province_i),true);
		$criteria->compare('creation.displayname',strtolower($this->creation_search),true);
		$criteria->compare('modified.displayname',strtolower($this->modified_search),true);

		if(!isset($_GET['ArticleLocations_sort']))
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
			//$this->defaultColumns[] = 'location_id';
			$this->defaultColumns[] = 'publish';
			$this->defaultColumns[] = 'province_id';
			$this->defaultColumns[] = 'province_code';
			$this->defaultColumns[] = 'province_desc';
			$this->defaultColumns[] = 'province_photo';
			$this->defaultColumns[] = 'province_header_photo';
			$this->defaultColumns[] = 'office_name';
			$this->defaultColumns[] = 'office_location';
			$this->defaultColumns[] = 'office_place';
			$this->defaultColumns[] = 'office_country';
			$this->defaultColumns[] = 'office_city';
			$this->defaultColumns[] = 'office_district';
			$this->defaultColumns[] = 'office_village';
			$this->defaultColumns[] = 'office_zipcode';
			$this->defaultColumns[] = 'office_phone';
			$this->defaultColumns[] = 'office_fax';
			$this->defaultColumns[] = 'office_email';
			$this->defaultColumns[] = 'creation_date';
			$this->defaultColumns[] = 'creation_id';
			$this->defaultColumns[] = 'modified_date';
			$this->defaultColumns[] = 'modified_id';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() 
	{
		$setting = ArticleLocationSetting::model()->findByPk(1, array(
			'select' => 'gridview_column',
		));
		$gridview_column = unserialize($setting->gridview_column);		
		if(empty($gridview_column))
			$gridview_column = array();

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
			$this->defaultColumns[] = array(
				'name' => 'province_i',
				'value' => '$data->province->province_name',
			);
			$this->defaultColumns[] = array(
				'name' => 'province_code',
				'value' => '$data->province_code',
			);
			if(in_array('creation_search', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'creation_search',
					'value' => '$data->creation->displayname',
				);
			}
			if(in_array('creation_date', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'creation_date',
					'value' => 'Utility::dateFormat($data->creation_date)',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter' => Yii::app()->controller->widget('application.libraries.core.components.system.CJuiDatePicker', array(
						'model'=>$this,
						'attribute'=>'creation_date',
						'language' => 'en',
						'i18nScriptFile' => 'jquery-ui-i18n.min.js',
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
			if(in_array('tag_i', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'tag_i',
					'value' => 'CHtml::link($data->view->tags ? $data->view->tags : 0, Yii::app()->controller->createUrl("location/tag/manage",array(\'location\'=>$data->location_id,\'plugin\'=>\'location\')))',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'type' => 'raw',
				);
			}
			if(in_array('user_i', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'user_i',
					'value' => 'CHtml::link($data->view->users ? $data->view->users : 0, Yii::app()->controller->createUrl("location/user/manage",array(\'location\'=>$data->location_id,\'plugin\'=>\'location\')))',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'type' => 'raw',
				);
			}
			if(in_array('address_search', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'address_search',
					'value' => '$data->view->address == 1 ? CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/publish.png\') : CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/unpublish.png\') ',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
					'type' => 'raw',
				);
			}
			if(in_array('phone_search', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'phone_search',
					'value' => '$data->view->phone == 1 ? CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/publish.png\') : CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/unpublish.png\') ',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
					'type' => 'raw',
				);
			}
			if(in_array('email_search', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'email_search',
					'value' => '$data->view->email == 1 ? CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/publish.png\') : CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/unpublish.png\') ',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
					'type' => 'raw',
				);
			}
			if(in_array('photo_search', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'photo_search',
					'value' => '$data->view->photo == 1 ? CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/publish.png\') : CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/unpublish.png\') ',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
					'type' => 'raw',
				);
			}
			if(in_array('photo_header_search', $gridview_column)) {
				$this->defaultColumns[] = array(
					'name' => 'photo_header_search',
					'value' => '$data->view->photo_header == 1 ? CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/publish.png\') : CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/unpublish.png\') ',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
					'type' => 'raw',
				);
			}
			if(!isset($_GET['type'])) {
				$this->defaultColumns[] = array(
					'name' => 'publish',
					'value' => 'Utility::getPublish(Yii::app()->controller->createUrl("publish",array("id"=>$data->location_id,\'plugin\'=>\'location\')), $data->publish, 1)',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
					'type' => 'raw',
				);
			}
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
	 * Resize Photo
	 */
	public static function resizePhoto($photo, $size) {
		Yii::import('ext.phpthumb.PhpThumbFactory');
		$resizePhoto = PhpThumbFactory::create($photo, array('jpegQuality' => 90, 'correctPermissions' => true));
		if($size['height'] == 0)
			$resizePhoto->resize($size['width']);
		else			
			$resizePhoto->adaptiveResize($size['width'], $size['height']);
		
		$resizePhoto->save($photo);
		
		return true;
	}

	/**
	 * before validate attributes
	 */
	protected function beforeValidate() {
		$setting = ArticleLocationSetting::model()->findByPk(1, array(
			'select' => 'media_file_type',
		));
		$media_file_type = unserialize($setting->media_file_type);
		if(empty($media_file_type))
			$media_file_type = array();
		
		if(parent::beforeValidate()) {			
			if($this->isNewRecord) {
				$this->office_country = 72;	
				$this->creation_id = Yii::app()->user->id;	
			} else
				$this->modified_id = Yii::app()->user->id;
			
			if($this->province_id && $this->province_i != '') {
				$province = OmmuZoneProvince::model()->find(array(
					'select' => 'province_id, province_name',
					'condition' => 'publish = :publish AND province_name = :province',
					'params' => array(
						':publish' => 1,
						':province' => strtolower($this->province_i),
					),
				));
				if($province != null)
					$this->province_id = $province->province_id;
				else
					$this->addError('province_i', Yii::t('phrase', 'Province tidak ditemukan pada database.'));
			}
			
			$province_photo = CUploadedFile::getInstance($this, 'province_photo');
			if($province_photo->name != null) {
				$extension = pathinfo($province_photo->name, PATHINFO_EXTENSION);
				if(!in_array(strtolower($extension), $media_file_type))
					$this->addError('province_photo', Yii::t('phrase', 'The file {name} cannot be uploaded. Only files with these extensions are allowed: {extensions}.', array(
						'{name}'=>$province_photo->name,
						'{extensions}'=>Utility::formatFileType($media_file_type, false),
					)));
			}
			
			$province_header_photo = CUploadedFile::getInstance($this, 'province_header_photo');
			if($province_header_photo->name != null) {
				$extension = pathinfo($province_header_photo->name, PATHINFO_EXTENSION);
				if(!in_array(strtolower($extension), $media_file_type))
					$this->addError('province_header_photo', Yii::t('phrase', 'The file {name} cannot be uploaded. Only files with these extensions are allowed: {extensions}.', array(
						'{name}'=>$province_header_photo->name,
						'{extensions}'=>Utility::formatFileType($media_file_type, false),
					)));
			}
		}
		return true;
	}
	
	/**
	 * before save attributes
	 */
	protected function beforeSave() 
	{
		$action = strtolower(Yii::app()->controller->action->id);		
		$setting = ArticleLocationSetting::model()->findByPk(1, array(
			'select' => 'media_resize, media_resize_size',
		));
		$media_resize_size = unserialize($setting->media_resize_size);
		
		if(parent::beforeSave()) {
			if(!$this->isNewRecord && in_array($action, array('edit','setting'))) {
				//Update article location photo
				$location_path = 'public/article/location';
				
				// Add article directory
				if(!file_exists($location_path)) {
					@mkdir($location_path, 0777,true);

					// Add file in article directory (index.php)
					$newFile = $location_path.'/index.php';
					$FileHandle = fopen($newFile, 'w');
				} else
					@chmod($location_path, 0755,true);
				
				$this->province_photo = CUploadedFile::getInstance($this, 'province_photo');
				if($this->province_photo != null) {
					if($this->province_photo instanceOf CUploadedFile) {
						$fileName = time().'_'.$this->location_id.'_'.Utility::getUrlTitle($this->province->province_name).'.'.strtolower($this->province_photo->extensionName);
						if($this->province_photo->saveAs($location_path.'/'.$fileName)) {
							if($this->old_photo_i != '' && file_exists($location_path.'/'.$this->old_photo_i))
								rename($location_path.'/'.$this->old_photo_i, 'public/article/verwijderen/'.$this->location_id.'_'.$this->old_photo_i);
							$this->province_photo = $fileName;
							
							if($setting->media_resize == 1)
								self::resizePhoto($location_path.'/'.$fileName, $media_resize_size['photo']);
						}
					}					
				} else {			
					if($this->province_photo == '')
						$this->province_photo = $this->old_photo_i;
				}
				
				$this->province_header_photo = CUploadedFile::getInstance($this, 'province_header_photo');
				if($this->province_header_photo != null) {
					if($this->province_header_photo instanceOf CUploadedFile) {
						$fileName = time().'_'.$this->location_id.'_'.Utility::getUrlTitle($this->province->province_name).'.'.strtolower($this->province_header_photo->extensionName);
						if($this->province_header_photo->saveAs($location_path.'/'.$fileName)) {
							if($this->old_header_photo_i != '' && file_exists($location_path.'/'.$this->old_header_photo_i))
								rename($location_path.'/'.$this->old_header_photo_i, 'public/article/verwijderen/'.$this->location_id.'_'.$this->old_header_photo_i);
							$this->province_header_photo = $fileName;
							
							if($setting->media_resize == 1)
								self::resizePhoto($location_path.'/'.$fileName, $media_resize_size['header']);
						}
					}					
				} else {
					if($this->province_header_photo == '')
						$this->province_header_photo = $this->old_header_photo_i;
				}
			}
		}
		return true;
	}
	
	/**
	 * After save attributes
	 */
	protected function afterSave() 
	{
		parent::afterSave();
		
		$setting = ArticleLocationSetting::model()->findByPk(1, array(
			'select' => 'media_resize, media_resize_size',
		));
		$media_resize_size = unserialize($setting->media_resize_size);
		
		if($this->isNewRecord) {
			//Update article location photo
			$location_path = 'public/article/location';
			
			// Add article directory
			if(!file_exists($location_path)) {
				@mkdir($location_path, 0777,true);

				// Add file in article directory (index.php)
				$newFile = $location_path.'/index.php';
				$FileHandle = fopen($newFile, 'w');
			} else
				@chmod($location_path, 0755,true);
			
			$this->province_photo = CUploadedFile::getInstance($this, 'province_photo');
			if($this->province_photo != null) {
				if($this->province_photo instanceOf CUploadedFile) {
					$fileName = time().'_'.$this->location_id.'_'.Utility::getUrlTitle($this->province->province_name).'.'.strtolower($this->province_photo->extensionName);
					if($this->province_photo->saveAs($location_path.'/'.$fileName)) {
						if($setting->media_resize == 1)
							self::resizePhoto($location_path.'/'.$fileName, $media_resize_size['photo']);
						self::model()->updateByPk($this->location_id, array('province_photo'=>$fileName));
					}
				}
			}
			
			$this->province_header_photo = CUploadedFile::getInstance($this, 'province_header_photo');
			if($this->province_header_photo != null) {
				if($this->province_header_photo instanceOf CUploadedFile) {
					$fileName = time().'_'.$this->location_id.'_'.Utility::getUrlTitle($this->province->province_name).'.'.strtolower($this->province_header_photo->extensionName);
					if($this->province_header_photo->saveAs($location_path.'/'.$fileName)) {
						if($setting->media_resize == 1)
							self::resizePhoto($location_path.'/'.$fileName, $media_resize_size['header']);		
						if(self::model()->updateByPk($this->location_id, array('province_header_photo'=>$fileName)));
					}
				}
			}
		}
	}

	/**
	 * After delete attributes
	 */
	protected function afterDelete() {
		parent::afterDelete();
		//delete article location image
		$location_path = 'public/article/location';
		
		if($this->province_photo != '' && file_exists($location_path.'/'.$this->province_photo))
			rename($location_path.'/'.$this->province_photo, 'public/article/verwijderen/'.$this->location_id.'_'.$this->province_photo);
		
		if($this->province_header_photo != '' && file_exists($location_path.'/'.$this->province_header_photo))
			rename($location_path.'/'.$this->province_header_photo, 'public/article/verwijderen/'.$this->location_id.'_'.$this->province_header_photo);
	}

}