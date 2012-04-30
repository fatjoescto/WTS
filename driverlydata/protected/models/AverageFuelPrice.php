<?php

/**
 * This is the model class for table "tbl_average_fuel_price".
 *
 * The followings are the available columns in table 'tbl_average_fuel_price':
 * @property integer $id
 * @property string $state
 * @property string $average_fuel_price
 * @property string $date_of_price
 * @property string $fuel_type
 */
class AverageFuelPrice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AverageFuelPrice the static model class
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
		return 'tbl_average_fuel_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state, average_fuel_price, date_of_price, fuel_type', 'required'),
			array('state, fuel_type', 'length', 'max'=>2),
			array('average_fuel_price', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, state, average_fuel_price, date_of_price, fuel_type', 'safe', 'on'=>'search'),
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
			'state' => 'State',
			'average_fuel_price' => 'Average Fuel Price',
			'date_of_price' => 'Date Of Price',
			'fuel_type' => 'Fuel Type',
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
		$criteria->compare('state',$this->state,true);
		$criteria->compare('average_fuel_price',$this->average_fuel_price,true);
		$criteria->compare('date_of_price',$this->date_of_price,true);
		$criteria->compare('fuel_type',$this->fuel_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}