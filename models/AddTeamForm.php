<?php

namespace app\models;

use yii\base\Model;

class AddTeamForm extends Model
{
    public $name;
    public $year;
    public $budget;
    public $trainer;

	
	public function attributeLabels()
	{
		return [
			'name' => "Назва команди",
			'year' => "Рік заснуваня",
			'budget' => "Річний бюджет",
			'trainer' => "Тренер",
		];
	}
	
    public function rules()
    {
        return [        
            [['name', 'year', 'budget', 'trainer'], 'required'],
            [['name', 'year', 'budget', 'trainer'], 'trim'],
			[['name', 'trainer'], 'string', 'min' => 3, 'max'=> 100],
			['year', 'string', 'min' => 10, 'max'=> 10],
			['budget', 'number', 'min' => 1, 'max'=> 9999999999],
        ];
    }

}
