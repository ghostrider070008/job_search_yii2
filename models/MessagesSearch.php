<?php

namespace app\models;

use Yii;
use yii\grid\Column;
use app\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Messages;


class MessagesSearch extends Messages
{
   public $username_sender;
   public $username_recipient;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_users_sender', 'id_users_recipient'], 'integer'],
            [['text'], 'string'],
            [['created_at','username_sender', 'username_recipient'], 'safe'],
            [['id_users_sender'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_users_sender' => 'id']],
            [['id_users_recipient'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_users_recipient' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_users_sender' => 'Id Users Sender',
            'id_users_recipient' => 'Id Users Recipient',
            'text' => 'Text',
            'created_at' => 'Created At',
        ];
    }
    public function getUsersSender()
    {
        return $this->hasOne(User::className(), ['id' => 'id_users_sender']);
    }

    /**
     * Gets query for [[UsersRecipient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersRecipient()
    {
        return $this->hasOne(User::className(), ['id' => 'id_users_recipient']);
    }
    public function getMessages($user_id){
        $sql = 'Select  messages.id_users_sender, messages.id_users_recipient, messages.text, messages.created_at FROM messages JOIN users ON users.Id = messages.id_users_sender WHere messages.id_users_sender=:user_id or messages.id_users_recipient=:user_id ;';
        return static::findBySql($sql, [':user_id' => $user_id])->all();

    }
    public function getUsers(){
        return User::find()->select('username, id')->all();
    }
    public function getMessagesUsers($id_users){

    }


}
