<?php

/**
 * This is the model class for table "set".
 *
 * The followings are the available columns in table 'set':
 * @property integer $set_id
 * @property integer $exercise_id
 * @property integer $reps
 * @property integer $weight
 * @property integer $day_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Exercise $exercise
 * @property Day $day
 * @property User $user
 */
class Set extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'set';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('exercise_id, reps, weight, day_id, user_id', 'required'),
			array('exercise_id, reps, weight, day_id, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('set_id, exercise_id, reps, weight, day_id, user_id', 'safe', 'on'=>'search'),
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
			'exercise' => array(self::BELONGS_TO, 'Exercise', 'exercise_id'),
			'day' => array(self::BELONGS_TO, 'Day', 'day_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'set_id' => 'Set',
			'exercise_id' => 'Exercise',
			'reps' => 'Reps',
			'weight' => 'Weight',
			'day_id' => 'Day',
			'user_id' => 'User',
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

		$criteria->compare('set_id',$this->set_id);
		$criteria->compare('exercise_id',$this->exercise_id);
		$criteria->compare('reps',$this->reps);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('day_id',$this->day_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Set the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
