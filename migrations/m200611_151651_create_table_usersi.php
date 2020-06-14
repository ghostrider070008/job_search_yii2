<?php

use yii\db\Migration;

/**
 * Class m200611_151651_create_table_usersi
 */
class m200611_151651_create_table_usersi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usersi}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'hash_passw' => $this->string(),
            'e_mail' => $this->string(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%usersi}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200611_151651_create_table_usersi cannot be reverted.\n";

        return false;
    }
    */
}
