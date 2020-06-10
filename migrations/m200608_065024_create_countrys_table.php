<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%countrys}}`.
 */
class m200608_065024_create_countrys_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%countrys}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%countrys}}');
    }
}
