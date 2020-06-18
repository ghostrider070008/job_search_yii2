<?php

use yii\db\Migration;

/**
 * Class m200618_042651_create_fk_journalizations_id_operations
 */
class m200618_042651_create_fk_journalizations_id_operations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_journalizations_id_operations',
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
            'fk_journalizations_id_operations',
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
        echo "m200618_042651_create_fk_journalizations_id_operations cannot be reverted.\n";

        return false;
    }
    */
}
