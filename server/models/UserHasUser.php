<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_has_user".
 *
 * @property string $user_id
 * @property string $user_id1
 *
 * @property User $user
 * @property User $userId1
 */
class UserHasUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_has_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_id1'], 'required'],
            [['user_id', 'user_id1'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_id1' => 'User Id1',
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
    public function getUserId1()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id1']);
    }

    /**
     * @inheritdoc
     * @return UserHasUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserHasUserQuery(get_called_class());
    }
}
