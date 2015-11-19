<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "network_has_photos".
 *
 * @property string $network_id
 * @property string $photos_id
 *
 * @property Network $network
 * @property Photos $photos
 */
class NetworkHasPhotos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'network_has_photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_id', 'photos_id'], 'required'],
            [['network_id', 'photos_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'network_id' => 'Network ID',
            'photos_id' => 'Photos ID',
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
    public function getPhotos()
    {
        return $this->hasOne(Photos::className(), ['id' => 'photos_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\NetworkHasPhotosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\NetworkHasPhotosQuery(get_called_class());
    }
}
