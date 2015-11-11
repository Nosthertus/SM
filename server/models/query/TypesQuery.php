<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Types]].
 *
 * @see \app\models\Types
 */
class TypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Types[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Types|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}