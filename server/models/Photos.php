<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property string $id
 * @property string $photos_name
 * @property string $photos_path
 * @property resource $photos_caption
 * @property string $photos_date
 * @property string $photos_time
 * @property string $accounts_id
 *
 * @property NetworkHasPhotos[] $networkHasPhotos
 * @property Network[] $networks
 * @property Accounts $accounts
 * @property PhotosHasMessages[] $photosHasMessages
 * @property Messages[] $messages
 * @property UserHasPhotos[] $userHasPhotos
 * @property User[] $users
 * @property UserHasTypes1[] $userHasTypes1s
 */
class Photos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photos_path', 'photos_date', 'photos_time', 'accounts_id'], 'required'],
            [['photos_caption'], 'string'],
            [['photos_date', 'photos_time'], 'safe'],
            [['accounts_id'], 'integer'],
            [['photos_name', 'photos_path'], 'string', 'max' => 90]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photos_name' => 'Photos Name',
            'photos_path' => 'Photos Path',
            'photos_caption' => 'Photos Caption',
            'photos_date' => 'Photos Date',
            'photos_time' => 'Photos Time',
            'accounts_id' => 'Accounts ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetworkHasPhotos()
    {
        return $this->hasMany(NetworkHasPhotos::className(), ['photos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetworks()
    {
        return $this->hasMany(Network::className(), ['id' => 'network_id'])->viaTable('network_has_photos', ['photos_id' => 'id']);
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
    public function getPhotosHasMessages()
    {
        return $this->hasMany(PhotosHasMessages::className(), ['photos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['id' => 'messages_id'])->viaTable('photos_has_messages', ['photos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasPhotos()
    {
        return $this->hasMany(UserHasPhotos::className(), ['photos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_photos', ['photos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasTypes1s()
    {
        return $this->hasMany(UserHasTypes1::className(), ['photos_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\PhotosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\PhotosQuery(get_called_class());
    }
}
