<?php

use yii\db\Migration;

/**
 * Class m200609_184338_create_fk_vacancy_id_company
 */
class m200609_184338_create_fk_vacancy_id_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
        'fk-vacancy-id-company',
        'vacancy',
        'id_companyes',
        'companyes',
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
            'fk-vacancy-id-company',
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
        echo "m200609_184338_create_fk_vacancy_id_company cannot be reverted.\n";

        return false;
    }
    */
}
