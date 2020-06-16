<?php

use yii\db\Migration;

/**
 * Class m200608_183346_create_FK_companyes_id_user_ForeignKey
 */
class m200608_183346_create_FK_companyes_id_user_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-companyes-user-id',
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
            'fk-companyes-user-id',
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
        echo "m200608_183346_create_FK_companyes_id_user_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
