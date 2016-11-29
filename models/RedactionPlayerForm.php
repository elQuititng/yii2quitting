<?

namespace app\models;

use yii\base\Model;

class RedactionPlayerForm extends Model
{
	public $name;
    public $last_name;
    public $dob;
    public $position_id;
    public $team_id;
	
	
	public function attributeLabels()
	{
		return [
			'name' => "Ім'я",
			'last_name' => "Прізвище",
			'dob' => "Дата народження",
			'position_id' => "Позиція",
			'team_id' => "Команда",
		];
	}
	
	
	public function rules()
    {
        return [        
            [['name', 'last_name', 'dob', 'position_id', 'team_id'], 'required'],
			[['name', 'last_name', 'dob', 'position_id', 'team_id'], 'trim'],
			[['name', 'last_name'], 'string', 'min' => 3, 'max' => 100],
			['dob', 'string', 'min' => 10, 'max'=> 10],
			[['position_id', 'team_id'], 'number'],
        ];
    }
}	
?>