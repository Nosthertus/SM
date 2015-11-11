<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "network".
 *
 * @property string $id
 * @property string $network_name
 * @property resource $network_description
 *
 * @property Accounts[] $accounts
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
            [['network_name'], 'required'],
            [['network_description'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Accounts::className(), ['network_id' => 'id']);
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
