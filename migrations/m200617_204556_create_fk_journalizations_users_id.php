<?php

use yii\db\Migration;

/**
 * Class m200617_204556_create_fk_journalizations_users_id
 */
class m200617_204556_create_fk_journalizations_users_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_journalizations_users_id',
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
            'fk_journalizations_users_id',
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
        echo "m200617_204556_create_fk_journalizations_users_id cannot be reverted.\n";

        return false;
    }
    */
}
