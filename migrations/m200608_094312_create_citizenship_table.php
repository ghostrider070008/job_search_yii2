<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%citizenship}}`.
 */
class m200608_094312_create_citizenship_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%citizenship}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%citizenship}}');
    }
}
