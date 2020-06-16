<?php

use yii\db\Migration;

/**
 * Class m200609_183033_create_fk_messages_id_users_sender
 */
class m200609_183033_create_fk_messages_id_users_sender extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
        'fk-messages-user-sender',
        'messages',
        'id_users_sender',
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
            'fk-messages-user-sender',
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
        echo "m200609_183033_create_fk_messages_id_users_sender cannot be reverted.\n";

        return false;
    }
    */
}
