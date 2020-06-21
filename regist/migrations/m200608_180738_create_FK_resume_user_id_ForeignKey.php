<?php

use yii\db\Migration;

/**
 * Class m200608_180738_create_FK_resume_user_id_ForeignKey
 */
class m200608_180738_create_FK_resume_user_id_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-resume-user-id',
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
            'fk-resume-user-id',
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
        echo "m200608_180738_create_FK_resume_user_id_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
