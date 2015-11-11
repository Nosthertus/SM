<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\ContentNegotiator;
use yii\web\Response;

class UserController extends ActiveController
{
	public $modelClass = 'app\models\User';

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
}