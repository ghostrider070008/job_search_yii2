<?php

use yii\db\Migration;

/**
 * Class m200608_182117_create_FK_resume_id_city_ForeignKey
 */
class m200608_182117_create_FK_resume_id_city_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-resume-id-city',
            'resumes',
            'id_citi',
            'cities',
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
            'fk-resume-id-city',
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
        echo "m200608_182117_create_FK_resume_id_siti_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
