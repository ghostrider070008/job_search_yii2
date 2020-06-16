<?php

use yii\db\Migration;

/**
 * Class m200609_183923_create_fk_messages_id_users_recipient
 */
class m200609_183923_create_fk_messages_id_users_recipient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-messages-user-recipient',
            'messages',
            'id_users_recipient',
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
            'fk-messages-user-recipient',
            'messages'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200609_183923_create_fk_messages_id_users_recipient cannot be reverted.\n";

        return false;
    }
    */
}
