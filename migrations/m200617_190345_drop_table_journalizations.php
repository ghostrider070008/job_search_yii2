<?php

use yii\db\Migration;

/**
 * Class m200617_190345_drop_table_journalizations
 */
class m200617_190345_drop_table_journalizations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

            $this->dropTable('{{%journalizations}}');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%journalizations}}', [
            'id' => $this->primaryKey(),
            'id_operations' => $this->integer()->notNull(),
            'id_users' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression("now()"),
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200617_190345_drop_table_journalizations cannot be reverted.\n";

        return false;
    }
    */
}
