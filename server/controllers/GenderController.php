<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\ContentNegotiator;
use yii\web\Response;

use app\models\Genderbread;
use app\models\User;

Class GenderController extends Controller
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

	public function actionCreate()
	{
		$response = [
			'success'=>false,
			'errors'=>[],
			'data'=>[]
		];

		$post = ['Genderbread'=>$this->sort(Yii::$app->request->post())];

		$model = new Genderbread;

		$model->load($post);

		if($model->save())
		{
			$this->setUser(Yii::$app->request->post()['userid'], $model->id);
			$response['data'] = $model;

			$response['success'] = true;
		}

		else
			$response['errors'] = $model->getErrors();

		$response['debug'] = $post;

		return $response;
	}

	protected function setUser($id, $gender)
	{
		$model = User::findOne($id);

		$model->genderbread_id = $gender;

		return $model->save();
	}

	protected function sort($arr)
	{
		return [
			'genderbread_identity'=>strval($arr['identity']['value']),
			'genderbread_identity_visibility'=>$arr['identity']['visibility'],
			'genderbread_expression'=>strval($arr['expression']['value']),
			'genderbread_expression_visibility'=>$arr['expression']['visibility'],
			'genderbread_asex'=>strval($arr['asex']['value']),
			'genderbread_asex_visibility'=>$arr['asex']['visibility'],
			'genderbread_attracted'=>strval($arr['attracted']['value']),
			'genderbread_attracted_visibility'=>$arr['attracted']['visibility']
		];
	}
}