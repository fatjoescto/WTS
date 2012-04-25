<?php

/**
 * This is the model class for table "warranty".
 *
 * The followings are the available columns in table 'warranty':
 * @property integer $id
 * @property string $Manufacturer
 * @property string $Basic
 * @property string $Powertrain
 * @property string $Corrosion
 * @property string $RoadsideAssit
 * @property string $BasicNotice
 * @property string $PowerTrainNotice
 * @property string $CorrosionNotice
 * @property string $RoadSideNotice
 */
class Warranty extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Warranty the static model class
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
		return 'warranty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Manufacturer', 'length', 'max'=>50),
			array('Basic, Powertrain, Corrosion, RoadsideAssit', 'length', 'max'=>20),
			array('BasicNotice, PowerTrainNotice, CorrosionNotice, RoadSideNotice', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Manufacturer, Basic, Powertrain, Corrosion, RoadsideAssit, BasicNotice, PowerTrainNotice, CorrosionNotice, RoadSideNotice', 'safe', 'on'=>'search'),
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
			'Manufacturer' => 'Manufacturer',
			'Basic' => 'Basic',
			'Powertrain' => 'Powertrain',
			'Corrosion' => 'Corrosion',
			'RoadsideAssit' => 'Roadside Assit',
			'BasicNotice' => 'Basic Notice',
			'PowerTrainNotice' => 'Power Train Notice',
			'CorrosionNotice' => 'Corrosion Notice',
			'RoadSideNotice' => 'Road Side Notice',
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
		$criteria->compare('Manufacturer',$this->Manufacturer,true);
		$criteria->compare('Basic',$this->Basic,true);
		$criteria->compare('Powertrain',$this->Powertrain,true);
		$criteria->compare('Corrosion',$this->Corrosion,true);
		$criteria->compare('RoadsideAssit',$this->RoadsideAssit,true);
		$criteria->compare('BasicNotice',$this->BasicNotice,true);
		$criteria->compare('PowerTrainNotice',$this->PowerTrainNotice,true);
		$criteria->compare('CorrosionNotice',$this->CorrosionNotice,true);
		$criteria->compare('RoadSideNotice',$this->RoadSideNotice,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}