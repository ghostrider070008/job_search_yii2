<?php

use yii\db\Migration;

/**
 * Class m200616_205944_create_fk_messages_id_user_sender
 */
class m200616_205944_create_fk_messages_id_user_sender extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_messages_user_id',
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
            'fk_messages_user_id',
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
        echo "m200616_205944_create_fk_messages_id_user_sender cannot be reverted.\n";

        return false;
    }
    */
}
