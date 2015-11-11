<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genderbread".
 *
 * @property string $id
 * @property string $genderbread_identity
 * @property string $genderbread_identity_visibility
 * @property string $genderbread_expression
 * @property string $genderbread_expression_visibility
 * @property string $genderbread_asex
 * @property string $genderbread_asex_visibility
 * @property string $genderbread_attracted
 * @property string $genderbread_attracted_visibility
 *
 * @property User[] $users
 */
class Genderbread extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genderbread';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genderbread_identity', 'genderbread_identity_visibility', 'genderbread_expression', 'genderbread_expression_visibility', 'genderbread_asex', 'genderbread_asex_visibility', 'genderbread_attracted', 'genderbread_attracted_visibility'], 'string'],
            [['genderbread_asex', 'genderbread_asex_visibility'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genderbread_identity' => 'Genderbread Identity',
            'genderbread_identity_visibility' => 'Genderbread Identity Visibility',
            'genderbread_expression' => 'Genderbread Expression',
            'genderbread_expression_visibility' => 'Genderbread Expression Visibility',
            'genderbread_asex' => 'Genderbread Asex',
            'genderbread_asex_visibility' => 'Genderbread Asex Visibility',
            'genderbread_attracted' => 'Genderbread Attracted',
            'genderbread_attracted_visibility' => 'Genderbread Attracted Visibility',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['genderbread_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\GenderbreadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\GenderbreadQuery(get_called_class());
    }
}
