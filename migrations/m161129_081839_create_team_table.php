<?php

use yii\db\Migration;

/**
 * Handles the creation of table `team`.
 */
class m161129_081839_create_team_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        
		
		
		$this->createTable('team', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'year' => $this->dateTime(),
            'budget' => $this->integer(),
            'trainer' => $this->string()->notNull(),
        ]);
		
		
		$this->insert('team', [
            'name' => 'Шахтар',
            'year' => '01.01.2016',
            'budget' => '122222222',
            'trainer' => 'Микола Миколайович',
        ]);
		
		
		
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('team');
    }
}
