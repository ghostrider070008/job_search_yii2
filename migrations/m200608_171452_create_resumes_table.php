<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%journalizations}}`.
 */
class m200608_171452_create_resumes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resumes}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'family' => $this->string(),
            'name' => $this->string(),
            'patronomic' => $this->string(),
            'id_position' => $this->integer(),
            'salary' => $this->integer(),
            'phone' => $this->string(),
            'e-mail' => $this->string(),
            'id_citi' => $this->integer(),
            'id_citizenship' => $this->integer(),
            'birthday' => $this->timestamp(),
            'id_education' => $this->integer(),
            'experience' => $this->text(),
            'education' => $this->text(),
            'personal_qualities' => $this->text(),
            'id_status' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->defaultExpression('now()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%resumes}}');
    }
}
