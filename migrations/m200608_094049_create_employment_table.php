<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employment}}`.
 */
class m200608_094049_create_employment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employment}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employment}}');
    }
}
