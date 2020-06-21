<?php

use yii\db\Migration;

/**
 * Class m200609_191008_create_fk_vacancy_id_schedules
 */
class m200609_191008_create_fk_vacancy_id_schedules extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-vacancy-id-schedules',
            'vacancy',
            'id_schedules',
            'schedule',
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
            'fk-vacancy-id-schedules',
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
        echo "m200609_191008_create_fk_vacancy_id_schedules cannot be reverted.\n";

        return false;
    }
    */
}
