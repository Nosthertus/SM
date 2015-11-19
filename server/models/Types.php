<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "types".
 *
 * @property string $id
 * @property string $types_object
 *
 * @property UserHasTypes[] $userHasTypes
 * @property User[] $users
 * @property UserHasTypes1[] $userHasTypes1s
 * @property User[] $users0
 */
class Types extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['types_object'], 'required'],
            [['types_object'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'types_object' => 'Types Object',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasTypes()
    {
        return $this->hasMany(UserHasTypes::className(), ['types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_types', ['types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasTypes1s()
    {
        return $this->hasMany(UserHasTypes1::className(), ['types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_types1', ['types_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\TypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TypesQuery(get_called_class());
    }
}
