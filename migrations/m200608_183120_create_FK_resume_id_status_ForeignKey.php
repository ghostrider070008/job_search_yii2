<?php

use yii\db\Migration;

/**
 * Class m200608_183120_create_FK_resume_id_status_ForeignKey
 */
class m200608_183120_create_FK_resume_id_status_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-resume-id-status',
            'resumes',
            'id_status',
            'status',
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
            'fk-resume-fk-resume-id-status',
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
        echo "m200608_183120_create_FK_resume_id_status_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
