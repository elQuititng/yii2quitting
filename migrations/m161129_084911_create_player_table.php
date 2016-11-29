<?php

use yii\db\Migration;

/**
 * Handles the creation of table `player`.
 */
class m161129_084911_create_player_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('player', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'dob' => $this->dateTime(),
            'position_id' => $this->integer(),
            'team_id' => $this->integer(),
        ]);
		
		
		$this->insert('player', [
            'name' => 'Иван',
            'last_name' => 'Иванов',
            'dob' => '01.01.2016',
            'position_id' => '1',
            'team_id' => '1',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('player');
    }
}
