<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "network_has_messages".
 *
 * @property string $network_id
 * @property string $messages_id
 *
 * @property Network $network
 * @property Messages $messages
 */
class NetworkHasMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'network_has_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_id', 'messages_id'], 'required'],
            [['network_id', 'messages_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'network_id' => 'Network ID',
            'messages_id' => 'Messages ID',
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
    public function getMessages()
    {
        return $this->hasOne(Messages::className(), ['id' => 'messages_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\NetworkHasMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\NetworkHasMessagesQuery(get_called_class());
    }
}
