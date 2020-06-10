<?php

use yii\db\Migration;

/**
 * Class m200609_185123_create_fk_vacancy_id_status
 */
class m200609_185123_create_fk_vacancy_id_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-vacancy-id-status',
            'vacancy',
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
            'fk-vacancy-id-status',
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
        echo "m200609_185123_create_fk_vacancy_id_status cannot be reverted.\n";

        return false;
    }
    */
}
