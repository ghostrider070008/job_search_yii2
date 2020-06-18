<?php

use yii\db\Migration;

/**
 * Class m200617_191052_fk_journalizations_table_id
 */
class m200617_191052_fk_journalizations_table_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_journalizations_table_id',
            'journalizations',
            'id_tables',
            'tables',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_journalizations_table_id',
            'journalizations'

        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200617_191052_fk_journalizations_table_id cannot be reverted.\n";

        return false;
    }
    */
}
