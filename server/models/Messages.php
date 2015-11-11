<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property string $id
 * @property resource $messages_text
 * @property string $messages_date
 * @property string $messages_time
 * @property string $accounts_id
 *
 * @property Accounts $accounts
 * @property UserHasMessages[] $userHasMessages
 * @property User[] $users
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['messages_text', 'messages_date', 'messages_time', 'accounts_id'], 'required'],
            [['messages_text'], 'string'],
            [['messages_date', 'messages_time'], 'safe'],
            [['accounts_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'messages_text' => 'Messages Text',
            'messages_date' => 'Messages Date',
            'messages_time' => 'Messages Time',
            'accounts_id' => 'Accounts ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasOne(Accounts::className(), ['id' => 'accounts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasMessages()
    {
        return $this->hasMany(UserHasMessages::className(), ['messages_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_messages', ['messages_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\MessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\MessagesQuery(get_called_class());
    }
}
