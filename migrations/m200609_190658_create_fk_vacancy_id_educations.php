<?php

use yii\db\Migration;

/**
 * Class m200609_190658_create_fk_vacancy_id_educations
 */
class m200609_190658_create_fk_vacancy_id_educations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-vacancy-id-educations',
            'vacancy',
            'id_educations',
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
           'fk-vacancy-id-educations',
           'educations'
       );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200609_190658_create_fk_vacancy_id_educations cannot be reverted.\n";

        return false;
    }
    */
}
