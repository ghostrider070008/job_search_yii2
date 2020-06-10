<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200608_060241_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name_auth_item' => $this->string(),
            'name' => $this->string(255),
            'family' => $this->string(255),
            'patronymic' => $this->string(255),
            'e-mail' => $this->string(255)->notNull(),
            'phone' => $this->string(15),
            'hash_passw' => $this->string(255),
            'created_at' => $this->timestamp()->defaultExpression("now()"),
            'updated_at' => $this->timestamp()->defaultExpression("now()")
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
