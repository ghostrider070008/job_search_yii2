<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%journalizations}}`.
 */
class m200608_164409_create_journalizations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%journalizations}}', [
            'id' => $this->primaryKey(),
            'id_operations' => $this->integer()->notNull(),
            'id_users' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression("now()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%journalizations}}');
    }
}
