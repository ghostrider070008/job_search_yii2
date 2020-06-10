<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacancy}}`.
 */
class m200608_102235_create_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacancy}}', [
            'id' => $this->primaryKey(),
            'id_companyes' => $this->integer()->notNull(),
            'id_status' => $this->integer()->notNull(),
            'id_cities' => $this->integer()->notNull(),
            'id_positions' => $this->integer(),
            'id_educations' => $this->integer(),
            'salary' => $this->integer(),
            'id_schedules' => $this->integer(),
            'text' => $this->text(),
            'phone' => $this->string(255),
            'e-mail' => $this->string(255),
            'created_at' => $this->timestamp()->defaultExpression("now()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vacancy}}');
    }
}
