<?php

use yii\db\Migration;

/**
 * Class m200617_190807_create_table_tables
 */
class m200617_190807_create_table_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tables}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tables}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200617_190807_create_table_tables cannot be reverted.\n";

        return false;
    }
    */
}
