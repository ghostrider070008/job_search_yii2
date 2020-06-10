<?php

use yii\db\Migration;

/**
 * Class m200609_185438_create_fk_vacancy_id_cities
 */
class m200609_185438_create_fk_vacancy_id_cities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-vacancy-id-cities',
            'vacancy',
            'id_cities',
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
          'fk-vacancy-id-cities',
          'vacancy'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200609_185438_create_fk_vacancy_id_cities cannot be reverted.\n";

        return false;
    }
    */
}
