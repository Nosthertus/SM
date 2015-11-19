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
 * @property NetworkHasMessages[] $networkHasMessages
 * @property Network[] $networks
 * @property PhotosHasMessages[] $photosHasMessages
 * @property Photos[] $photos
 * @property UserHasMessages[] $userHasMessages
 * @property User[] $users
 * @property UserHasTypes[] $userHasTypes
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
    public function getNetworkHasMessages()
    {
        return $this->hasMany(NetworkHasMessages::className(), ['messages_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetworks()
    {
        return $this->hasMany(Network::className(), ['id' => 'network_id'])->viaTable('network_has_messages', ['messages_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotosHasMessages()
    {
        return $this->hasMany(PhotosHasMessages::className(), ['messages_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['id' => 'photos_id'])->viaTable('photos_has_messages', ['messages_id' => 'id']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasTypes()
    {
        return $this->hasMany(UserHasTypes::className(), ['messages_id' => 'id']);
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
