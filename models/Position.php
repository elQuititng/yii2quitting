<?php

namespace app\models;

use yii\db\ActiveRecord;

class Position extends ActiveRecord
{

	public static function tableName()
	{
		return 'position';
	}


	public function getPositionSelectFormat()
	{
		$positions = self::find()->select(['id', 'name'])->all();
		
		$positionFormat = array();
		foreach( $positions as $position ){
			$positionFormat[$position->id] = $position->name;
		}
		
		return $positionFormat;
	}
	
	
	public function isPosition( $id )
	{
		$pos = self::find()->where(['id' => abs($id)])->limit(1)->one();
		if( isset( $pos->id ) ) return true;
		return false;
	}
	
}