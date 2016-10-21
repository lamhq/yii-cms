<?php
class AuthHelper {
	
	static public function getPermissionTree() {
		return Yii::app()->params['permissions'];
	}
	
	/*
	 * Create auth operations base on permisions tree array.
	 * example AuthHelper::syncPermissions(Yii::app()->params['permissions']);
	 */
	static public function syncPermissions($tree) {
		$oldPermissions = array();
		foreach (Permission::model()->findAll('type!=?', [CAuthItem::TYPE_ROLE]) as $permission) {
			$data = $permission->attributes;
			unset($data['name']);
			$oldPermissions[$permission->name] = $data;
		}
		
		// remove all permissions and reconstruct
		Permission::model()->deleteAll('type!=?', [CAuthItem::TYPE_ROLE]);
		self::scanPermissionTree($tree);
		
		foreach (Permission::model()->findAll('type!=?', [CAuthItem::TYPE_ROLE]) as $permission) {
			if (array_key_exists($permission->name, $oldPermissions)) {
				$permission->attributes = $oldPermissions[$permission->name];
				$permission->save();
			}
		}
	}
	
	static private function scanPermissionTree($permissions, $parentPermission=null) {
		$auth=Yii::app()->authManager;
		foreach($permissions as $k => $v) {
			$permission = is_array($v) ? $k : $v;
			$childs = is_array($v) ? $v : array();
			// if permission is not exist, create permission
			if (!$auth->getAuthItem($permission)) {
				$auth->createOperation($permission, $permission);
			}
			
			// if permission has parent, assign child item for parent permission
			if ($parentPermission) {
				$auth->addItemChild($parentPermission, $permission);
			}
			
			// loop for its childs
			self::scanPermissionTree($childs, $permission);
		}
	}
}