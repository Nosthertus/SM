<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_has_messages".
 *
 * @property string $user_id
 * @property string $messages_id
 * @property string $types_id
 *
 * @property User $user
 * @property Messages $messages
 * @property Types $types
 */
class UserHasMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_has_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'messages_id', 'types_id'], 'required'],
            [['user_id', 'messages_id', 'types_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'messages_id' => 'Messages ID',
            'types_id' => 'Types ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasOne(Messages::className(), ['id' => 'messages_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasOne(Types::className(), ['id' => 'types_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\UserHasMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\UserHasMessagesQuery(get_called_class());
    }
}
