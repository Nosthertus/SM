<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_has_types1".
 *
 * @property string $user_id
 * @property string $types_id
 * @property string $photos_id
 *
 * @property User $user
 * @property Types $types
 * @property Photos $photos
 */
class UserHasTypes1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_has_types1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'types_id', 'photos_id'], 'required'],
            [['user_id', 'types_id', 'photos_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'types_id' => 'Types ID',
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
    public function getTypes()
    {
        return $this->hasOne(Types::className(), ['id' => 'types_id']);
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
     * @return \app\models\query\UserHasTypes1Query the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\UserHasTypes1Query(get_called_class());
    }
}
