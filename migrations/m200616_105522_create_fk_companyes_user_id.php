<?php

use yii\db\Migration;

/**
 * Class m200616_105522_create_fk_companyes_user_id
 */
class m200616_105522_create_fk_companyes_user_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-companyes_user_id',
            'companyes',
            'user_id',
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
            'fk-companeyes_user_id',
            'companyes'

        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200616_105522_create_fk_companyes_user_id cannot be reverted.\n";

        return false;
    }
    */
}
