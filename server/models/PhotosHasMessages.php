<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photos_has_messages".
 *
 * @property string $photos_id
 * @property string $messages_id
 *
 * @property Photos $photos
 * @property Messages $messages
 */
class PhotosHasMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos_has_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photos_id', 'messages_id'], 'required'],
            [['photos_id', 'messages_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'photos_id' => 'Photos ID',
            'messages_id' => 'Messages ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasOne(Photos::className(), ['id' => 'photos_id']);
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
     * @return \app\models\query\PhotosHasMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\PhotosHasMessagesQuery(get_called_class());
    }
}
