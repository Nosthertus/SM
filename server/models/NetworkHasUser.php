<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "network_has_user".
 *
 * @property string $network_id
 * @property string $user_id
 *
 * @property Network $network
 * @property User $user
 */
class NetworkHasUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'network_has_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_id', 'user_id'], 'required'],
            [['network_id', 'user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'network_id' => 'Network ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetwork()
    {
        return $this->hasOne(Network::className(), ['id' => 'network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\NetworkHasUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\NetworkHasUserQuery(get_called_class());
    }
}
