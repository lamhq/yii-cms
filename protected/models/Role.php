<?php

/**
 * This is the model class for table "{{auth_item}}".
 *
 * The followings are the available columns in table '{{auth_item}}':
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $bizrule
 * @property string $data
 *
 * The followings are the available model relations:
 * @property AuthAssignment[] $authAssignments
 * @property AuthItemChild[] $authItemChildren
 * @property AuthItemChild[] $authItemChildren1
 */
class Role extends CActiveRecord
{
	public $isMaster;
	
	protected $_permissions = null;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{auth_item}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type', 'required'),
			array('type, isMaster', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('description, bizrule, data, permissions', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name, type, description, bizrule, data', 'safe', 'on'=>'search'),
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
			'authAssignments' => array(self::HAS_MANY, 'AuthAssignment', 'itemname'),
			'authItemChildren' => array(self::HAS_MANY, 'AuthItemChild', 'parent'),
			'authItemChildren1' => array(self::HAS_MANY, 'AuthItemChild', 'child'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Name',
			'type' => 'Type',
			'description' => 'Description',
			'bizrule' => 'Bizrule',
			'data' => 'data',
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

		$criteria->compare('name',$this->name,true);
		$criteria->compare('type', CAuthItem::TYPE_ROLE);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('data',$this->data);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Role the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function defaultScope() {
		return array(
			'condition' => 'type='.CAuthItem::TYPE_ROLE
		);
	}
	
	public function getAssignedPermissions() {
		$permissions=Yii::app()->db->createCommand()
			->select('child')
			->from(Yii::app()->authManager->itemChildTable)
			->where('parent=:name', array(':name'=>$this->name))
			->queryColumn();
		return $permissions;
	}
	
	public function getPermissions() {
		if ($this->_permissions === null) {
			$this->_permissions = json_encode($this->getAssignedPermissions());		
		}
		return $this->_permissions;
	}
	
	public function setPermissions($value) {
		$this->_permissions = $value;
	}
	
	public function savePermission() {
		$auth = Yii::app()->authManager;
		// remove all assigned permissions
		Yii::app()->db->createCommand()
			->delete($auth->itemChildTable, 'parent=:parent', array(
				':parent'=>$this->name,
			));
		
		// assign new permissions
		$permissions = $this->isMaster ? AuthHelper::getPermissionTree() : json_decode($this->_permissions, true);
		foreach($permissions as $k => $v) {
			// in case $permissions is tree structure, permission name is the array key
			$permission = is_array($v) ? $k : $v;
			$auth->addItemChild($this->name, $permission);
		}
	}
	
	static public function getListData() {
		return CHtml::listData(self::model()->findAll(), 'name', 'description');
	}
}
