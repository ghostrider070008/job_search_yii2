<?php

use yii\db\Migration;

/**
 * Class m200609_185705_create_fk_vacancy_id_positions
 */
class m200609_185705_create_fk_vacancy_id_positions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-vacancy-id-positions',
            'vacancy',
            'id_positions',
            'position',
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
          'fk-vacancy-id-positions',
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
        echo "m200609_185705_create_fk_vacancy_id_positions cannot be reverted.\n";

        return false;
    }
    */
}
