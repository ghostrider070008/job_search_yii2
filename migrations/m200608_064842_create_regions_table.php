<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%regions}}`.
 */
class m200608_064842_create_regions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%regions}}', [
            'id' => $this->primaryKey(),
            'id_country' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%regions}}');
    }
}
