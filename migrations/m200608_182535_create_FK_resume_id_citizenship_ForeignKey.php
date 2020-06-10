<?php

use yii\db\Migration;

/**
 * Class m200608_182535_create_FK_resume_id_citizenship_ForeignKey
 */
class m200608_182535_create_FK_resume_id_citizenship_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-resume-id_citizenship',
            'resumes',
            'id_user',
            'citizenship',
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
            'fk-resume-id_citizenship',
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
        echo "m200608_182535_create_FK_resume_id_citizenship_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
