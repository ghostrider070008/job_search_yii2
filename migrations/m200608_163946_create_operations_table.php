<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%operations}}`.
 */
class m200608_163946_create_operations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%operations}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%operations}}');
    }
}
