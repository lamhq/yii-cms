<?php
/**
 * Form for edit user in backend
 *
 * @author Lam
 */
class UserBackendForm extends User {
	
	public $inputPassword, $confirmPassword;
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array_merge(parent::rules(), array(
			array('username, email, role', 'required', 'on'=>'insert, update'),
			array('inputPassword', 'required', 'on'=>'insert'),
			array('username, email, inputPassword', 'filter', 'filter'=>'trim', 'on'=>'insert, update'),
			array('confirmPassword', 'compare', 'compareAttribute'=>'inputPassword', 'on'=>'insert, update'),
		));
	}
	
	public function attributeLabels() {
		return array_merge(parent::rules(), array(
			'inputPassword'=>'Password',
			'confirmPassword'=>'Repeat password'
		));
	}
	
	public function savePassword() {
		if (!$this->inputPassword) return;
		$this->password = $this->hashPassword($this->inputPassword);
		$this->update(array('password'));
	}
	
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;

		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['defaultPageSize']
			)
		));
	}
}
