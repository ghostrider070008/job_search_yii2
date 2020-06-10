<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "operations".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property Journalizations[] $journalizations
 */
class Operations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Journalizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournalizations()
    {
        return $this->hasMany(Journalizations::className(), ['id_operations' => 'id']);
    }
}
