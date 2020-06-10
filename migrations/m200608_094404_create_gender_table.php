<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gender}}`.
 */
class m200608_094404_create_gender_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gender}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%gender}}');
    }
}
