<?php

use yii\db\Migration;

/**
 * Class m200616_210159_create_fk_messages_id_user_recipient
 */
class m200616_210159_create_fk_messages_id_user_recipient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_messages_user_id_recipient',
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
            'fk_messages_user_id_recipient',
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
        echo "m200616_210159_create_fk_messages_id_user_recipient cannot be reverted.\n";

        return false;
    }
    */
}
