<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companyes}}`.
 */
class m200608_091637_create_companyes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companyes}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(255)->notNull(),
            'phone' => $this->string(20),
            'e_mail' => $this->string(255),
            'created_at' => $this->timestamp()->defaultExpression("now()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%companyes}}');
    }
}
