<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "network".
 *
 * @property string $id
 * @property string $network_name
 * @property resource $network_description
 * @property string $accounts_id
 *
 * @property Accounts $accounts
 * @property NetworkHasMessages[] $networkHasMessages
 * @property Messages[] $messages
 * @property NetworkHasPhotos[] $networkHasPhotos
 * @property Photos[] $photos
 * @property NetworkHasUser[] $networkHasUsers
 * @property User[] $users
 */
class Network extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'network';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_name', 'accounts_id'], 'required'],
            [['network_description'], 'string'],
            [['accounts_id'], 'integer'],
            [['network_name'], 'string', 'max' => 90]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'network_name' => 'Network Name',
            'network_description' => 'Network Description',
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
        return $this->hasMany(NetworkHasMessages::className(), ['network_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['id' => 'messages_id'])->viaTable('network_has_messages', ['network_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetworkHasPhotos()
    {
        return $this->hasMany(NetworkHasPhotos::className(), ['network_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['id' => 'photos_id'])->viaTable('network_has_photos', ['network_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetworkHasUsers()
    {
        return $this->hasMany(NetworkHasUser::className(), ['network_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('network_has_user', ['network_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\NetworkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\NetworkQuery(get_called_class());
    }
}
