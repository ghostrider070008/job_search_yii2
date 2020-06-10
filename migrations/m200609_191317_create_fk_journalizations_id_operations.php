<?php

use yii\db\Migration;

/**
 * Class m200609_191317_create_fk_journalizations_id_operations
 */
class m200609_191317_create_fk_journalizations_id_operations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-journalizations-id-operations',
            'journalizations',
            'id_operations',
            'operations',
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
            'fk-journalizations-id-operations',
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
        echo "m200609_191317_create_fk_journalizations_id_operations cannot be reverted.\n";

        return false;
    }
    */
}
