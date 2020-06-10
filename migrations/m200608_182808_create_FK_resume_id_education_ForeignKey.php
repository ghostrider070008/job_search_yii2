<?php

use yii\db\Migration;

/**
 * Class m200608_182808_create_FK_resume_id_education_ForeignKey
 */
class m200608_182808_create_FK_resume_id_education_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-resume-id-education',
            'resumes',
            'id_education',
            'educations',
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
            'fk-resume-id-education',
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
        echo "m200608_182808_create_FK_resume_id_education_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
