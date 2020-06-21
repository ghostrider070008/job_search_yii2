<?php

use yii\db\Migration;

/**
 * Class m200608_070800_add_fk_cities_id_region_ForeignKey
 */
class m200608_070800_add_fk_cities_id_region_ForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-cities-id_region',
            'cities',
            'id_region',
            'regions',
            'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-cities-id_region',
            'cities'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200608_070800_add_fk_cities_id_region_ForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
