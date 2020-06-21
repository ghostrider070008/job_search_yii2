<?php

use yii\db\Migration;

/**
 * Class m200609_191712_create_fk_journalizations_id_users
 */
class m200609_191712_create_fk_journalizations_id_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-journalizations-id-users',
            'journalizations',
            'id_users',
            'users',
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
            'fk-journalizations-id-users',
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
        echo "m200609_191712_create_fk_journalizations_id_users cannot be reverted.\n";

        return false;
    }
    */
}
