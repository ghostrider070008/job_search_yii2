<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%educations}}`.
 */
class m200608_091427_create_educations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%educations}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%educations}}');
    }
}
