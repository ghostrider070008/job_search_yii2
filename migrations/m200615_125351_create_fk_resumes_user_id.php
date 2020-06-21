<?php

use yii\db\Migration;

/**
 * Class m200615_125351_create_fk_resumes_user_id
 */
class m200615_125351_create_fk_resumes_user_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
        'fk-resumes-user_id',
        'resumes',
        'id_user',
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
        'fk-resumes-user_id',
        'resumes'

    );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200615_125351_create_fk_resumes_user_id cannot be reverted.\n";

        return false;
    }
    */
}
