<?php

namespace app\models;

use yii\db\ActiveRecord;

class Player extends ActiveRecord
{

	public static function tableName()
	{
		return 'player';
	}
	
}