<?php

use yii\db\Migration;

/**
 * Handles the creation of table `position`.
 */
class m161129_085018_create_position_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('position', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
		
		$this->insert('position', [
            'name' => 'Воротарь',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('position');
    }
}
