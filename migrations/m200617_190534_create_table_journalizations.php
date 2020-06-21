<?php

use yii\db\Migration;

/**
 * Class m200617_190534_create_table_journalizations
 */
class m200617_190534_create_table_journalizations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%journalizations}}', [
            'id' => $this->primaryKey(),
            'id_operations' => $this->integer()->notNull(),
            'id_tables' => $this->integer()->notNull(),
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

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200617_190534_create_table_journalizations cannot be reverted.\n";

        return false;
    }
    */
}
