<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_has_photos".
 *
 * @property string $user_id
 * @property string $photos_id
 *
 * @property User $user
 * @property Photos $photos
 */
class UserHasPhotos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_has_photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'photos_id'], 'required'],
            [['user_id', 'photos_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'photos_id' => 'Photos ID',
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
    public function getPhotos()
    {
        return $this->hasOne(Photos::className(), ['id' => 'photos_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\UserHasPhotosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\UserHasPhotosQuery(get_called_class());
    }
}
