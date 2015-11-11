<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "types".
 *
 * @property string $id
 * @property string $types_object
 *
 * @property UserHasMessages[] $userHasMessages
 * @property UserHasPhotos[] $userHasPhotos
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
    public function getUserHasMessages()
    {
        return $this->hasMany(UserHasMessages::className(), ['types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasPhotos()
    {
        return $this->hasMany(UserHasPhotos::className(), ['types_id' => 'id']);
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
