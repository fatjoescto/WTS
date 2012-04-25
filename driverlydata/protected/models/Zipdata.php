<?php

/**
 * This is the model class for table "zipdata".
 *
 * The followings are the available columns in table 'zipdata':
 * @property integer $id
 * @property string $ZipCode
 * @property string $ZipCodeType
 * @property string $City
 * @property string $State
 * @property string $LocationType
 * @property integer $Latitude
 * @property integer $Longitude
 * @property string $Location
 * @property string $Decommisioned
 * @property integer $TaxReturnsFiled
 * @property integer $EstimatedPopulation
 * @property integer $TotalWages
 * @property integer $IsTireTough
 * @property integer $IsConvertible
 * @property integer $is4x4
 */
class Zipdata extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Zipdata the static model class
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
		return 'zipdata';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Latitude, Longitude, TaxReturnsFiled, EstimatedPopulation, TotalWages, IsTireTough, IsConvertible, is4x4', 'numerical', 'integerOnly'=>true),
			array('ZipCode, Decommisioned', 'length', 'max'=>5),
			array('ZipCodeType', 'length', 'max'=>12),
			array('City, Location', 'length', 'max'=>40),
			array('State', 'length', 'max'=>2),
			array('LocationType', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ZipCode, ZipCodeType, City, State, LocationType, Latitude, Longitude, Location, Decommisioned, TaxReturnsFiled, EstimatedPopulation, TotalWages, IsTireTough, IsConvertible, is4x4', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'ZipCode' => 'Zip Code',
			'ZipCodeType' => 'Zip Code Type',
			'City' => 'City',
			'State' => 'State',
			'LocationType' => 'Location Type',
			'Latitude' => 'Latitude',
			'Longitude' => 'Longitude',
			'Location' => 'Location',
			'Decommisioned' => 'Decommisioned',
			'TaxReturnsFiled' => 'Tax Returns Filed',
			'EstimatedPopulation' => 'Estimated Population',
			'TotalWages' => 'Total Wages',
			'IsTireTough' => 'Is Tire Tough',
			'IsConvertible' => 'Is Convertible',
			'is4x4' => 'Is4x4',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('ZipCode',$this->ZipCode,true);
		$criteria->compare('ZipCodeType',$this->ZipCodeType,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('LocationType',$this->LocationType,true);
		$criteria->compare('Latitude',$this->Latitude);
		$criteria->compare('Longitude',$this->Longitude);
		$criteria->compare('Location',$this->Location,true);
		$criteria->compare('Decommisioned',$this->Decommisioned,true);
		$criteria->compare('TaxReturnsFiled',$this->TaxReturnsFiled);
		$criteria->compare('EstimatedPopulation',$this->EstimatedPopulation);
		$criteria->compare('TotalWages',$this->TotalWages);
		$criteria->compare('IsTireTough',$this->IsTireTough);
		$criteria->compare('IsConvertible',$this->IsConvertible);
		$criteria->compare('is4x4',$this->is4x4);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}