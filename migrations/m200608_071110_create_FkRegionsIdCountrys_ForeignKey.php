<?php

use yii\db\Migration;

/**
 * Class m200608_071110_create_FkRegionsIdCountrys_ForeignKey
 */
class m200608_071110_create_FkRegionsIdCountrys_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-regions-id_country',
            'regions',
            'id_country',
            'countrys',
            'id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-regions-id_country',
            'regions'
        );

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200608_071110_create_FkRegionsIdCountrys_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
