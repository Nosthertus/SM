<?php

namespace app\controllers;

use yii\rest\Controller;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\db\Query;

use app\models\UserHasUser;
use app\models\User;

Class FriendsController extends Controller
{
	public function behaviors()
	{
		return [
			[
				'class'=>ContentNegotiator::className(),
				'formats'=>[
					'application/json'=>Response::FORMAT_JSON
				]
			]
		];
	}

	public function actionFind($id)
	{
		return (new Query())
			->select('id, username')
			->from('user')
			->innerJoin('user_has_user','user.id = user_has_user.user_id1')
			->where([
				'user_has_user.user_id' => $id
			])->all();
	}
}