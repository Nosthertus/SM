<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property string $id
 * @property string $accounts_status
 * @property string $accounts_registered
 * @property string $accounts_cancelled
 * @property string $user_id
 *
 * @property User $user
 * @property Messages[] $messages
 * @property Network[] $networks
 * @property Photos[] $photos
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accounts_status', 'accounts_registered', 'user_id'], 'required'],
            [['accounts_status'], 'string'],
            [['accounts_registered', 'accounts_cancelled'], 'safe'],
            [['user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'accounts_status' => 'Accounts Status',
            'accounts_registered' => 'Accounts Registered',
            'accounts_cancelled' => 'Accounts Cancelled',
            'user_id' => 'User ID',
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
        return $this->hasMany(Messages::className(), ['accounts_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetworks()
    {
        return $this->hasMany(Network::className(), ['accounts_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['accounts_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\AccountsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AccountsQuery(get_called_class());
    }
}
