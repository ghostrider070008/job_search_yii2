<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tables".
 *
 * @property int $id
 * @property string $name
 *
 * @property Journalizations[] $journalizations
 */
class Tables extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Journalizations1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournalizations()
    {
        return $this->hasMany(Journalizations1::className(), ['id_tables' => 'id']);
    }
}
